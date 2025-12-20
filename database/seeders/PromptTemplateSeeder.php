<?php
namespace Database\Seeders;

use App\Models\PromptTemplate;
use Illuminate\Database\Seeder;

class PromptTemplateSeeder extends Seeder
{
    public function run(): void
    {
        PromptTemplate::updateOrCreate(
            ['key' => 'news.rewrite_translate.v1'],
            [
                'name'              => 'News: Rewrite + Translate (JSON Output)',
                'description'       => 'Rewrites a source article in neutral newsroom style and outputs translated article fields as strict JSON.',
                'version'           => 1,
                'is_active'         => true,

                // You can change model later in the admin UI; keep a sensible default.
                'model'             => 'gpt-4.1-mini',
                'temperature'       => 0.40,
                'max_output_tokens' => 1400,

                'variables'         => [
                    'outlet_name',
                    'target_language',
                    'source_title',
                    'source_url',
                    'source_published_at',
                    'source_content',
                ],

                'system_prompt'     => <<<SYSTEM
You are a professional news editor and reporter for {{outlet_name}}.
You write in a neutral, factual, and concise journalistic tone.

Rules:
- Preserve the original meaning and key facts.
- Do NOT copy phrasing from the source. Use fresh wording and sentence structure.
- Do NOT add speculation or unverified claims.
- If the source is unclear, write conservatively and do not guess.
- Avoid sensational language and emotional framing.
- Output MUST be valid JSON only (no markdown, no commentary).
SYSTEM,

                'user_prompt'       =><<<USER
Task:
1) Read the source article.
2) Rewrite it as an original news article.
3) Write the final article in {{target_language}}.

Return STRICT JSON with this schema:
{
  "title": "string",
  "lead": "string (1 short paragraph)",
  "body": "string (multiple paragraphs separated by \\n\\n)",
  "location_label": "string or empty",
  "tags": ["string", "string", "... (max 8)"],
  "seo_title": "string (max ~60 chars)",
  "seo_description": "string (max ~160 chars)"
}

Constraints:
- Title must be clear and specific.
- Lead should summarize the key point(s).
- Body should be coherent and readable.
- Tags should be topical nouns/proper nouns (no sentences).
- Do not mention the source outlet in the text.
- Do not include any extra keys.

Source metadata:
- Source Title: {{source_title}}
- Source URL: {{source_url}}
- Source Published At: {{source_published_at}}

Source Article Content:
{{source_content}}
USER,
            ]
        );
    }
}
