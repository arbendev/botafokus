<div class="container-xl px-3 py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <a href="{{ route('editor.articles.index') }}" class="text-decoration-none">← Inbox</a>
                <span class="text-muted">/</span>
                <span class="text-muted">Article</span>
            </div>

            <h1 class="h4 mb-1">Edit Article</h1>
            <div class="text-muted small">
                Status:
                <span
                    class="badge
                    @if ($status === 'ai_draft') bg-secondary
                    @elseif($status === 'needs_review') bg-warning text-dark
                    @elseif($status === 'approved') bg-info text-dark
                    @elseif($status === 'published') bg-success
                    @elseif($status === 'rejected') bg-danger
                    @else bg-light text-dark @endif
                ">
                    {{ strtoupper(str_replace('_', ' ', $status)) }}
                </span>
            </div>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-outline-secondary btn-sm" wire:click="saveDraft" wire:loading.attr="disabled">
                Save Draft
            </button>

            <button class="btn btn-warning btn-sm" wire:click="markNeedsReview" wire:loading.attr="disabled">
                Needs Review
            </button>

            <button class="btn btn-info btn-sm" wire:click="approve" wire:loading.attr="disabled">
                Approve
            </button>

            <button class="btn btn-danger btn-sm" wire:click="reject" wire:loading.attr="disabled">
                Reject
            </button>

            <button class="btn btn-success btn-sm" wire:click="publishNow" wire:loading.attr="disabled">
                Publish Now
            </button>
        </div>
    </div>

    <div class="row g-4">
        {{-- LEFT: EDIT FORM --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h2 class="h6 mb-3">Content</h2>

                    <div class="mb-3">
                        <label class="form-label small text-muted">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            wire:model.live="title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-muted">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                            wire:model.live="slug">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Used for URL generation on the public site.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-muted">Lead (Intro)</label>
                        <textarea rows="4" class="form-control @error('lead') is-invalid @enderror" wire:model.live="lead"></textarea>
                        @error('lead')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-muted">Body</label>
                        <textarea rows="14" class="form-control @error('body') is-invalid @enderror" wire:model.live="body"></textarea>
                        @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Separate paragraphs with a blank line.</div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small text-muted">Location Label</label>
                            <input type="text" class="form-control @error('location_label') is-invalid @enderror"
                                placeholder="e.g. MOSCOW" wire:model.live="location_label">
                            @error('location_label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small text-muted">Tags (comma separated)</label>
                            <input type="text" class="form-control" placeholder="e.g. Russia, Ukraine, NATO"
                                wire:model.live="tagsInput">
                        </div>
                    </div>

                    <hr class="my-4">

                    <h2 class="h6 mb-3">SEO</h2>

                    <div class="mb-3">
                        <label class="form-label small text-muted">SEO Title</label>
                        <input type="text" class="form-control @error('seo_title') is-invalid @enderror"
                            wire:model.live="seo_title">
                        @error('seo_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-muted">SEO Description</label>
                        <textarea rows="3" class="form-control @error('seo_description') is-invalid @enderror"
                            wire:model.live="seo_description"></textarea>
                        @error('seo_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4">

                    <h2 class="h6 mb-3">Categories</h2>

                    <div class="d-flex flex-column gap-2">
                        @foreach ($allCategories as $category)
                            <label class="d-flex align-items-center gap-2">
                                <input type="checkbox" value="{{ $category->id }}" wire:model="categoryIds">
                                <span>{{ $category->name }}</span>
                            </label>
                        @endforeach
                    </div>

                    <hr class="my-4">

                    <h2 class="h6 mb-3">Media</h2>

                    <div class="mb-3">
                        <label class="form-label small text-muted">Hero Image URL</label>
                        <input type="text" class="form-control @error('hero_image_url') is-invalid @enderror"
                            wire:model.live="hero_image_url">
                        @error('hero_image_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label small text-muted">Hero Image Alt</label>
                        <input type="text" class="form-control @error('hero_image_alt') is-invalid @enderror"
                            wire:model.live="hero_image_alt">
                        @error('hero_image_alt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($raw)
                        <hr class="my-4">
                        <h2 class="h6 mb-2">Source (Internal)</h2>
                        <div class="small text-muted mb-2">
                            <div><strong>Source:</strong> {{ $raw->source_name ?? 'Unknown' }}
                                ({{ $raw->source_type }})</div>
                            <div><strong>URL:</strong> <a href="{{ $raw->source_url }}" target="_blank"
                                    rel="noopener">{{ $raw->source_url }}</a></div>
                            @if ($raw->source_published_at)
                                <div><strong>Published:</strong> {{ $raw->source_published_at }}</div>
                            @endif
                        </div>
                        <details>
                            <summary class="small">Show raw content</summary>
                            <pre class="small bg-light border rounded p-2 mt-2" style="white-space: pre-wrap;">{{ $raw->source_content }}</pre>
                        </details>
                    @endif
                </div>
            </div>
        </div>

        {{-- RIGHT: LIVE PREVIEW --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h2 class="h6 mb-3">Preview</h2>

                    <div class="mb-2">
                        <div class="text-muted small">
                            {{ now()->format('F j, Y • H:i') }}
                            @if ($location_label)
                                <span class="mx-1">•</span>
                                <span class="text-uppercase">{{ $location_label }}</span>
                            @endif
                        </div>
                    </div>

                    <h1 class="h3 mb-3">{{ $title }}</h1>

                    @if ($hero_image_url)
                        <figure class="mb-3">
                            <img src="{{ $hero_image_url }}" alt="{{ $hero_image_alt ?? '' }}"
                                class="img-fluid rounded">
                            @if ($hero_image_alt)
                                <figcaption class="text-muted small mt-1">{{ $hero_image_alt }}</figcaption>
                            @endif
                        </figure>
                    @endif

                    @if ($lead)
                        <p class="lead">{{ $lead }}</p>
                    @endif

                    <div class="mt-3">
                        @foreach (preg_split("/\n\s*\n/", trim($body)) as $p)
                            @if (trim($p) !== '')
                                <p>{{ $p }}</p>
                            @endif
                        @endforeach
                    </div>

                    @if (trim($tagsInput) !== '')
                        <div class="mt-4 pt-3 border-top">
                            <div class="small text-muted mb-2">Tags</div>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach (collect(explode(',', $tagsInput))->map(fn($t) => trim($t))->filter() as $t)
                                    <span class="badge bg-light text-dark border">{{ $t }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($seo_title || $seo_description)
                        <div class="mt-4 pt-3 border-top">
                            <div class="small text-muted mb-2">SEO Preview</div>
                            <div class="fw-semibold">{{ $seo_title }}</div>
                            <div class="text-muted small">{{ $seo_description }}</div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Toast-like notifications --}}
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
                        <button type="button" class="btn-close btn-close-white me-2 m-auto"
                            @click="show=false"></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
