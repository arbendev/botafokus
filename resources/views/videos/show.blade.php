   @extends('layouts.app')

   @section('content')
       <div class="container-xl px-3">
           <div class="row g-4 bf-video-view-wrapper">

               {{-- MAIN COLUMN --}}
               <article class="col-lg-9 bf-video-view-main">

                   {{-- Breadcrumb / label --}}
                   <div class="bf-article-breadcrumb mb-2">
                       <a href="#" class="bf-category-label">VIDEO</a>
                       <span class="bf-article-section-separator">•</span>
                       <span class="bf-article-section-link">Botë</span>
                   </div>

                   {{-- Title --}}
                   <h1 class="bf-video-view-title">
                       Analizë: Si po ndryshon rendi global pas luftës në Ukrainë
                   </h1>

                   {{-- Meta + share --}}
                   <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
                       <div class="bf-article-meta">
                           <span class="bf-article-location">BRUKSEL</span>
                           <span>•</span>
                           <span>17 dhjetor 2025 • 20:06</span>
                           <span>•</span>
                           <span>Kohëzgjatja: 12:34</span>
                       </div>

                       <div class="bf-article-share">
                           <span class="bf-share-label me-2">Ndaj videon</span>
                           <button class="bf-share-pill" aria-label="Ndaj në Facebook">F</button>
                           <button class="bf-share-pill" aria-label="Ndaj në X">X</button>
                           <button class="bf-share-pill" aria-label="Kopjo linkun">↗</button>
                       </div>
                   </div>

                   {{-- Video player --}}
                   <div class="bf-video-player mb-3 ratio ratio-16x9">
                       {{-- Replace the src with your real video URL (YouTube, Vimeo, etc.) --}}
                       <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Video player"
                           allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                           allowfullscreen></iframe>
                   </div>

                   {{-- Under-video info --}}
                   <div class="bf-video-meta-extra mb-3">
                       <span class="bf-video-label">Burimi:</span> BotaFokus / Materiale agjencish & korrespondentësh në
                       terren
                   </div>

                   {{-- Short description --}}
                   <p class="bf-article-lead">
                       Në këtë video-analizë 12-minutëshe, shpjegojmë se si lufta në Ukrainë ka
                       riformësuar aleancat ushtarake, energjinë dhe tregtinë globale. Nga Brukseli në
                       Moskë, nga Uashingtoni në Pekin – rendi i ri po merr formë.
                   </p>

                   {{-- Key points --}}
                   <section class="bf-video-keypoints mb-4">
                       <h2 class="bf-video-subtitle">Pikat kryesore</h2>
                       <ul>
                           <li>Si janë ripërcaktuar prioritetet e NATO-s dhe BE-së pas pushtimit të Ukrainës.</li>
                           <li>Roli i energjisë dhe sanksioneve në riformësimin e ekonomisë globale.</li>
                           <li>A mund të krijohet një “botë e ndarë” mes blloqeve perëndimore dhe lindore.</li>
                           <li>Çfarë nënkupton kjo për vendet e vogla, përfshirë Shqipërinë dhe rajonin.</li>
                       </ul>
                   </section>

                   {{-- Short transcript / description --}}
                   <section class="bf-video-transcript">
                       <h2 class="bf-video-subtitle">Përmbledhje e zgjeruar</h2>
                       <p>
                           Segmenti i parë i videos fokusohet në mënyrën si ndryshoi diskursi publik në
                           kryeqytetet perëndimore pas fillimit të luftës. Aleanca Atlantike, që për vite me radhë
                           dukej e përgjumur, u rikthye në qendër të vëmendjes me një sërë vendimesh të
                           shpejta për zgjerim dhe rritje të buxheteve të mbrojtjes.
                       </p>
                       <p>
                           Më pas, video analizon efektet e sanksioneve ekonomike ndaj Rusisë dhe
                           pasojat e tyre tek tregjet e energjisë. Ekspertët shpjegojnë pse tranzicioni drejt
                           burimeve të rinovueshme po bëhet jo vetëm çështje klimatike, por edhe sigurie
                           kombëtare dhe gjeopolitike.
                       </p>
                       <p>
                           Në pjesën e fundit, shikohet se si këto zhvillime po ndikojnë vendet e vogla.
                           Analistët diskutojnë mundësitë dhe rreziqet për vendet e Ballkanit, të cilat duhet
                           të manovrojnë mes interesave të fuqive të mëdha, duke mos humbur orientimin
                           e tyre strategjik.
                       </p>
                   </section>

                   {{-- Tags --}}
                   <div class="bf-article-tags mt-4">
                       <span>Etiketa:</span>
                       <a href="#">Video</a>
                       <a href="#">Ukraina</a>
                       <a href="#">NATO</a>
                       <a href="#">Gjeopolitikë</a>
                   </div>
               </article>

               {{-- SIDEBAR --}}
               <aside class="col-lg-3">
                   <div class="bf-video-sidebar-page position-sticky">

                       {{-- Up next --}}
                       <section class="bf-trending-block mb-4">
                           <h6 class="bf-related-title">Video në vazhdim</h6>
                           <ul class="bf-video-upnext-list">
                               <li>
                                   <a href="#">
                                       Reportazh: Jeta në qytetet pranë vijës së frontit në Ukrainë
                                   </a>
                                   <span>7:42 • Luftë & Konflikte</span>
                               </li>
                               <li>
                                   <a href="#">
                                       Si po ndryshon tregtia globale pas sanksioneve të reja
                                   </a>
                                   <span>10:02 • Ekonomi & Jetesë</span>
                               </li>
                               <li>
                                   <a href="#">
                                       AI në politikë: rrezik për demokracinë apo mjet i ri?
                                   </a>
                                   <span>6:27 • Teknologji & Siguri</span>
                               </li>
                           </ul>
                       </section>

                       {{-- More from this topic --}}
                       <section class="bf-trending-block mb-4">
                           <h6 class="bf-related-title">Më shumë për rendin global</h6>
                           <ol class="bf-trending-list">
                               <li><a href="#">Dokumentar: Nga Lufta e Ftohtë te konfliktet hibride</a></li>
                               <li><a href="#">Analizë video: Roli i energjisë në gjeopolitikë</a></li>
                               <li><a href="#">Intervistë: Ekspertët flasin për të ardhmen e NATO-s</a></li>
                               <li><a href="#">Shpjegues: Çfarë janë sanksionet inteligjente?</a></li>
                           </ol>
                       </section>

                       {{-- Newsletter --}}
                       <section class="bf-newsletter-card mb-4">
                           <h6>Abonohu për video-analizat</h6>
                           <p>Merr në email përmbledhjen javore me videot tona më të rëndësishme analitike.</p>
                           <form class="bf-newsletter-form">
                               <input type="email" class="form-control form-control-sm mb-2"
                                   placeholder="Adresa e email-it">
                               <button type="submit" class="btn btn-danger btn-sm w-100">Abonohu</button>
                           </form>
                       </section>

                       {{-- Playlist small --}}
                       <section class="bf-video-playlist">
                           <h6 class="bf-related-title">Seri: "Konflikte dhe paqe"</h6>
                           <ul class="bf-video-playlist-list">
                               <li><a href="#">1. Si nis një konflikt modern?</a></li>
                               <li><a href="#">2. Diplomacia në prapaskenë</a></li>
                               <li><a href="#">3. Sanksionet dhe ekonomia</a></li>
                               <li><a href="#">4. Pasojat humanitare</a></li>
                           </ul>
                       </section>
                   </div>
               </aside>
           </div>
       </div>
   @endsection
