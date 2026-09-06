<x-guest-layout>
    <h2 class="auth-title">Подтверждение email</h2>
    <p class="auth-subtitle">Проверьте вашу почту</p>

    @if (session('status'))
        <div class="status-message status-success">
            {{ session('status') }}
        </div>
    @endif

    <p style="color: var(--gray-600); margin-bottom: 24px; text-align: center;">
        Ссылка для подтверждения отправлена на ваш email. Проверьте папку "Спам" если не видите письмо.
    </p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-envelope"></i> Отправить повторно
        </button>

        <div class="auth-links">
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: var(--gray-600); cursor: pointer; font-size: 0.95rem;">
                    Выйти
                </button>
            </form>
        </div>
    </form>
</x-guest-layout>
