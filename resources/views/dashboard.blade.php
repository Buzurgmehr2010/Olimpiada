<x-app-layout>
    @slot('title', 'Кабинет')

    <!-- Welcome -->
    <div style="background: var(--bg-card); border: 1px solid var(--border); border-radius: 20px; padding: 32px 36px; margin-bottom: 24px;">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h1 style="font-family: 'Montserrat', sans-serif; font-size: 1.6rem; font-weight: 900; color: var(--text-heading); margin-bottom: 4px;">Привет, {{ Auth::user()->name }}!</h1>
                <p style="color: var(--text-secondary); font-size: 0.92rem;">Вот что происходит сегодня</p>
            </div>
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.3rem;">
                <i class="bi bi-lightning-charge-fill"></i>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px;">
        <div class="card" style="padding: 20px;">
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: rgba(99,102,241,0.1); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.1rem;"><i class="bi bi-trophy"></i></div>
            </div>
            <div style="font-family: 'Montserrat', sans-serif; font-size: 2rem; font-weight: 900; color: var(--text-heading);">{{ $stats['olympiads'] ?? 0 }}</div>
            <div style="color: var(--text-muted); font-size: 0.82rem; margin-top: 2px;">Олимпиад</div>
        </div>
        <div class="card" style="padding: 20px;">
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: rgba(16,185,129,0.1); display: flex; align-items: center; justify-content: center; color: #10b981; font-size: 1.1rem;"><i class="bi bi-people"></i></div>
            </div>
            <div style="font-family: 'Montserrat', sans-serif; font-size: 2rem; font-weight: 900; color: var(--text-heading);">{{ $stats['users'] ?? 0 }}</div>
            <div style="color: var(--text-muted); font-size: 0.82rem; margin-top: 2px;">Пользователей</div>
        </div>
        <div class="card" style="padding: 20px;">
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: rgba(245,158,11,0.1); display: flex; align-items: center; justify-content: center; color: #f59e0b; font-size: 1.1rem;"><i class="bi bi-globe-americas"></i></div>
            </div>
            <div style="font-family: 'Montserrat', sans-serif; font-size: 2rem; font-weight: 900; color: var(--text-heading);">{{ $stats['countries'] ?? 0 }}</div>
            <div style="color: var(--text-muted); font-size: 0.82rem; margin-top: 2px;">Стран</div>
        </div>
        <div class="card" style="padding: 20px;">
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: rgba(139,92,246,0.1); display: flex; align-items: center; justify-content: center; color: #8b5cf6; font-size: 1.1rem;"><i class="bi bi-bar-chart-line"></i></div>
            </div>
            <div style="font-family: 'Montserrat', sans-serif; font-size: 2rem; font-weight: 900; color: var(--text-heading);">{{ ($stats['olympiads'] ?? 0) * 12 }}</div>
            <div style="color: var(--text-muted); font-size: 0.82rem; margin-top: 2px;">Просмотров</div>
        </div>
    </div>

    <!-- Charts -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 24px;">
        <!-- По странам -->
        <div class="card">
            <div class="card-header">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="width: 36px; height: 36px; border-radius: 10px; background: rgba(99,102,241,0.1); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 0.95rem;"><i class="bi bi-pie-chart"></i></div>
                    <h2 style="font-size: 1rem; font-weight: 700; color: var(--text-heading);">По странам</h2>
                </div>
            </div>
            <div class="card-body">
                @if(isset($countriesData) && count($countriesData) > 0)
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    @php $maxCount = max($countriesData); $colors = ['#6366f1','#8b5cf6','#06b6d4','#10b981','#f59e0b','#ef4444']; @endphp
                    @foreach($countriesData as $country => $count)
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 80px; font-size: 0.82rem; font-weight: 600; color: var(--text-secondary); flex-shrink: 0; text-align: right;">{{ $country }}</div>
                        <div style="flex: 1; height: 24px; background: var(--bg-body); border-radius: 6px; overflow: hidden;">
                            <div style="height: 100%; border-radius: 6px; display: flex; align-items: center; justify-content: flex-end; padding-right: 8px; transition: width 1s ease; min-width: 32px; width: {{ ($count / $maxCount) * 100 }}%; background: {{ $colors[$loop->index % count($colors)] }};">
                                <span style="color: white; font-weight: 700; font-size: 0.75rem;">{{ $count }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div style="text-align: center; padding: 32px; color: var(--text-muted);"><i class="bi bi-bar-chart" style="font-size: 2rem; display: block; margin-bottom: 8px;"></i><p style="font-size: 0.88rem;">Нет данных</p></div>
                @endif
            </div>
        </div>
        <!-- По уровням -->
        <div class="card">
            <div class="card-header">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="width: 36px; height: 36px; border-radius: 10px; background: rgba(139,92,246,0.1); display: flex; align-items: center; justify-content: center; color: #8b5cf6; font-size: 0.95rem;"><i class="bi bi-graph-up"></i></div>
                    <h2 style="font-size: 1rem; font-weight: 700; color: var(--text-heading);">По уровням</h2>
                </div>
            </div>
            <div class="card-body">
                @if(isset($levelsData) && count($levelsData) > 0)
                <div style="display: flex; flex-direction: column; gap: 14px;">
                    @php $total = array_sum($levelsData); $levelColors = ['#6366f1','#10b981','#f59e0b','#ef4444','#06b6d4']; @endphp
                    @foreach($levelsData as $level => $count)
                    <div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
                            <span style="font-size: 0.85rem; font-weight: 600; color: var(--text-primary);">{{ $level }}</span>
                            <span style="font-size: 0.82rem; font-weight: 700; color: var(--text-muted);">{{ $total > 0 ? round(($count / $total) * 100) : 0 }}%</span>
                        </div>
                        <div style="height: 6px; background: var(--bg-body); border-radius: 3px; overflow: hidden;">
                            <div style="height: 100%; border-radius: 3px; width: {{ $total > 0 ? ($count / $total) * 100 : 0 }}%; background: {{ $levelColors[$loop->index % count($levelColors)] }};"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div style="text-align: center; padding: 32px; color: var(--text-muted);"><i class="bi bi-graph-up" style="font-size: 2rem; display: block; margin-bottom: 8px;"></i><p style="font-size: 0.88rem;">Нет данных</p></div>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent -->
    <div class="card">
        <div class="card-header">
            <div style="display: flex; align-items: center; gap: 10px;">
                <div style="width: 36px; height: 36px; border-radius: 10px; background: rgba(99,102,241,0.1); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 0.95rem;"><i class="bi bi-clock-history"></i></div>
                <h2 style="font-size: 1rem; font-weight: 700; color: var(--text-heading);">Последние олимпиады</h2>
            </div>
            <a href="{{ route('admin.olympiads.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 8px; background: rgba(99,102,241,0.1); color: #6366f1; font-weight: 600; font-size: 0.82rem; text-decoration: none; transition: all 0.2s;">Все <i class="bi bi-arrow-right"></i></a>
        </div>
        @if(isset($recentOlympiads) && count($recentOlympiads) > 0)
        <div style="overflow-x: auto;">
            <table class="table">
                <thead><tr><th style="width: 50px;">ID</th><th>Название</th><th>Страна</th><th>Уровень</th><th>Дата</th></tr></thead>
                <tbody>
                    @foreach($recentOlympiads as $olympiad)
                    <tr>
                        <td style="font-family: 'Montserrat', sans-serif; font-weight: 700; color: var(--text-muted); font-size: 0.82rem;">{{ $olympiad->id }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div style="width: 34px; height: 34px; border-radius: 8px; background: rgba(99,102,241,0.1); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 0.9rem;"><i class="bi bi-{{ $olympiad->icon ?? 'trophy' }}"></i></div>
                                <span style="font-weight: 600; font-size: 0.9rem;">{{ $olympiad->title }}</span>
                            </div>
                        </td>
                        <td><span style="display: inline-flex; align-items: center; gap: 4px; font-size: 0.88rem;"><i class="bi bi-geo-alt" style="color: var(--text-muted);"></i> {{ $olympiad->country }}</span></td>
                        <td><span style="padding: 3px 10px; border-radius: 6px; background: rgba(99,102,241,0.1); color: #6366f1; font-weight: 600; font-size: 0.78rem;">{{ $olympiad->level }}</span></td>
                        <td style="color: var(--text-muted); font-size: 0.85rem;">{{ $olympiad->date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div style="text-align: center; padding: 48px 20px; color: var(--text-muted);">
            <i class="bi bi-inbox" style="font-size: 2.5rem;"></i>
            <p style="margin-top: 8px; font-size: 0.9rem;">Пока нет олимпиад</p>
            <a href="{{ route('admin.olympiads.create') }}" style="display: inline-flex; align-items: center; gap: 6px; margin-top: 12px; padding: 8px 16px; border-radius: 8px; background: rgba(99,102,241,0.1); color: #6366f1; font-weight: 600; font-size: 0.85rem; text-decoration: none;"><i class="bi bi-plus-lg"></i> Добавить</a>
        </div>
        @endif
    </div>
</x-app-layout>
