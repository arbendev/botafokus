<?php
namespace App\Livewire\Editor;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class ArticleEdit extends Component
{
    public Article $article;

    public string $title           = '';
    public string $slug            = '';
    public ?string $lead           = null;
    public string $body            = '';
    public ?string $location_label = null;

    public ?string $seo_title       = null;
    public ?string $seo_description = null;

    public ?string $hero_image_url = null;
    public ?string $hero_image_alt = null;

    public string $status = 'ai_draft';

    // Comma separated for editor convenience
    public string $tagsInput = '';

    protected function rules(): array
    {
        return [
            'title'           => ['required', 'string', 'max:255'],
            'slug'            => ['required', 'string', 'max:255'],
            'lead'            => ['nullable', 'string', 'max:5000'],
            'body'            => ['required', 'string', 'max:200000'],
            'location_label'  => ['nullable', 'string', 'max:120'],
            'seo_title'       => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'hero_image_url'  => ['nullable', 'string', 'max:2000'],
            'hero_image_alt'  => ['nullable', 'string', 'max:255'],
        ];
    }

    public function mount(Article $article): void
    {
        $this->article = $article;

        $this->title           = $article->title;
        $this->slug            = $article->slug;
        $this->lead            = $article->lead;
        $this->body            = $article->body;
        $this->location_label  = $article->location_label;
        $this->seo_title       = $article->seo_title;
        $this->seo_description = $article->seo_description;
        $this->hero_image_url  = $article->hero_image_url;
        $this->hero_image_alt  = $article->hero_image_alt;
        $this->status          = $article->status;

        $this->tagsInput = $article->tags()
            ->orderBy('name')
            ->pluck('name')
            ->implode(', ');
    }

    public function updatedTitle(): void
    {
        // Only auto-suggest slug if it matches the old title-slug-ish pattern
        if (trim($this->slug) === '' || Str::startsWith($this->slug, Str::slug($this->article->title))) {
            $this->slug = Str::slug($this->title);
        }
    }

    public function saveDraft(): void
    {
        $this->validate();

        DB::transaction(function () {
            $this->persistArticle();
            $this->syncTags();
        });

        $this->dispatch('notify', type: 'success', message: 'Draft saved.');
    }

    public function markNeedsReview(): void
    {
        $this->saveDraft();

        $this->article->update(['status' => 'needs_review']);
        $this->status = 'needs_review';

        $this->dispatch('notify', type: 'success', message: 'Marked as Needs Review.');
    }

    public function approve(): void
    {
        $this->saveDraft();

        $this->article->update(['status' => 'approved']);
        $this->status = 'approved';

        $this->dispatch('notify', type: 'success', message: 'Approved.');
    }

    public function reject(): void
    {
        $this->saveDraft();

        $this->article->update(['status' => 'rejected']);
        $this->status = 'rejected';

        $this->dispatch('notify', type: 'success', message: 'Rejected.');
    }

    public function publishNow(): void
    {
        $this->saveDraft();

        $this->article->update([
            'status'       => 'published',
            'published_at' => now(),
        ]);

        $this->status = 'published';

        $this->dispatch('notify', type: 'success', message: 'Published.');
    }

    private function persistArticle(): void
    {
        $this->article->update([
            'title'           => $this->title,
            'slug'            => $this->slug,
            'lead'            => $this->lead,
            'body'            => $this->body,
            'location_label'  => $this->location_label,
            'seo_title'       => $this->seo_title,
            'seo_description' => $this->seo_description,
            'hero_image_url'  => $this->hero_image_url,
            'hero_image_alt'  => $this->hero_image_alt,
        ]);

        $this->article->refresh();
    }

    private function syncTags(): void
    {
        $names = collect(explode(',', $this->tagsInput))
            ->map(fn($t) => trim($t))
            ->filter(fn($t) => $t !== '')
            ->unique()
            ->take(12);

        $tagIds = $names->map(function ($name) {
            return Tag::firstOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            )->id;
        });

        $this->article->tags()->sync($tagIds->values()->all());
    }

    public function render()
    {
        $this->article->load('rawArticle', 'tags');

        return view('livewire.editor.article-edit', [
            'raw' => $this->article->rawArticle,
        ])->layout('layouts.app');
    }
}
