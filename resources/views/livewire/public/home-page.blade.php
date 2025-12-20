<div class="container-xl px-3 py-4">

    {{-- HERO --}}
    @if ($hero)
        <section class="mb-5">
            <article>
                @if ($hero->hero_image_url)
                    <img src="{{ $hero->hero_image_url }}" class="img-fluid mb-3">
                @endif
                <h1 class="fw-bold">
                    <a href="{{ route('articles.show', $hero->slug) }}" class="text-decoration-none text-dark">
                        {{ $hero->title }}
                    </a>
                </h1>
                @if ($hero->lead)
                    <p class="lead">{{ $hero->lead }}</p>
                @endif
                <div class="text-muted small">
                    {{ optional($hero->published_at)->diffForHumans() }}
                </div>
            </article>
        </section>
    @endif

    {{-- LATEST --}}
    <section class="mb-5">
        <h2 class="h4 mb-3">Latest News</h2>
        <div class="row g-4">
            @foreach ($latest as $article)
                <div class="col-md-4">
                    <article>
                        @if ($article->hero_image_url)
                            <img src="{{ $article->hero_image_url }}" class="img-fluid mb-2">
                        @endif
                        <h3 class="h6">
                            <a href="{{ route('articles.show', $article->slug) }}"
                                class="text-decoration-none text-dark">
                                {{ $article->title }}
                            </a>
                        </h3>
                        <div class="text-muted small">
                            {{ optional($article->published_at)->diffForHumans() }}
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </section>

    {{-- MOST READ --}}
    <section>
        <h2 class="h5 mb-3">Most Read</h2>
        <ol class="list-group list-group-numbered">
            @foreach ($mostRead as $article)
                <li class="list-group-item">
                    <a href="{{ route('articles.show', $article->slug) }}" class="text-decoration-none">
                        {{ $article->title }}
                    </a>
                </li>
            @endforeach
        </ol>
    </section>

</div>
