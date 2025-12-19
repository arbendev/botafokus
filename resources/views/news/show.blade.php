 @extends('layouts.app')

 @section('content')
     <div class="container-xl px-3">
         <div class="row g-4 bf-article-wrapper justify-content-center">

             <!-- CENTER: ARTICLE CONTENT -->
             <article class="col-lg-9 bf-article-main">
                 <!-- Category / breadcrumb -->
                 <div class="bf-article-breadcrumb mb-2">
                     <a href="#" class="bf-category-label">BOTË</a>
                     {{-- 
                     <span class="bf-article-section-separator">•</span>
                     <span class="bf-article-section-link">Analizë</span>
                     --}}
                 </div>

                 <!-- Title -->
                 <h1 class="bf-article-title">
                     Rusia paralajmëron zgjerim të konfliktit nëse bisedimet për paqe dështojnë
                 </h1>

                 <!-- Meta + share bar -->
                 <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
                     <div class="bf-article-meta">
                         {{-- <span class="bf-article-location">MOSKË</span>
                         <span>•</span> --}}
                         <span>17 dhjetor 2025 • 20:06</span>
                     </div>

                     <div class="bf-article-share">
                         <span class="bf-share-label me-2"></span>
                         <button class="bf-share-pill" aria-label="Ndaj në Facebook">F</button>
                         <button class="bf-share-pill" aria-label="Ndaj në X">X</button>
                         <button class="bf-share-pill" aria-label="Kopjo linkun">↗</button>
                     </div>
                 </div>

                 <!-- Hero image -->
                 <figure class="bf-article-hero mb-3">
                     <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1600&q=80"
                         alt="Pamje nga një qytet në konflikt" class="img-fluid">
                     {{-- 
                     <figcaption>
                         Trupa ushtarake ruse patrullojnë një zonë industriale pranë vijës së frontit. Foto: Unsplash
                     </figcaption>
                     --}}
                 </figure>

                 <!-- Intro paragraph -->
                 <p class="bf-article-lead">
                     LOS ANGELES (BF) — Qeveria ruse paralajmëroi të mërkurën se do të zgjerojë
                     operacionet ushtarake në Ukrainë nëse, sipas saj, Perëndimi vazhdon të refuzojë
                     kompromiset për një marrëveshje paqeje. Deklarata u konsiderua nga diplomatët
                     europianë si një përpjekje e re për t'i vënë presion Kievit dhe aleatëve të tij.
                 </p>

                 <!-- Body paragraphs -->
                 <div class="bf-article-body">
                     <p>
                         Ministri i Jashtëm rus tha se Moska “nuk mund të presë pafundësisht” dhe se
                         “territoret që konsiderohen historikisht ruse” do të merren nën kontroll nëse
                         bisedimet ngecin. Ai nuk dha detaje të qarta se cilat zona mund të synohen, por
                         diplomatët perëndimorë e lexuan këtë si një sinjal për një valë të re ofensivash
                         në lindje dhe jug të Ukrainës.
                     </p>

                     <p>
                         Zyrtarët në Kiev e cilësuan deklaratën “shantazh klasik politik” dhe theksuan se
                         asnjë marrëveshje paqeje nuk mund të arrihet pa tërheqjen e plotë të trupave
                         ruse nga territori ukrainas. Presidenti ukrainas përsëriti se vendi i tij nuk do të
                         pranojë “asnjë kufi të ri të imponuar me forcë”.
                     </p>

                     <p>
                         Në Bruksel, përfaqësuesit e Bashkimit Europian diskutuan paketën e radhës së
                         sanksioneve, e cila mund të përfshijë kufizime shtesë për eksportet e teknologjisë
                         dhe energjisë. Disa vende anëtare mbeten të ndara mbi ndikimin ekonomik që
                         mund të kenë masat e reja, por diplomatët thonë se kabllogramet nga kryeqytetet
                         kryesore flasin për një konsensus gjithnjë e më të fortë.
                     </p>

                     <p>
                         Analistët ushtarakë paralajmërojnë se dimri mund të sjellë një fazë të re të
                         konfliktit, ku dronët dhe sulmet me raketa do të luajnë rol domethënës. Infrastruktura
                         energjetike e Ukrainës mbetet objektiv kyç, ndërsa miliona civilë përballen me
                         ndërprerje të shpeshta të energjisë elektrike dhe ngrohjes.
                     </p>

                     <p>
                         Ndërkohë, qytetet europiane vazhdojnë të presin refugjatë të rinj që largohen nga
                         fronti. Organizatat humanitare paralajmërojnë se financimi për strehim, ushqim dhe
                         mbështetje psikologjike është duke u tkurrur, madje edhe në vendet që kanë qenë
                         më bujare në muajt e parë të luftës.
                     </p>

                     <p>
                         Zyrtarë të Kombeve të Bashkuara u bënë thirrje palëve që të shmangin
                         përshkallëzimin e mëtejshëm dhe të rikthehen në tavolinën e bisedimeve.
                         Megjithatë, me qëndrimet që mbeten larg njëra-tjetrës, askush nuk pret një
                         zgjidhje të shpejtë.
                     </p>
                 </div>

                 <!-- Share bar at bottom (optional duplicate) -->
                 <div class="bf-article-share bf-article-share-bottom mt-4">
                     {{-- <span class="bf-share-label me-2">Ndaj artikullin</span> --}}
                     <button class="bf-share-pill" aria-label="Ndaj në Facebook">F</button>
                     <button class="bf-share-pill" aria-label="Ndaj në X">X</button>
                     <button class="bf-share-pill" aria-label="Kopjo linkun">↗</button>
                 </div>

                 <!-- Tags -->
                 <div class="bf-article-tags mt-3">
                     <span>Etiketa:</span>
                     <a href="#">Rusia</a>
                     <a href="#">Ukraina</a>
                     <a href="#">Konflikte</a>
                     <a href="#">Diplomaci</a>
                 </div>
             </article>

             <!-- RIGHT: RELATED / TRENDING / NEWSLETTER -->
             <aside class="col-lg-3">
                 <div class="bf-article-right position-sticky">

                     <!-- Newsletter promo -->
                     <section class="bf-newsletter-card mb-4">
                         <h6>Abonohu në analizat tona</h6>
                         <p>Merr në email përmbledhjen ditore me lajmet më të rëndësishme nga bota, në shqip.</p>
                         <form class="bf-newsletter-form">
                             <input type="email" class="form-control form-control-sm mb-2"
                                 placeholder="Adresa e email-it">
                             <button type="submit" class="btn btn-danger btn-sm w-100">Abonohu</button>
                         </form>
                     </section>

                     <!-- Related stories -->
                     <section class="bf-related-block mb-4">
                         <h6 class="bf-related-title">Të lidhura</h6>
                         <ul class="bf-related-list">
                             <li>
                                 <a href="#">
                                     BE diskuton sanksione të reja ndaj industrisë ruse të energjisë
                                 </a>
                                 <div class="bf-related-meta">Nga Redaksia • 2 orë më parë</div>
                             </li>
                             <li>
                                 <a href="#">
                                     Ukraina kërkon më shumë mbështetje ajrore nga aleatët
                                 </a>
                                 <div class="bf-related-meta">Nga Redaksia • 3 orë më parë</div>
                             </li>
                             <li>
                                 <a href="#">
                                     Analizë: A po lodhet Perëndimi nga lufta në Ukrainë?
                                 </a>
                                 <div class="bf-related-meta">Nga Redaksia • Dje</div>
                             </li>
                         </ul>
                     </section>

                     <!-- Trending now -->
                     <section class="bf-trending-block">
                         <h6 class="bf-related-title">Më të lexuarat</h6>
                         <ol class="bf-trending-list">
                             <li>
                                 <a href="#">
                                     Çfarë dimë deri tani për bisedimet sekrete Rusi–Perëndim
                                 </a>
                             </li>
                             <li>
                                 <a href="#">
                                     Raport: Kriza energjetike ndryshon hartën industriale të Europës
                                 </a>
                             </li>
                             <li>
                                 <a href="#">
                                     Migrimi i të rinjve shqiptarë drejt Perëndimit arrin rekorde të reja
                                 </a>
                             </li>
                             <li>
                                 <a href="#">
                                     AI në politikë: rreziqet e manipulimit të opinionit publik
                                 </a>
                             </li>
                             <li>
                                 <a href="#">
                                     Shëndeti mendor në kohë lufte dhe pasigurie ekonomike
                                 </a>
                             </li>
                         </ol>
                     </section>
                 </div>
             </aside>
         </div>
     </div>
 @endsection
