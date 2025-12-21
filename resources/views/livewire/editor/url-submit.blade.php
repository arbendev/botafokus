<div class="container-xl px-3 py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <a href="{{ route('editor.articles.index') }}" class="text-decoration-none">← Inbox</a>
                <span class="text-muted">/</span>
                <span class="text-muted">Submit URL</span>
            </div>

            <h1 class="h4 mb-1">Submit Source URL</h1>
            <div class="text-muted small">
                Paste a public article URL. The system will fetch the page, extract content, then generate an AI draft
                for review.
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('editor.sources.submit') }}" class="btn btn-outline-secondary btn-sm">Paste Content
                Instead</a>
            <a href="{{ route('editor.ai.logs') }}" class="btn btn-outline-primary btn-sm">AI Logs</a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form wire:submit.prevent="submit" class="row g-3">
                <div class="col-12">
                    <label class="form-label small text-muted">Source URL</label>
                    <input type="url" class="form-control @error('source_url') is-invalid @enderror"
                        placeholder="https://example.com/news/article" wire:model.defer="source_url">
                    @error('source_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label small text-muted">Source Name (optional)</label>
                    <input type="text" class="form-control @error('source_name') is-invalid @enderror"
                        placeholder="Reuters, AP, BBC..." wire:model.defer="source_name">
                    @error('source_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label small text-muted">Source Published At (optional)</label>
                    <input type="datetime-local" class="form-control @error('source_published_at') is-invalid @enderror"
                        wire:model.defer="source_published_at">
                    @error('source_published_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 d-flex gap-2">
                    <button class="btn btn-primary" type="submit" wire:loading.attr="disabled">
                        Fetch & Generate AI Draft
                    </button>
                    <a href="{{ route('editor.ai.logs') }}" class="btn btn-outline-secondary">
                        View Logs
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
