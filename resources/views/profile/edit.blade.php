<x-app-layout>
    @slot('title', 'Профиль')

    <!-- Hero -->
    <div style="background: var(--bg-card); border: 1px solid var(--border); border-radius: 20px; padding: 0; margin-bottom: 28px; overflow: hidden;">
        <div style="height: 100px; background: linear-gradient(135deg, #6366f1, #8b5cf6, #06b6d4); position: relative;">
            <div style="position: absolute; top: 20px; right: 30px; width: 80px; height: 80px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
            <div style="position: absolute; top: -20px; right: 80px; width: 40px; height: 40px; background: rgba(255,255,255,0.08); border-radius: 50%;"></div>
        </div>
        <div style="padding: 0 36px 36px; position: relative;">
            <div style="display: flex; align-items: flex-end; gap: 24px; margin-top: -48px;">
                <div style="width: 96px; height: 96px; border-radius: 24px; background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; color: white; font-weight: 900; font-size: 2.5rem; box-shadow: 0 8px 32px rgba(99,102,241,0.4); border: 4px solid var(--bg-card); flex-shrink: 0; position: relative; z-index: 1;">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div style="flex: 1; padding-top: 56px;">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <h1 style="font-family: 'Montserrat', sans-serif; font-size: 1.5rem; font-weight: 900; color: var(--text-heading); margin-bottom: 4px;">{{ Auth::user()->name }}</h1>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <span style="display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; border-radius: 8px; background: {{ Auth::user()->role === 'admin' ? 'rgba(99,102,241,0.1)' : 'rgba(16,185,129,0.1)' }}; color: {{ Auth::user()->role === 'admin' ? '#6366f1' : '#10b981' }}; font-weight: 700; font-size: 0.78rem;">
                                    <i class="bi bi-{{ Auth::user()->role === 'admin' ? 'shield-check' : 'person' }}"></i>
                                    {{ Auth::user()->role === 'admin' ? 'Администратор' : 'Пользователь' }}
                                </span>
                                <span style="display: inline-flex; align-items: center; gap: 6px; color: var(--text-secondary); font-size: 0.88rem;">
                                    <i class="bi bi-envelope" style="color: var(--text-muted);"></i> {{ Auth::user()->email }}
                                </span>
                            </div>
                        </div>
                        <a href="{{ route('dashboard') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 12px; background: var(--bg-card); border: 1px solid var(--border); color: var(--text-secondary); font-weight: 600; font-size: 0.88rem; text-decoration: none; transition: all 0.2s;">
                            <i class="bi bi-arrow-left"></i> Кабинет
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <div style="display: flex; gap: 4px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 14px; padding: 6px; margin-bottom: 24px;" id="profile-tabs">
        <button onclick="showTab('info')" id="tab-info" style="flex: 1; padding: 12px 20px; border-radius: 10px; border: none; background: linear-gradient(135deg, var(--primary), var(--accent)); color: white; font-weight: 700; font-size: 0.9rem; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; transition: all 0.2s;">
            <i class="bi bi-person"></i> Личные данные
        </button>
        <button onclick="showTab('security')" id="tab-security" style="flex: 1; padding: 12px 20px; border-radius: 10px; border: none; background: transparent; color: var(--text-secondary); font-weight: 600; font-size: 0.9rem; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; transition: all 0.2s;">
            <i class="bi bi-shield-lock"></i> Безопасность
        </button>
        <button onclick="showTab('danger')" id="tab-danger" style="flex: 1; padding: 12px 20px; border-radius: 10px; border: none; background: transparent; color: var(--text-secondary); font-weight: 600; font-size: 0.9rem; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; transition: all 0.2s;">
            <i class="bi bi-exclamation-triangle"></i> Опасная зона
        </button>
    </div>

    <!-- Tab: Личные данные -->
    <div id="panel-info" class="card">
        <div class="card-header">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="width: 40px; height: 40px; border-radius: 10px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1;"><i class="bi bi-person"></i></div>
                <h2 style="font-size: 1.05rem; font-weight: 700; color: var(--text-heading);">Личные данные</h2>
            </div>
        </div>
        <div class="card-body">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <!-- Tab: Безопасность -->
    <div id="panel-security" class="card" style="display: none;">
        <div class="card-header">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="width: 40px; height: 40px; border-radius: 10px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1;"><i class="bi bi-shield-lock"></i></div>
                <h2 style="font-size: 1.05rem; font-weight: 700; color: var(--text-heading);">Безопасность</h2>
            </div>
        </div>
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <!-- Tab: Опасная зона -->
    <div id="panel-danger" class="card" style="display: none;">
        <div class="card-header">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(239,68,68,0.08); display: flex; align-items: center; justify-content: center; color: #ef4444;"><i class="bi bi-exclamation-triangle"></i></div>
                <h2 style="font-size: 1.05rem; font-weight: 700; color: var(--text-heading);">Опасная зона</h2>
            </div>
        </div>
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

    <script>
        function showTab(name) {
            document.querySelectorAll('[id^="panel-"]').forEach(p => p.style.display = 'none');
            document.querySelectorAll('[id^="tab-"]').forEach(t => { t.style.background = 'transparent'; t.style.color = 'var(--text-secondary)'; t.style.fontWeight = '600'; });
            document.getElementById('panel-' + name).style.display = 'block';
            const active = document.getElementById('tab-' + name);
            active.style.background = 'linear-gradient(135deg, var(--primary), var(--accent))';
            active.style.color = 'white';
            active.style.fontWeight = '700';
        }
    </script>
</x-app-layout>
