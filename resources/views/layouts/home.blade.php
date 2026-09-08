@php
    $theme = \App\Models\Setting::getValue('theme', 'light');
@endphp
<!DOCTYPE html>
<html lang="ru" data-theme="{{ $theme }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Olympiada')</title>
    <meta name="description" content="Olympiada — найди подходящую олимпиаду по предмету, уровню и стране">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Montserrat:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🏆</text></svg>">
    <style>
        :root {
            --primary: {{ $settings['primary_color'] ?? '#6366f1' }};
            --primary-rgb: 99,102,241;
            --accent: #8b5cf6;
            --cyan: #06b6d4;
            --bg-body: linear-gradient(135deg, {{ $settings['background_color'] ?? '#f8fafc' }} 0%, {{ $settings['background_gradient'] ?? '#e2e8f0' }} 100%);
            --bg-header: rgba(255,255,255,0.85);
            --bg-card: #ffffff;
            --bg-footer: #0f172a;
            --text-body: #1e293b;
            --text-secondary: #64748b;
            --text-heading: #0f172a;
            --border: #e2e8f0;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
            --shadow: 0 4px 6px -1px rgba(0,0,0,0.07), 0 2px 4px -2px rgba(0,0,0,0.05);
            --shadow-lg: 0 10px 25px -3px rgba(0,0,0,0.08), 0 4px 6px -4px rgba(0,0,0,0.05);
            --shadow-xl: 0 20px 40px -5px rgba(0,0,0,0.1);
            --radius: 12px;
            --radius-lg: 20px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        [data-theme="dark"] {
            --bg-body: #0f172a;
            --bg-header: rgba(15,23,42,0.9);
            --bg-card: #1e293b;
            --bg-footer: #020617;
            --text-body: #e2e8f0;
            --text-secondary: #94a3b8;
            --text-heading: #f1f5f9;
            --border: #334155;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.2);
            --shadow: 0 4px 6px rgba(0,0,0,0.3);
            --shadow-lg: 0 10px 25px rgba(0,0,0,0.4);
            --shadow-xl: 0 20px 40px rgba(0,0,0,0.5);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; font-size: 16px; }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-body);
            background: var(--bg-body);
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
            transition: background 0.4s, color 0.4s;
        }

        .container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }

        /* Scroll Reveal */
        .reveal { opacity: 0; transform: translateY(30px); transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1); }
        .reveal.visible { opacity: 1; transform: translateY(0); }

        /* Header */
        header {
            background: var(--bg-header);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
            transition: var(--transition);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 0;
        }

        .logo { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .logo-icon {
            width: 42px; height: 42px; border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 900; font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(var(--primary-rgb), 0.3);
        }
        .logo-text { font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.4rem; color: var(--text-heading); }
        .logo-text span { color: var(--primary); }

        .nav-links { display: flex; gap: 6px; align-items: center; }
        .nav-link {
            text-decoration: none; color: var(--text-secondary); font-weight: 500; font-size: 0.88rem;
            padding: 8px 18px; border-radius: 10px; transition: var(--transition); position: relative;
        }
        .nav-link:hover { color: var(--primary); background: rgba(var(--primary-rgb), 0.06); }
        .nav-link.active { color: var(--primary); background: rgba(var(--primary-rgb), 0.1); font-weight: 600; }

        .theme-btn {
            display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; padding: 0; border-radius: 12px;
            background: var(--bg-card); border: 1px solid var(--border); color: var(--text-secondary);
            font-size: 1.1rem; cursor: pointer; transition: var(--transition); text-decoration: none;
        }
        .theme-btn:hover { border-color: var(--primary); color: var(--primary); background: rgba(var(--primary-rgb), 0.06); transform: scale(1.05); }

        .auth-btn {
            padding: 9px 22px; border-radius: 12px; font-weight: 600; font-size: 0.88rem;
            text-decoration: none; transition: var(--transition); display: inline-flex; align-items: center; gap: 8px;
            border: none; cursor: pointer; font-family: 'Inter', sans-serif;
        }
        .auth-btn-login {
            color: var(--text-secondary); background: var(--bg-card);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
        }
        .auth-btn-login:hover { border-color: var(--primary); color: var(--primary); box-shadow: 0 4px 12px rgba(var(--primary-rgb), 0.15); transform: translateY(-1px); }
        .auth-btn-register {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white; box-shadow: 0 4px 14px rgba(var(--primary-rgb), 0.35);
            font-weight: 700;
        }
        .auth-btn-register:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(var(--primary-rgb), 0.45); }
        .auth-btn-logout {
            color: var(--text-secondary); border: 1px solid var(--border); background: var(--bg-card);
            box-shadow: var(--shadow-sm);
            padding: 9px 14px;
        }
        .auth-btn-logout:hover { border-color: var(--primary); color: var(--primary); box-shadow: 0 4px 12px rgba(var(--primary-rgb), 0.15); transform: translateY(-1px); }

        .auth-btn-name {
            color: var(--text-secondary); border: 1px solid var(--border); background: var(--bg-card);
            box-shadow: var(--shadow-sm);
            font-weight: 600;
            padding: 9px 18px;
        }
        .auth-btn-name:hover { border-color: var(--primary); color: var(--primary); box-shadow: 0 4px 12px rgba(var(--primary-rgb), 0.15); transform: translateY(-1px); }

        .header-actions { display: flex; align-items: center; gap: 8px; margin-left: 16px; }
        .header-divider { width: 1px; height: 28px; background: var(--border); margin: 0 4px; }

        /* Mobile */
        .mobile-toggle { display: none; background: none; border: none; color: var(--text-heading); font-size: 1.5rem; cursor: pointer; padding: 8px; }

        .mobile-menu {
            display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0;
            background: var(--bg-card); z-index: 200; padding: 24px; flex-direction: column;
        }
        .mobile-menu.open { display: flex; }
        .mobile-menu-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px; }
        .mobile-close { background: none; border: none; color: var(--text-heading); font-size: 1.5rem; cursor: pointer; padding: 8px; }
        .mobile-menu .nav-link { display: block; padding: 14px 16px; font-size: 1.05rem; border-bottom: 1px solid var(--border); border-radius: 0; display: flex; align-items: center; gap: 12px; }
        .mobile-menu .auth-btn { display: block; text-align: center; margin-top: 12px; padding: 14px; font-size: 1rem; border-radius: 12px; }

        /* Header improvements */
        header {
            background: var(--bg-header);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
            transition: var(--transition);
        }
        header.scrolled {
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
        }

        /* Footer */
        footer {
            background: var(--bg-footer);
            color: white;
            padding: 80px 0 0;
            transition: background 0.4s;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 48px;
            margin-bottom: 60px;
        }

        .footer-brand p {
            color: rgba(255,255,255,0.6);
            font-size: 0.95rem;
            line-height: 1.7;
            margin-top: 16px;
            max-width: 320px;
        }

        .footer-social {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .footer-social a {
            width: 42px; height: 42px; border-radius: 12px;
            background: rgba(255,255,255,0.08);
            display: flex; align-items: center; justify-content: center;
            color: rgba(255,255,255,0.6); text-decoration: none; transition: var(--transition);
            font-size: 1.1rem;
        }
        .footer-social a:hover { background: var(--primary); color: white; transform: translateY(-2px); }

        .footer-col h4 {
            font-size: 1rem; font-weight: 700; margin-bottom: 20px;
            color: white; letter-spacing: 0.02em;
        }

        .footer-col ul { list-style: none; }
        .footer-col li { margin-bottom: 10px; }
        .footer-col a {
            color: rgba(255,255,255,0.5); text-decoration: none; font-size: 0.9rem;
            transition: var(--transition); display: inline-flex; align-items: center; gap: 8px;
        }
        .footer-col a:hover { color: white; transform: translateX(4px); }
        .footer-col a i { font-size: 0.8rem; }

        .footer-bottom {
            text-align: center; padding: 24px 0;
            border-top: 1px solid rgba(255,255,255,0.08);
            color: rgba(255,255,255,0.4); font-size: 0.85rem;
        }

        .footer-bottom a { color: var(--primary); text-decoration: none; }

        @media (max-width: 992px) {
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 768px) {
            .nav-links { display: none !important; }
            .mobile-toggle { display: block; }
            .footer-grid { grid-template-columns: 1fr; gap: 32px; }
        }

        /* Pagination */
        .custom-pagination { display: flex; justify-content: center; padding: 20px 0; }
        .pagination-list {
            display: flex; gap: 8px; list-style: none; margin: 0; padding: 0;
            background: var(--bg-card); border: 1px solid var(--border);
            border-radius: 14px; padding: 8px 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .pagination-list .page-item { display: flex; align-items: center; justify-content: center; }
        .pagination-list .page-link {
            display: flex; align-items: center; justify-content: center;
            min-width: 42px; height: 42px; padding: 0 14px; border-radius: 10px;
            font-weight: 600; font-size: 0.92rem; color: var(--text-secondary);
            text-decoration: none; transition: all 0.25s ease; background: transparent;
        }
        .pagination-list .page-link:hover:not(.disabled):not(.active) {
            background: rgba(var(--primary-rgb), 0.08); color: var(--primary);
            transform: translateY(-1px);
        }
        .pagination-list .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white; box-shadow: 0 4px 12px rgba(var(--primary-rgb), 0.35);
            font-weight: 700;
        }
        .pagination-list .page-item.disabled .page-link {
            color: var(--text-muted); opacity: 0.4; cursor: not-allowed; background: transparent;
        }
        .pagination-list .page-link i { font-size: 1rem; }
    </style>
    @stack('styles')
</head>
<body x-data="{ mobileOpen: false }">
    <header>
        <div class="container header-container">
            <a href="/" class="logo">
                <div class="logo-icon">O</div>
                <div class="logo-text">Olympiada<span>.</span></div>
            </a>
            <nav class="nav-links">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}"><i class="bi bi-house-door"></i> Главная</a>
                <a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}"><i class="bi bi-book"></i> О нас</a>
                <a href="/olympiads" class="nav-link {{ request()->is('olympiads') ? 'active' : '' }}"><i class="bi bi-trophy"></i> Олимпиады</a>
                <a href="/contact" class="nav-link {{ request()->is('contact') ? 'active' : '' }}"><i class="bi bi-envelope"></i> Контакты</a>
                <a href="/faq" class="nav-link {{ request()->is('faq') ? 'active' : '' }}"><i class="bi bi-question-circle"></i> FAQ</a>
            </nav>
            <div class="header-actions">
                <form action="{{ route('toggle-theme') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="theme-btn" title="Сменить тему">
                        @if($theme === 'dark')
                            <i class="bi bi-sun"></i>
                        @else
                            <i class="bi bi-moon"></i>
                        @endif
                    </button>
                </form>
                <div class="header-divider"></div>
                @auth
                    <a href="{{ route('profile.edit') }}" class="auth-btn auth-btn-name"><i class="bi bi-person-circle"></i> {{ Auth::user()->name }}</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="auth-btn auth-btn-logout" title="Выйти"><i class="bi bi-box-arrow-right"></i></button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="auth-btn auth-btn-login">Войти</a>
                    <a href="{{ route('register') }}" class="auth-btn auth-btn-register">Начать</a>
                @endauth
            </div>
            <button @click="mobileOpen = true" class="mobile-toggle">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="mobile-menu" :class="{ 'open': mobileOpen }">
        <div class="mobile-menu-header">
            <a href="/" class="logo">
                <div class="logo-icon">O</div>
                <div class="logo-text">Olympiada<span>.</span></div>
            </a>
            <button @click="mobileOpen = false" class="mobile-close">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <a href="/" class="nav-link" @click="mobileOpen = false" style="gap:12px;"><i class="bi bi-house-door"></i> Главная</a>
        <a href="/about" class="nav-link" @click="mobileOpen = false" style="gap:12px;"><i class="bi bi-book"></i> О нас</a>
        <a href="/olympiads" class="nav-link" @click="mobileOpen = false" style="gap:12px;"><i class="bi bi-trophy"></i> Олимпиады</a>
        <a href="/contact" class="nav-link" @click="mobileOpen = false" style="gap:12px;"><i class="bi bi-envelope"></i> Контакты</a>
        <a href="/faq" class="nav-link" @click="mobileOpen = false" style="gap:12px;"><i class="bi bi-question-circle"></i> FAQ</a>
        <form action="{{ route('toggle-theme') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link" style="border:none; background:none; width:100%; text-align:left; cursor:pointer; display:flex; align-items:center; gap:10px;">
                @if($theme === 'dark')
                    <i class="bi bi-sun"></i> Светлая тема
                @else
                    <i class="bi bi-moon"></i> Тёмная тема
                @endif
            </button>
        </form>
        @auth
            <a href="{{ route('profile.edit') }}" class="auth-btn auth-btn-name" @click="mobileOpen = false" style="margin-top:12px; gap:10px; justify-content:center;"><i class="bi bi-person-circle"></i> {{ Auth::user()->name }}</a>
            <form action="{{ route('logout') }}" method="POST" style="margin-top: 12px;">
                @csrf
                <button type="submit" class="auth-btn auth-btn-logout" style="width:100%; text-align:center; padding:14px; font-size:1rem; border: 1px solid var(--border); gap:10px; justify-content:center;"><i class="bi bi-box-arrow-right"></i> Выйти</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="auth-btn auth-btn-login" style="text-align:center;" @click="mobileOpen = false"><i class="bi bi-box-arrow-in-right"></i> Войти</a>
            <a href="{{ route('register') }}" class="auth-btn auth-btn-register" @click="mobileOpen = false"><i class="bi bi-rocket-takeoff"></i> Начать</a>
        @endauth
    </div>

    @yield('content')

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="/" class="logo" style="margin-bottom: 8px;">
                        <div class="logo-icon">O</div>
                        <div class="logo-text" style="color:white;">Olympiada<span>.</span></div>
                    </a>
                    <p>Платформа для поиска и участия в олимпиадах со всего мира. Найди свой путь к победе!</p>
                    <div class="footer-social">
                        <a href="#"><i class="bi bi-telegram"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                        <a href="#"><i class="bi bi-envelope"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Платформа</h4>
                    <ul>
                        <li><a href="/about"><i class="bi bi-chevron-right"></i> О нас</a></li>
                        <li><a href="/olympiads"><i class="bi bi-chevron-right"></i> Олимпиады</a></li>
                        <li><a href="/contact"><i class="bi bi-chevron-right"></i> Контакты</a></li>
                        <li><a href="/faq"><i class="bi bi-chevron-right"></i> FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Олимпиады</h4>
                    <ul>
                        <li><a href="/olympiads"><i class="bi bi-chevron-right"></i> По предметам</a></li>
                        <li><a href="/olympiads"><i class="bi bi-chevron-right"></i> По странам</a></li>
                        <li><a href="/olympiads"><i class="bi bi-chevron-right"></i> Международные</a></li>
                        <li><a href="/olympiads"><i class="bi bi-chevron-right"></i> Популярные</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Поддержка</h4>
                    <ul>
                        <li><a href="/faq"><i class="bi bi-chevron-right"></i> Частые вопросы</a></li>
                        <li><a href="/contact"><i class="bi bi-chevron-right"></i> Связаться</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Политика</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Условия</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} <a href="/">Olympiada</a>. Все права защищены. Сделано с <i class="bi bi-heart-fill" style="color:#ef4444;"></i></p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Scroll Reveal
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

            document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

            // Header scroll effect
            let header = document.querySelector('header');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
