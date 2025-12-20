<?php
namespace App\Livewire\Editor;

use App\Models\AiJobLog;
use Livewire\Component;
use Livewire\WithPagination;

class AiJobLogIndex extends Component
{
    use WithPagination;

    public string $status = 'all';
    public int $perPage   = 20;

    protected $queryString = [
        'status' => ['except' => 'all'],
        'page'   => ['except' => 1],
    ];

    public function updatingStatus(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $q = AiJobLog::query()->orderByDesc('id');

        if ($this->status !== 'all') {
            $q->where('status', $this->status);
        }

        return view('livewire.editor.ai-job-log-index', [
            'logs' => $q->paginate($this->perPage),
        ])->layout('layouts.app');
    }
}
