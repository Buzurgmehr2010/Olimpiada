@php
    $theme = \App\Models\Setting::getValue('theme', 'light');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Olympiada')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Montserrat:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --bg-main: #f0f2f5;
            --bg-card: #ffffff;
            --bg-sidebar: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            --bg-topbar: #ffffff;
            --bg-input: #ffffff;
            --bg-hover: #f8fafc;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --text-muted: #94a3b8;
            --border: #f1f5f9;
            --border-input: #e5e7eb;
            --shadow: 0 1px 3px rgba(0,0,0,0.04), 0 1px 2px rgba(0,0,0,0.06);
        }

        [data-theme="dark"] {
            --bg-main: #0f172a;
            --bg-card: #1e293b;
            --bg-sidebar: linear-gradient(180deg, #1e293b 0%, #020617 100%);
            --bg-topbar: #1e293b;
            --bg-input: #334155;
            --bg-hover: #334155;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --border: #334155;
            --border-input: #475569;
            --shadow: 0 1px 3px rgba(0,0,0,0.2), 0 1px 2px rgba(0,0,0,0.3);
        }

        body { font-family: 'Inter', sans-serif; background: var(--bg-main); min-height: 100vh; color: var(--text-primary); transition: background 0.3s, color 0.3s; }

        /* Sidebar */
        .sidebar {
            position: fixed; left: 0; top: 0; bottom: 0; width: 260px;
            background: var(--bg-sidebar); z-index: 100; overflow-y: auto;
            transition: transform 0.3s ease;
        }

        .sidebar-logo { display: flex; align-items: center; gap: 12px; padding: 24px 24px 32px; text-decoration: none; }
        .sidebar-logo-icon { width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; color: white; font-weight: 800; font-size: 1.1rem; }
        .sidebar-logo-text { font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.3rem; color: white; }
        .sidebar-logo-text span { color: #818cf8; }

        .sidebar-section { padding: 0 12px; margin-bottom: 8px; }
        .sidebar-section-title { padding: 8px 16px; font-size: 0.7rem; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em; }

        .sidebar-link {
            display: flex; align-items: center; gap: 12px; padding: 11px 16px; border-radius: 10px;
            text-decoration: none; font-size: 0.92rem; font-weight: 500; color: #94a3b8; transition: all 0.2s;
        }
        .sidebar-link:hover { background: rgba(255,255,255,0.06); color: white; }
        .sidebar-link.active { background: rgba(99,102,241,0.2); color: #a5b4fc; box-shadow: inset 3px 0 0 #6366f1; }
        .sidebar-link i { font-size: 1.15rem; width: 22px; text-align: center; }

        .sidebar-divider { height: 1px; background: rgba(255,255,255,0.06); margin: 12px 16px; }

        .sidebar-user {
            position: absolute; bottom: 0; left: 0; right: 0; padding: 16px 20px;
            background: rgba(0,0,0,0.2); display: flex; align-items: center; justify-content: space-between;
        }
        .sidebar-user-info { display: flex; align-items: center; gap: 12px; }
        .sidebar-user-avatar { width: 38px; height: 38px; border-radius: 10px; background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 0.9rem; }
        .sidebar-user-name { color: #e2e8f0; font-weight: 600; font-size: 0.85rem; }
        .sidebar-user-role { color: #64748b; font-size: 0.75rem; }

        .sidebar-logout { background: none; border: none; color: #64748b; cursor: pointer; padding: 8px; border-radius: 8px; transition: all 0.2s; }
        .sidebar-logout:hover { background: rgba(239,68,68,0.15); color: #f87171; }
        .sidebar-logout i { font-size: 1.1rem; }

        /* Theme Toggle */
        .theme-toggle {
            background: rgba(255,255,255,0.06); border: none; border-radius: 10px;
            padding: 10px 16px; display: flex; align-items: center; gap: 10px;
            cursor: pointer; transition: all 0.2s; width: 100%; margin-top: 4px;
            color: #94a3b8; font-size: 0.92rem; font-weight: 500;
        }
        .theme-toggle:hover { background: rgba(255,255,255,0.1); color: white; }
        .theme-toggle i { font-size: 1.15rem; width: 22px; text-align: center; }

        /* Main */
        .main-content { margin-left: 260px; min-height: 100vh; }

        .topbar {
            background: var(--bg-topbar); padding: 0 32px; height: 70px;
            display: flex; align-items: center; justify-content: space-between;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05); position: sticky; top: 0; z-index: 50;
            border-bottom: 1px solid var(--border); transition: background 0.3s;
        }

        .topbar-title { font-family: 'Montserrat', sans-serif; font-weight: 700; font-size: 1.25rem; color: var(--text-primary); }
        .topbar-actions { display: flex; align-items: center; gap: 12px; }

        .btn {
            display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 10px;
            font-size: 0.9rem; font-weight: 600; font-family: 'Inter', sans-serif; cursor: pointer;
            transition: all 0.2s; text-decoration: none; border: none;
        }
        .btn-primary { background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white; box-shadow: 0 2px 8px rgba(99,102,241,0.3); }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 4px 16px rgba(99,102,241,0.4); }
        .btn-secondary { background: var(--bg-card); color: var(--text-secondary); border: 1px solid var(--border-input); }
        .btn-secondary:hover { background: var(--bg-hover); }
        .btn-danger { background: #ef4444; color: white; }
        .btn-danger:hover { background: #dc2626; }
        .btn-sm { padding: 7px 14px; font-size: 0.82rem; border-radius: 8px; }
        .btn-icon { width: 38px; height: 38px; padding: 0; justify-content: center; border-radius: 10px; }

        .page-content { padding: 32px; }

        .card { background: var(--bg-card); border-radius: 16px; box-shadow: var(--shadow); overflow: hidden; border: 1px solid var(--border); transition: background 0.3s, border-color 0.3s; }
        .card-header { padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; }
        .card-header h2 { font-size: 1.1rem; font-weight: 700; color: var(--text-primary); }
        .card-body { padding: 24px; }

        .table { width: 100%; border-collapse: collapse; }
        .table th { padding: 14px 20px; text-align: left; font-size: 0.78rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em; background: var(--bg-hover); border-bottom: 1px solid var(--border); }
        .table td { padding: 16px 20px; border-bottom: 1px solid var(--border); font-size: 0.9rem; color: var(--text-primary); }
        .table tr:hover { background: var(--bg-hover); }
        .table tr:last-child td { border-bottom: none; }

        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-weight: 600; color: var(--text-secondary); margin-bottom: 8px; font-size: 0.88rem; }
        .form-input, .form-select, .form-textarea {
            width: 100%; padding: 12px 16px; border: 2px solid var(--border-input); border-radius: 10px;
            font-size: 0.95rem; font-family: 'Inter', sans-serif; transition: all 0.2s;
            background: var(--bg-input); color: var(--text-primary);
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus { outline: none; border-color: #6366f1; box-shadow: 0 0 0 4px rgba(99,102,241,0.1); }
        .form-textarea { min-height: 120px; resize: vertical; }
        .form-hint { color: var(--text-muted); font-size: 0.82rem; margin-top: 6px; }

        .alert { padding: 14px 20px; border-radius: 12px; margin-bottom: 20px; font-weight: 500; font-size: 0.9rem; }
        .alert-success { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert-error { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }

        .badge { display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 0.78rem; font-weight: 600; }
        .badge-primary { background: #eef2ff; color: #4f46e5; }

        [data-theme="dark"] .badge-primary { background: rgba(99,102,241,0.2); color: #a5b4fc; }
        [data-theme="dark"] .alert-success { background: rgba(16,185,129,0.15); color: #34d399; border-color: rgba(16,185,129,0.3); }
        [data-theme="dark"] .alert-error { background: rgba(239,68,68,0.15); color: #f87171; border-color: rgba(239,68,68,0.3); }

        [data-theme="dark"] .stat-icon { filter: brightness(0.85); }
        [data-theme="dark"] .table tr:hover { background: var(--bg-hover); }

        /* Custom Pagination */
        .custom-pagination { display: flex; justify-content: center; }
        .pagination-list { display: flex; gap: 8px; align-items: center; list-style: none; margin: 0; padding: 0; }
        .page-item { }
        .page-link {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 42px; height: 42px; padding: 0 14px; border-radius: 12px;
            font-size: 0.9rem; font-weight: 600; text-decoration: none;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid var(--border);
            background: var(--bg-card);
            color: var(--text-secondary);
            cursor: pointer;
        }
        .page-link:hover {
            border-color: #6366f1;
            color: #6366f1;
            background: rgba(99,102,241,0.06);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99,102,241,0.15);
        }
        .page-item.active .page-link {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
            border-color: transparent;
            box-shadow: 0 4px 14px rgba(99,102,241,0.35);
        }
        .page-item.disabled .page-link {
            opacity: 0.35;
            pointer-events: none;
            background: var(--bg-hover);
        }
        .pagination .disabled { opacity: 0.4; pointer-events: none; }

        .stat-card { background: var(--bg-card); border-radius: 16px; padding: 24px; border: 1px solid var(--border); box-shadow: var(--shadow); transition: all 0.3s; }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(0,0,0,0.08); }
        .stat-icon { width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; margin-bottom: 16px; }
        .stat-number { font-size: 2rem; font-weight: 800; color: var(--text-primary); font-family: 'Montserrat', sans-serif; line-height: 1; }
        .stat-label { color: var(--text-secondary); font-size: 0.88rem; margin-top: 4px; font-weight: 500; }

        .color-picker-group { margin-bottom: 24px; }
        .color-picker-label { font-weight: 600; color: var(--text-secondary); margin-bottom: 10px; font-size: 0.88rem; }
        .color-picker-row { display: flex; align-items: center; gap: 16px; }
        .color-picker-input { width: 56px; height: 56px; border: 3px solid var(--border-input); border-radius: 12px; cursor: pointer; padding: 2px; background: var(--bg-input); }
        .color-picker-input::-webkit-color-swatch { border-radius: 8px; border: none; }
        .color-picker-input::-webkit-color-swatch-wrapper { padding: 0; }
        .color-picker-hex { padding: 12px 16px; border: 2px solid var(--border-input); border-radius: 10px; font-family: 'Inter', monospace; font-size: 0.95rem; color: var(--text-primary); background: var(--bg-hover); width: 120px; text-align: center; font-weight: 600; }
        .preview-box { height: 140px; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 1.1rem; color: white; transition: all 0.3s; border: 2px dashed var(--border-input); }

        @media (max-width: 1024px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-content { margin-left: 0; }
            .mobile-toggle { display: flex !important; }
        }
        @media (min-width: 1025px) { .mobile-toggle { display: none !important; } }
    </style>
</head>
<body x-data="{ sidebarOpen: false }" data-theme="{{ $theme }}">
    <aside class="sidebar" :class="{ 'open': sidebarOpen }">
        <a href="{{ route('home') }}" class="sidebar-logo">
            <div class="sidebar-logo-icon">O</div>
            <div class="sidebar-logo-text">Olympiada<span>.</span></div>
        </a>

        <div class="sidebar-section">
            <div class="sidebar-section-title">Основное</div>
            <a href="{{ route('home') }}" class="sidebar-link">
                <i class="bi bi-house-door"></i> Главная
            </a>
            <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2"></i> Панель управления
            </a>
        </div>

        @if(Auth::user()->role === 'admin')
        <div class="sidebar-section">
            <div class="sidebar-section-title">Управление</div>
            <a href="{{ route('admin.olympiads.index') }}" class="sidebar-link {{ request()->routeIs('admin.olympiads.*') ? 'active' : '' }}">
                <i class="bi bi-trophy"></i> Олимпиады
            </a>
            <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="bi bi-palette"></i> Настройки
            </a>
        </div>
        @endif

        <div class="sidebar-divider"></div>

        <div class="sidebar-section">
            <div class="sidebar-section-title">Аккаунт</div>
            <a href="{{ route('profile.edit') }}" class="sidebar-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <i class="bi bi-person-gear"></i> Профиль
            </a>

            <!-- Theme Toggle -->
            <form action="{{ route('toggle-theme') }}" method="POST">
                @csrf
                <button type="submit" class="theme-toggle">
                    @if($theme === 'dark')
                        <i class="bi bi-sun"></i> Светлая тема
                    @else
                        <i class="bi bi-moon"></i> Тёмная тема
                    @endif
                </button>
            </form>
        </div>

        <div class="sidebar-user">
            <div class="sidebar-user-info">
                <div class="sidebar-user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                <div>
                    <div class="sidebar-user-name">{{ Auth::user()->name }}</div>
                    <div class="sidebar-user-role">{{ Auth::user()->role === 'admin' ? 'Администратор' : 'Пользователь' }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-logout" title="Выйти">
                    <i class="bi bi-box-arrow-left"></i>
                </button>
            </form>
        </div>
    </aside>

    <div x-show="sidebarOpen" @click="sidebarOpen = false"
         style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 90;"
         x-transition.opacity></div>

    <div class="main-content">
        <div class="topbar">
            <div style="display: flex; align-items: center; gap: 16px;">
                <button @click="sidebarOpen = !sidebarOpen" class="mobile-toggle btn btn-icon btn-secondary" style="display: none;">
                    <i class="bi bi-list" style="font-size: 1.3rem;"></i>
                </button>
                <span class="topbar-title">@yield('title', 'Панель управления')</span>
            </div>
            <div class="topbar-actions">
                <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-eye"></i> На сайт
                </a>
            </div>
        </div>

        <div class="page-content">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
