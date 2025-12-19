    @extends('layouts.app')

    @section('content')
        <div class="container-xl px-3">
            {{-- Category header --}}
            <section class="bf-category-header mb-4">
                <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
                    <div>
                        <h1 class="bf-category-title">Botë</h1>
                        <p class="bf-category-description">
                            Lajmet më të rëndësishme ndërkombëtare.
                        </p>
                    </div>
                </div>
            </section>

            {{-- Category main layout --}}
            <div class="row g-4 bf-category-main">

                {{-- LEFT: ARTICLES --}}
                <section class="col-lg-9">

                    {{-- Featured row --}}
                    <section class="bf-block mb-4">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <article class="bf-category-featured-card">
                                    <div class="bf-image-card">
                                        <img src="https://images.unsplash.com/photo-1524492412937-b28074a5d7da?auto=format&fit=crop&w=900&q=80"
                                            alt="Pamje nga një sallë parlamenti">
                                    </div>
                                    <div class="bf-category-featured-body">
                                        <div class="bf-meta mb-1">35 min më parë</div>
                                        <h2 class="bf-category-featured-title">
                                            BE përgatit paketë të re sanksionesh nëse Rusia zgjeron ofensivën
                                        </h2>
                                        <p class="bf-card-summary">
                                            Kryeqytetet europiane kërkojnë mënyra për të ruajtur presionin ekonomik ndaj
                                            Moskës,
                                            ndërsa shmangin goditjen e industrive të tyre.
                                        </p>
                                    </div>
                                </article>
                            </div>

                            <div class="col-md-6">
                                <article class="bf-category-featured-card">
                                    <div class="bf-image-card">
                                        <img src="https://images.unsplash.com/photo-1517959105821-eaf2591984c2?auto=format&fit=crop&w=900&q=80"
                                            alt="Liderë botërorë në një samit">
                                    </div>
                                    <div class="bf-category-featured-body">
                                        <div class="bf-meta mb-1">1 orë më parë</div>
                                        <h2 class="bf-category-featured-title">
                                            Samiti i ri i NATO-s fokusohet te siguria kibernetike dhe inteligjenca
                                            artificiale
                                        </h2>
                                        <p class="bf-card-summary">
                                            Aleanca synon të përshtatet me kërcënimet e reja digjitale, duke vënë theksin te
                                            sulmet kibernetike të sponsorizuara nga shtetet.
                                        </p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </section>

                    {{-- Grid of main stories --}}
                    <section class="bf-block">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h2 class="bf-section-title mb-0">Artikuj kryesorë</h2>
                            <a href="#" class="bf-more-link">Shiko kronologjinë e plotë →</a>
                        </div>

                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                            {{-- Card 1 --}}
                            <div class="col">
                                <article>
                                    <div class="bf-image-card">
                                        <img src="https://images.unsplash.com/photo-1457369804613-52c61a468e7d?auto=format&fit=crop&w=800&q=80"
                                            alt="Pamje e një qyteti aziatik natën">
                                    </div>
                                    <div>
                                        <div class="bf-meta mb-1">Azia • 2 orë më parë</div>
                                        <h3 class="bf-card-title">
                                            Kina teston një kornizë të re për kontrollin e eksporteve teknologjike
                                        </h3>
                                        <p class="bf-card-summary">
                                            Ekspertët thonë se lëvizja mund të ndikojë tregjet globale të çipave dhe
                                            pajisjeve
                                            të telekomunikacionit.
                                        </p>
                                    </div>
                                </article>
                            </div>

                            {{-- Card 2 --}}
                            <div class="col">
                                <article>
                                    <div class="bf-image-card">
                                        <img src="https://images.unsplash.com/photo-1487958449943-2429e8be8625?auto=format&fit=crop&w=800&q=80"
                                            alt="Flamuj të shumë vendeve">
                                    </div>
                                    <div>
                                        <div class="bf-meta mb-1">OKB • 3 orë më parë</div>
                                        <h3 class="bf-card-title">
                                            Kombet e Bashkuara paralajmërojnë për krizë të re refugjatësh
                                        </h3>
                                        <p class="bf-card-summary">
                                            Konfliktet e reja dhe ndryshimet klimatike po detyrojnë miliona njerëz të
                                            lëvizin
                                            përtej kufijve.
                                        </p>
                                    </div>
                                </article>
                            </div>

                            {{-- Card 3 --}}
                            <div class="col">
                                <article>
                                    <div class="bf-image-card">
                                        <img src="https://images.unsplash.com/photo-1457369003710-4abe9be28dd0?auto=format&fit=crop&w=800&q=80"
                                            alt="Protestues në rrugë">
                                    </div>
                                    <div>
                                        <div class="bf-meta mb-1">Amerika Latine • 4 orë më parë</div>
                                        <h3 class="bf-card-title">
                                            Protesta masive kundër reformave të reja ekonomike
                                        </h3>
                                        <p class="bf-card-summary">
                                            Qindra mijëra qytetarë marshojnë në kryeqytetin e vendit duke kërkuar
                                            rishikim të paketës së masave shtrënguese.
                                        </p>
                                    </div>
                                </article>
                            </div>

                            {{-- Card 4 --}}
                            <div class="col">
                                <article>
                                    <div class="bf-image-card">
                                        <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=800&q=80"
                                            alt="Liqen mes maleve">
                                    </div>
                                    <div>
                                        <div class="bf-meta mb-1">Klima • 5 orë më parë</div>
                                        <h3 class="bf-card-title">
                                            Raport i ri tregon rritje të shpejtë të temperaturave në veri të globit
                                        </h3>
                                        <p class="bf-card-summary">
                                            Shkencëtarët paralajmërojnë se efektet do të ndihen veçanërisht në zinxhirin e
                                            furnizimit me ushqim.
                                        </p>
                                    </div>
                                </article>
                            </div>

                            {{-- Card 5 --}}
                            <div class="col">
                                <article>
                                    <div class="bf-image-card">
                                        <img src="https://images.unsplash.com/photo-1549921296-3c61bfb6a53f?auto=format&fit=crop&w=800&q=80"
                                            alt="Qendër financiare">
                                    </div>
                                    <div>
                                        <div class="bf-meta mb-1">Ekonomi globale • 6 orë më parë</div>
                                        <h3 class="bf-card-title">
                                            Bankat qendrore përgatiten për vit të ri me norma të paqarta interesi
                                        </h3>
                                        <p class="bf-card-summary">
                                            Tregjet janë të ndara nëse epoka e parave të lira ka përfunduar përfundimisht.
                                        </p>
                                    </div>
                                </article>
                            </div>

                            {{-- Card 6 --}}
                            <div class="col">
                                <article>
                                    <div class="bf-image-card">
                                        <img src="https://images.unsplash.com/photo-1458682625221-3a45f8a844c7?auto=format&fit=crop&w=800&q=80"
                                            alt="Dron në qiell">
                                    </div>
                                    <div>
                                        <div class="bf-meta mb-1">Siguri • 7 orë më parë</div>
                                        <h3 class="bf-card-title">
                                            Dronët e armatosur po ndryshojnë mënyrën si zhvillohen konfliktet moderne
                                        </h3>
                                        <p class="bf-card-summary">
                                            Ekspertët kërkojnë rregulla të reja ndërkombëtare për t'u përballur me këtë
                                            realitet.
                                        </p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </section>

                    {{-- Long list view --}}
                    <section class="bf-block">
                        <h2 class="bf-section-title mb-3">Të gjitha artikujt</h2>
                        <ul class="bf-category-list">
                            {{-- Item 1 --}}
                            <li class="bf-category-list-item">
                                <a href="#" class="d-flex align-items-start gap-3">
                                    <div class="bf-category-list-thumb">
                                        <img src="https://images.unsplash.com/photo-1487528278747-ba99ed528ebc?auto=format&fit=crop&w=400&q=80"
                                            alt="Kamp refugjatësh">
                                    </div>
                                    <div class="bf-category-list-content">
                                        <div class="bf-meta mb-1">Afrika • 8 orë më parë</div>
                                        <h3 class="bf-category-list-title">
                                            Kriza e ujit përkeqëson situatën humanitare në rajonet e thata
                                        </h3>
                                        <p class="bf-category-list-summary">
                                            Organizatat në terren thonë se mungesa e investimeve në infrastrukturë po
                                            e shtyn situatën drejt kolapsit.
                                        </p>
                                    </div>
                                </a>
                            </li>

                            {{-- Item 2 --}}
                            <li class="bf-category-list-item">
                                <a href="#" class="d-flex align-items-start gap-3">
                                    <div class="bf-category-list-thumb">
                                        <img src="https://images.unsplash.com/photo-1472073705362-0986574198f0?auto=format&fit=crop&w=400&q=80"
                                            alt="Qytet evropian">
                                    </div>
                                    <div class="bf-category-list-content">
                                        <div class="bf-meta mb-1">Europa • 9 orë më parë</div>
                                        <h3 class="bf-category-list-title">
                                            Vendet nordike forcojnë bashkëpunimin për energjinë e gjelbër
                                        </h3>
                                        <p class="bf-category-list-summary">
                                            Projektet e reja për erën në det të hapur synojnë t'i bëjnë vendet pothuajse
                                            të pavarura nga karburantet fosile.
                                        </p>
                                    </div>
                                </a>
                            </li>

                            {{-- Item 3 --}}
                            <li class="bf-category-list-item">
                                <a href="#" class="d-flex align-items-start gap-3">
                                    <div class="bf-category-list-thumb">
                                        <img src="https://images.unsplash.com/photo-1476275466078-4007374ef05b?auto=format&fit=crop&w=400&q=80"
                                            alt="Qendër urbane moderne">
                                    </div>
                                    <div class="bf-category-list-content">
                                        <div class="bf-meta mb-1">SHBA • 11 orë më parë</div>
                                        <h3 class="bf-category-list-title">
                                            Shtëpia e Bardhë prezanton paketë të re për sigurinë kibernetike
                                        </h3>
                                        <p class="bf-category-list-summary">
                                            Masa të reja për sektorin privat synojnë të ulin rrezikun nga sulmet ndaj
                                            infrastrukturës kritike.
                                        </p>
                                    </div>
                                </a>
                            </li>

                            {{-- Item 4 --}}
                            <li class="bf-category-list-item">
                                <a href="#" class="d-flex align-items-start gap-3">
                                    <div class="bf-category-list-thumb">
                                        <img src="https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?auto=format&fit=crop&w=400&q=80"
                                            alt="Laborator shkencor">
                                    </div>
                                    <div class="bf-category-list-content">
                                        <div class="bf-meta mb-1">Shkencë • Dje</div>
                                        <h3 class="bf-category-list-title">
                                            Studim i ri eksploron mundësinë e vaksinave universale kundër gripit
                                        </h3>
                                        <p class="bf-category-list-summary">
                                            Rezultatet e para duken premtuese, por ekspertët paralajmërojnë se duhen vite
                                            derisa teknologjia të jetë gati.
                                        </p>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        {{-- Pagination demo --}}
                        <nav class="mt-3" aria-label="Faqet e kategorisë Botë">
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
                    <div class="bf-category-sidebar position-sticky">

                        {{-- Most read --}}
                        <section class="bf-trending-block mb-4">
                            <h6 class="bf-related-title">Më të lexuarat në Botë</h6>
                            <ol class="bf-trending-list">
                                <li>
                                    <a href="#">Rusia paralajmëron zgjerim të konfliktit nëse nuk ka marrëveshje</a>
                                </li>
                                <li>
                                    <a href="#">Raport: Tregtia globale pëson vitin më të dobët në dekadë</a>
                                </li>
                                <li>
                                    <a href="#">Analizë: Samiti i NATO-s dhe roli i Europës në sigurinë kolektive</a>
                                </li>
                                <li>
                                    <a href="#">OKB: Numri i refugjatëve arrin nivele rekord historike</a>
                                </li>
                                <li>
                                    <a href="#">Teknologjia ushtarake dhe balanca e frikës mes fuqive të mëdha</a>
                                </li>
                            </ol>
                        </section>

                        {{-- Topic tags --}}
                        <section class="mb-4">
                            <h6 class="bf-related-title">Tema kryesore</h6>
                            <div class="bf-topic-tags">
                                <a href="#" class="bf-topic-pill">Ukraina</a>
                                <a href="#" class="bf-topic-pill">Rusia</a>
                                <a href="#" class="bf-topic-pill">NATO</a>
                                <a href="#" class="bf-topic-pill">BE</a>
                                <a href="#" class="bf-topic-pill">Gjeopolitikë</a>
                                <a href="#" class="bf-topic-pill">Energjia</a>
                                <a href="#" class="bf-topic-pill">Kriza e klimës</a>
                                <a href="#" class="bf-topic-pill">Refugjatët</a>
                            </div>
                        </section>

                        {{-- Newsletter --}}
                        <section class="bf-newsletter-card mb-4">
                            <h6>Abonohu për "Botë" </h6>
                            <p>Merr përmbledhjen javore me historitë më të rëndësishme nga bota, në shqip.</p>
                            <form class="bf-newsletter-form">
                                <input type="email" class="form-control form-control-sm mb-2"
                                    placeholder="Adresa e email-it">
                                <button type="submit" class="btn btn-danger btn-sm w-100">Abonohu</button>
                            </form>
                        </section>

                        {{-- Video highlight --}}
                        <section class="bf-video-highlight">
                            <h6 class="bf-related-title">Video nga bota</h6>
                            <div class="bf-video-thumb mb-2">
                                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=800&q=80"
                                    alt="Studio lajmesh">
                                <span class="bf-video-play-icon">▶ Shiko</span>
                            </div>
                            <h6 class="bf-video-title">
                                Pamje nga fronti: si po ndryshon lufta në terren
                            </h6>
                            <div class="bf-meta">7:42 min • Botë</div>
                        </section>
                    </div>
                </aside>
            </div>
        </div>
    @endsection
