<?php
namespace App\Livewire\Editor;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ArticleSettings extends Component
{
    public Article $article;

    public ?int $category_id = null;
    public bool $is_featured = false;
    public string $status;
    public ?string $publish_at = null;

    public function mount(int $articleId): void
    {
        $this->article = Article::findOrFail($articleId);

        $this->category_id = $this->article->category_id;
        $this->is_featured = $this->article->is_featured;
        $this->status      = $this->article->status;
        $this->publish_at  = optional($this->article->publish_at)->format('Y-m-d\TH:i');
    }

    public function save(): void
    {
        $this->validate([
            'category_id' => ['nullable', 'exists:categories,id'],
            'status'      => ['required', 'in:ai_draft,needs_review,published,rejected'],
            'publish_at'  => ['nullable', 'date'],
        ]);

        // Only one featured article at a time
        if ($this->is_featured) {
            Article::where('is_featured', true)
                ->where('id', '!=', $this->article->id)
                ->update(['is_featured' => false]);
        }

        $this->article->update([
            'category_id'  => $this->category_id,
            'is_featured'  => $this->is_featured,
            'status'       => $this->status,
            'publish_at'   => $this->publish_at ? now()->parse($this->publish_at) : null,
            'published_at' => $this->status === 'published'
                ? ($this->article->published_at ?? now())
                : null,
            'editor_id'    => Auth::id(),
        ]);

        $this->dispatch('notify',
            type: 'success',
            message: 'Article settings saved.'
        );
    }

    public function render()
    {
        return view('livewire.editor.article-settings', [
            'categories' => Category::where('active', true)
                ->orderBy('order_index')
                ->get(),
        ]);
    }
}
