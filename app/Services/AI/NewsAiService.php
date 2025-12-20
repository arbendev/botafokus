<?php
namespace App\Services\AI;

use App\Models\PromptTemplate;
use App\Services\Prompts\PromptRenderer;
use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;
use RuntimeException;

class NewsAiService
{
    public function __construct(
        protected PromptRenderer $renderer
    ) {}

    /**
     * Rewrite + translate a news article using OpenAI.
     *
     * @param  array<string, mixed>  $payload
     * @return array<string, mixed>
     */
    public function rewriteAndTranslate(array $payload): array
    {
        $template = PromptTemplate::where('key', 'news.rewrite_translate.v1')
            ->where('is_active', true)
            ->firstOrFail();

        $rendered = $this->renderer->render($template, $payload);

        try {
            $response = OpenAI::chat()->create([
                'model'       => $template->model,
                'messages'    => [
                    [
                        'role'    => 'system',
                        'content' => $rendered['system'],
                    ],
                    [
                        'role'    => 'user',
                        'content' => $rendered['user'],
                    ],
                ],
                'temperature' => (float) $template->temperature,
                'max_tokens'  => $template->max_output_tokens,
            ]);
        } catch (\Throwable $e) {
            Log::error('OpenAI request failed', [
                'error' => $e->getMessage(),
            ]);

            throw new RuntimeException('AI request failed');
        }

        $content = trim($response->choices[0]->message->content ?? '');

        return $this->parseAndValidateJson($content);
    }

    /**
     * Parse and validate strict JSON output.
     *
     * @return array<string, mixed>
     */
    protected function parseAndValidateJson(string $content): array
    {
        // Remove BOM or invisible chars just in case
        $content = preg_replace('/^\xEF\xBB\xBF/', '', $content);

        $decoded = json_decode($content, true);

        if (! is_array($decoded)) {
            Log::error('AI response is not valid JSON', [
                'content' => $content,
            ]);

            throw new RuntimeException('AI returned invalid JSON');
        }

        $requiredKeys = [
            'title',
            'lead',
            'body',
            'location_label',
            'tags',
            'seo_title',
            'seo_description',
        ];

        foreach ($requiredKeys as $key) {
            if (! array_key_exists($key, $decoded)) {
                throw new RuntimeException("AI response missing required key: {$key}");
            }
        }

        if (! is_array($decoded['tags'])) {
            throw new RuntimeException('AI tags must be an array');
        }

        return [
            'title'           => trim($decoded['title']),
            'lead'            => trim($decoded['lead']),
            'body'            => trim($decoded['body']),
            'location_label'  => trim((string) $decoded['location_label']),
            'tags'            => array_slice(array_map('trim', $decoded['tags']), 0, 8),
            'seo_title'       => trim($decoded['seo_title']),
            'seo_description' => trim($decoded['seo_description']),
        ];
    }
}
