<x-guest-layout>
    <h2 class="auth-title">Новый пароль</h2>
    <p class="auth-subtitle">Введите новый пароль</p>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email', $email) }}" required autofocus autocomplete="username" placeholder="your@email.com">
            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Новый пароль</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" placeholder="Минимум 8 символов">
            @error('password')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password_confirmation">Подтвердите пароль</label>
            <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Повторите пароль">
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-key"></i> Сбросить пароль
        </button>
    </form>
</x-guest-layout>
