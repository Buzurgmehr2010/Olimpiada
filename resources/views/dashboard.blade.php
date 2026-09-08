<x-app-layout>
    @slot('title', 'Кабинет')

    <!-- Welcome -->
    <div class="dash-welcome">
        <div class="dash-welcome-content">
            <div class="dash-welcome-badge"><i class="bi bi-lightning-charge-fill"></i> Администратор</div>
            <h1>Привет, {{ Auth::user()->name }}!</h1>
            <p>Вот что происходит сегодня на Olympiada</p>
        </div>
        <div class="dash-welcome-actions">
            <a href="{{ route('admin.olympiads.create') }}" class="dash-welcome-btn">
                <i class="bi bi-plus-lg"></i> Новая олимпиада
            </a>
            <a href="/" class="dash-welcome-btn-outline" target="_blank">
                <i class="bi bi-eye"></i> Смотреть сайт
            </a>
        </div>
    </div>

    <!-- Stats -->
    <div class="dash-stats-grid">
        <div class="dash-stat-card">
            <div class="dash-stat-icon" style="background: linear-gradient(135deg, #eef2ff, #e0e7ff); color: #4f46e5;">
                <i class="bi bi-trophy"></i>
            </div>
            <div class="dash-stat-info">
                <div class="dash-stat-number">{{ $stats['olympiads'] ?? 0 }}</div>
                <div class="dash-stat-label">Олимпиад</div>
            </div>
            <div class="dash-stat-trend dash-stat-trend-up"><i class="bi bi-arrow-up"></i> +12%</div>
        </div>

        <div class="dash-stat-card">
            <div class="dash-stat-icon" style="background: linear-gradient(135deg, #ecfdf5, #d1fae5); color: #059669;">
                <i class="bi bi-people"></i>
            </div>
            <div class="dash-stat-info">
                <div class="dash-stat-number">{{ $stats['users'] ?? 0 }}</div>
                <div class="dash-stat-label">Пользователей</div>
            </div>
            <div class="dash-stat-trend dash-stat-trend-up"><i class="bi bi-arrow-up"></i> +8%</div>
        </div>

        <div class="dash-stat-card">
            <div class="dash-stat-icon" style="background: linear-gradient(135deg, #fef3c7, #fde68a); color: #d97706;">
                <i class="bi bi-globe-americas"></i>
            </div>
            <div class="dash-stat-info">
                <div class="dash-stat-number">{{ $stats['countries'] ?? 0 }}</div>
                <div class="dash-stat-label">Стран</div>
            </div>
            <div class="dash-stat-trend dash-stat-trend-neutral"><i class="bi bi-dash"></i> 0%</div>
        </div>

        <div class="dash-stat-card">
            <div class="dash-stat-icon" style="background: linear-gradient(135deg, #f3e8ff, #e9d5ff); color: #7c3aed;">
                <i class="bi bi-bar-chart-line"></i>
            </div>
            <div class="dash-stat-info">
                <div class="dash-stat-number">{{ ($stats['olympiads'] ?? 0) * 12 }}</div>
                <div class="dash-stat-label">Просмотров</div>
            </div>
            <div class="dash-stat-trend dash-stat-trend-up"><i class="bi bi-arrow-up"></i> +24%</div>
        </div>
    </div>

    <!-- Charts -->
    <div class="dash-charts-grid">
        <!-- Countries -->
        <div class="card">
            <div class="card-header">
                <h2><i class="bi bi-pie-chart" style="margin-right: 8px; color: #6366f1;"></i>По странам</h2>
            </div>
            <div class="card-body">
                @if(isset($countriesData) && count($countriesData) > 0)
                <div class="dash-chart-bars">
                    @php
                        $maxCount = max($countriesData);
                        $colors = ['#6366f1', '#8b5cf6', '#06b6d4', '#10b981', '#f59e0b', '#ef4444'];
                    @endphp
                    @foreach($countriesData as $country => $count)
                    <div class="dash-bar-item">
                        <div class="dash-bar-label">{{ $country }}</div>
                        <div class="dash-bar-track">
                            <div class="dash-bar-fill" style="width: {{ ($count / $maxCount) * 100 }}%; background: {{ $colors[$loop->index % count($colors)] }};">
                                <span>{{ $count }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="dash-empty-state">
                    <i class="bi bi-bar-chart"></i>
                    <p>Нет данных</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Levels -->
        <div class="card">
            <div class="card-header">
                <h2><i class="bi bi-graph-up" style="margin-right: 8px; color: #8b5cf6;"></i>По уровням</h2>
            </div>
            <div class="card-body">
                @if(isset($levelsData) && count($levelsData) > 0)
                <div class="dash-levels-chart">
                    @php
                        $total = array_sum($levelsData);
                        $levelColors = ['#6366f1', '#10b981', '#f59e0b', '#ef4444', '#06b6d4'];
                    @endphp
                    @foreach($levelsData as $level => $count)
                    <div class="dash-level-row">
                        <div class="dash-level-dot" style="background: {{ $levelColors[$loop->index % count($levelColors)] }};"></div>
                        <div class="dash-level-info">
                            <span class="dash-level-name">{{ $level }}</span>
                            <span class="dash-level-count">{{ $count }} олимпиад</span>
                        </div>
                        <div class="dash-level-bar-wrap">
                            <div class="dash-level-bar" style="width: {{ $total > 0 ? ($count / $total) * 100 : 0 }}%; background: {{ $levelColors[$loop->index % count($levelColors)] }};"></div>
                        </div>
                        <div class="dash-level-percent">{{ $total > 0 ? round(($count / $total) * 100) : 0 }}%</div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="dash-empty-state">
                    <i class="bi bi-graph-up"></i>
                    <p>Нет данных</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="dash-quick-actions">
        <a href="{{ route('admin.olympiads.create') }}" class="dash-quick-card">
            <div class="dash-quick-icon"><i class="bi bi-plus-circle"></i></div>
            <span>Добавить олимпиаду</span>
        </a>
        <a href="{{ route('admin.olympiads.index') }}" class="dash-quick-card">
            <div class="dash-quick-icon"><i class="bi bi-list-ul"></i></div>
            <span>Все олимпиады</span>
        </a>
        <a href="{{ route('admin.settings.index') }}" class="dash-quick-card">
            <div class="dash-quick-icon"><i class="bi bi-palette"></i></div>
            <span>Настройки</span>
        </a>
        <a href="{{ route('profile.edit') }}" class="dash-quick-card">
            <div class="dash-quick-icon"><i class="bi bi-person-gear"></i></div>
            <span>Профиль</span>
        </a>
    </div>

    <!-- Recent -->
    <div class="card">
        <div class="card-header">
            <h2><i class="bi bi-clock-history" style="margin-right: 8px; color: #6366f1;"></i>Последние олимпиады</h2>
            <a href="{{ route('admin.olympiads.index') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-arrow-right"></i> Все
            </a>
        </div>

        @if(isset($recentOlympiads) && count($recentOlympiads) > 0)
        <div style="overflow-x: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Название</th>
                        <th>Страна</th>
                        <th>Уровень</th>
                        <th>Дата</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOlympiads as $olympiad)
                    <tr>
                        <td class="dash-table-id">{{ $olympiad->id }}</td>
                        <td>
                            <div class="dash-table-name">
                                <div class="dash-table-avatar"><i class="bi bi-{{ $olympiad->icon ?? 'trophy' }}"></i></div>
                                <span style="font-weight: 600;">{{ $olympiad->title }}</span>
                            </div>
                        </td>
                        <td><span class="dash-table-country"><i class="bi bi-geo-alt" style="color: #6366f1;"></i> {{ $olympiad->country }}</span></td>
                        <td><span class="badge badge-primary">{{ $olympiad->level }}</span></td>
                        <td class="dash-table-secondary">{{ $olympiad->date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="dash-empty-state" style="padding: 60px 20px;">
            <i class="bi bi-inbox" style="font-size: 3rem;"></i>
            <p>Пока нет олимпиад</p>
            <a href="{{ route('admin.olympiads.create') }}" class="btn btn-primary btn-sm" style="margin-top: 12px;">
                <i class="bi bi-plus-lg"></i> Добавить первую
            </a>
        </div>
        @endif
    </div>
</x-app-layout>

<style>
    .dash-welcome {
        display: flex; align-items: center; justify-content: space-between;
        padding: 36px 40px; background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-radius: 20px; margin-bottom: 28px; color: white;
        position: relative; overflow: hidden;
    }
    .dash-welcome::before {
        content: ''; position: absolute; top: -50%; right: -10%; width: 300px; height: 300px;
        background: rgba(255,255,255,0.1); border-radius: 50%;
    }
    .dash-welcome::after {
        content: ''; position: absolute; bottom: -60%; left: 30%; width: 200px; height: 200px;
        background: rgba(255,255,255,0.08); border-radius: 50%;
    }
    .dash-welcome-content { position: relative; z-index: 1; }
    .dash-welcome-badge {
        display: inline-flex; align-items: center; gap: 6px;
        background: rgba(255,255,255,0.15); padding: 5px 14px; border-radius: 8px;
        font-size: 0.78rem; font-weight: 600; margin-bottom: 12px;
    }
    .dash-welcome h1 { font-family: 'Montserrat', sans-serif; font-size: 1.6rem; font-weight: 900; margin-bottom: 4px; }
    .dash-welcome p { opacity: 0.85; font-size: 0.95rem; }
    .dash-welcome-actions { display: flex; gap: 12px; position: relative; z-index: 1; }
    .dash-welcome-btn {
        display: inline-flex; align-items: center; gap: 8px;
        background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.3);
        color: white; padding: 10px 22px; border-radius: 12px; font-weight: 600; font-size: 0.9rem;
        text-decoration: none; transition: all 0.2s;
    }
    .dash-welcome-btn:hover { background: rgba(255,255,255,0.3); }
    .dash-welcome-btn-outline {
        display: inline-flex; align-items: center; gap: 8px;
        background: transparent; border: 1px solid rgba(255,255,255,0.3);
        color: white; padding: 10px 22px; border-radius: 12px; font-weight: 600; font-size: 0.9rem;
        text-decoration: none; transition: all 0.2s;
    }
    .dash-welcome-btn-outline:hover { background: rgba(255,255,255,0.1); }

    .dash-stats-grid {
        display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 28px;
    }
    .dash-stat-card {
        background: var(--bg-card); border-radius: 16px; padding: 24px;
        border: 1px solid var(--border); display: flex; align-items: center; gap: 16px;
        transition: all 0.3s; position: relative; overflow: hidden;
    }
    .dash-stat-card:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(0,0,0,0.08); }
    .dash-stat-icon { width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; flex-shrink: 0; }
    .dash-stat-info { flex: 1; }
    .dash-stat-number { font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-primary); line-height: 1; }
    .dash-stat-label { color: var(--text-secondary); font-size: 0.82rem; margin-top: 2px; }
    .dash-stat-trend { font-size: 0.78rem; font-weight: 700; padding: 4px 10px; border-radius: 8px; position: absolute; top: 16px; right: 16px; }
    .dash-stat-trend-up { background: rgba(16,185,129,0.1); color: #059669; }
    .dash-stat-trend-down { background: rgba(239,68,68,0.1); color: #dc2626; }
    .dash-stat-trend-neutral { background: rgba(100,116,139,0.1); color: #64748b; }

    .dash-charts-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 28px; }

    .dash-chart-bars { display: flex; flex-direction: column; gap: 12px; }
    .dash-bar-item { display: flex; align-items: center; gap: 12px; }
    .dash-bar-label { width: 80px; font-size: 0.82rem; font-weight: 600; color: var(--text-primary); flex-shrink: 0; text-align: right; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .dash-bar-track { flex: 1; height: 24px; background: var(--bg-hover); border-radius: 8px; overflow: hidden; }
    .dash-bar-fill { height: 100%; border-radius: 8px; display: flex; align-items: center; justify-content: flex-end; padding-right: 10px; transition: width 1.2s ease; min-width: 36px; }
    .dash-bar-fill span { color: white; font-weight: 700; font-size: 0.78rem; }

    .dash-levels-chart { display: flex; flex-direction: column; gap: 16px; }
    .dash-level-row { display: flex; align-items: center; gap: 12px; }
    .dash-level-dot { width: 12px; height: 12px; border-radius: 50%; flex-shrink: 0; }
    .dash-level-info { flex: 1; min-width: 0; }
    .dash-level-name { font-size: 0.9rem; font-weight: 600; color: var(--text-primary); display: block; }
    .dash-level-count { font-size: 0.78rem; color: var(--text-secondary); }
    .dash-level-bar-wrap { width: 80px; height: 8px; background: var(--bg-hover); border-radius: 4px; overflow: hidden; flex-shrink: 0; }
    .dash-level-bar { height: 100%; border-radius: 4px; transition: width 1s ease; }
    .dash-level-percent { font-size: 0.88rem; font-weight: 700; color: #6366f1; width: 40px; text-align: right; flex-shrink: 0; }

    .dash-quick-actions { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px; }
    .dash-quick-card {
        display: flex; flex-direction: column; align-items: center; gap: 12px;
        padding: 28px 16px; background: var(--bg-card); border: 1px solid var(--border);
        border-radius: 16px; text-decoration: none; transition: all 0.3s; text-align: center;
    }
    .dash-quick-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(0,0,0,0.08); border-color: rgba(99,102,241,0.3); }
    .dash-quick-icon { width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.3rem; }
    .dash-quick-card span { font-size: 0.88rem; font-weight: 600; color: var(--text-primary); }

    .dash-table-id { font-family: 'Montserrat', sans-serif; font-weight: 700; color: var(--text-muted); }
    .dash-table-name { display: flex; align-items: center; gap: 12px; }
    .dash-table-avatar { width: 38px; height: 38px; border-radius: 10px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1rem; }
    .dash-table-country { display: inline-flex; align-items: center; gap: 6px; }
    .dash-table-secondary { color: var(--text-secondary); }

    .dash-empty-state { text-align: center; padding: 40px 20px; color: var(--text-muted); }
    .dash-empty-state i { font-size: 2.5rem; display: block; margin-bottom: 12px; }

    @media (max-width: 992px) {
        .dash-stats-grid { grid-template-columns: repeat(2, 1fr); }
        .dash-charts-grid { grid-template-columns: 1fr; }
        .dash-quick-actions { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 768px) {
        .dash-welcome { flex-direction: column; gap: 20px; text-align: center; padding: 28px 20px; }
        .dash-welcome-actions { flex-wrap: wrap; justify-content: center; }
        .dash-stats-grid { grid-template-columns: 1fr; }
        .dash-quick-actions { grid-template-columns: 1fr; }
    }
</style>
