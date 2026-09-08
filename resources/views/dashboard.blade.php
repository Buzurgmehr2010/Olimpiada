<x-app-layout>
    @slot('title', 'Кабинет')

    <!-- Welcome -->
    <div style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #06b6d4 100%); border-radius: 20px; padding: 36px 40px; margin-bottom: 28px; color: white; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -50%; right: -10%; width: 300px; height: 300px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
        <div style="position: absolute; bottom: -40%; left: -20%; width: 200px; height: 200px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>
        <div style="position: relative; z-index: 1; display: flex; align-items: center; justify-content: space-between;">
            <div>
                <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.15); padding: 5px 14px; border-radius: 8px; font-size: 0.78rem; font-weight: 600; margin-bottom: 12px;">
                    <i class="bi bi-lightning-charge-fill"></i> Администратор
                </div>
                <h1 style="font-family: 'Montserrat', sans-serif; font-size: 1.6rem; font-weight: 900; margin-bottom: 4px;">Привет, {{ Auth::user()->name }}!</h1>
                <p style="opacity: 0.85; font-size: 0.95rem;">Вот что происходит сегодня на Olympiada</p>
            </div>
            <a href="{{ route('admin.olympiads.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.3); color: white; padding: 10px 22px; border-radius: 12px; font-weight: 600; font-size: 0.9rem; text-decoration: none; transition: all 0.2s;">
                <i class="bi bi-plus-lg"></i> Новая олимпиада
            </a>
        </div>
    </div>

    <!-- Stats -->
    <div class="dash-stats-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 28px;">
        <div class="dash-stat-card" style="background: var(--bg-card); border-radius: 16px; padding: 24px; border: 1px solid var(--border); display: flex; align-items: center; gap: 16px; transition: all 0.3s; position: relative; overflow: hidden;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, #eef2ff, #e0e7ff); display: flex; align-items: center; justify-content: center; color: #4f46e5; font-size: 1.3rem; flex-shrink: 0;"><i class="bi bi-trophy"></i></div>
            <div style="flex: 1;">
                <div style="font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-heading); line-height: 1;">{{ $stats['olympiads'] ?? 0 }}</div>
                <div style="color: var(--text-secondary); font-size: 0.82rem; margin-top: 2px;">Олимпиад</div>
            </div>
            <div style="font-size: 0.78rem; font-weight: 700; padding: 4px 10px; border-radius: 8px; background: rgba(16,185,129,0.1); color: #059669; position: absolute; top: 16px; right: 16px;"><i class="bi bi-arrow-up"></i> +12%</div>
        </div>
        <div class="dash-stat-card" style="background: var(--bg-card); border-radius: 16px; padding: 24px; border: 1px solid var(--border); display: flex; align-items: center; gap: 16px; transition: all 0.3s; position: relative; overflow: hidden;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, #ecfdf5, #d1fae5); display: flex; align-items: center; justify-content: center; color: #059669; font-size: 1.3rem; flex-shrink: 0;"><i class="bi bi-people"></i></div>
            <div style="flex: 1;">
                <div style="font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-heading); line-height: 1;">{{ $stats['users'] ?? 0 }}</div>
                <div style="color: var(--text-secondary); font-size: 0.82rem; margin-top: 2px;">Пользователей</div>
            </div>
            <div style="font-size: 0.78rem; font-weight: 700; padding: 4px 10px; border-radius: 8px; background: rgba(16,185,129,0.1); color: #059669; position: absolute; top: 16px; right: 16px;"><i class="bi bi-arrow-up"></i> +8%</div>
        </div>
        <div class="dash-stat-card" style="background: var(--bg-card); border-radius: 16px; padding: 24px; border: 1px solid var(--border); display: flex; align-items: center; gap: 16px; transition: all 0.3s; position: relative; overflow: hidden;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, #fef3c7, #fde68a); display: flex; align-items: center; justify-content: center; color: #d97706; font-size: 1.3rem; flex-shrink: 0;"><i class="bi bi-globe-americas"></i></div>
            <div style="flex: 1;">
                <div style="font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-heading); line-height: 1;">{{ $stats['countries'] ?? 0 }}</div>
                <div style="color: var(--text-secondary); font-size: 0.82rem; margin-top: 2px;">Стран</div>
            </div>
            <div style="font-size: 0.78rem; font-weight: 700; padding: 4px 10px; border-radius: 8px; background: rgba(100,116,139,0.1); color: #64748b; position: absolute; top: 16px; right: 16px;"><i class="bi bi-dash"></i> 0%</div>
        </div>
        <div class="dash-stat-card" style="background: var(--bg-card); border-radius: 16px; padding: 24px; border: 1px solid var(--border); display: flex; align-items: center; gap: 16px; transition: all 0.3s; position: relative; overflow: hidden;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, #f3e8ff, #e9d5ff); display: flex; align-items: center; justify-content: center; color: #7c3aed; font-size: 1.3rem; flex-shrink: 0;"><i class="bi bi-bar-chart-line"></i></div>
            <div style="flex: 1;">
                <div style="font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-heading); line-height: 1;">{{ ($stats['olympiads'] ?? 0) * 12 }}</div>
                <div style="color: var(--text-secondary); font-size: 0.82rem; margin-top: 2px;">Просмотров</div>
            </div>
            <div style="font-size: 0.78rem; font-weight: 700; padding: 4px 10px; border-radius: 8px; background: rgba(16,185,129,0.1); color: #059669; position: absolute; top: 16px; right: 16px;"><i class="bi bi-arrow-up"></i> +24%</div>
        </div>
    </div>

    <!-- Charts -->
    <div class="dash-charts-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 28px;">
        <!-- Countries -->
        <div class="card" style="background: var(--bg-card); border-radius: 16px; border: 1px solid var(--border); overflow: hidden;">
            <div class="card-header" style="padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
                <h2 style="font-size: 1rem; font-weight: 700; color: var(--text-heading);"><i class="bi bi-pie-chart" style="margin-right: 8px; color: #6366f1;"></i>По странам</h2>
                <span style="font-size: 0.78rem; color: var(--text-muted);">{{ $countriesData ? count($countriesData) : 0 }} стран</span>
            </div>
            <div class="card-body" style="padding: 24px; position: relative;">
                @if(isset($countriesData) && count($countriesData) > 0)
                <div style="position: relative; height: 260px;">
                    <canvas id="countriesChart"></canvas>
                </div>
                @else
                <div style="text-align: center; padding: 40px; color: var(--text-muted);"><i class="bi bi-pie-chart" style="font-size: 2rem; display: block; margin-bottom: 8px;"></i><p>Нет данных</p></div>
                @endif
            </div>
        </div>
        <!-- Levels -->
        <div class="card" style="background: var(--bg-card); border-radius: 16px; border: 1px solid var(--border); overflow: hidden;">
            <div class="card-header" style="padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
                <h2 style="font-size: 1rem; font-weight: 700; color: var(--text-heading);"><i class="bi bi-graph-up" style="margin-right: 8px; color: #8b5cf6;"></i>По уровням</h2>
                <span style="font-size: 0.78rem; color: var(--text-muted);">{{ $levelsData ? count($levelsData) : 0 }} уровней</span>
            </div>
            <div class="card-body" style="padding: 24px; position: relative;">
                @if(isset($levelsData) && count($levelsData) > 0)
                <div style="position: relative; height: 260px;">
                    <canvas id="levelsChart"></canvas>
                </div>
                @else
                <div style="text-align: center; padding: 40px; color: var(--text-muted);"><i class="bi bi-pie-chart" style="font-size: 2rem; display: block; margin-bottom: 8px;"></i><p>Нет данных</p></div>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px;">
        <a href="{{ route('admin.olympiads.create') }}" style="display: flex; flex-direction: column; align-items: center; gap: 12px; padding: 24px 16px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; text-decoration: none; transition: all 0.3s; text-align: center;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.3rem;"><i class="bi bi-plus-circle"></i></div>
            <span style="font-size: 0.88rem; font-weight: 600; color: var(--text-primary);">Добавить</span>
        </a>
        <a href="{{ route('admin.olympiads.index') }}" style="display: flex; flex-direction: column; align-items: center; gap: 12px; padding: 24px 16px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; text-decoration: none; transition: all 0.3s; text-align: center;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(139,92,246,0.1), rgba(6,182,212,0.1)); display: flex; align-items: center; justify-content: center; color: #8b5cf6; font-size: 1.3rem;"><i class="bi bi-list-ul"></i></div>
            <span style="font-size: 0.88rem; font-weight: 600; color: var(--text-primary);">Олимпиады</span>
        </a>
        <a href="{{ route('admin.settings.index') }}" style="display: flex; flex-direction: column; align-items: center; gap: 12px; padding: 24px 16px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; text-decoration: none; transition: all 0.3s; text-align: center;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(6,182,212,0.1), rgba(16,185,129,0.1)); display: flex; align-items: center; justify-content: center; color: #06b6d4; font-size: 1.3rem;"><i class="bi bi-palette"></i></div>
            <span style="font-size: 0.88rem; font-weight: 600; color: var(--text-primary);">Настройки</span>
        </a>
        <a href="{{ route('profile.edit') }}" style="display: flex; flex-direction: column; align-items: center; gap: 12px; padding: 24px 16px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; text-decoration: none; transition: all 0.3s; text-align: center;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(99,102,241,0.1)); display: flex; align-items: center; justify-content: center; color: #10b981; font-size: 1.3rem;"><i class="bi bi-person-gear"></i></div>
            <span style="font-size: 0.88rem; font-weight: 600; color: var(--text-primary);">Профиль</span>
        </a>
    </div>

    <!-- Recent -->
    <div class="card" style="background: var(--bg-card); border-radius: 16px; border: 1px solid var(--border); overflow: hidden;">
        <div class="card-header" style="padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-size: 1rem; font-weight: 700; color: var(--text-heading);"><i class="bi bi-clock-history" style="margin-right: 8px; color: #6366f1;"></i>Последние олимпиады</h2>
            <a href="{{ route('admin.olympiads.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 8px; background: rgba(99,102,241,0.1); color: #6366f1; font-weight: 600; font-size: 0.82rem; text-decoration: none;">Все <i class="bi bi-arrow-right"></i></a>
        </div>
        @if(isset($recentOlympiads) && count($recentOlympiads) > 0)
        <div style="overflow-x: auto;">
            <table class="table">
                <thead><tr><th style="width: 60px; color: var(--text-muted);">ID</th><th>Название</th><th>Страна</th><th>Уровень</th><th>Дата</th></tr></thead>
                <tbody>
                    @foreach($recentOlympiads as $olympiad)
                    <tr>
                        <td style="font-family: 'Montserrat', sans-serif; font-weight: 700; color: var(--text-muted); font-size: 0.82rem;">{{ $olympiad->id }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 38px; height: 38px; border-radius: 10px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1rem;"><i class="bi bi-{{ $olympiad->icon ?? 'trophy' }}"></i></div>
                                <span style="font-weight: 600;">{{ $olympiad->title }}</span>
                            </div>
                        </td>
                        <td><span style="display: inline-flex; align-items: center; gap: 6px; font-size: 0.88rem;"><i class="bi bi-geo-alt" style="color: var(--text-muted);"></i> {{ $olympiad->country }}</span></td>
                        <td><span style="padding: 3px 12px; border-radius: 6px; background: rgba(99,102,241,0.1); color: #6366f1; font-weight: 600; font-size: 0.78rem;">{{ $olympiad->level }}</span></td>
                        <td style="color: var(--text-muted); font-size: 0.85rem;">{{ $olympiad->date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div style="text-align: center; padding: 60px 20px; color: var(--text-muted);">
            <i class="bi bi-inbox" style="font-size: 3rem;"></i>
            <p style="margin-top: 12px; font-size: 0.9rem;">Пока нет олимпиад</p>
            <a href="{{ route('admin.olympiads.create') }}" style="display: inline-flex; align-items: center; gap: 6px; margin-top: 16px; padding: 10px 20px; border-radius: 10px; background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white; font-weight: 600; font-size: 0.88rem; text-decoration: none;"><i class="bi bi-plus-lg"></i> Добавить первую</a>
        </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const theme = document.documentElement.getAttribute('data-theme') || 'light';
            const textColor = theme === 'dark' ? '#e2e8f0' : '#64748b';
            const gridColor = theme === 'dark' ? 'rgba(255,255,255,0.06)' : 'rgba(0,0,0,0.06)';

            @if(isset($countriesData) && count($countriesData) > 0)
            const countriesCtx = document.getElementById('countriesChart').getContext('2d');
            new Chart(countriesCtx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode(array_keys($countriesData)) !!},
                    datasets: [{
                        data: {!! json_encode(array_values($countriesData)) !!},
                        backgroundColor: ['#6366f1','#8b5cf6','#06b6d4','#10b981','#f59e0b','#ef4444','#ec4899','#14b8a6','#f97316','#a855f7','#0ea5e9','#84cc16','#eab308','#d946ef','#3b82f6','#22c55e','#e11d48','#64748b'],
                        borderWidth: 0,
                        hoverOffset: 10,
                    }]
                },
                options: {
                    responsive: true, maintainAspectRatio: false, cutout: '65%',
                    plugins: {
                        legend: { display: true, position: 'right', labels: { color: textColor, font: { size: 11, weight: '500', family: 'Inter' }, padding: 8, boxWidth: 12, boxHeight: 12, borderRadius: 3, useBorderRadius: true } },
                        tooltip: { backgroundColor: theme === 'dark' ? '#1e293b' : '#ffffff', titleColor: textColor, bodyColor: textColor, borderColor: gridColor, borderWidth: 1, cornerRadius: 10, padding: 12, callbacks: { label: function(ctx) { const total = ctx.dataset.data.reduce((a, b) => a + b, 0); const percent = total > 0 ? ((ctx.parsed / total) * 100).toFixed(1) : 0; return ' ' + ctx.parsed + ' олимпиад (' + percent + '%)'; } } }
                    },
                    animation: { animateRotate: true, animateScale: true, duration: 1200 }
                }
            });
            @endif

            @if(isset($levelsData) && count($levelsData) > 0)
            const levelsCtx = document.getElementById('levelsChart').getContext('2d');
            new Chart(levelsCtx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode(array_keys($levelsData)) !!},
                    datasets: [{
                        data: {!! json_encode(array_values($levelsData)) !!},
                        backgroundColor: ['#6366f1','#10b981','#f59e0b','#ef4444','#06b6d4','#ec4899'],
                        borderWidth: 0,
                    }]
                },
                options: {
                    responsive: true, maintainAspectRatio: false, cutout: '65%',
                    plugins: {
                        legend: { display: true, position: 'right', labels: { color: textColor, font: { size: 11, weight: '500', family: 'Inter' }, padding: 8, boxWidth: 12, boxHeight: 12, borderRadius: 3, useBorderRadius: true } },
                        tooltip: { backgroundColor: theme === 'dark' ? '#1e293b' : '#ffffff', titleColor: textColor, bodyColor: textColor, borderColor: gridColor, borderWidth: 1, cornerRadius: 10, padding: 12, callbacks: { label: function(ctx) { const total = ctx.dataset.data.reduce((a, b) => a + b, 0); const percent = total > 0 ? ((ctx.parsed / total) * 100).toFixed(1) : 0; return ' ' + ctx.parsed + ' (' + percent + '%)'; } } }
                    },
                    animation: { animateRotate: true, animateScale: true, duration: 1200 }
                }
            });
            @endif
        });
    </script>
</x-app-layout>

<style>
    .dash-stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 28px; }
    .dash-stat-card:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(0,0,0,0.08); }
    .dash-charts-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 28px; }
    .dash-empty-state { text-align: center; padding: 40px 20px; color: var(--text-muted); }
    .dash-empty-state i { font-size: 2.5rem; display: block; margin-bottom: 12px; }

    @media (max-width: 992px) {
        .dash-stats-grid { grid-template-columns: repeat(2, 1fr); }
        .dash-charts-grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
        .dash-stats-grid { grid-template-columns: 1fr; }
        .dash-charts-grid { grid-template-columns: 1fr; }
    }
</style>
