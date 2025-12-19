    @extends('layouts.app')

    @section('content')
        <div class="container-xl px-3">

            {{-- Layout: main + sidebar --}}
            <div class="row g-4 bf-video-page-main">

                {{-- LEFT: FEATURED + GRID --}}
                <section class="col-lg-9">

                    {{-- Hero row --}}
                    <section class="bf-block mb-4">
                        <div class="row g-4 align-items-stretch">
                            {{-- Featured video --}}
                            <div class="col-md-7">
                                <article class="bf-video-hero-card h-100">
                                    <div class="bf-video-hero-thumb mb-2">
                                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=1400&q=80"
                                            alt="Studio lajmesh me ekranë gjigantë">
                                        <span class="bf-video-hero-play">▶ Shiko</span>
                                        <span class="bf-video-duration-pill">12:34</span>
                                    </div>
                                    <div class="bf-meta mb-1">Botë • Sot</div>
                                    <h2 class="bf-video-hero-title">
                                        Analizë: Si po ndryshon rendi global pas luftës në Ukrainë
                                    </h2>
                                    <p class="bf-video-hero-summary">
                                        Një vështrim i thelluar mbi mënyrën si aleancat ushtarake, energjia dhe tregtia
                                        globale
                                        janë riformësuar në tre vitet e fundit.
                                    </p>
                                </article>
                            </div>

                            {{-- Recent videos list --}}
                            <div class="col-md-5">
                                <div class="bf-video-recent-list h-100">
                                    <h3 class="bf-section-title mb-2">Video të fundit</h3>

                                    {{-- Item 1 --}}
                                    <article class="bf-video-recent-item">
                                        <a href="#" class="d-flex align-items-center gap-2">
                                            <div class="bf-video-recent-thumb">
                                                <img src="https://images.unsplash.com/photo-1593113598332-cc9c7802b0ad?auto=format&fit=crop&w=600&q=80"
                                                    alt="Qytet në luftë">
                                                <span class="bf-video-duration-mini">7:42</span>
                                            </div>
                                            <div class="bf-video-recent-body">
                                                <div class="bf-meta mb-1">Luftë & Konflikte • 35 min më parë</div>
                                                <h4>Reportazh nga vijat e frontit në lindje të Ukrainës</h4>
                                            </div>
                                        </a>
                                    </article>

                                    {{-- Item 2 --}}
                                    <article class="bf-video-recent-item">
                                        <a href="#" class="d-flex align-items-center gap-2">
                                            <div class="bf-video-recent-thumb">
                                                <img src="https://images.unsplash.com/photo-1581090700227-1e37b190418e?auto=format&fit=crop&w=600&q=80"
                                                    alt="Pompë karburanti">
                                                <span class="bf-video-duration-mini">5:18</span>
                                            </div>
                                            <div class="bf-video-recent-body">
                                                <div class="bf-meta mb-1">Ekonomi & Jetesë • 1 orë më parë</div>
                                                <h4>Si po ndikon kriza energjetike në familjet europiane</h4>
                                            </div>
                                        </a>
                                    </article>

                                    {{-- Item 3 --}}
                                    <article class="bf-video-recent-item">
                                        <a href="#" class="d-flex align-items-center gap-2">
                                            <div class="bf-video-recent-thumb">
                                                <img src="https://images.unsplash.com/photo-1602091315106-8c7ecb94c77c?auto=format&fit=crop&w=600&q=80"
                                                    alt="Selia e OKB-së">
                                                <span class="bf-video-duration-mini">9:03</span>
                                            </div>
                                            <div class="bf-video-recent-body">
                                                <div class="bf-meta mb-1">Botë • 2 orë më parë</div>
                                                <h4>OKB: Çfarë pritet nga takimi i jashtëzakonshëm për refugjatët</h4>
                                            </div>
                                        </a>
                                    </article>

                                    {{-- Item 4 --}}
                                    <article class="bf-video-recent-item">
                                        <a href="#" class="d-flex align-items-center gap-2">
                                            <div class="bf-video-recent-thumb">
                                                <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80"
                                                    alt="Qendër teknologjie">
                                                <span class="bf-video-duration-mini">6:27</span>
                                            </div>
                                            <div class="bf-video-recent-body">
                                                <div class="bf-meta mb-1">Teknologji & Siguri • 3 orë më parë</div>
                                                <h4>AI në zgjedhje: mundësitë dhe rreziqet për demokracinë</h4>
                                            </div>
                                        </a>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- Grid of videos --}}
                    <section class="bf-block">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h2 class="bf-section-title mb-0">Të gjitha videot</h2>
                            <a href="#" class="bf-more-link">Shiko videot më të vjetra →</a>
                        </div>

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4 bf-video-grid">
                            {{-- Video card 1 --}}
                            <div class="col">
                                <article class="bf-video-card">
                                    <div class="bf-video-thumb">
                                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80"
                                            alt="Studio lajmesh">
                                        <span class="bf-video-duration-pill">8:15</span>
                                        <span class="bf-video-play-icon">▶</span>
                                    </div>
                                    <div class="bf-video-card-body">
                                        <div class="bf-meta mb-1">Botë • Dje</div>
                                        <h3 class="bf-video-card-title">
                                            Samiti i NATO-s: çfarë u vendos dhe pse ka rëndësi
                                        </h3>
                                    </div>
                                </article>
                            </div>

                            {{-- Video card 2 --}}
                            <div class="col">
                                <article class="bf-video-card">
                                    <div class="bf-video-thumb">
                                        <img src="https://images.unsplash.com/photo-1589758438368-0ad531db3366?auto=format&fit=crop&w=800&q=80"
                                            alt="Qendër financiare">
                                        <span class="bf-video-duration-pill">10:02</span>
                                        <span class="bf-video-play-icon">▶</span>
                                    </div>
                                    <div class="bf-video-card-body">
                                        <div class="bf-meta mb-1">Ekonomi & Jetesë • 2 ditë më parë</div>
                                        <h3 class="bf-video-card-title">
                                            Si po ndryshon tregtia globale pas sanksioneve të reja
                                        </h3>
                                    </div>
                                </article>
                            </div>

                            {{-- Video card 3 --}}
                            <div class="col">
                                <article class="bf-video-card">
                                    <div class="bf-video-thumb">
                                        <img src="https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?auto=format&fit=crop&w=800&q=80"
                                            alt="Kamp refugjatësh">
                                        <span class="bf-video-duration-pill">6:48</span>
                                        <span class="bf-video-play-icon">▶</span>
                                    </div>
                                    <div class="bf-video-card-body">
                                        <div class="bf-meta mb-1">Migrim & Diaspora • 3 ditë më parë</div>
                                        <h3 class="bf-video-card-title">
                                            Jeta në kampet e refugjatëve: dëshmi nga familjet në pritje
                                        </h3>
                                    </div>
                                </article>
                            </div>

                            {{-- Video card 4 --}}
                            <div class="col">
                                <article class="bf-video-card">
                                    <div class="bf-video-thumb">
                                        <img src="https://images.unsplash.com/photo-1529101091764-c3526daf38fe?auto=format&fit=crop&w=800&q=80"
                                            alt="Mjekë në spital">
                                        <span class="bf-video-duration-pill">9:11</span>
                                        <span class="bf-video-play-icon">▶</span>
                                    </div>
                                    <div class="bf-video-card-body">
                                        <div class="bf-meta mb-1">Shëndet • 4 ditë më parë</div>
                                        <h3 class="bf-video-card-title">
                                            Sistemet shëndetësore nën presion: çfarë kemi mësuar nga pandemitë
                                        </h3>
                                    </div>
                                </article>
                            </div>

                            {{-- Video card 5 --}}
                            <div class="col">
                                <article class="bf-video-card">
                                    <div class="bf-video-thumb">
                                        <img src="https://images.unsplash.com/photo-1541872705-1f73c6400ec9?auto=format&fit=crop&w=800&q=80"
                                            alt="Sallë parlamenti">
                                        <span class="bf-video-duration-pill">7:29</span>
                                        <span class="bf-video-play-icon">▶</span>
                                    </div>
                                    <div class="bf-video-card-body">
                                        <div class="bf-meta mb-1">Politikë • 5 ditë më parë</div>
                                        <h3 class="bf-video-card-title">
                                            Reforma zgjedhore që po ndan partitë në Europë
                                        </h3>
                                    </div>
                                </article>
                            </div>

                            {{-- Video card 6 --}}
                            <div class="col">
                                <article class="bf-video-card">
                                    <div class="bf-video-thumb">
                                        <img src="https://images.unsplash.com/photo-1457369003710-4abe9be28dd0?auto=format&fit=crop&w=800&q=80"
                                            alt="Protestë qytetare">
                                        <span class="bf-video-duration-pill">5:56</span>
                                        <span class="bf-video-play-icon">▶</span>
                                    </div>
                                    <div class="bf-video-card-body">
                                        <div class="bf-meta mb-1">Kulturë & Shoqëri • 6 ditë më parë</div>
                                        <h3 class="bf-video-card-title">
                                            Protestat si formë e re e komunikimit politik
                                        </h3>
                                    </div>
                                </article>
                            </div>
                        </div>

                        {{-- Pagination --}}
                        <nav class="mt-3" aria-label="Faqet e videos">
                            <ul class="pagination pagination-sm">
                                <li class="page-item disabled"><span class="page-link">‹</span></li>
                                <li class="page-item active"><span class="page-link">1</span></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">›</a></li>
                            </ul>
                        </nav>
                    </section>
                </section>

                {{-- RIGHT: SIDEBAR --}}
                <aside class="col-lg-3">
                    <div class="bf-video-sidebar-page position-sticky">

                        {{-- Most watched --}}
                        <section class="bf-trending-block mb-4">
                            <h6 class="bf-related-title">Më të shikuarat</h6>
                            <ol class="bf-trending-list">
                                <li><a href="#">Pamje nga fronti: si po ndryshon lufta në terren</a></li>
                                <li><a href="#">Kriza energjetike dhe fatura e dimrit për familjet</a></li>
                                <li><a href="#">AI në politikë: rrezik apo mundësi?</a></li>
                                <li><a href="#">Histori nga kampet e refugjatëve në Europë</a></li>
                                <li><a href="#">Samiti i NATO-s në fokus të botës</a></li>
                            </ol>
                        </section>

                        {{-- Topics --}}
                        <section class="mb-4">
                            <h6 class="bf-related-title">Tema video</h6>
                            <div class="bf-topic-tags">
                                <a href="#" class="bf-topic-pill">Ukraina</a>
                                <a href="#" class="bf-topic-pill">Rusia</a>
                                <a href="#" class="bf-topic-pill">Energjia</a>
                                <a href="#" class="bf-topic-pill">Refugjatët</a>
                                <a href="#" class="bf-topic-pill">NATO</a>
                                <a href="#" class="bf-topic-pill">AI</a>
                                <a href="#" class="bf-topic-pill">Shëndeti</a>
                            </div>
                        </section>

                    </div>
                </aside>
            </div>
        </div>
    @endsection
