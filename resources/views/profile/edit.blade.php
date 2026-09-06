<x-app-layout>
    @slot('title', 'Профиль')

    <div class="profile-hero">
        <div class="profile-hero-content">
            <div class="profile-avatar-lg">{{ substr(Auth::user()->name, 0, 1) }}</div>
            <div class="profile-info">
                <h1>{{ Auth::user()->name }}</h1>
                <p class="profile-role-badge">{{ Auth::user()->role === 'admin' ? 'Администратор' : 'Пользователь' }}</p>
                <p class="profile-email">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>

    <div class="profile-grid">
        <div class="card">
            <div class="card-header">
                <h2><i class="bi bi-person" style="margin-right: 8px; color: #6366f1;"></i>Личные данные</h2>
            </div>
            <div class="card-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2><i class="bi bi-shield-lock" style="margin-right: 8px; color: #6366f1;"></i>Безопасность</h2>
            </div>
            <div class="card-body">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>

    <div class="card profile-danger-zone">
        <div class="card-header profile-danger-header">
            <h2><i class="bi bi-exclamation-triangle" style="margin-right: 8px;"></i>Опасная зона</h2>
        </div>
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>

<style>
    .profile-hero {
        background: linear-gradient(135deg, rgba(99,102,241,0.08), rgba(139,92,246,0.05));
        border-radius: 20px;
        padding: 40px;
        margin-bottom: 28px;
    }

    [data-theme="dark"] .profile-hero { background: linear-gradient(135deg, rgba(99,102,241,0.12), rgba(139,92,246,0.08)); }

    .profile-hero-content { display: flex; align-items: center; gap: 28px; }

    .profile-avatar-lg {
        width: 96px; height: 96px; border-radius: 24px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        display: flex; align-items: center; justify-content: center;
        color: white; font-weight: 900; font-size: 2.5rem;
        box-shadow: 0 8px 32px rgba(99,102,241,0.3);
        flex-shrink: 0;
    }

    .profile-info h1 { font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-heading); margin-bottom: 6px; }

    .profile-role-badge {
        display: inline-block; padding: 4px 14px; border-radius: 8px;
        background: rgba(99,102,241,0.1); color: #6366f1;
        font-weight: 700; font-size: 0.82rem; margin-bottom: 6px;
    }

    .profile-email { color: var(--text-secondary); font-size: 0.95rem; }

    .profile-grid {
        display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;
    }

    .profile-danger-zone { border: 2px solid #fecaca; }

    [data-theme="dark"] .profile-danger-zone { border-color: rgba(239,68,68,0.4); }

    .profile-danger-header { background: #fef2f2; }

    [data-theme="dark"] .profile-danger-header { background: rgba(239,68,68,0.1); }

    .profile-danger-header h2 { color: #dc2626; }

    .form-error { color: #ef4444; font-size: 0.82rem; margin-top: 6px; }

    .form-submit-row { padding-top: 16px; border-top: 1px solid var(--border); }

    .profile-verify-box { margin-top: 10px; padding: 12px 16px; background: #fffbeb; border-radius: 10px; border: 1px solid #fde68a; }

    [data-theme="dark"] .profile-verify-box { background: rgba(245,158,11,0.1); border-color: rgba(245,158,11,0.3); }

    .profile-verify-text { color: #92400e; font-size: 0.88rem; }

    [data-theme="dark"] .profile-verify-text { color: #fbbf24; }

    .profile-verify-btn { background: none; border: none; color: #6366f1; cursor: pointer; font-weight: 600; text-decoration: underline; padding: 0; }

    .delete-user-row { display: flex; align-items: flex-start; justify-content: space-between; gap: 20px; }

    .delete-user-text { color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6; }

    .delete-modal-overlay { position: fixed; inset: 0; z-index: 200; display: flex; align-items: center; justify-content: center; padding: 24px; }

    .delete-modal-backdrop { position: absolute; inset: 0; background: rgba(0,0,0,0.5); backdrop-filter: blur(4px); }

    .delete-modal-content { position: relative; background: var(--bg-card); border-radius: 20px; box-shadow: 0 25px 50px rgba(0,0,0,0.25); max-width: 480px; width: 100%; overflow: hidden; border: 1px solid var(--border); }

    .delete-modal-body { padding: 32px; }

    .delete-modal-icon { width: 56px; height: 56px; border-radius: 16px; background: rgba(239,68,68,0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 20px; font-size: 1.5rem; color: #dc2626; }

    .delete-modal-title { font-size: 1.15rem; font-weight: 700; color: var(--text-heading); margin-bottom: 8px; }

    .delete-modal-desc { color: var(--text-secondary); font-size: 0.9rem; line-height: 1.6; margin-bottom: 24px; }

    .delete-modal-actions { display: flex; gap: 12px; justify-content: flex-end; }

    @media (max-width: 768px) { .profile-grid { grid-template-columns: 1fr; } .profile-hero-content { flex-direction: column; text-align: center; } }
</style>
