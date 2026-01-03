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
            '@type' => 'CollectionPage',
            'name' => $seo['title'],
            'description' => $seo['description'],
            'url' => $seo['url'],
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

@section('content')
    <div class="container-xl px-3">

        {{-- Category header --}}
        <section class="bf-category-header mb-4">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
                <div>
                    <h1 class="bf-category-title">{{ $category->name }}</h1>
                    @if ($category->description)
                        <p class="bf-category-description">
                            {{ $category->description }}
                        </p>
                    @endif
                </div>
            </div>
        </section>

        <div class="row g-4 bf-category-main">

            {{-- LEFT: ARTICLES --}}
            <section class="col-lg-9">

                {{-- FEATURED --}}
                @if ($featured->count())
                    <section class="bf-block mb-4">
                        <div class="row g-4">
                            @foreach ($featured as $article)
                                <div class="col-md-6">
                                    <article class="bf-category-featured-card">
                                        <div class="bf-image-card">
                                            <a href="{{ route('articles.show', $article->slug) }}">
                                                <img src="{{ $article->hero_image_url ?? 'https://via.placeholder.com/900x600' }}"
                                                    alt="{{ $article->hero_image_alt ?? $article->title }}">
                                            </a>
                                        </div>
                                        <div class="bf-category-featured-body">
                                            <div class="bf-meta mb-1">
                                                {{ optional($article->published_at)->diffForHumans() }}
                                            </div>
                                            <h2 class="bf-category-featured-title">
                                                <a href="{{ route('articles.show', $article->slug) }}">
                                                    {{ $article->title }}
                                                </a>
                                            </h2>
                                            @if ($article->lead)
                                                <p class="bf-card-summary">{{ $article->lead }}</p>
                                            @endif
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                {{-- MAIN GRID --}}
                @if ($mainArticles->count())
                    <section class="bf-block">
                        <h2 class="bf-section-title mb-3">Artikuj kryesorë</h2>

                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                            @foreach ($mainArticles as $article)
                                <div class="col">
                                    <article>
                                        <div class="bf-image-card">
                                            <a href="{{ route('articles.show', $article->slug) }}">
                                                <img src="{{ $article->hero_image_url ?? 'https://via.placeholder.com/800x600' }}"
                                                    alt="{{ $article->hero_image_alt ?? $article->title }}">
                                            </a>
                                        </div>
                                        <div>
                                            <div class="bf-meta mb-1">
                                                {{ optional($article->published_at)->diffForHumans() }}
                                            </div>
                                            <h3 class="bf-card-title">
                                                <a href="{{ route('articles.show', $article->slug) }}">
                                                    {{ $article->title }}
                                                </a>
                                            </h3>
                                            @if ($article->lead)
                                                <p class="bf-card-summary">{{ $article->lead }}</p>
                                            @endif
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif

                {{-- ALL ARTICLES --}}
                <section class="bf-block mt-5">
                    <h2 class="bf-section-title mb-3">Të gjitha artikujt</h2>

                    <ul class="bf-category-list">
                        @foreach ($allArticles as $article)
                            <li class="bf-category-list-item">
                                <a href="{{ route('articles.show', $article->slug) }}"
                                    class="d-flex align-items-start gap-3">

                                    <div class="bf-category-list-thumb">
                                        <img src="{{ $article->hero_image_url ?? 'https://via.placeholder.com/400x300' }}"
                                            alt="{{ $article->hero_image_alt ?? $article->title }}">
                                    </div>

                                    <div class="bf-category-list-content">
                                        <div class="bf-meta mb-1">
                                            {{ optional($article->published_at)->diffForHumans() }}
                                        </div>
                                        <h3 class="bf-category-list-title">
                                            {{ $article->title }}
                                        </h3>
                                        @if ($article->lead)
                                            <p class="bf-category-list-summary">
                                                {{ $article->lead }}
                                            </p>
                                        @endif
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    {{ $allArticles->links() }}
                </section>
            </section>

            {{-- RIGHT SIDEBAR --}}
            <aside class="col-lg-3">
                <div class="bf-category-sidebar position-sticky">

                    <section class="bf-trending-block mb-4">
                        <h6 class="bf-related-title">Më të lexuarat</h6>
                        <ol class="bf-trending-list">
                            @foreach ($mostRead as $article)
                                <li>
                                    <a href="{{ route('articles.show', $article->slug) }}">
                                        {{ $article->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </section>

                </div>
            </aside>

        </div>
    </div>
@endsection
