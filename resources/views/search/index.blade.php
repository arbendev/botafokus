@extends('layouts.app')

@section('title', $seo['title'])

@push('seo')
    <meta name="description" content="{{ $seo['description'] }}">
    <link rel="canonical" href="{{ $seo['url'] }}">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $seo['url'] }}">
    <meta property="og:title" content="{{ $seo['title'] }}">
    <meta property="og:description" content="{{ $seo['description'] }}">
    <meta property="og:image" content="{{ $seo['image'] }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $seo['url'] }}">
    <meta name="twitter:title" content="{{ $seo['title'] }}">
    <meta name="twitter:description" content="{{ $seo['description'] }}">
    <meta name="twitter:image" content="{{ $seo['image'] }}">

    @php
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'SearchResultsPage',
            'mainEntity' => [
                '@type' => 'ItemList',
                'itemListElement' => $articles->map(function ($article, $index) {
                    return [
                        '@type' => 'ListItem',
                        'position' => $index + 1,
                        'url' => route('articles.show', $article->slug),
                        'name' => $article->title,
                    ];
                })->toArray(),
            ],
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

@section('content')
    <div class="container-xl px-3 py-4">

        <!-- Search Header Area -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h1 class="h3 fw-bold mb-3">Kërkimi</h1>
                <form action="{{ route('search.index') }}" method="GET" class="position-relative">
                    <div class="input-group input-group-lg shadow-sm rounded-pill overflow-hidden border">
                        <span class="input-group-text bg-white border-0 ps-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search text-muted" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </span>
                        <input type="search" name="q" class="form-control border-0 ps-3" 
                            placeholder="Kërko artikuj, tema ose analiza..." 
                            value="{{ $query }}" aria-label="Search">
                        <button class="btn btn-dark px-4 fw-semibold" type="submit">Kërko</button>
                    </div>
                </form>
                @if ($query)
                    <div class="mt-3 text-muted small">
                         Rezultatet për: <span class="fw-bold text-dark">“{{ $query }}”</span> &bull; {{ $articles->total() }} gjetje
                    </div>
                @endif
            </div>
        </div>

        <div class="row g-5">
            <!-- Main Results Column -->
            <div class="col-lg-8 mx-auto">
                
                @if ($articles->count())
                    <div class="d-flex flex-column gap-4">
                        @foreach ($articles as $article)
                            <article class="card border-0 shadow-sm rounded-3 overflow-hidden h-100 search-result-card">
                                <div class="row g-0">
                                    @if ($article->hero_image_url)
                                        <div class="col-md-4 position-relative">
                                            <a href="{{ route('articles.show', $article->slug) }}" class="ratio ratio-4x3 d-block h-100">
                                                <img src="{{ $article->hero_image_url }}" 
                                                    class="img-fluid object-fit-cover w-100 h-100" 
                                                    alt="{{ $article->hero_image_alt ?? '' }}">
                                            </a>
                                        </div>
                                    @endif
                                    <div class="{{ $article->hero_image_url ? 'col-md-8' : 'col-12' }}">
                                        <div class="card-body p-4 d-flex flex-column h-100 justify-content-center">
                                            <div class="mb-2 d-flex align-items-center gap-2 text-uppercase small text-muted fw-semibold">
                                                <span class="badge bg-light text-dark border">{{ $article->category->name ?? 'Lajme' }}</span>
                                                <span>&bull;</span>
                                                <span>{{ optional($article->published_at)->diffForHumans() }}</span>
                                            </div>
                                            <h3 class="card-title h5 fw-bold mb-2">
                                                <a href="{{ route('articles.show', $article->slug) }}" class="text-decoration-none text-dark stretched-link">
                                                    {{ $article->title }}
                                                </a>
                                            </h3>
                                            @if ($article->lead)
                                                <p class="card-text text-secondary mb-0 small line-clamp-2">
                                                    {{ Str::limit($article->lead, 140) }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="mt-5 d-flex justify-content-center">
                        {{ $articles->links() }}
                    </div>
                @else
                    @if ($query)
                        <div class="text-center py-5">
                            <div class="mb-3 text-muted opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-journal-x" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708z"/>
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                                </svg>
                            </div>
                            <h4 class="fw-bold">Nuk u gjet asnjë rezultat</h4>
                            <p class="text-muted">Provoni fjalë kyçe më të përgjithshme ose kontrolloni gabimet.</p>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .search-result-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .search-result-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.1) !important;
        }
    </style>
@endsection
