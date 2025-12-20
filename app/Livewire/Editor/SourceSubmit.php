<?php
namespace App\Livewire\Editor;

use App\Jobs\AI\RewriteNewsArticleJob;
use App\Models\AiJobLog;
use App\Models\RawArticle;
use Illuminate\Support\Str;
use Livewire\Component;

class SourceSubmit extends Component
{
    public string $source_url           = '';
    public string $source_name          = '';
    public string $source_title         = '';
    public string $source_content       = '';
    public ?string $source_published_at = null;

    protected function rules(): array
    {
        return [
            'source_url'          => ['nullable', 'string', 'max:2000'],
            'source_name'         => ['nullable', 'string', 'max:255'],
            'source_title'        => ['required', 'string', 'max:255'],
            'source_content'      => ['required', 'string', 'max:200000'],
            'source_published_at' => ['nullable', 'date'],
        ];
    }

    public function submit(): void
    {
        $this->validate();

        $url = trim($this->source_url);
        if ($url === '') {
            // if staff didn't provide a URL, create a stable internal one
            $url = 'internal://submission/' . Str::uuid()->toString();
        }

        $raw = RawArticle::updateOrCreate(
            ['source_url' => $url],
            [
                'source_type'         => $this->source_url ? 'manual_url' : 'manual_text',
                'source_name'         => trim($this->source_name) !== '' ? trim($this->source_name) : null,
                'source_title'        => trim($this->source_title),
                'source_content'      => trim($this->source_content),
                'source_published_at' => $this->source_published_at ? now()->parse($this->source_published_at) : null,
                'content_hash'        => sha1($this->source_content),
            ]
        );

        $log = AiJobLog::create([
            'raw_article_id' => $raw->id,
            'job_type'       => 'rewrite_translate',
            'status'         => 'queued',
            'message'        => 'Queued for AI rewrite.',
        ]);

        RewriteNewsArticleJob::dispatch(
            rawArticleId: $raw->id,
            outletName: config('news.outlet_name'),
            targetLanguage: config('news.target_language'),
            aiJobLogId: $log->id
        );

        $this->reset(['source_url', 'source_name', 'source_title', 'source_content', 'source_published_at']);

        $this->dispatch('notify', type: 'success', message: 'Submitted. AI draft will appear in the inbox shortly.');
    }

    public function render()
    {
        return view('livewire.editor.source-submit')->layout('layouts.app');
    }
}
