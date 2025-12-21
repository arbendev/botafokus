<?php
namespace App\Livewire\Editor;

use App\Jobs\Ingestion\FetchSourceArticleJob;
use App\Models\AiJobLog;
use App\Models\RawArticle;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class UrlSubmit extends Component
{
    public string $source_url           = '';
    public string $source_name          = '';
    public ?string $source_published_at = null;

    protected function rules(): array
    {
        return [
            'source_url'          => ['required', 'url', 'max:2000'],
            'source_name'         => ['nullable', 'string', 'max:255'],
            'source_published_at' => ['nullable', 'date'],
        ];
    }

    public function submit(): void
    {
        $this->validate();

        $url  = trim($this->source_url);
        $host = parse_url($url, PHP_URL_HOST) ?: null;

        // Create a placeholder raw article (content will be fetched by job)
        $raw = RawArticle::updateOrCreate(
            ['source_url' => $url],
            [
                'source_type'         => 'manual_url',
                'source_name'         => trim($this->source_name) !== '' ? trim($this->source_name) : $host,
                'source_title'        => '', // will be set by fetch job
                'source_content'      => '', // will be set by fetch job
                'source_published_at' => $this->source_published_at ? now()->parse($this->source_published_at) : null,
                'content_hash'        => Str::random(40), // temporary; replaced once content is extracted
            ]
        );

        // Log this pipeline run
        $log = AiJobLog::create([
            'raw_article_id' => $raw->id,
            'job_type'       => 'fetch_and_rewrite',
            'status'         => 'queued',
            'message'        => 'Queued for fetch + AI rewrite.',
        ]);

        // Dispatch fetch job; it will dispatch RewriteNewsArticleJob when extraction succeeds
        FetchSourceArticleJob::dispatch(
            rawArticleId: $raw->id,
            aiJobLogId: $log->id,
            outletName: config('news.outlet_name'),
            targetLanguage: config('news.target_language'),
        );

        $this->reset(['source_url', 'source_name', 'source_published_at']);

        $this->dispatch('notify', type: 'success', message: 'URL submitted. Fetching and AI rewrite will run shortly.');
    }

    public function render()
    {
        return view('livewire.editor.url-submit');
    }
}
