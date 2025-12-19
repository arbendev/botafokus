@extends('layouts.app')

@section('content')
    <div class="container-xl px-3">
        <div class="row g-4">
            <!-- MAIN CONTENT (LEFT + CENTER) -->
            <div class="col-lg-9">
                <!-- HERO + TOP STORIES -->
                <section class="row g-4 mb-5 align-items-stretch">
                    <!-- Main hero article -->
                    <div class="col-lg-7">
                        <article>
                            <div class="bf-image-hero mb-3">
                                <a href="/categories/article"><img
                                        src="https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?auto=format&fit=crop&w=1400&q=80"
                                        alt="" class="img-fluid"></a>
                            </div>
                            <span class="bf-category-label">BOTË</span>
                            <h1 class="bf-hero-title">
                                Rusia paralajmëron zgjerim të konfliktit nëse bisedimet dështojnë
                            </h1>
                            <p class="bf-hero-summary">
                                Moska thotë se do të marrë më shumë territor në Ukrainë nëse Europa vazhdon të shtyjë për
                                paqe pa kushte.
                            </p>
                            <span class="bf-meta">1 orë më parë</span>
                        </article>
                    </div>

                    <!-- Top stories mini-grid -->
                    <div class="col-lg-5">
                        <div class="bf-side-panel h-100">
                            <h6 class="bf-side-title mb-3">TREGIME KRYESORE</h6>

                            <article class="bf-mini-article mb-3 pb-3">
                                <div class="row g-3">
                                    <div class="col-5">
                                        <div class="bf-image-small">
                                            <img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=800&q=80"
                                                alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <span class="bf-category-label small">POLITIKË</span>
                                        <h2 class="bf-mini-title">
                                            SHBA miraton paketë të re mbrojtjeje
                                        </h2>
                                        <span class="bf-meta">35 min më parë</span>
                                    </div>
                                </div>
                            </article>

                            <article class="bf-mini-article mb-3 pb-3">
                                <div class="row g-3">
                                    <div class="col-5">
                                        <div class="bf-image-small">
                                            <img src="https://images.unsplash.com/photo-1610878180933-123728745d22?auto=format&fit=crop&w=800&q=80"
                                                alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <span class="bf-category-label small">LUFTË & KONFLIKTE</span>
                                        <h2 class="bf-mini-title">
                                            Izraeli intensifikon operacionet në Gaza
                                        </h2>
                                        <span class="bf-meta">50 min më parë</span>
                                    </div>
                                </div>
                            </article>

                            <article class="bf-mini-article">
                                <div class="row g-3">
                                    <div class="col-5">
                                        <div class="bf-image-small">
                                            <img src="https://images.unsplash.com/photo-1541872705-1f73c6400ec9?auto=format&fit=crop&w=800&q=80"
                                                alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <span class="bf-category-label small">EKONOMI & JETESË</span>
                                        <h2 class="bf-mini-title">
                                            BE diskuton sanksione të reja energjetike
                                        </h2>
                                        <span class="bf-meta">1 orë më parë</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>

                <!-- WORLD SNAPSHOT GRID -->
                <section class="bf-block mb-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="bf-section-title">Tregime nga Botë</h3>
                        <a href="#" class="bf-more-link">Më shumë nga Botë →</a>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6 col-lg-3">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=800&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <span class="bf-category-label small">BOTË</span>
                                <h2 class="bf-card-title">Liderët e BE takohen për krizën energjetike</h2>
                                <span class="bf-meta">2 orë më parë</span>
                            </article>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=800&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <span class="bf-category-label small">BOTË</span>
                                <h2 class="bf-card-title">Stuhitë shkaktojnë dëme të mëdha në Azi</h2>
                                <span class="bf-meta">3 orë më parë</span>
                            </article>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1529070538774-1843cb3265df?auto=format&fit=crop&w=800&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <span class="bf-category-label small">BOTË</span>
                                <h2 class="bf-card-title">Afrika përballet me sfida të reja ekonomike</h2>
                                <span class="bf-meta">4 orë më parë</span>
                            </article>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?auto=format&fit=crop&w=800&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <span class="bf-category-label small">BOTË</span>
                                <h2 class="bf-card-title">Debat global mbi politikat klimatike</h2>
                                <span class="bf-meta">5 orë më parë</span>
                            </article>
                        </div>
                    </div>
                </section>

                <!-- POLITIKË -->
                <section class="bf-block">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="bf-section-title">Politikë</h3>
                        <a href="#" class="bf-more-link">Të gjitha nga Politikë →</a>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1541872705-1f73c6400ec9?auto=format&fit=crop&w=900&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <span class="bf-category-label small">POLITIKË</span>
                                <h2 class="bf-card-title">Parlamentet përballen me buxhete të diskutueshme</h2>
                                <p class="bf-card-summary">
                                    Debatet e ashpra mbi mbrojtjen dhe shpenzimet sociale ndajnë partitë kryesore.
                                </p>
                                <span class="bf-meta">45 min më parë</span>
                            </article>
                        </div>
                        <div class="col-lg-4">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1608501078713-8e445a709b52?auto=format&fit=crop&w=900&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <span class="bf-category-label small">POLITIKË</span>
                                <h2 class="bf-card-title">Kryeministrat europianë diskutojnë zgjerimin e BE</h2>
                                <span class="bf-meta">1 orë më parë</span>
                            </article>
                        </div>
                        <div class="col-lg-4">
                            <ul class="bf-text-list">
                                <li>
                                    <h6>Balkanët në fokus në samitin e ardhshëm</h6>
                                    <span class="bf-meta">2 orë më parë</span>
                                </li>
                                <li>
                                    <h6>Reforma zgjedhore sjell polemika të reja</h6>
                                    <span class="bf-meta">3 orë më parë</span>
                                </li>
                                <li>
                                    <h6>Debate për rolin e mediave në fushata</h6>
                                    <span class="bf-meta">4 orë më parë</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- LUFTË & KONFLIKTE -->
                <section class="bf-block">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="bf-section-title">Luftë & Konflikte</h3>
                        <a href="#" class="bf-more-link">Të gjitha nga Konfliktet →</a>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-3">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1593115057322-e94b77572f20?auto=format&fit=crop&w=800&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="bf-card-title">Ukraina raporton përleshje të reja</h2>
                                <span class="bf-meta">30 min më parë</span>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1577493340887-b7bfff550145?auto=format&fit=crop&w=800&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="bf-card-title">Kriza humanitare thellohet në Gaza</h2>
                                <span class="bf-meta">1 orë më parë</span>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1476610182048-b716b8518aae?auto=format&fit=crop&w=800&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="bf-card-title">NATO rrit prezencën në lindje</h2>
                                <span class="bf-meta">2 orë më parë</span>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1602091315106-8c7ecb94c77c?auto=format&fit=crop&w=800&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="bf-card-title">OKB kërkon armëpushim të menjëhershëm</h2>
                                <span class="bf-meta">3 orë më parë</span>
                            </article>
                        </div>
                    </div>
                </section>

                <!-- EKONOMI & JETESË -->
                <section class="bf-block">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="bf-section-title">Ekonomi & Jetesë</h3>
                        <a href="#" class="bf-more-link">Të gjitha nga Ekonomia →</a>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1581090700227-1e37b190418e?auto=format&fit=crop&w=1000&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="bf-card-title">Çmimet e energjisë rriten në gjithë Europën</h2>
                                <p class="bf-card-summary">
                                    Familjet dhe bizneset përballen me kosto më të larta të jetesës ndërsa dimri afrohet.
                                </p>
                                <span class="bf-meta">50 min më parë</span>
                            </article>
                        </div>
                        <div class="col-lg-6">
                            <ul class="bf-text-list">
                                <li>
                                    <h6>Raportet flasin për ngadalësim të rritjes ekonomike</h6>
                                    <span class="bf-meta">1 orë më parë</span>
                                </li>
                                <li>
                                    <h6>Studiuesit: inflacioni godet shtresat më të dobëta</h6>
                                    <span class="bf-meta">2 orë më parë</span>
                                </li>
                                <li>
                                    <h6>Kompanitë kërkojnë investime në energji të gjelbër</h6>
                                    <span class="bf-meta">3 orë më parë</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- MIGRIM & DIASPORA -->
                <section class="bf-block">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="bf-section-title">Migrim & Diaspora</h3>
                        <a href="#" class="bf-more-link">Të gjitha nga Migrimi →</a>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1533107862482-0e6974b06ec4?auto=format&fit=crop&w=900&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="bf-card-title">BE shqyrton rregulla të reja azili</h2>
                                <span class="bf-meta">40 min më parë</span>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1516483638261-f4dbaf036963?auto=format&fit=crop&w=900&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="bf-card-title">Shtetet rrisin kontrollet kufitare</h2>
                                <span class="bf-meta">1 orë më parë</span>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <ul class="bf-text-list">
                                <li>
                                    <h6>Diaspora shqiptare rrit ndikimin ekonomik</h6>
                                    <span class="bf-meta">2 orë më parë</span>
                                </li>
                                <li>
                                    <h6>Raport i ri për rrjedhjen e trurit nga Ballkani</h6>
                                    <span class="bf-meta">3 orë më parë</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- TEKNOLOGJI & SIGURI -->
                <section class="bf-block">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="bf-section-title">Teknologji & Siguri</h3>
                        <a href="#" class="bf-more-link">Të gjitha nga Teknologjia →</a>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-3">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="bf-card-title">Shtetet testojnë sisteme të reja të mbrojtjes kibernetike</h2>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="bf-card-title">Debat mbi përdorimin e AI në zgjedhje</h2>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <ul class="bf-text-list">
                                <li>
                                    <h6>Rregullatorët kërkojnë transparencë nga kompanitë teknologjike</h6>
                                    <span class="bf-meta">1 orë më parë</span>
                                </li>
                                <li>
                                    <h6>Ekspertët paralajmërojnë për rreziqet e mbikëqyrjes masive</h6>
                                    <span class="bf-meta">2 orë më parë</span>
                                </li>
                                <li>
                                    <h6>Platformat sociale përballen me ligje të reja për përmbajtjen</h6>
                                    <span class="bf-meta">3 orë më parë</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- SHËNDET & SHKENCË -->
                <section class="bf-block">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="bf-section-title">Shëndet & Shkencë</h3>
                        <a href="#" class="bf-more-link">Të gjitha nga Shëndeti →</a>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1535916707207-35f97e715e1b?auto=format&fit=crop&w=900&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="bf-card-title">Studimi i ri flet për vaksina më të avancuara</h2>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=900&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="bf-card-title">Spitalet përgatiten për valë të re pacientësh</h2>
                            </article>
                        </div>
                        <div class="col-md-4">
                            <ul class="bf-text-list">
                                <li>
                                    <h6>Raport i OBSH mbi shëndetin mendor global</h6>
                                </li>
                                <li>
                                    <h6>Shkencëtarët testojnë trajtime për sëmundje të rralla</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- KULTURË & SHOQËRI -->
                <section class="bf-block">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="bf-section-title">Kulturë & Shoqëri</h3>
                        <a href="#" class="bf-more-link">Të gjitha nga Kultura →</a>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-3">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1487412912498-0447578fcca8?auto=format&fit=crop&w=900&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="bf-card-title">Festivale të reja kulturore në Europë</h2>
                            </article>
                        </div>
                        <div class="col-md-3">
                            <article>
                                <div class="bf-image-card">
                                    <img src="https://images.unsplash.com/photo-1438109491414-7198515b166b?auto=format&fit=crop&w=900&q=80"
                                        alt="" class="img-fluid">
                                </div>
                                <h2 class="bf-card-title">Debat mbi rolin e artit në kohë krize</h2>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <ul class="bf-text-list">
                                <li>
                                    <h6>Rritet interesi për letërsinë ballkanike</h6>
                                </li>
                                <li>
                                    <h6>Filmat dokumentarë të rinj fokusohen tek migrimi</h6>
                                </li>
                                <li>
                                    <h6>Rrjetet sociale ndryshojnë mënyrën si konsumojmë lajmet</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>

                <!-- TË FUNDIT -->
                <section class="bf-block mb-5">
                    <h3 class="bf-section-title mb-3">Të Fundit</h3>
                    <ul class="bf-latest-list">
                        <li><span>5 min</span> Parlamentet europiane diskutojnë sigurinë kufitare</li>
                        <li><span>16 min</span> Raport i ri për varfërinë globale</li>
                        <li><span>27 min</span> Ekspertët flasin për rreziqet e AI</li>
                        <li><span>40 min</span> Protesta kundër dhunës në disa qytete</li>
                        <li><span>1 orë</span> Kompanitë teknologjike para gjykatave europiane</li>
                    </ul>
                </section>
            </div>

            <!-- VIDEO SIDEBAR (RIGHT COLUMN) -->
            <aside class="col-lg-3">
                <div class="bf-video-sidebar">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="bf-side-title mb-0">VIDEO</h6>
                        <a href="#" class="bf-more-link small">Shiko të gjitha →</a>
                    </div>

                    <!-- Featured video -->
                    <article class="mb-3 pb-3 bf-video-featured">
                        <div class="bf-video-thumb mb-2">
                            <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=900&q=80"
                                alt="" class="img-fluid">
                            <span class="bf-video-play-icon">▶</span>
                        </div>
                        <h2 class="bf-video-title">
                            <a href="/videos">Analizë: Si po ndryshon rendi global pas luftës në Ukrainë</a>
                        </h2>
                        <span class="bf-meta">7 min • Analizë</span>
                    </article>

                    <!-- Video list -->
                    <ul class="bf-video-list">
                        <li class="bf-video-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-2">
                                    <h6 class="mb-1">Reportazh nga vijat e frontit në lindje të Ukrainës</h6>
                                </div>
                                <div class="text-end">
                                    <span class="bf-video-icon">▶</span>
                                    <div class="bf-video-duration">6 min</div>
                                </div>
                            </div>
                        </li>
                        <li class="bf-video-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-2">
                                    <h6 class="mb-1">Si po ndikon kriza energjetike në familjet europiane</h6>
                                </div>
                                <div class="text-end">
                                    <span class="bf-video-icon">▶</span>
                                    <div class="bf-video-duration">8 min</div>
                                </div>
                            </div>
                        </li>
                        <li class="bf-video-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-2">
                                    <h6 class="mb-1">Migrimi i të rinjve shqiptarë: shkaqet dhe pasojat</h6>
                                </div>
                                <div class="text-end">
                                    <span class="bf-video-icon">▶</span>
                                    <div class="bf-video-duration">9 min</div>
                                </div>
                            </div>
                        </li>
                        <li class="bf-video-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-2">
                                    <h6 class="mb-1">Teknologjia e inteligjencës artificiale në zgjedhje</h6>
                                </div>
                                <div class="text-end">
                                    <span class="bf-video-icon">▶</span>
                                    <div class="bf-video-duration">7 min</div>
                                </div>
                            </div>
                        </li>
                        <li class="bf-video-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-2">
                                    <h6 class="mb-1">Dokumentar: Jeta e përditshme në një qytet në luftë</h6>
                                </div>
                                <div class="text-end">
                                    <span class="bf-video-icon">▶</span>
                                    <div class="bf-video-duration">11 min</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
@endsection
