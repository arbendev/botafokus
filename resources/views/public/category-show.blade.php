<div class="container-xl px-3 py-4">

    <header class="mb-4">
        <h1 class="fw-bold">{{ $category->name }}</h1>
        @if ($category->description)
            <p class="text-muted">{{ $category->description }}</p>
        @endif
    </header>

    <div class="row g-4">
        @foreach ($articles as $article)
            <div class="col-md-4">
                <article>
                    @if ($article->hero_image_url)
                        <img src="{{ $article->hero_image_url }}" class="img-fluid mb-2">
                    @endif
                    <h2 class="h6">
                        <a href="{{ route('articles.show', $article->slug) }}" class="text-decoration-none text-dark">
                            {{ $article->title }}
                        </a>
                    </h2>
                    <div class="text-muted small">
                        {{ optional($article->published_at)->diffForHumans() }}
                    </div>
                </article>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $articles->links() }}
    </div>

</div>
