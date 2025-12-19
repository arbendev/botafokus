    <div class="container-xl px-3">

        <!-- Search header -->
        <section class="bf-search-header mb-4">
            <form class="bf-search-bar-inner">
                <label for="siteSearch" class="form-label small text-uppercase fw-semibold text-muted mb-1">
                    Kërko në BotaFokus
                </label>
                <div class="input-group input-group-lg">
                    <input type="search" id="siteSearch" class="form-control bf-search-main-input"
                        placeholder="Shkruaj një fjalë kyçe, p.sh. “Ukraina”, “NATO”, “inflacioni global”">
                    <button class="btn btn-dark" type="submit">Kërko</button>
                </div>
            </form>

            <div class="d-flex flex-wrap justify-content-between align-items-center mt-3 gap-2">
                <div class="bf-search-term">
                    Rezultatet për: <span>“Ukraina”</span>
                    <span class="bf-search-count">23 artikuj</span>
                </div>
            </div>
        </section>

        <!-- Search results layout -->
        <div class="row g-4 bf-search-main">

            <!-- LEFT: RESULTS -->
            <section class="col-lg-9">
                <ul class="bf-search-results">
                    <!-- Result 1 -->
                    <li class="bf-search-result">
                        <a href="#" class="d-flex align-items-start gap-3">
                            <div class="bf-search-result-thumb">
                                <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=400&q=80"
                                    alt="Fronti i konfliktit">
                            </div>
                            <div class="bf-search-result-body">
                                <div class="bf-meta mb-1">Botë • 35 min më parë</div>
                                <h2 class="bf-search-result-title">
                                    Rusia paralajmëron zgjerim të konfliktit nëse bisedimet për paqe dështojnë
                                </h2>
                                <p class="bf-search-result-snippet">
                                    Qeveria ruse thotë se do të “marrë më shumë territor” nëse Perëndimi nuk pranon
                                    kompromiset e propozuara, ndërsa diplomatët europianë e shohin këtë si presion ndaj
                                    Kievit.
                                </p>
                            </div>
                        </a>
                    </li>

                    <!-- Result 2 -->
                    <li class="bf-search-result">
                        <a href="#" class="d-flex align-items-start gap-3">
                            <div class="bf-search-result-thumb">
                                <img src="https://images.unsplash.com/photo-1516483638261-f4dbaf036963?auto=format&fit=crop&w=400&q=80"
                                    alt="Takim diplomatik">
                            </div>
                            <div class="bf-search-result-body">
                                <div class="bf-meta mb-1">Analizë • 2 orë më parë</div>
                                <h2 class="bf-search-result-title">
                                    Analizë: A po lodhet Perëndimi nga lufta në Ukrainë?
                                </h2>
                                <p class="bf-search-result-snippet">
                                    Vendet që kanë dërguar miliarda në ndihmë ushtarake po përballen me presion politik
                                    të brendshëm,
                                    por analistët thonë se mbështetja strategjike mbetet e fortë.
                                </p>
                            </div>
                        </a>
                    </li>

                    <!-- Result 3 -->
                    <li class="bf-search-result">
                        <a href="#" class="d-flex align-items-start gap-3">
                            <div class="bf-search-result-thumb d-none d-sm-block">
                                <img src="https://images.unsplash.com/photo-1516541196182-6bdb0516ed27?auto=format&fit=crop&w=400&q=80"
                                    alt="Samit ndërkombëtar">
                            </div>
                            <div class="bf-search-result-body">
                                <div class="bf-meta mb-1">NATO • 5 orë më parë</div>
                                <h2 class="bf-search-result-title">
                                    Aleatët diskutojnë zgjerimin e mbështetjes për mbrojtjen ajrore të Ukrainës
                                </h2>
                                <p class="bf-search-result-snippet">
                                    Ministrat e mbrojtjes mblidhen në Bruksel për të gjetur mënyra si të forcojnë
                                    sistemet raketore dhe të mbrojtjes nga dronët.
                                </p>
                            </div>
                        </a>
                    </li>

                    <!-- Result 4 (no image example) -->
                    <li class="bf-search-result">
                        <a href="#" class="d-flex align-items-start gap-3">
                            <div class="bf-search-result-body w-100">
                                <div class="bf-meta mb-1">Opinion • Dje</div>
                                <h2 class="bf-search-result-title">
                                    Opinion: Çfarë nënkupton lufta në Ukrainë për sigurinë energjetike të Europës?
                                </h2>
                                <p class="bf-search-result-snippet">
                                    Kriza ka ekspozuar varësinë e kontinentit nga gazi rus dhe po shtyn vendet drejt
                                    burimeve të reja energjie dhe aleancave të reja ekonomike.
                                </p>
                            </div>
                        </a>
                    </li>

                    <!-- Result 5 -->
                    <li class="bf-search-result">
                        <a href="#" class="d-flex align-items-start gap-3">
                            <div class="bf-search-result-thumb d-none d-sm-block">
                                <img src="https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?auto=format&fit=crop&w=400&q=80"
                                    alt="Qytet i shkatërruar">
                            </div>
                            <div class="bf-search-result-body">
                                <div class="bf-meta mb-1">Botë • 2 ditë më parë</div>
                                <h2 class="bf-search-result-title">
                                    OKB: Dëmet infrastrukturore në Ukrainë kalojnë 400 miliardë dollarë
                                </h2>
                                <p class="bf-search-result-snippet">
                                    Një raport i ri vlerëson koston e rindërtimit dhe evidenton zonat ku investimet janë
                                    më urgjente për rikthimin e shërbimeve bazë.
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>

                <!-- Pagination -->
                <nav class="mt-3" aria-label="Faqet e rezultateve të kërkimit">
                    <ul class="pagination pagination-sm">
                        <li class="page-item disabled"><span class="page-link">‹</span></li>
                        <li class="page-item active"><span class="page-link">1</span></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">›</a></li>
                    </ul>
                </nav>
            </section>

            <!-- RIGHT: SIDEBAR -->
            <aside class="col-lg-3">
                <div class="bf-search-sidebar position-sticky">

                    <!-- Related searches -->
                    <section class="mb-4">
                        <h6 class="bf-related-title">Kërkime të ngjashme</h6>
                        <ul class="bf-related-searches">
                            <li><a href="#">Ukraina NATO</a></li>
                            <li><a href="#">Sanksionet ndaj Rusisë</a></li>
                            <li><a href="#">Kriza e energjisë në Europë</a></li>
                            <li><a href="#">Refugjatët nga Ukraina</a></li>
                            <li><a href="#">Analiza gjeopolitike</a></li>
                        </ul>
                    </section>

                    <!-- Most read for this term -->
                    <section class="bf-trending-block">
                        <h6 class="bf-related-title">Më të lexuarat për “Ukraina”</h6>
                        <ol class="bf-trending-list">
                            <li><a href="#">Raport: Fronti lindor përballet me dimrin më të vështirë</a></li>
                            <li><a href="#">Si po ndryshon balanca ushtarake mes Kievit dhe Moskës</a></li>
                            <li><a href="#">Çfarë roli po luajnë dronët në luftë</a></li>
                            <li><a href="#">BE miraton fond të ri për rindërtimin e Ukrainës</a></li>
                            <li><a href="#">Historia e një familjeje që i shpëtoi bombardimeve</a></li>
                        </ol>
                    </section>
                </div>
            </aside>
        </div>
    </div>
