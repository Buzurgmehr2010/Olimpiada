<form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    @if(session('status') === 'profile-updated')
        <div class="alert alert-success" style="margin-bottom: 20px;">
            <i class="bi bi-check-circle" style="margin-right: 8px;"></i>Профиль обновлён
        </div>
    @endif

    <div class="form-group">
        <label class="form-label">Имя</label>
        <input type="text" name="name" class="form-input" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
        @error('name')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" required autocomplete="username">
        @error('email')
            <p class="form-error">{{ $message }}</p>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="profile-verify-box">
                <p class="profile-verify-text">
                    Email не подтверждён.
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="profile-verify-btn">
                            Отправить ссылку повторно
                        </button>
                    </form>
                </p>
            </div>
        @endif
    </div>

    <div class="form-submit-row">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-lg"></i> Сохранить
        </button>
    </div>
</form>

<style>
    .form-error {
        color: #ef4444;
        font-size: 0.82rem;
        margin-top: 6px;
    }

    .profile-verify-box {
        margin-top: 10px;
        padding: 12px 16px;
        background: #fffbeb;
        border-radius: 10px;
        border: 1px solid #fde68a;
    }

    [data-theme="dark"] .profile-verify-box {
        background: rgba(245,158,11,0.1);
        border-color: rgba(245,158,11,0.3);
    }

    .profile-verify-text {
        color: #92400e;
        font-size: 0.88rem;
    }

    [data-theme="dark"] .profile-verify-text {
        color: #fbbf24;
    }

    .profile-verify-btn {
        background: none;
        border: none;
        color: #6366f1;
        cursor: pointer;
        font-weight: 600;
        text-decoration: underline;
        padding: 0;
    }

    .form-submit-row {
        padding-top: 16px;
        border-top: 1px solid var(--border);
    }
</style>
