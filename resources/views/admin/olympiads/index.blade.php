<x-app-layout>
    @slot('title', 'Олимпиады')

    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle" style="margin-right: 8px;"></i>{{ session('success') }}
        </div>
    @endif

    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Олимпиады</h1>
            <p class="admin-page-subtitle">Управление списком — всего {{ $olympiads->total() }}</p>
        </div>
        <a href="{{ route('admin.olympiads.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Добавить олимпиаду
        </a>
    </div>

    <div class="card">
        <div style="overflow-x: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Название</th>
                        <th>Страна</th>
                        <th>Уровень</th>
                        <th>Дата</th>
                        <th>Стоимость</th>
                        <th style="width: 120px;">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($olympiads as $olympiad)
                    <tr>
                        <td class="admin-table-id">{{ $olympiad->id }}</td>
                        <td>
                            <div class="admin-table-name">
                                <div class="admin-table-avatar"><i class="bi bi-{{ $olympiad->icon ?? 'trophy' }}"></i></div>
                                <div>
                                    <div style="font-weight: 600; color: var(--text-primary);">{{ $olympiad->title }}</div>
                                    <div style="font-size: 0.78rem; color: var(--text-muted); max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ Str::limit($olympiad->description, 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="admin-table-country"><i class="bi bi-geo-alt" style="color: #6366f1;"></i> {{ $olympiad->country }}</span></td>
                        <td><span class="badge badge-primary">{{ $olympiad->level }}</span></td>
                        <td class="admin-table-secondary">{{ $olympiad->date }}</td>
                        <td class="admin-table-secondary">{{ $olympiad->cost }}</td>
                        <td>
                            <div class="admin-table-actions">
                                <a href="{{ route('admin.olympiads.edit', $olympiad) }}" class="admin-action-btn" title="Редактировать">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.olympiads.destroy', $olympiad) }}" method="POST" onsubmit="return confirm('Удалить олимпиаду «{{ $olympiad->title }}»?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="admin-action-btn admin-action-danger" title="Удалить">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <div class="admin-empty-state">
                                <i class="bi bi-inbox"></i>
                                <h3>Олимпиад пока нет</h3>
                                <p>Добавьте первую олимпиаду</p>
                                <a href="{{ route('admin.olympiads.create') }}" class="btn btn-primary btn-sm" style="margin-top: 12px;">
                                    <i class="bi bi-plus-lg"></i> Добавить
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($olympiads->hasPages())
    <div style="margin-top: 24px;">
        {{ $olympiads->links('pagination.custom') }}
    </div>
    @endif
</x-app-layout>

<style>
    .admin-page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 28px; }
    .admin-page-title { font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-heading); }
    .admin-page-subtitle { color: var(--text-secondary); font-size: 0.92rem; margin-top: 4px; }
    .admin-table-id { font-family: 'Montserrat', sans-serif; font-weight: 700; color: var(--text-muted); font-size: 0.88rem; }
    .admin-table-name { display: flex; align-items: center; gap: 14px; }
    .admin-table-avatar { width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1rem; flex-shrink: 0; }
    .admin-table-country { display: inline-flex; align-items: center; gap: 6px; }
    .admin-table-secondary { color: var(--text-secondary); }
    .admin-table-actions { display: flex; gap: 8px; }
    .admin-action-btn { width: 36px; height: 36px; border-radius: 10px; border: 1px solid var(--border); background: var(--bg-card); color: var(--text-secondary); display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s; text-decoration: none; font-size: 0.9rem; }
    .admin-action-btn:hover { border-color: #6366f1; color: #6366f1; background: rgba(99,102,241,0.05); }
    .admin-action-danger:hover { border-color: #ef4444; color: #ef4444; background: rgba(239,68,68,0.05); }
    .admin-empty-state { text-align: center; padding: 60px 20px; color: var(--text-muted); }
    .admin-empty-state i { font-size: 3rem; display: block; margin-bottom: 12px; }
    .admin-empty-state h3 { font-size: 1.1rem; font-weight: 700; color: var(--text-heading); margin-bottom: 4px; }
    .admin-empty-state p { font-size: 0.9rem; }
</style>
