<x-guest-layout>
    <h2 class="auth-title">Сброс пароля</h2>
    <p class="auth-subtitle">Введите ваш email для получения ссылки</p>

    @if (session('status'))
        <div class="status-message status-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="your@email.com">
            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-envelope"></i> Отправить ссылку
        </button>

        <div class="auth-links">
            <p><a href="{{ route('login') }}">Вернуться к входу</a></p>
        </div>
    </form>
</x-guest-layout>
