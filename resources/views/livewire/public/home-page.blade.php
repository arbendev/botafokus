<div class="container-xl px-3 py-4">
    <div class="row g-4">
        {{-- MAIN CONTENT --}}
        <div class="col-lg-9">

            {{-- HERO + TOP STORIES --}}
            <section class="row g-4 mb-5 align-items-stretch">
                <div class="col-lg-7">
                    @if ($hero)
                        <article>
                            @if ($hero->hero_image_url)
                                <div class="mb-3">
                                    <a href="{{ route('articles.show', $hero->slug) }}">
                                        <img src="{{ $hero->hero_image_url }}" alt="{{ $hero->hero_image_alt ?? '' }}"
                                            class="img-fluid rounded">
                                    </a>
                                </div>
                            @endif

                            @if ($hero->category)
                                <div class="text-uppercase small text-danger fw-semibold">
                                    <a class="text-decoration-none text-danger"
                                        href="{{ route('categories.show', $hero->category->slug) }}">
                                        {{ $hero->category->name }}
                                    </a>
                                </div>
                            @endif

                            <h1 class="fw-bold mt-2">
                                <a class="text-decoration-none text-dark"
                                    href="{{ route('articles.show', $hero->slug) }}">
                                    {{ $hero->title }}
                                </a>
                            </h1>

                            @if ($hero->lead)
                                <p class="text-muted">{{ $hero->lead }}</p>
                            @endif

                            <div class="text-muted small">
                                {{ optional($hero->published_at)->diffForHumans() }}
                            </div>
                        </article>
                    @endif
                </div>

                <div class="col-lg-5">
                    <div class="border rounded p-3 h-100">
                        <div class="fw-semibold small mb-3">TREGIME KRYESORE</div>

                        @foreach ($topStories as $a)
                            <article class="@if (!$loop->last) mb-3 pb-3 border-bottom @endif">
                                <div class="row g-3">
                                    <div class="col-5">
                                        @if ($a->hero_image_url)
                                            <img src="{{ $a->hero_image_url }}" alt="{{ $a->hero_image_alt ?? '' }}"
                                                class="img-fluid rounded">
                                        @else
                                            <div class="bg-light rounded" style="height: 90px;"></div>
                                        @endif
                                    </div>
                                    <div class="col-7">
                                        @if ($a->category)
                                            <div class="text-uppercase small text-danger fw-semibold">
                                                {{ $a->category->name }}
                                            </div>
                                        @endif
                                        <div class="fw-semibold">
                                            <a class="text-decoration-none text-dark"
                                                href="{{ route('articles.show', $a->slug) }}">
                                                {{ $a->title }}
                                            </a>
                                        </div>
                                        <div class="text-muted small mt-1">
                                            {{ optional($a->published_at)->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- CATEGORY SECTIONS --}}
            @foreach ($sections as $section)
                @php($cat = $section['category'])
                @php($articles = $section['articles'])

                @if ($articles->count())
                    <section class="mb-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="h5 mb-0">{{ $cat->name }}</h3>
                            <a class="text-decoration-none" href="{{ route('categories.show', $cat->slug) }}">
                                Të gjitha →
                            </a>
                        </div>

                        <div class="row g-4">
                            @foreach ($articles->take(4) as $a)
                                <div class="col-md-6 col-lg-3">
                                    <article>
                                        @if ($a->hero_image_url)
                                            <img src="{{ $a->hero_image_url }}" alt="{{ $a->hero_image_alt ?? '' }}"
                                                class="img-fluid rounded mb-2">
                                        @else
                                            <div class="bg-light rounded mb-2" style="height: 120px;"></div>
                                        @endif
                                        <div class="fw-semibold">
                                            <a class="text-decoration-none text-dark"
                                                href="{{ route('articles.show', $a->slug) }}">
                                                {{ $a->title }}
                                            </a>
                                        </div>
                                        <div class="text-muted small mt-1">
                                            {{ optional($a->published_at)->diffForHumans() }}
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endif
            @endforeach

            {{-- LATEST --}}
            <section class="mb-5">
                <h3 class="h5 mb-3">Të Fundit</h3>
                <ul class="list-group">
                    @foreach ($latestTicker as $a)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a class="text-decoration-none" href="{{ route('articles.show', $a->slug) }}">
                                {{ $a->title }}
                            </a>
                            <span class="text-muted small">{{ optional($a->published_at)->diffForHumans() }}</span>
                        </li>
                    @endforeach
                </ul>
            </section>
        </div>

        {{-- RIGHT SIDEBAR PLACEHOLDER (Video later) --}}
        <aside class="col-lg-3">
            <div class="border rounded p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="fw-semibold small mb-0">VIDEO</div>
                    <a href="#" class="text-decoration-none small">Shiko të gjitha →</a>
                </div>

                <div class="text-muted small">
                    (Video module comes next — we’ll build it as its own content type.)
                </div>
            </div>
        </aside>
    </div>
</div>
