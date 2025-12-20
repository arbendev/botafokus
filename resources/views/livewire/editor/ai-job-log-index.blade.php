<div class="container-xl px-3 py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <a href="{{ route('editor.articles.index') }}" class="text-decoration-none">← Inbox</a>
                <span class="text-muted">/</span>
                <span class="text-muted">AI Logs</span>
            </div>

            <h1 class="h4 mb-1">AI Job Logs</h1>
            <div class="text-muted small">Track queued, successful, and failed AI rewrite jobs.</div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('editor.sources.submit') }}" class="btn btn-primary btn-sm">Submit Source</a>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
            <div class="row g-2 align-items-end">
                <div class="col-md-4">
                    <label class="form-label small text-muted mb-1">Status</label>
                    <select class="form-select form-select-sm" wire:model.live="status">
                        <option value="all">All</option>
                        <option value="queued">Queued</option>
                        <option value="running">Running</option>
                        <option value="success">Success</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label small text-muted mb-1">Per Page</label>
                    <select class="form-select form-select-sm" wire:model.live="perPage">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>
                </div>

                <div class="col-md-5 text-md-end">
                    <a href="{{ route('editor.articles.index') }}" class="btn btn-outline-secondary btn-sm">Back to
                        Inbox</a>
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
                            <th class="ps-3">#</th>
                            <th>Status</th>
                            <th class="text-nowrap">Raw</th>
                            <th class="text-nowrap">Article</th>
                            <th>Message</th>
                            <th class="text-nowrap">Time</th>
                            <th class="pe-3">Error</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                            <tr>
                                <td class="ps-3">{{ $log->id }}</td>
                                <td>
                                    <span
                                        class="badge
                                        @if ($log->status === 'queued') bg-secondary
                                        @elseif($log->status === 'running') bg-warning text-dark
                                        @elseif($log->status === 'success') bg-success
                                        @elseif($log->status === 'failed') bg-danger
                                        @else bg-light text-dark @endif
                                    ">
                                        {{ strtoupper($log->status) }}
                                    </span>
                                </td>
                                <td class="text-nowrap">
                                    @if ($log->raw_article_id)
                                        #{{ $log->raw_article_id }}
                                    @else
                                        —
                                    @endif
                                </td>
                                <td class="text-nowrap">
                                    @if ($log->article_id)
                                        <a
                                            href="{{ route('editor.articles.edit', $log->article_id) }}">#{{ $log->article_id }}</a>
                                    @else
                                        —
                                    @endif
                                </td>
                                <td style="min-width: 280px;">
                                    <div class="small">{{ $log->message }}</div>
                                </td>
                                <td class="text-nowrap">
                                    <div class="small text-muted">
                                        @if ($log->started_at)
                                            Started: {{ $log->started_at->diffForHumans() }}<br>
                                        @endif
                                        @if ($log->finished_at)
                                            Finished: {{ $log->finished_at->diffForHumans() }}
                                        @endif
                                    </div>
                                </td>
                                <td class="pe-3" style="min-width: 280px;">
                                    @if ($log->error)
                                        <div class="small text-danger">{{ $log->error }}</div>
                                    @else
                                        <span class="text-muted small">—</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    No AI logs found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-3">
                {{ $logs->links() }}
            </div>
        </div>
    </div>
</div>
