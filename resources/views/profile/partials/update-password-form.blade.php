<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    @if(session('status') === 'password-updated')
        <div class="alert alert-success" style="margin-bottom: 20px;">
            <i class="bi bi-check-circle" style="margin-right: 8px;"></i>Пароль обновлён
        </div>
    @endif

    <div class="form-group">
        <label class="form-label">Текущий пароль</label>
        <input type="password" name="current_password" class="form-input" autocomplete="current-password" placeholder="Введите текущий пароль">
        @error('updatePassword.current_password')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Новый пароль</label>
        <input type="password" name="password" class="form-input" autocomplete="new-password" placeholder="Минимум 8 символов">
        @error('updatePassword.password')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Подтвердите пароль</label>
        <input type="password" name="password_confirmation" class="form-input" autocomplete="new-password" placeholder="Повторите новый пароль">
    </div>

    <div class="form-submit-row">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-shield-lock"></i> Обновить пароль
        </button>
    </div>
</form>

<style>
    .form-error {
        color: #ef4444;
        font-size: 0.82rem;
        margin-top: 6px;
    }

    .form-submit-row {
        padding-top: 16px;
        border-top: 1px solid var(--border);
    }
</style>
