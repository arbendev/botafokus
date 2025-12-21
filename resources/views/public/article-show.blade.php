@extends('layouts.app')

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
