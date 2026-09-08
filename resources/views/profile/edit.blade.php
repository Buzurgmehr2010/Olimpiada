<x-app-layout>
    @slot('title', 'Профиль')

    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 28px;">
        <div>
            <h1 style="font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-heading);">Профиль</h1>
            <p style="color: var(--text-secondary); font-size: 0.92rem; margin-top: 4px;">Управление аккаунтом</p>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm"><i class="bi bi-arrow-left"></i> Назад</a>
    </div>

    <!-- Hero -->
    <div style="background: linear-gradient(135deg, rgba(99,102,241,0.08), rgba(139,92,246,0.05)); border-radius: 20px; padding: 40px; margin-bottom: 28px; position: relative; overflow: hidden;">
        <div style="position: absolute; top: -60px; right: -60px; width: 200px; height: 200px; background: rgba(99,102,241,0.08); border-radius: 50%;"></div>
        <div style="display: flex; align-items: center; gap: 28px; position: relative; z-index: 1;">
            <div style="width: 96px; height: 96px; border-radius: 24px; background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; color: white; font-weight: 900; font-size: 2.5rem; box-shadow: 0 8px 32px rgba(99,102,241,0.3); flex-shrink: 0;">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div>
                <h2 style="font-family: 'Montserrat', sans-serif; font-size: 1.6rem; font-weight: 900; color: var(--text-heading); margin-bottom: 8px;">{{ Auth::user()->name }}</h2>
                <div style="display: inline-block; padding: 4px 14px; border-radius: 8px; background: rgba(99,102,241,0.1); color: #6366f1; font-weight: 700; font-size: 0.82rem; margin-bottom: 8px;">
                    {{ Auth::user()->role === 'admin' ? 'Администратор' : 'Пользователь' }}
                </div>
                <div style="display: flex; align-items: center; gap: 8px; color: var(--text-secondary); font-size: 0.95rem;">
                    <i class="bi bi-envelope" style="color: #6366f1;"></i> {{ Auth::user()->email }}
                </div>
            </div>
        </div>
    </div>

    <!-- Forms Grid -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
        <div class="card">
            <div class="card-header">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <div style="width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.1rem;"><i class="bi bi-person"></i></div>
                    <div>
                        <h2 style="font-size: 1.05rem; font-weight: 700; color: var(--text-heading);">Личные данные</h2>
                        <p style="font-size: 0.78rem; color: var(--text-muted);">Имя и email</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <div style="width: 42px; height: 42px; border-radius: 12px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.1rem;"><i class="bi bi-shield-lock"></i></div>
                    <div>
                        <h2 style="font-size: 1.05rem; font-weight: 700; color: var(--text-heading);">Безопасность</h2>
                        <p style="font-size: 0.78rem; color: var(--text-muted);">Смена пароля</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>

    <!-- Danger Zone -->
    <div class="card" style="border: 2px solid #fecaca;">
        <div class="card-header" style="background: #fef2f2;">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="width: 42px; height: 42px; border-radius: 12px; background: rgba(239,68,68,0.1); display: flex; align-items: center; justify-content: center; color: #dc2626; font-size: 1.1rem;"><i class="bi bi-exclamation-triangle"></i></div>
                <div>
                    <h2 style="font-size: 1.05rem; font-weight: 700; color: #dc2626;">Опасная зона</h2>
                    <p style="font-size: 0.78rem; color: #991b1b;">Удаление аккаунта</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
