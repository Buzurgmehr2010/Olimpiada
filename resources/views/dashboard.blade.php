<x-app-layout>
    @slot('title', 'Панель управления')

    <!-- Welcome -->
    <div style="background: linear-gradient(135deg, #6366f1, #8b5cf6); border-radius: 20px; padding: 36px 40px; margin-bottom: 28px; color: white; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -50%; right: -10%; width: 300px; height: 300px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
        <div style="position: relative; z-index: 1;">
            <div style="display: inline-flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.15); padding: 5px 14px; border-radius: 8px; font-size: 0.78rem; font-weight: 600; margin-bottom: 12px;">
                <i class="bi bi-lightning-charge-fill"></i> Администратор
            </div>
            <h1 style="font-family: 'Montserrat', sans-serif; font-size: 1.6rem; font-weight: 900; margin-bottom: 4px;">Привет, {{ Auth::user()->name }}!</h1>
            <p style="opacity: 0.85; font-size: 0.95px;">Вот что происходит сегодня на Olympiada</p>
        </div>
    </div>

    <!-- Stats -->
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-bottom: 28px;">
        <div class="card" style="padding: 24px; display: flex; align-items: center; gap: 16px;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.3rem;">
                <i class="bi bi-trophy"></i>
            </div>
            <div>
                <div style="font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-primary);">{{ $stats['olympiads'] ?? 0 }}</div>
                <div style="color: var(--text-secondary); font-size: 0.82rem;">Олимпиад</div>
            </div>
        </div>
        <div class="card" style="padding: 24px; display: flex; align-items: center; gap: 16px;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(16,185,129,0.1)); display: flex; align-items: center; justify-content: center; color: #059669; font-size: 1.3rem;">
                <i class="bi bi-people"></i>
            </div>
            <div>
                <div style="font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-primary);">{{ $stats['users'] ?? 0 }}</div>
                <div style="color: var(--text-secondary); font-size: 0.82rem;">Пользователей</div>
            </div>
        </div>
        <div class="card" style="padding: 24px; display: flex; align-items: center; gap: 16px;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(245,158,11,0.1), rgba(245,158,11,0.1)); display: flex; align-items: center; justify-content: center; color: #d97706; font-size: 1.3rem;">
                <i class="bi bi-globe-americas"></i>
            </div>
            <div>
                <div style="font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-primary);">{{ $stats['countries'] ?? 0 }}</div>
                <div style="color: var(--text-secondary); font-size: 0.82rem;">Стран</div>
            </div>
        </div>
        <div class="card" style="padding: 24px; display: flex; align-items: center; gap: 16px;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(139,92,246,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #7c3aed; font-size: 1.3rem;">
                <i class="bi bi-bar-chart-line"></i>
            </div>
            <div>
                <div style="font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-primary);">{{ ($stats['olympiads'] ?? 0) * 12 }}</div>
                <div style="color: var(--text-secondary); font-size: 0.82rem;">Просмотров</div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 28px;">
        <div class="card">
            <div class="card-header"><h2><i class="bi bi-pie-chart" style="margin-right: 8px; color: #6366f1;"></i>По странам</h2></div>
            <div class="card-body">
                @if(isset($countriesData) && count($countriesData) > 0)
                <div style="display: flex; flex-direction: column; gap: 14px;">
                    @php $maxCount = max($countriesData); $colors = ['#6366f1','#8b5cf6','#06b6d4','#10b981','#f59e0b','#ef4444']; @endphp
                    @foreach($countriesData as $country => $count)
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 110px; font-size: 0.88rem; font-weight: 600; color: var(--text-primary); flex-shrink: 0;">{{ $country }}</div>
                        <div style="flex: 1; height: 34px; background: var(--bg-body); border-radius: 10px; overflow: hidden;">
                            <div style="height: 100%; border-radius: 10px; display: flex; align-items: center; justify-content: flex-end; padding-right: 12px; transition: width 1.2s ease; min-width: 44px; width: {{ ($count / $maxCount) * 100 }}%; background: {{ $colors[$loop->index % count($colors)] }};">
                                <span style="color: white; font-weight: 700; font-size: 0.82rem;">{{ $count }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div style="text-align: center; padding: 40px; color: var(--text-muted);"><i class="bi bi-bar-chart" style="font-size: 2.5rem; display: block; margin-bottom: 12px;"></i><p>Нет данных</p></div>
                @endif
            </div>
        </div>
        <div class="card">
            <div class="card-header"><h2><i class="bi bi-graph-up" style="margin-right: 8px; color: #8b5cf6;"></i>По уровням</h2></div>
            <div class="card-body">
                @if(isset($levelsData) && count($levelsData) > 0)
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    @php $total = array_sum($levelsData); $levelColors = ['#6366f1','#10b981','#f59e0b','#ef4444','#06b6d4']; @endphp
                    @foreach($levelsData as $level => $count)
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 12px; height: 12px; border-radius: 50%; background: {{ $levelColors[$loop->index % count($levelColors)] }};"></div>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 4px;">
                                <span style="font-size: 0.9rem; font-weight: 600; color: var(--text-primary);">{{ $level }}</span>
                                <span style="font-size: 0.88rem; font-weight: 700; color: #6366f1;">{{ $total > 0 ? round(($count / $total) * 100) : 0 }}%</span>
                            </div>
                            <div style="height: 8px; background: var(--bg-body); border-radius: 4px; overflow: hidden;">
                                <div style="height: 100%; border-radius: 4px; width: {{ $total > 0 ? ($count / $total) * 100 : 0 }}%; background: {{ $levelColors[$loop->index % count($levelColors)] }};"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div style="text-align: center; padding: 40px; color: var(--text-muted);"><i class="bi bi-graph-up" style="font-size: 2.5rem; display: block; margin-bottom: 12px;"></i><p>Нет данных</p></div>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px;">
        <a href="{{ route('admin.olympiads.create') }}" style="display: flex; flex-direction: column; align-items: center; gap: 12px; padding: 28px 16px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; text-decoration: none; transition: all 0.3s; text-align: center;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.3rem;"><i class="bi bi-plus-circle"></i></div>
            <span style="font-size: 0.88rem; font-weight: 600; color: var(--text-primary);">Добавить олимпиаду</span>
        </a>
        <a href="{{ route('admin.olympiads.index') }}" style="display: flex; flex-direction: column; align-items: center; gap: 12px; padding: 28px 16px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; text-decoration: none; transition: all 0.3s; text-align: center;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.3rem;"><i class="bi bi-list-ul"></i></div>
            <span style="font-size: 0.88rem; font-weight: 600; color: var(--text-primary);">Все олимпиады</span>
        </a>
        <a href="{{ route('admin.settings.index') }}" style="display: flex; flex-direction: column; align-items: center; gap: 12px; padding: 28px 16px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; text-decoration: none; transition: all 0.3s; text-align: center;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.3rem;"><i class="bi bi-palette"></i></div>
            <span style="font-size: 0.88rem; font-weight: 600; color: var(--text-primary);">Настройки</span>
        </a>
        <a href="{{ route('profile.edit') }}" style="display: flex; flex-direction: column; align-items: center; gap: 12px; padding: 28px 16px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; text-decoration: none; transition: all 0.3s; text-align: center;">
            <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.3rem;"><i class="bi bi-person-gear"></i></div>
            <span style="font-size: 0.88rem; font-weight: 600; color: var(--text-primary);">Профиль</span>
        </a>
    </div>

    <!-- Recent -->
    <div class="card">
        <div class="card-header">
            <h2><i class="bi bi-clock-history" style="margin-right: 8px; color: #6366f1;"></i>Последние олимпиады</h2>
            <a href="{{ route('admin.olympiads.index') }}" class="btn btn-primary btn-sm"><i class="bi bi-arrow-right"></i> Все</a>
        </div>
        @if(isset($recentOlympiads) && count($recentOlympiads) > 0)
        <div style="overflow-x: auto;">
            <table class="table">
                <thead><tr><th style="width: 60px;">ID</th><th>Название</th><th>Страна</th><th>Уровень</th><th>Дата</th></tr></thead>
                <tbody>
                    @foreach($recentOlympiads as $olympiad)
                    <tr>
                        <td style="font-family: 'Montserrat', sans-serif; font-weight: 700; color: var(--text-muted);">{{ $olympiad->id }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 38px; height: 38px; border-radius: 10px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1;"><i class="bi bi-{{ $olympiad->icon ?? 'trophy' }}"></i></div>
                                <span style="font-weight: 600;">{{ $olympiad->title }}</span>
                            </div>
                        </td>
                        <td><span style="display: inline-flex; align-items: center; gap: 6px;"><i class="bi bi-geo-alt" style="color: #6366f1;"></i> {{ $olympiad->country }}</span></td>
                        <td><span class="badge badge-primary">{{ $olympiad->level }}</span></td>
                        <td style="color: var(--text-secondary);">{{ $olympiad->date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div style="text-align: center; padding: 60px 20px; color: var(--text-muted);">
            <i class="bi bi-inbox" style="font-size: 3rem;"></i>
            <p style="margin-top: 12px;">Пока нет олимпиад</p>
            <a href="{{ route('admin.olympiads.create') }}" class="btn btn-primary btn-sm" style="margin-top: 12px;"><i class="bi bi-plus-lg"></i> Добавить первую</a>
        </div>
        @endif
    </div>
</x-app-layout>
