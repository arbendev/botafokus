<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bota Fokus') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="/style.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header class="bf-header">
            <nav class="navbar navbar-expand-lg navbar-dark bg-bf-dark fixed-top">
                <div class="container-xl px-3">
                    {{-- Brand --}}
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/bota-focus.png" style="height:50px;" class="img-fluid">
                    </a>

                    {{-- Toggler --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bfNavbar"
                        aria-controls="bfNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    {{-- Collapsing content --}}
                    <div class="collapse navbar-collapse" id="bfNavbar">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @php
                                $navCategories = \App\Models\Category::where('active', true)
                                    ->orderBy('order_index')
                                    ->get();
                            @endphp

                            @foreach ($navCategories as $cat)
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('categories.show', $cat->slug) }}">{{ $cat->name }}</a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="d-flex gap-2 align-items-center">
                            <form class="d-flex" method="GET" action="{{ url('/search') }}">
                                <input class="form-control form-control-sm me-2" type="search" name="q"
                                    placeholder="Search">
                                <button class="btn btn-outline-dark btn-sm" type="submit">Search</button>
                            </form>

                            @auth
                                <a class="btn btn-outline-secondary btn-sm"
                                    href="{{ route('editor.articles.index') }}">Editor</a>
                            @else
                                <a class="btn btn-outline-secondary btn-sm" href="{{ route('login') }}">Login</a>
                            @endauth
                        </div>

                        {{-- Main menu --}}
                        {{-- 
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/categories">Botë</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Politikë</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Luftë & Konflikte</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Ekonomi & Jetesë</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Migrim & Diaspora</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Teknologji & Siguri</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Shëndet</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Kulturë</a></li>
                        </ul>


                        <form class="d-flex align-items-center gap-2 mt-3 mt-lg-0" role="search">
                            <input class="form-control form-control-sm bf-search-input" type="search"
                                placeholder="Kërko..." aria-label="Kërko">
                            <a href="#" class="bf-login-link">Kyçu</a>
                        </form>
                                                --}}
                    </div>
                </div>
            </nav>
        </header>

        <main class="bf-main py-4">
            @yield('content')
        </main>

        <footer class="bf-footer">
            {{-- TOP AREA --}}
            <div class="bf-footer-top">
                <div class="container-xl px-3 py-5">
                    <div class="row gy-4">
                        {{-- Brand / mission --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="bf-footer-logo"><img src="/bota-focus.png" style="height:68px;"
                                    class="img-fluid"></div>
                            <p class="bf-footer-tagline">
                                Platformë lajmesh dhe analizash globale në gjuhën shqipe, me fokus tek saktësia,
                                konteksti dhe verifikimi i fakteve.
                            </p>
                            <p class="bf-footer-mini">
                                BotaFokus.com përkthen, kuron dhe shpjegon ngjarjet kryesore botërore për lexuesit
                                shqiptarë,
                                kudo që ndodhen.
                            </p>
                        </div>

                        {{-- Sections --}}
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="bf-footer-heading">Seksione</div>
                            <ul class="bf-footer-list">
                                <li><a href="#">Ballina</a></li>
                                <li><a href="#">Botë</a></li>
                                <li><a href="#">Politikë</a></li>
                                <li><a href="#">Luftë & Konflikte</a></li>
                                <li><a href="#">Ekonomi & Jetesë</a></li>
                                <li><a href="#">Migrim & Diaspora</a></li>
                                <li><a href="#">Teknologji & Siguri</a></li>
                                <li><a href="#">Video</a></li>
                            </ul>
                        </div>

                        {{-- About / editorial --}}
                        <div class="col-6 col-md-3 col-lg-3">
                            <div class="bf-footer-heading">Rreth BotaFokus</div>
                            <ul class="bf-footer-list">
                                <li><a href="#">Rreth nesh</a></li>
                                <li><a href="#">Parimet editoriale</a></li>
                                <li><a href="#">Udhëzimet për burimet</a></li>
                                <li><a href="#">Raporto një pasaktësi</a></li>
                                <li><a href="#">Reklamimi & partneritetet</a></li>
                                <li><a href="#">Kontakt</a></li>
                            </ul>
                        </div>

                        {{-- Newsletter + socials --}}
                        <div class="col-md-6 col-lg-3">
                            <div class="bf-footer-heading">Qëndro i informuar</div>
                            <p class="bf-footer-mini mb-2">
                                Merr përmbledhjen ditore me lajmet më të rëndësishme nga bota, të përkthyera dhe të
                                shpjeguara në shqip.
                            </p>
                            <form class="bf-footer-newsletter mb-3">
                                <div class="input-group input-group-sm">
                                    <input type="email" class="form-control" placeholder="Adresa e email-it">
                                    <button type="submit" class="btn btn-danger">Abonohu</button>
                                </div>
                            </form>
                            <div class="bf-footer-socials mt-5">
                                <a href="#" aria-label="Facebook">F</a>
                                <a href="#" aria-label="X / Twitter">X</a>
                                <a href="#" aria-label="YouTube">▶</a>
                                <a href="#" aria-label="Instagram">IG</a>
                                <a href="#" aria-label="LinkedIn">in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- BOTTOM BAR --}}
            <div class="bf-footer-bottom">
                <div class="container-xl px-3 py-3">
                    <div class="row gy-2 align-items-center">
                        <div class="col-md-6">
                            <div class="bf-footer-copy">
                                © 2025 BotaFokus. Të gjitha të drejtat e rezervuara.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-wrap justify-content-md-end gap-3 bf-footer-bottom-links">
                                <a href="#">Kushtet e përdorimit</a>
                                <a href="#">Privatësia & cookies</a>
                                <a href="#">Parimet editoriale</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>
