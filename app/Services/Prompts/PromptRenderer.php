<?php
namespace App\Services\Prompts;

use App\Models\PromptTemplate;
use InvalidArgumentException;

class PromptRenderer
{
    /**
     * Render a PromptTemplate into final system/user strings by replacing {{vars}}.
     *
     * @param  PromptTemplate  $template
     * @param  array<string, mixed>  $data
     * @return array{system: string, user: string}
     */
    public function render(PromptTemplate $template, array $data): array
    {
        $required = $template->variables ?? [];

        // Ensure all required variables are present (allow empty string, but not missing)
        foreach ($required as $var) {
            if (! array_key_exists($var, $data)) {
                throw new InvalidArgumentException("Missing required prompt variable: {$var}");
            }
        }

        $system = $this->replaceVars($template->system_prompt, $data);
        $user   = $this->replaceVars($template->user_prompt, $data);

        return ['system' => $system, 'user' => $user];
    }

    /**
     * Replace {{var}} placeholders with string values.
     *
     * @param  string  $text
     * @param  array<string, mixed>  $data
     */
    private function replaceVars(string $text, array $data): string
    {
        return preg_replace_callback('/\{\{\s*([a-zA-Z0-9_\-\.]+)\s*\}\}/', function ($m) use ($data) {
            $key = $m[1];

            if (! array_key_exists($key, $data)) {
                // Keep placeholder as-is if not provided (optional vars)
                return $m[0];
            }

            $value = $data[$key];

            if (is_array($value) || is_object($value)) {
                return json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }

            return (string) $value;
        }, $text) ?? $text;
    }
}
