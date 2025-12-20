<?php
namespace App\Livewire\Editor;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleInbox extends Component
{
    use WithPagination;

    public string $status = 'ai_draft';
    public string $q      = '';
    public int $perPage   = 15;

    protected $queryString = [
        'status' => ['except' => 'ai_draft'],
        'q'      => ['except' => ''],
        'page'   => ['except' => 1],
    ];

    public function updatingQ(): void
    {
        $this->resetPage();
    }

    public function updatingStatus(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Article::query()
            ->with(['tags'])
            ->orderByDesc('created_at');

        if ($this->status !== 'all') {
            $query->where('status', $this->status);
        }

        if (trim($this->q) !== '') {
            $q = trim($this->q);

            $query->where(function ($sub) use ($q) {
                $sub->where('title', 'like', "%{$q}%")
                    ->orWhere('lead', 'like', "%{$q}%")
                    ->orWhere('body', 'like', "%{$q}%");
            });
        }

        return view('livewire.editor.article-inbox', [
            'articles'      => $query->paginate($this->perPage),
            'statusOptions' => $this->statusOptions(),
        ])->layout('layouts.app');
    }

    private function statusOptions(): array
    {
        return [
            'ai_draft'     => 'AI Draft',
            'needs_review' => 'Needs Review',
            'approved'     => 'Approved',
            'published'    => 'Published',
            'rejected'     => 'Rejected',
            'all'          => 'All',
        ];
    }
}
