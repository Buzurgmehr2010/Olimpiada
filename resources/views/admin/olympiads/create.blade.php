<x-app-layout>
    @slot('title', 'Новая олимпиада')

    @if($errors->any())
        <div class="alert alert-error">
            <i class="bi bi-exclamation-triangle" style="margin-right: 8px;"></i>
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div class="admin-form-icon"><i class="bi bi-plus-circle"></i></div>
                <div>
                    <h2 style="font-size: 1.1rem; font-weight: 700; color: var(--text-heading);">Создание олимпиады</h2>
                    <p style="font-size: 0.82rem; color: var(--text-secondary);">Заполните все поля для публикации</p>
                </div>
            </div>
            <a href="{{ route('admin.olympiads.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Назад
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.olympiads.store') }}" method="POST">
                @csrf

                <div class="admin-form-section">
                    <div class="admin-form-section-title"><i class="bi bi-info-circle"></i> Основная информация</div>

                    <div class="form-group">
                        <label class="form-label">Название олимпиады <span class="required">*</span></label>
                        <input type="text" name="title" class="form-input" value="{{ old('title') }}" required placeholder="Международная математическая олимпиада">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Описание <span class="required">*</span></label>
                        <textarea name="description" class="form-textarea" required placeholder="Подробное описание олимпиады, условия участия, тематика...">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="admin-form-section">
                    <div class="admin-form-section-title"><i class="bi bi-geo-alt"></i> Местоположение и уровень</div>

                    <div class="admin-form-row">
                        <div class="form-group">
                            <label class="form-label">Страна <span class="required">*</span></label>
                            <input type="text" name="country" class="form-input" value="{{ old('country') }}" required placeholder="Таджикистан">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Уровень <span class="required">*</span></label>
                            <select name="level" class="form-select" required>
                                <option value="">Выберите уровень</option>
                                @foreach(['Школьный', 'Региональный', 'Республиканский', 'СНГ', 'Международный'] as $level)
                                    <option value="{{ $level }}" {{ old('level') == $level ? 'selected' : '' }}>{{ $level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="admin-form-section">
                    <div class="admin-form-section-title"><i class="bi bi-calendar"></i> Дата и стоимость</div>

                    <div class="admin-form-row">
                        <div class="form-group">
                            <label class="form-label">Дата проведения <span class="required">*</span></label>
                            <input type="text" name="date" class="form-input" value="{{ old('date') }}" required placeholder="Сентябрь – Апрель">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Стоимость <span class="required">*</span></label>
                            <input type="text" name="cost" class="form-input" value="{{ old('cost') }}" required placeholder="Бесплатно">
                        </div>
                    </div>
                </div>

                <div class="admin-form-section">
                    <div class="admin-form-section-title"><i class="bi bi-palette"></i> Дополнительно</div>

                    <div class="form-group">
                        <label class="form-label">Иконка</label>
                        <input type="text" name="icon" class="form-input" value="{{ old('icon', 'trophy') }}" placeholder="trophy" style="max-width: 300px;">
                        <p class="form-hint">Bootstrap Icons: <code>trophy</code>, <code>globe</code>, <code>people</code>, <code>pc-display</code>, <code>calculator</code></p>
                    </div>
                </div>

                <div class="admin-form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Создать олимпиаду
                    </button>
                    <a href="{{ route('admin.olympiads.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-lg"></i> Отмена
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<style>
    .admin-form-icon { width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.1rem; }
    .admin-form-section { margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid var(--border); }
    .admin-form-section:last-of-type { border-bottom: none; margin-bottom: 16px; }
    .admin-form-section-title { display: flex; align-items: center; gap: 8px; font-size: 0.9rem; font-weight: 700; color: var(--text-heading); margin-bottom: 20px; }
    .admin-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .required { color: #ef4444; }
    .form-textarea { min-height: 140px; resize: vertical; }
    .form-hint { color: var(--text-muted); font-size: 0.82rem; margin-top: 6px; }
    .form-hint code { background: var(--bg-hover); padding: 2px 8px; border-radius: 6px; font-size: 0.85rem; }
    .admin-form-actions { display: flex; gap: 12px; padding-top: 24px; border-top: 1px solid var(--border); }
</style>
