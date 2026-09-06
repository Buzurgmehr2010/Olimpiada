<x-guest-layout>
    <div class="auth-header">
        <h2>Добро пожаловать!</h2>
        <p>Войдите в свой аккаунт чтобы продолжить</p>
    </div>

    @if (session('status'))
        <div class="status-message status-success">
            <i class="bi bi-check-circle"></i> {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="your@email.com">
            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Пароль</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" placeholder="Введите пароль">
            @error('password')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-check">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Запомнить меня</label>
        </div>

        <button type="submit" class="auth-btn auth-btn-primary">
            <i class="bi bi-box-arrow-in-right"></i> Войти
        </button>

        <div class="auth-links">
            @if (Route::has('password.request'))
                <p><a href="{{ route('password.request') }}">Забыли пароль?</a></p>
            @endif
            <p>Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
        </div>
    </form>
</x-guest-layout>
