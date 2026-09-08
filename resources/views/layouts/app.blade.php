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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Montserrat:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        :root {
            --primary: #6366f1;
            --primary-rgb: 99,102,241;
            --accent: #8b5cf6;
            --bg-body: #f0f2f5;
            --bg-card: #ffffff;
            --bg-header: rgba(255,255,255,0.85);
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --text-heading: #0f172a;
            --text-muted: #94a3b8;
            --border: #e2e8f0;
            --border-input: #e5e7eb;
            --shadow: 0 1px 3px rgba(0,0,0,0.04), 0 1px 2px rgba(0,0,0,0.06);
        }
        [data-theme="dark"] {
            --bg-body: #0f172a;
            --bg-card: #1e293b;
            --bg-header: rgba(15,23,42,0.9);
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --text-heading: #f1f5f9;
            --text-muted: #64748b;
            --border: #334155;
            --border-input: #475569;
            --shadow: 0 1px 3px rgba(0,0,0,0.2), 0 1px 2px rgba(0,0,0,0.3);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-body);
            color: var(--text-primary);
            min-height: 100vh;
            transition: background 0.3s, color 0.3s;
        }

        /* Header */
        .admin-header {
            background: var(--bg-header);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            position: sticky; top: 0; z-index: 100;
            transition: background 0.3s;
        }
        .admin-header-inner {
            max-width: 1200px; margin: 0 auto;
            display: flex; justify-content: space-between; align-items: center;
            padding: 14px 24px;
        }
        .admin-logo { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .admin-logo-icon {
            width: 38px; height: 38px; border-radius: 10px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 900; font-size: 1rem;
        }
        .admin-logo-text { font-family: 'Montserrat', sans-serif; font-weight: 800; font-size: 1.2rem; color: var(--text-heading); }
        .admin-logo-text span { color: var(--primary); }

        .admin-nav { display: flex; gap: 6px; align-items: center; }
        .admin-nav-link {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 8px 16px; border-radius: 10px; font-weight: 500; font-size: 0.9rem;
            color: var(--text-secondary); text-decoration: none; transition: all 0.2s;
        }
        .admin-nav-link:hover { color: var(--primary); background: rgba(var(--primary-rgb), 0.06); }
        .admin-nav-link.active { color: var(--primary); background: rgba(var(--primary-rgb), 0.1); font-weight: 600; }

        .admin-header-actions { display: flex; gap: 10px; align-items: center; }
        .admin-theme-btn {
            display: inline-flex; align-items: center; justify-content: center;
            width: 38px; height: 38px; border-radius: 10px;
            background: var(--bg-card); border: 1px solid var(--border);
            color: var(--text-secondary); font-size: 1.05rem;
            cursor: pointer; transition: all 0.2s;
        }
        .admin-theme-btn:hover { border-color: var(--primary); color: var(--primary); }

        .admin-user-btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 8px 18px; border-radius: 10px;
            background: var(--bg-card); border: 1px solid var(--border);
            color: var(--text-secondary); font-weight: 600; font-size: 0.9rem;
            text-decoration: none; transition: all 0.2s;
        }
        .admin-user-btn:hover { border-color: var(--primary); color: var(--primary); }

        .admin-logout-btn {
            display: inline-flex; align-items: center; justify-content: center;
            width: 38px; height: 38px; border-radius: 10px;
            background: var(--bg-card); border: 1px solid var(--border);
            color: var(--text-secondary); font-size: 1.05rem;
            cursor: pointer; transition: all 0.2s;
        }
        .admin-logout-btn:hover { border-color: var(--primary); color: var(--primary); }

        /* Content */
        .admin-content { max-width: 1200px; margin: 0 auto; padding: 32px 24px; }

        /* Cards */
        .card {
            background: var(--bg-card); border-radius: 16px; border: 1px solid var(--border);
            box-shadow: var(--shadow); overflow: hidden; transition: background 0.3s, border-color 0.3s;
        }
        .card-header {
            padding: 20px 24px; border-bottom: 1px solid var(--border);
            display: flex; justify-content: space-between; align-items: center;
        }
        .card-header h2 { font-size: 1.1rem; font-weight: 700; color: var(--text-primary); }
        .card-body { padding: 24px; }

        /* Table */
        .table { width: 100%; border-collapse: collapse; }
        .table th {
            padding: 14px 20px; text-align: left; font-size: 0.78rem; font-weight: 700;
            color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em;
            background: var(--bg-body); border-bottom: 1px solid var(--border);
        }
        .table td { padding: 16px 20px; border-bottom: 1px solid var(--border); font-size: 0.9rem; }
        .table tr:hover { background: rgba(var(--primary-rgb), 0.02); }
        .table tr:last-child td { border-bottom: none; }

        /* Buttons */
        .btn {
            display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px;
            border-radius: 10px; font-size: 0.9rem; font-weight: 600;
            font-family: 'Inter', sans-serif; cursor: pointer;
            transition: all 0.2s; text-decoration: none; border: none;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white; box-shadow: 0 2px 8px rgba(var(--primary-rgb), 0.3);
        }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 4px 16px rgba(var(--primary-rgb), 0.4); }
        .btn-secondary { background: var(--bg-card); color: var(--text-secondary); border: 1px solid var(--border); }
        .btn-secondary:hover { background: var(--bg-body); border-color: var(--primary); color: var(--primary); }
        .btn-danger { background: #ef4444; color: white; }
        .btn-danger:hover { background: #dc2626; }
        .btn-sm { padding: 7px 14px; font-size: 0.82rem; border-radius: 8px; }

        /* Forms */
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-weight: 600; color: var(--text-secondary); margin-bottom: 8px; font-size: 0.88rem; }
        .form-input, .form-select, .form-textarea {
            width: 100%; padding: 12px 16px; border: 2px solid var(--border-input);
            border-radius: 10px; font-size: 0.95rem; font-family: 'Inter', sans-serif;
            transition: all 0.2s; background: var(--bg-card); color: var(--text-primary);
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none; border-color: var(--primary); box-shadow: 0 0 0 4px rgba(var(--primary-rgb), 0.1);
        }
        .form-textarea { min-height: 120px; resize: vertical; }

        /* Alerts */
        .alert { padding: 14px 20px; border-radius: 12px; margin-bottom: 20px; font-weight: 500; font-size: 0.9rem; }
        .alert-success { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert-error { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }

        /* Badges */
        .badge { display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 0.78rem; font-weight: 600; }
        .badge-primary { background: rgba(var(--primary-rgb), 0.1); color: var(--primary); }

        /* Pagination */
        .custom-pagination { display: flex; justify-content: center; padding: 20px 0; }
        .pagination-list { display: flex; gap: 8px; list-style: none; margin: 0; padding: 0; }
        .page-link {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 42px; height: 42px; padding: 0 14px; border-radius: 12px;
            font-size: 0.9rem; font-weight: 600; text-decoration: none;
            transition: all 0.25s; border: 2px solid var(--border);
            background: var(--bg-card); color: var(--text-secondary); cursor: pointer;
        }
        .page-link:hover { border-color: var(--primary); color: var(--primary); background: rgba(var(--primary-rgb), 0.06); transform: translateY(-2px); box-shadow: 0 4px 12px rgba(var(--primary-rgb), 0.15); }
        .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white; border-color: transparent; box-shadow: 0 4px 14px rgba(var(--primary-rgb), 0.35);
        }
        .page-item.disabled .page-link { opacity: 0.35; pointer-events: none; background: var(--bg-body); }

        @media (max-width: 768px) {
            .admin-nav { display: none; }
            .admin-header-inner { padding: 12px 16px; }
            .admin-content { padding: 20px 16px; }
        }
    </style>
</head>
<body data-theme="{{ $theme }}">
    <header class="admin-header">
        <div class="admin-header-inner">
            <a href="/" class="admin-logo">
                <div class="admin-logo-icon">O</div>
                <div class="admin-logo-text">Olympiada<span>.</span></div>
            </a>

            <nav class="admin-nav">
                <a href="{{ route('dashboard') }}" class="admin-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="bi bi-grid-1x2"></i> Кабинет</a>
                @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.olympiads.index') }}" class="admin-nav-link {{ request()->routeIs('admin.olympiads.*') ? 'active' : '' }}"><i class="bi bi-trophy"></i> Олимпиады</a>
                <a href="{{ route('admin.settings.index') }}" class="admin-nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"><i class="bi bi-palette"></i> Настройки</a>
                @endif
            </nav>

            <div class="admin-header-actions">
                <form action="{{ route('toggle-theme') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="admin-theme-btn" title="Сменить тему">
                        @if($theme === 'dark')
                            <i class="bi bi-sun"></i>
                        @else
                            <i class="bi bi-moon"></i>
                        @endif
                    </button>
                </form>
                <a href="{{ route('profile.edit') }}" class="admin-user-btn">
                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                </a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="admin-logout-btn" title="Выйти">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <main class="admin-content">
        {{ $slot }}
    </main>
</body>
</html>
