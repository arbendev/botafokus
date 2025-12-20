<div class="container-xl px-3 py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <a href="{{ route('editor.articles.index') }}" class="text-decoration-none">← Inbox</a>
                <span class="text-muted">/</span>
                <span class="text-muted">Submit Source</span>
            </div>

            <h1 class="h4 mb-1">Submit Source Article</h1>
            <div class="text-muted small">
                Paste the original article content. The system will generate an AI draft for editorial review.
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('editor.articles.index') }}" class="btn btn-outline-secondary btn-sm">Back to Inbox</a>
            <a href="{{ route('editor.ai.logs') }}" class="btn btn-outline-primary btn-sm">AI Logs</a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form wire:submit.prevent="submit" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label small text-muted">Source URL (optional)</label>
                    <input type="text" class="form-control @error('source_url') is-invalid @enderror"
                        placeholder="https://..." wire:model.live="source_url">
                    @error('source_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">If omitted, the submission is stored as internal text.</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label small text-muted">Source Name (optional)</label>
                    <input type="text" class="form-control @error('source_name') is-invalid @enderror"
                        placeholder="Reuters, AP, BBC..." wire:model.live="source_name">
                    @error('source_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-8">
                    <label class="form-label small text-muted">Source Title</label>
                    <input type="text" class="form-control @error('source_title') is-invalid @enderror"
                        wire:model.live="source_title">
                    @error('source_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label small text-muted">Source Published At (optional)</label>
                    <input type="datetime-local" class="form-control @error('source_published_at') is-invalid @enderror"
                        wire:model.live="source_published_at">
                    @error('source_published_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label small text-muted">Source Content</label>
                    <textarea rows="12" class="form-control @error('source_content') is-invalid @enderror"
                        placeholder="Paste the original article content here..." wire:model.live="source_content"></textarea>
                    @error('source_content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 d-flex gap-2">
                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                        Submit for AI Rewrite
                    </button>
                    <a href="{{ route('editor.ai.logs') }}" class="btn btn-outline-secondary">
                        View AI Logs
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Toast notifications (same pattern as editor page) --}}
    <div x-data="{ show: false, type: 'success', message: '' }"
        x-on:notify.window="
            show = true;
            type = $event.detail.type || 'success';
            message = $event.detail.message || '';
            setTimeout(() => show = false, 2200);
        "
        class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080;">
        <div x-show="show" x-transition class="toast show align-items-center text-white border-0"
            :class="type === 'success' ? 'bg-success' : (type === 'error' ? 'bg-danger' : 'bg-secondary')">
            <div class="d-flex">
                <div class="toast-body" x-text="message"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" @click="show=false"></button>
            </div>
        </div>
    </div>
</div>
