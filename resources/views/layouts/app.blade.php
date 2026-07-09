<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $agentCompany) - {{ $agentCompany }}</title>
    <meta name="description" content="@yield('description', 'Property Agent - Rumah Mampu Milik & Landed Property')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <i class="fas fa-home"></i>
                <span>{{ $agentCompany }}</span>
            </a>
            <button class="navbar-toggle" id="navbarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="navbar-menu" id="navbarMenu">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Utama</a>
                <a href="{{ route('projects.new') }}" class="nav-link {{ request()->routeIs('projects.new') ? 'active' : '' }}">Projek Baru</a>
                <a href="{{ route('projects.landed') }}" class="nav-link {{ request()->routeIs('projects.landed') ? 'active' : '' }}">Rumah Landed</a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Hubungi</a>
                <a href="https://wa.me/{{ $agentPhone }}" class="btn btn-whatsapp-nav" target="_blank">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3><i class="fas fa-home"></i> {{ $agentCompany }}</h3>
                    <p>{{ $agentTagline }}</p>
                    <div class="footer-social">
                        <a href="https://wa.me/{{ $agentPhone }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-telegram"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Pautan Pantas</h4>
                    <a href="{{ route('home') }}">Utama</a>
                    <a href="{{ route('projects.new') }}">Projek Baru</a>
                    <a href="{{ route('projects.landed') }}">Rumah Landed</a>
                    <a href="{{ route('about') }}">Tentang Kami</a>
                    <a href="{{ route('contact') }}">Hubungi</a>
                </div>
                <div class="footer-contact">
                    <h4>Hubungi Kami</h4>
                    <p><i class="fas fa-user"></i> {{ $agentName }}</p>
                    <p><i class="fab fa-whatsapp"></i> <a href="https://wa.me/{{ $agentPhone }}">+{{ $agentPhone }}</a></p>
                    <p><i class="fas fa-envelope"></i> {{ $agentEmail }}</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} {{ $agentCompany }}. Hak Cipta Terpelihara.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
