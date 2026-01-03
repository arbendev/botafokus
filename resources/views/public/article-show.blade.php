@extends('layouts.app')

@push('seo')
    @php
        $seoTitle = $article->seo_title ?? $article->title;
        $seoDesc = $article->seo_description ?? Str::limit($article->lead, 155);
        $seoImage = $article->hero_image_url ? asset($article->hero_image_url) : asset('/bota-focus-og.jpg'); // Fallback image needed
        $url = route('articles.show', $article->slug);
        $publishedAt = $article->published_at ? $article->published_at->toIso8601String() : now()->toIso8601String();
        $modifiedAt = $article->updated_at->toIso8601String();
        $author = 'Bota Fokus'; // Or dynamic author if available
    @endphp

    <title>{{ $seoTitle }} | {{ config('app.name') }}</title>
    <meta name="description" content="{{ $seoDesc }}">
    <link rel="canonical" href="{{ $url }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ $url }}">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDesc }}">
    <meta property="og:image" content="{{ $seoImage }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="article:published_time" content="{{ $publishedAt }}">
    <meta property="article:modified_time" content="{{ $modifiedAt }}">
    <meta property="article:section" content="{{ $article->category->name ?? 'News' }}">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $url }}">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDesc }}">
    <meta name="twitter:image" content="{{ $seoImage }}">

    <!-- Schema.org -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "headline": "{{ addslashes($seoTitle) }}",
      "image": [
        "{{ $seoImage }}"
      ],
      "datePublished": "{{ $publishedAt }}",
      "dateModified": "{{ $modifiedAt }}",
      "author": [{
          "@type": "Organization",
          "name": "{{ $author }}",
          "url": "{{ url('/') }}"
      }],
      "publisher": {
        "@type": "Organization",
        "name": "{{ config('app.name') }}",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ asset('/bota-focus.png') }}"
        }
      },
      "description": "{{ addslashes($seoDesc) }}"
    }
    </script>
@endpush

@section('content')
    <div class="container-xl px-3">
        <div class="row g-4 bf-article-wrapper justify-content-center">

            <!-- CENTER: ARTICLE CONTENT -->
            <article class="col-lg-9 bf-article-main">

                <!-- Category / breadcrumb -->
                @if ($article->category)
                    <div class="bf-article-breadcrumb mb-2">
                        <a href="{{ route('categories.show', $article->category->slug) }}" class="bf-category-label">
                            {{ strtoupper($article->category->name) }}
                        </a>
                    </div>
                @endif

                <!-- Title -->
                <h1 class="bf-article-title">
                    {{ $article->title }}
                </h1>

                <!-- Meta + share bar -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
                    <div class="bf-article-meta">
                        <span>
                            {{ optional($article->published_at)->format('d F Y • H:i') }}
                        </span>
                        @if ($article->location_label)
                            <span> • {{ strtoupper($article->location_label) }}</span>
                        @endif
                    </div>

                    <div class="bf-article-share">
                        <button class="bf-share-pill" aria-label="Ndaj në Facebook">F</button>
                        <button class="bf-share-pill" aria-label="Ndaj në X">X</button>
                        <button class="bf-share-pill" aria-label="Kopjo linkun">↗</button>
                    </div>
                </div>

                <!-- Hero image -->
                @if ($article->hero_image_url)
                    <figure class="bf-article-hero mb-3">
                        <img src="{{ $article->hero_image_url }}" alt="{{ $article->hero_image_alt ?? $article->title }}"
                            class="img-fluid">
                    </figure>
                @endif

                <!-- Intro / lead -->
                @if ($article->lead)
                    <p class="bf-article-lead">
                        {{ $article->lead }}
                    </p>
                @endif

                <!-- Body -->
                <div class="bf-article-body">
                    @foreach (preg_split("/\n\s*\n/", trim($article->body)) as $p)
                        @if (trim($p))
                            <p>{{ $p }}</p>
                        @endif
                    @endforeach
                </div>

                <!-- Share bar bottom -->
                <div class="bf-article-share bf-article-share-bottom mt-4">
                    <button class="bf-share-pill" aria-label="Ndaj në Facebook">F</button>
                    <button class="bf-share-pill" aria-label="Ndaj në X">X</button>
                    <button class="bf-share-pill" aria-label="Kopjo linkun">↗</button>
                </div>

                <!-- Tags -->
                @if ($article->tags->count())
                    <div class="bf-article-tags mt-3">
                        <span>Etiketa:</span>
                        @foreach ($article->tags as $tag)
                            <a href="#">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                @endif
            </article>

            <!-- RIGHT SIDEBAR -->
            <aside class="col-lg-3">
                <div class="bf-article-right position-sticky">

                    <!-- Newsletter -->
                    <section class="bf-newsletter-card mb-4">
                        <h6>Abonohu në analizat tona</h6>
                        <p>Merr në email përmbledhjen ditore me lajmet më të rëndësishme.</p>
                        <form>
                            <input type="email" class="form-control form-control-sm mb-2" placeholder="Adresa e email-it">
                            <button type="submit" class="btn btn-danger btn-sm w-100">
                                Abonohu
                            </button>
                        </form>
                    </section>

                    <!-- Most read -->
                    <section class="bf-trending-block">
                        <h6 class="bf-related-title">Më të lexuarat</h6>
                        <ol class="bf-trending-list">
                            @foreach ($mostRead as $a)
                                <li>
                                    <a href="{{ route('articles.show', $a->slug) }}">
                                        {{ $a->title }}
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
