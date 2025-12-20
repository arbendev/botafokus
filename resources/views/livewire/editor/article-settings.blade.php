<div class="card border-0 shadow-sm mb-3">
    <div class="card-header bg-white fw-semibold">
        Article Settings
    </div>

    <div class="card-body">
        <form wire:submit.prevent="save" class="row g-3">
            <div class="col-md-12">
                <label class="form-label small text-muted">Category</label>
                <select class="form-select form-select-sm" wire:model.live="category_id">
                    <option value="">— Unassigned —</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label small text-muted">Status</label>
                <select class="form-select form-select-sm" wire:model.live="status">
                    <option value="ai_draft">AI Draft</option>
                    <option value="needs_review">Needs Review</option>
                    <option value="published">Published</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label small text-muted">Publish At (optional)</label>
                <input type="datetime-local" class="form-control form-control-sm" wire:model.live="publish_at">
            </div>

            <div class="col-md-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="featured" wire:model.live="is_featured">
                    <label class="form-check-label" for="featured">
                        Feature on homepage
                    </label>
                </div>
            </div>

            <div class="col-12 d-flex gap-2">
                <button class="btn btn-primary btn-sm" type="submit">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
</div>
