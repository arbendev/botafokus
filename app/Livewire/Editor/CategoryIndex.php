<?php
namespace App\Livewire\Editor;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryIndex extends Component
{
    use WithPagination;

    public string $q    = '';
    public int $perPage = 20;

    public function updatingQ(): void
    {
        $this->resetPage();
    }

    public function toggleActive(int $id): void
    {
        $cat = Category::findOrFail($id);
        $cat->update(['active' => ! $cat->active]);
    }

    public function render()
    {
        $query = Category::query()->orderBy('order_index')->orderBy('name');

        if (trim($this->q) !== '') {
            $q = trim($this->q);
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('slug', 'like', "%{$q}%");
            });
        }

        return view('livewire.editor.category-index', [
            'categories' => $query->paginate($this->perPage),
        ])->layout('layouts.app');
    }
}
