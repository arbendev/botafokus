<div class="container-xl px-3 py-4">
    <article class="mx-auto" style="max-width: 900px;">

        <div class="mb-2 text-muted small">
            {{ optional($article->published_at)->format('F j, Y • H:i') }}
            @if ($article->location_label)
                • {{ strtoupper($article->location_label) }}
            @endif
        </div>

        <h1 class="fw-bold mb-3">{{ $article->title }}</h1>

        @if ($article->hero_image_url)
            <figure class="mb-4">
                <img src="{{ $article->hero_image_url }}" class="img-fluid rounded">
                @if ($article->hero_image_alt)
                    <figcaption class="small text-muted mt-1">{{ $article->hero_image_alt }}</figcaption>
                @endif
            </figure>
        @endif

        @if ($article->lead)
            <p class="lead">{{ $article->lead }}</p>
        @endif

        <div class="mt-4">
            @foreach (preg_split("/\n\s*\n/", trim($article->body)) as $p)
                @if (trim($p) !== '')
                    <p>{{ $p }}</p>
                @endif
            @endforeach
        </div>

        @if ($article->tags->count())
            <div class="mt-4 pt-3 border-top">
                <div class="small text-muted mb-2">Tags</div>
                <div class="d-flex flex-wrap gap-2">
                    @foreach ($article->tags as $tag)
                        <span class="badge bg-light text-dark border">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        @endif

    </article>

    <section class="mb-4">
        <h6 class="fw-semibold">Më të lexuarat</h6>
        <ol class="list-group list-group-numbered">
            @foreach ($mostRead as $a)
                <li class="list-group-item">
                    <a href="{{ route('articles.show', $a->slug) }}" class="text-decoration-none">
                        {{ $a->title }}
                    </a>
                </li>
            @endforeach
        </ol>
    </section>

</div>
