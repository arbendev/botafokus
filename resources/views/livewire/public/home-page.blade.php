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
            '@type' => 'WebSite',
            'name' => 'Bota Fokus',
            'url' => $seo['url'],
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => $seo['url'] . '/search?q={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
        ];
    @endphp
    <script type="application/ld+json">
        {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

<div class="container-xl px-3">
    <div class="row g-4">
        <!-- MAIN CONTENT (LEFT + CENTER) -->
        <div class="col-lg-9">
            <!-- HERO + TOP STORIES -->
            <section class="row g-4 mb-5 align-items-stretch">
                <!-- Main hero article -->
                <div class="col-lg-7">
                    @if($hero)
                        <article>
                            <div class="bf-image-hero mb-3">
                                <a href="{{ route('articles.show', $hero->slug) }}">
                                    @if ($hero->hero_image_url)
                                        <img src="{{ $hero->hero_image_url }}" alt="{{ $hero->hero_image_alt ?? '' }}" class="img-fluid">
                                    @else
                                        <div class="bg-light w-100 h-100 d-flex align-items-center justify-content-center text-muted" style="min-height:300px;">
                                            No Image
                                        </div>
                                    @endif
                                </a>
                            </div>
                            @if($hero->category)
                                <span class="bf-category-label text-uppercase">{{ $hero->category->name }}</span>
                            @endif
                            <h1 class="bf-hero-title">
                                <a href="{{ route('articles.show', $hero->slug) }}" class="text-reset text-decoration-none">
                                    {{ $hero->title }}
                                </a>
                            </h1>
                            @if($hero->lead)
                                <p class="bf-hero-summary">{{ $hero->lead }}</p>
                            @endif
                            <span class="bf-meta">{{ optional($hero->published_at)->diffForHumans() }}</span>
                        </article>
                    @endif
                </div>

                <!-- Top stories mini-grid -->
                <div class="col-lg-5">
                    <div class="bf-side-panel h-100">
                        <h6 class="bf-side-title mb-3">TREGIME KRYESORE</h6>

                        @foreach($topStories as $story)
                            <article class="bf-mini-article @if(!$loop->last) mb-3 pb-3 @endif">
                                <div class="row g-3">
                                    <div class="col-5">
                                        <div class="bf-image-small">
                                            @if($story->hero_image_url)
                                                <img src="{{ $story->hero_image_url }}" alt="{{ $story->hero_image_alt ?? '' }}" class="img-fluid">
                                            @else
                                                <div class="bg-light w-100 h-100"></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        @if($story->category)
                                            <span class="bf-category-label small text-uppercase">{{ $story->category->name }}</span>
                                        @endif
                                        <h2 class="bf-mini-title">
                                            <a href="{{ route('articles.show', $story->slug) }}" class="text-reset text-decoration-none">
                                                {{ $story->title }}
                                            </a>
                                        </h2>
                                        <span class="bf-meta">{{ optional($story->published_at)->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- SECTIONS LOOP -->
            @foreach($sections as $section)
                @php
                    $cat = $section['category'];
                    $articles = $section['articles'];
                    $layout = $section['layout'];
                @endphp

                @if($articles->count())
                    <section class="bf-block mb-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="bf-section-title">{{ $cat->name }}</h3>
                            <a href="{{ route('categories.show', $cat->slug) }}" class="bf-more-link">Të gjitha nga {{ $cat->name }} →</a>
                        </div>

                        <div class="row g-4">
                            @if($layout === 'grid')
                                {{-- 4 columns equal --}}
                                @foreach($articles as $article)
                                    <div class="col-md-6 col-lg-3">
                                        <article>
                                            <div class="bf-image-card">
                                                 @if($article->hero_image_url)
                                                    <img src="{{ $article->hero_image_url }}" alt="" class="img-fluid">
                                                 @else
                                                    <div class="bg-light h-100"></div>
                                                 @endif
                                            </div>
                                            <span class="bf-category-label small text-uppercase">{{ $cat->name }}</span>
                                            <h2 class="bf-card-title">
                                                <a href="{{ route('articles.show', $article->slug) }}" class="text-reset text-decoration-none">
                                                    {{ $article->title }}
                                                </a>
                                            </h2>
                                            <span class="bf-meta">{{ optional($article->published_at)->diffForHumans() }}</span>
                                        </article>
                                    </div>
                                @endforeach

                            @elseif($layout === 'politics')
                                {{-- 3 cols: 2 featured cards + 1 list --}}
                                {{-- First 2 --}}
                                @foreach($articles->take(2) as $article)
                                    <div class="col-lg-4 col-md-6">
                                        <article>
                                            <div class="bf-image-card">
                                                @if($article->hero_image_url)
                                                    <img src="{{ $article->hero_image_url }}" alt="" class="img-fluid">
                                                @else
                                                    <div class="bg-light h-100"></div>
                                                @endif
                                            </div>
                                            <span class="bf-category-label small text-uppercase">{{ $cat->name }}</span>
                                            <h2 class="bf-card-title">
                                                <a href="{{ route('articles.show', $article->slug) }}" class="text-reset text-decoration-none">
                                                    {{ $article->title }}
                                                </a>
                                            </h2>
                                            @if($article->lead)
                                                <p class="bf-card-summary">{{ Str::limit($article->lead, 80) }}</p>
                                            @endif
                                            <span class="bf-meta">{{ optional($article->published_at)->diffForHumans() }}</span>
                                        </article>
                                    </div>
                                @endforeach

                                {{-- Remaining as list --}}
                                @if($articles->skip(2)->count())
                                    <div class="col-lg-4 col-md-12">
                                        <ul class="bf-text-list">
                                            @foreach($articles->skip(2) as $listArticle)
                                                <li>
                                                    <h6>
                                                        <a href="{{ route('articles.show', $listArticle->slug) }}" class="text-reset text-decoration-none">
                                                            {{ $listArticle->title }}
                                                        </a>
                                                    </h6>
                                                    <span class="bf-meta">{{ optional($listArticle->published_at)->diffForHumans() }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            @elseif($layout === 'conflict')
                                {{-- 4 cols small vertical (similar to grid basically but maybe different styling if needed) --}}
                                @foreach($articles as $article)
                                    <div class="col-md-3">
                                        <article>
                                            <div class="bf-image-card">
                                                @if($article->hero_image_url)
                                                    <img src="{{ $article->hero_image_url }}" alt="" class="img-fluid">
                                                @else
                                                    <div class="bg-light h-100"></div>
                                                @endif
                                            </div>
                                            <h2 class="bf-card-title">
                                                <a href="{{ route('articles.show', $article->slug) }}" class="text-reset text-decoration-none">
                                                    {{ $article->title }}
                                                </a>
                                            </h2>
                                            <span class="bf-meta">{{ optional($article->published_at)->diffForHumans() }}</span>
                                        </article>
                                    </div>
                                @endforeach

                            @elseif($layout === 'economy')
                                {{-- Split: 1 large (col-lg-6) + list (col-lg-6) --}}
                                @php $feat = $articles->first(); @endphp
                                @if($feat)
                                    <div class="col-lg-6">
                                        <article>
                                            <div class="bf-image-card">
                                                 @if($feat->hero_image_url)
                                                    <img src="{{ $feat->hero_image_url }}" alt="" class="img-fluid">
                                                 @else
                                                    <div class="bg-light h-100"></div>
                                                 @endif
                                            </div>
                                            <h2 class="bf-card-title">
                                                <a href="{{ route('articles.show', $feat->slug) }}" class="text-reset text-decoration-none">
                                                    {{ $feat->title }}
                                                </a>
                                            </h2>
                                            <p class="bf-card-summary">
                                                {{ Str::limit($feat->lead, 120) }}
                                            </p>
                                            <span class="bf-meta">{{ optional($feat->published_at)->diffForHumans() }}</span>
                                        </article>
                                    </div>
                                @endif

                                @if($articles->skip(1)->count())
                                    <div class="col-lg-6">
                                        <ul class="bf-text-list">
                                            @foreach($articles->skip(1) as $listArticle)
                                                <li>
                                                    <h6>
                                                        <a href="{{ route('articles.show', $listArticle->slug) }}" class="text-reset text-decoration-none">
                                                            {{ $listArticle->title }}
                                                        </a>
                                                    </h6>
                                                    <span class="bf-meta">{{ optional($listArticle->published_at)->diffForHumans() }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            @endif
                        </div>
                    </section>
                @endif
            @endforeach

            <!-- TË FUNDIT (LATEST TICKER) -->
            <section class="bf-block mb-5">
                <h3 class="bf-section-title mb-3">Të Fundit</h3>
                <ul class="bf-latest-list">
                    @foreach($latestTicker as $item)
                        <li>
                            <span>{{ optional($item->published_at)->format('H:i') }}</span>
                            <a href="{{ route('articles.show', $item->slug) }}" class="text-reset text-decoration-none">
                                {{ $item->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>
        </div>

        <!-- VIDEO SIDEBAR (RIGHT COLUMN) -->
        <aside class="col-lg-3">
            <div class="bf-video-sidebar">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="bf-side-title mb-0">VIDEO</h6>
                    <a href="/videos" class="bf-more-link small">Shiko të gjitha →</a>
                </div>

                @if($videos->count())
                    @php $featuredVideo = $videos->first(); @endphp
                    <!-- Featured video -->
                    <article class="mb-3 pb-3 bf-video-featured">
                        <div class="bf-video-thumb mb-2">
                             <img src="{{ $featuredVideo->thumbnail_url ?? 'https://via.placeholder.com/400x250' }}"
                                  alt="" class="img-fluid">
                            <span class="bf-video-play-icon">▶</span>
                        </div>
                        <h2 class="bf-video-title">
                            <a href="/videos/{{ $featuredVideo->slug ?? '#' }}">{{ $featuredVideo->title }}</a>
                        </h2>
                        <span class="bf-meta">{{ $featuredVideo->duration ?? '00:00' }} • Video</span>
                    </article>

                    <!-- Video list -->
                    <ul class="bf-video-list">
                        @foreach($videos->skip(1) as $v)
                            <li class="bf-video-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-2">
                                        <h6 class="mb-1">
                                            <a href="/videos/{{ $v->slug ?? '#' }}" class="text-reset text-decoration-none">
                                                {{ $v->title }}
                                            </a>
                                        </h6>
                                    </div>
                                    <div class="text-end">
                                        <span class="bf-video-icon">▶</span>
                                        <div class="bf-video-duration">{{ $v->duration ?? '00:00' }}</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <!-- Fallback Static Content if no videos (Just so it's not empty like reference) -->
                     <ul class="bf-video-list">
                        <li class="bf-video-item text-muted text-center py-3">
                            Video së shpejti...
                        </li>
                    </ul>
                @endif
            </div>
        </aside>
    </div>
</div>
