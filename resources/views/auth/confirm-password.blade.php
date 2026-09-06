<x-guest-layout>
    <h2 class="auth-title">Подтверждение пароля</h2>
    <p class="auth-subtitle">Введите пароль для доступа к сайту</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="password">Пароль</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" placeholder="Введите пароль">
            @error('password')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-circle"></i> Подтвердить
        </button>
    </form>
</x-guest-layout>
