<div class="container-xl px-3 py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <a href="{{ route('editor.articles.index') }}" class="text-decoration-none">← Inbox</a>
                <span class="text-muted">/</span>
                <span class="text-muted">Categories</span>
            </div>

            <h1 class="h4 mb-1">Categories</h1>
            <div class="text-muted small">Manage navigation and homepage sections.</div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('editor.sources.submit') }}" class="btn btn-primary btn-sm">Submit Source</a>
            <a href="{{ route('editor.ai.logs') }}" class="btn btn-outline-secondary btn-sm">AI Logs</a>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
            <div class="row g-2 align-items-end">
                <div class="col-md-8">
                    <label class="form-label small text-muted mb-1">Search</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Search by name or slug..."
                        wire:model.live.debounce.350ms="q">
                </div>
                <div class="col-md-4">
                    <label class="form-label small text-muted mb-1">Per Page</label>
                    <select class="form-select form-select-sm" wire:model.live="perPage">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">Order</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th class="pe-3 text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $cat)
                            <tr>
                                <td class="ps-3">{{ $cat->order_index }}</td>
                                <td class="fw-semibold">{{ $cat->name }}</td>
                                <td class="text-muted">{{ $cat->slug }}</td>
                                <td>
                                    @if ($cat->active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="pe-3 text-end">
                                    <button class="btn btn-outline-primary btn-sm"
                                        wire:click="toggleActive({{ $cat->id }})">
                                        Toggle
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">No categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-3">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
