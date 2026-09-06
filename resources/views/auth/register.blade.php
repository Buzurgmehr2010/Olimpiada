<x-guest-layout>
    <div class="auth-header">
        <h2>Создать аккаунт</h2>
        <p>Зарегистрируйтесь чтобы начать участие в олимпиадах</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="name">Имя</label>
            <input id="name" class="form-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Ваше имя">
            @error('name')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="your@email.com">
            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Пароль</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" placeholder="Минимум 8 символов">
            @error('password')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password_confirmation">Подтвердите пароль</label>
            <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Повторите пароль">
        </div>

        <button type="submit" class="auth-btn auth-btn-primary">
            <i class="bi bi-person-plus"></i> Зарегистрироваться
        </button>

        <div class="auth-links">
            <p>Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
        </div>
    </form>
</x-guest-layout>
