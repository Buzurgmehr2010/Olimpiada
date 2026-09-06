@php
    $theme = \App\Models\Setting::getValue('theme', 'light');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ $theme }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Olympiada')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Montserrat:wght@600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root {
            --primary: #6366f1;
            --primary-rgb: 99,102,241;
            --accent: #8b5cf6;
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-body: #1e293b;
            --text-secondary: #64748b;
            --text-heading: #0f172a;
            --border: #e2e8f0;
            --shadow: 0 4px 6px -1px rgba(0,0,0,0.07);
            --shadow-lg: 0 20px 40px -5px rgba(0,0,0,0.1);
        }

        [data-theme="dark"] {
            --bg-body: #0f172a;
            --bg-card: #1e293b;
            --text-body: #e2e8f0;
            --text-secondary: #94a3b8;
            --text-heading: #f1f5f9;
            --border: #334155;
            --shadow: 0 4px 6px rgba(0,0,0,0.3);
            --shadow-lg: 0 20px 40px rgba(0,0,0,0.5);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-body);
            min-height: 100vh;
            transition: background 0.3s;
        }

        .auth-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
        }

        /* Left Side - Branding */
        .auth-brand {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .auth-brand-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.15;
        }

        .auth-brand-orb-1 { width: 400px; height: 400px; background: #6366f1; top: -100px; left: -100px; }
        .auth-brand-orb-2 { width: 300px; height: 300px; background: #8b5cf6; bottom: -80px; right: -80px; }
        .auth-brand-orb-3 { width: 250px; height: 250px; background: #06b6d4; top: 50%; left: 50%; transform: translate(-50%, -50%); }

        .auth-brand-content { position: relative; z-index: 1; text-align: center; max-width: 400px; }

        .auth-brand-icon {
            width: 80px; height: 80px; border-radius: 24px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 900; font-size: 2rem;
            margin: 0 auto 32px;
            box-shadow: 0 8px 32px rgba(99,102,241,0.4);
        }

        .auth-brand h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: white;
            margin-bottom: 16px;
            line-height: 1.1;
        }

        .auth-brand p {
            color: rgba(255,255,255,0.6);
            font-size: 1.05rem;
            line-height: 1.7;
        }

        .auth-brand-features {
            margin-top: 48px;
            text-align: left;
        }

        .auth-brand-feature {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 0;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }

        .auth-brand-feature:last-child { border-bottom: none; }

        .auth-brand-feature-icon {
            width: 40px; height: 40px; border-radius: 12px;
            background: rgba(99,102,241,0.15);
            display: flex; align-items: center; justify-content: center;
            color: #818cf8; font-size: 1rem;
            flex-shrink: 0;
        }

        .auth-brand-feature span {
            color: rgba(255,255,255,0.7);
            font-size: 0.92rem;
        }

        /* Right Side - Form */
        .auth-form-side {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
        }

        .auth-container { width: 100%; max-width: 420px; }

        .auth-header { margin-bottom: 36px; }

        .auth-header h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--text-heading);
            margin-bottom: 8px;
        }

        .auth-header p {
            color: var(--text-secondary);
            font-size: 1rem;
        }

        .auth-header a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .auth-header a:hover { text-decoration: underline; }

        .form-group { margin-bottom: 20px; }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--text-body);
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border);
            border-radius: 14px;
            font-size: 1rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s;
            background: var(--bg-card);
            color: var(--text-body);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(var(--primary-rgb), 0.1);
        }

        .form-input::placeholder { color: var(--text-secondary); opacity: 0.5; }

        .form-error { color: #ef4444; font-size: 0.85rem; margin-top: 6px; }

        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
        }

        .form-check input[type="checkbox"] {
            width: 18px; height: 18px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .form-check label {
            color: var(--text-secondary);
            font-size: 0.9rem;
            cursor: pointer;
        }

        .auth-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 16px;
            border-radius: 14px;
            font-size: 1rem;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            border: none;
        }

        .auth-btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            box-shadow: 0 4px 16px rgba(var(--primary-rgb), 0.3);
        }

        .auth-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(var(--primary-rgb), 0.4);
        }

        .auth-btn-secondary {
            background: var(--bg-card);
            color: var(--text-body);
            border: 2px solid var(--border);
        }

        .auth-btn-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .auth-divider {
            display: flex;
            align-items: center;
            gap: 16px;
            margin: 24px 0;
            color: var(--text-secondary);
            font-size: 0.85rem;
        }

        .auth-divider::before, .auth-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .auth-links {
            text-align: center;
            margin-top: 28px;
        }

        .auth-links a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.92rem;
        }

        .auth-links a:hover { text-decoration: underline; }

        .auth-links p {
            color: var(--text-secondary);
            margin-bottom: 8px;
            font-size: 0.92rem;
        }

        .status-message {
            padding: 14px 18px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-weight: 500;
            font-size: 0.92rem;
        }

        .status-success {
            background: rgba(16,185,129,0.1);
            color: #059669;
            border: 1px solid rgba(16,185,129,0.2);
        }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 24px;
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.92rem;
            transition: color 0.2s;
        }

        .back-link:hover { color: var(--primary); }

        @media (max-width: 992px) {
            .auth-layout { grid-template-columns: 1fr; }
            .auth-brand { display: none; }
            .auth-form-side { padding: 40px 24px; }
        }
    </style>
</head>
<body>
    <div class="auth-layout">
        <!-- Left Side - Branding -->
        <div class="auth-brand">
            <div class="auth-brand-orb auth-brand-orb-1"></div>
            <div class="auth-brand-orb auth-brand-orb-2"></div>
            <div class="auth-brand-orb auth-brand-orb-3"></div>

            <div class="auth-brand-content">
                <div class="auth-brand-icon">O</div>
                <h1>Olympiada</h1>
                <p>Платформа для поиска и участия в олимпиадах со всего мира</p>

                <div class="auth-brand-features">
                    <div class="auth-brand-feature">
                        <div class="auth-brand-feature-icon"><i class="bi bi-trophy"></i></div>
                        <span>250+ олимпиад из 50+ стран</span>
                    </div>
                    <div class="auth-brand-feature">
                        <div class="auth-brand-feature-icon"><i class="bi bi-search"></i></div>
                        <span>Умный поиск по предметам</span>
                    </div>
                    <div class="auth-brand-feature">
                        <div class="auth-brand-feature-icon"><i class="bi bi-graph-up"></i></div>
                        <span>Аналитика и прогресс</span>
                    </div>
                    <div class="auth-brand-feature">
                        <div class="auth-brand-feature-icon"><i class="bi bi-award"></i></div>
                        <span>Сертификаты участника</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="auth-form-side">
            <div class="auth-container">
                <a href="/" class="back-link" style="margin-bottom: 32px; justify-content: flex-start;">
                    <i class="bi bi-arrow-left"></i> На главную
                </a>

                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
