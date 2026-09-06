<x-app-layout>
    @slot('title', 'Настройки сайта')

    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle" style="margin-right: 8px;"></i>{{ session('success') }}
        </div>
    @endif

    <div class="admin-page-header">
        <div>
            <h1 class="admin-page-title">Настройки</h1>
            <p class="admin-page-subtitle">Управление внешним видом сайта</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div class="admin-form-icon"><i class="bi bi-palette"></i></div>
                <div>
                    <h2 style="font-size: 1.1rem; font-weight: 700; color: var(--text-heading);">Внешний вид</h2>
                    <p style="font-size: 0.82rem; color: var(--text-secondary);">Настройте цвета и оформление</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf

                <div class="settings-grid">
                    <div class="settings-pickers">
                        <div class="settings-color-card">
                            <div class="settings-color-label">Цвет фона (начало градиента)</div>
                            <div class="settings-color-row">
                                <input type="color" name="background_color" value="{{ $settings['background_color'] }}" class="color-picker-input" id="bgStart">
                                <input type="text" class="color-picker-hex" value="{{ $settings['background_color'] }}" readonly id="bgStartHex">
                            </div>
                        </div>

                        <div class="settings-color-card">
                            <div class="settings-color-label">Цвет фона (конец градиента)</div>
                            <div class="settings-color-row">
                                <input type="color" name="background_gradient" value="{{ $settings['background_gradient'] }}" class="color-picker-input" id="bgEnd">
                                <input type="text" class="color-picker-hex" value="{{ $settings['background_gradient'] }}" readonly id="bgEndHex">
                            </div>
                        </div>

                        <div class="settings-color-card">
                            <div class="settings-color-label">Основной цвет (акцент)</div>
                            <div class="settings-color-row">
                                <input type="color" name="primary_color" value="{{ $settings['primary_color'] }}" class="color-picker-input" id="primary">
                                <input type="text" class="color-picker-hex" value="{{ $settings['primary_color'] }}" readonly id="primaryHex">
                            </div>
                        </div>
                    </div>

                    <div class="settings-preview">
                        <div class="settings-preview-label">Предпросмотр</div>
                        <div class="settings-preview-box" id="previewBg">
                            <div class="settings-preview-text">Фон сайта</div>
                        </div>
                        <div class="settings-preview-row">
                            <div id="previewBtn" class="settings-preview-btn">Кнопка</div>
                            <div id="previewBadge" class="settings-preview-badge">Бейдж</div>
                        </div>
                        <div class="settings-preview-cards">
                            <div class="settings-preview-card">
                                <div class="settings-preview-card-icon"><i class="bi bi-trophy"></i></div>
                                <div class="settings-preview-card-text">Карточка</div>
                            </div>
                            <div class="settings-preview-card">
                                <div class="settings-preview-card-icon"><i class="bi bi-star"></i></div>
                                <div class="settings-preview-card-text">Элемент</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="admin-form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Сохранить настройки
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<style>
    .admin-page-header { margin-bottom: 28px; }
    .admin-page-title { font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-heading); }
    .admin-page-subtitle { color: var(--text-secondary); font-size: 0.92rem; margin-top: 4px; }
    .admin-form-icon { width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.1rem; }

    .settings-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; }
    .settings-pickers { display: flex; flex-direction: column; gap: 20px; }
    .settings-color-card { background: var(--bg-body); border: 1px solid var(--border); border-radius: 16px; padding: 20px; }
    .settings-color-label { font-weight: 600; color: var(--text-secondary); margin-bottom: 12px; font-size: 0.88rem; }
    .settings-color-row { display: flex; align-items: center; gap: 14px; }
    .color-picker-input { width: 60px; height: 60px; border: 3px solid var(--border); border-radius: 14px; cursor: pointer; padding: 3px; background: var(--bg-card); transition: border-color 0.2s; }
    .color-picker-input:hover { border-color: #6366f1; }
    .color-picker-input::-webkit-color-swatch { border-radius: 10px; border: none; }
    .color-picker-input::-webkit-color-swatch-wrapper { padding: 0; }
    .color-picker-hex { padding: 12px 16px; border: 2px solid var(--border); border-radius: 12px; font-family: 'Inter', monospace; font-size: 0.95rem; color: var(--text-primary); background: var(--bg-card); width: 120px; text-align: center; font-weight: 600; }

    .settings-preview { }
    .settings-preview-label { font-weight: 600; color: var(--text-secondary); margin-bottom: 16px; font-size: 0.88rem; }
    .settings-preview-box { height: 160px; border-radius: 20px; display: flex; align-items: center; justify-content: center; transition: all 0.4s; border: 2px dashed var(--border); margin-bottom: 16px; }
    .settings-preview-text { font-weight: 700; font-size: 1.1rem; color: white; }
    .settings-preview-row { display: flex; gap: 12px; margin-bottom: 16px; }
    .settings-preview-btn { flex: 1; padding: 16px; border-radius: 14px; text-align: center; color: white; font-weight: 700; font-size: 0.95rem; transition: all 0.3s; }
    .settings-preview-badge { padding: 10px 24px; border-radius: 20px; color: white; font-weight: 700; font-size: 0.85rem; display: flex; align-items: center; transition: all 0.3s; }
    .settings-preview-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
    .settings-preview-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: 14px; padding: 20px; display: flex; align-items: center; gap: 12px; }
    .settings-preview-card-icon { width: 40px; height: 40px; border-radius: 10px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; }
    .settings-preview-card-text { font-weight: 600; font-size: 0.88rem; color: var(--text-primary); }

    .admin-form-actions { display: flex; gap: 12px; padding-top: 24px; border-top: 1px solid var(--border); margin-top: 8px; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const bgStart = document.getElementById('bgStart');
    const bgEnd = document.getElementById('bgEnd');
    const primary = document.getElementById('primary');
    const bgStartHex = document.getElementById('bgStartHex');
    const bgEndHex = document.getElementById('bgEndHex');
    const primaryHex = document.getElementById('primaryHex');
    const previewBg = document.getElementById('previewBg');
    const previewBtn = document.getElementById('previewBtn');
    const previewBadge = document.getElementById('previewBadge');

    function update() {
        previewBg.style.background = `linear-gradient(135deg, ${bgStart.value} 0%, ${bgEnd.value} 100%)`;
        previewBg.style.color = isLight(bgStart.value) ? '#1e293b' : 'white';
        previewBtn.style.background = `linear-gradient(135deg, ${primary.value}, ${lighten(primary.value, 20)})`;
        previewBadge.style.background = primary.value;
        bgStartHex.value = bgStart.value;
        bgEndHex.value = bgEnd.value;
        primaryHex.value = primary.value;
    }

    function isLight(c) {
        const h = c.replace('#','');
        const r = parseInt(h.substr(0,2),16);
        const g = parseInt(h.substr(2,2),16);
        const b = parseInt(h.substr(4,2),16);
        return (r*299+g*587+b*114)/1000 > 155;
    }

    function lighten(c, pct) {
        const h = c.replace('#','');
        let r = parseInt(h.substr(0,2),16);
        let g = parseInt(h.substr(2,2),16);
        let b = parseInt(h.substr(4,2),16);
        r = Math.min(255, r + Math.round((255-r) * pct/100));
        g = Math.min(255, g + Math.round((255-g) * pct/100));
        b = Math.min(255, b + Math.round((255-b) * pct/100));
        return '#' + [r,g,b].map(x => x.toString(16).padStart(2,'0')).join('');
    }

    [bgStart, bgEnd, primary].forEach(el => el.addEventListener('input', update));
    update();
});
</script>
