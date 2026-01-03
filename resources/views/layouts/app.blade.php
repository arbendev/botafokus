<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Bota Fokus'))</title>

    @stack('seo')

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="/style.css" rel="stylesheet">

    @livewireStyles
</head>

<body>
    <div id="app">

        {{-- ================= HEADER ================= --}}
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

                        {{-- Navigation categories --}}
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @php
                                $navCategories = \App\Models\Category::where('active', true)
                                    ->orderBy('order_index')
                                    ->get();
                            @endphp

                            @foreach ($navCategories as $cat)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categories.show', $cat->slug) }}">
                                        {{ $cat->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        {{-- Search + editor --}}
                        <div class="d-flex gap-2 align-items-center">
<form class="d-flex" method="GET" action="{{ route('search.index') }}">
                                <div class="input-group input-group-sm">
                                    <input class="form-control px-3 rounded-pill-start border-light" type="search" name="q"
                                        placeholder="Kërko..." aria-label="Kërko">
                                    <button class="btn btn-light border-light text-secondary px-3 rounded-pill-end" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                    </button>
                                </div>
                            </form>

                            {{-- 
                            @auth
                                <a class="btn btn-outline-secondary btn-sm" href="{{ route('editor.articles.index') }}">
                                    Editor
                                </a>
                            @else
                                <a class="btn btn-outline-secondary btn-sm" href="{{ route('login') }}">
                                    Login
                                </a>
                            @endauth
                            --}}
                        </div>

                    </div>
                </div>
            </nav>
        </header>

        {{-- ================= MAIN CONTENT ================= --}}
        <main class="bf-main py-4">

            {{-- Livewire content --}}
            {{ $slot ?? '' }}

            {{-- Blade fallback (non-Livewire pages) --}}
            @yield('content')

        </main>

        {{-- ================= FOOTER ================= --}}
        <footer class="bf-footer">

            {{-- TOP AREA --}}
            <div class="bf-footer-top">
                <div class="container-xl px-3 py-5">
                    <div class="row gy-4">

                        {{-- Brand --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="bf-footer-logo">
                                <img src="/bota-focus.png" style="height:68px;" class="img-fluid">
                            </div>

                            <p class="bf-footer-tagline">
                                Platformë lajmesh dhe analizash globale në gjuhën shqipe, me fokus
                                tek saktësia,
                                konteksti dhe verifikimi i fakteve.
                            </p>

                            <p class="bf-footer-mini">
                                BotaFokus.com përkthen, kuron dhe shpjegon ngjarjet kryesore
                                botërore për lexuesit
                                shqiptarë, kudo që ndodhen.
                            </p>
                        </div>

                        {{-- Sections --}}
                        <div class="col-6 col-md-3 col-lg-2">
                            <div class="bf-footer-heading">Seksione</div>
                            <ul class="bf-footer-list">
                                <li><a href="/">Ballina</a></li>
                                @foreach ($navCategories ?? [] as $cat)
                                    <li>
                                        <a href="{{ route('categories.show', $cat->slug) }}">
                                            {{ $cat->name }}
                                        </a>
                                    </li>
                                @endforeach
                                <li><a href="/videos">Video</a></li>
                            </ul>
                        </div>

                        {{-- About --}}
                        <div class="col-6 col-md-3 col-lg-3">
                            <div class="bf-footer-heading">Rreth BotaFokus</div>
                            <ul class="bf-footer-list">
                                <li><a href="#">Rreth nesh</a></li>
                                <li><a href="#">Parimet editoriale</a></li>
                                <li><a href="#">Udhëzimet për burimet</a></li>
                                <li><a href="#">Raporto një pasaktësi</a></li>
                                <li><a href="#">Kontakt</a></li>
                            </ul>
                        </div>

                        {{-- Newsletter --}}
                        <div class="col-md-6 col-lg-3">
                            <div class="bf-footer-heading">Qëndro i informuar</div>
                            <p class="bf-footer-mini mb-2">
                                Merr përmbledhjen ditore me lajmet më të rëndësishme nga bota.
                            </p>

                            <form class="bf-footer-newsletter mb-3">
                                <div class="input-group input-group-sm">
                                    <input type="email" class="form-control" placeholder="Adresa e email-it">
                                    <button type="submit" class="btn btn-danger">
                                        Abonohu
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            {{-- BOTTOM BAR --}}
            <div class="bf-footer-bottom">
                <div class="container-xl px-3 py-3">
                    <div class="row gy-2 align-items-center">
                        <div class="col-md-6">
                            © {{ now()->year }} BotaFokus. Të gjitha të drejtat e rezervuara.
                        </div>
                        <div class="col-md-6 text-md-end">
                            <a href="#">Kushtet</a>
                            <a href="#">Privatësia</a>
                            <a href="#">Parimet editoriale</a>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

    </div>

    @livewireScripts
</body>

</html>
