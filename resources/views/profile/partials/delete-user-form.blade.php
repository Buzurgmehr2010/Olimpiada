<div x-data="{ showModal: false }">
    <div class="delete-user-row">
        <div>
            <p class="delete-user-text">
                После удаления аккаунта все данные будут безвозвратно удалены. Скачайте нужные данные перед удалением.
            </p>
        </div>
        <button @click="showModal = true" class="btn btn-danger" style="white-space: nowrap; flex-shrink: 0;">
            <i class="bi bi-trash3"></i> Удалить аккаунт
        </button>
    </div>

    <!-- Modal -->
    <template x-teleport="body">
        <div x-show="showModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="delete-modal-overlay">

            <!-- Backdrop -->
            <div @click="showModal = false" class="delete-modal-backdrop"></div>

            <!-- Content -->
            <div @click.away="showModal = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                 class="delete-modal-content">

                <div class="delete-modal-body">
                    <div class="delete-modal-icon">
                        <i class="bi bi-exclamation-triangle"></i>
                    </div>

                    <h3 class="delete-modal-title">Удалить аккаунт?</h3>
                    <p class="delete-modal-desc">
                        Все данные будут удалены безвозвратно. Введите пароль для подтверждения.
                    </p>

                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <div class="form-group">
                            <input type="password" name="password" class="form-input" placeholder="Введите пароль для подтверждения" required>
                            @error('userDeletion.password')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="delete-modal-actions">
                            <button type="button" @click="showModal = false" class="btn btn-secondary">
                                Отмена
                            </button>
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash3"></i> Да, удалить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </template>
</div>

<style>
    .delete-user-row {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
    }

    .delete-user-text {
        color: var(--text-secondary);
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .delete-modal-overlay {
        position: fixed;
        inset: 0;
        z-index: 200;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
    }

    .delete-modal-backdrop {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.5);
        backdrop-filter: blur(4px);
    }

    .delete-modal-content {
        position: relative;
        background: var(--bg-card);
        border-radius: 16px;
        box-shadow: 0 25px 50px rgba(0,0,0,0.25);
        max-width: 480px;
        width: 100%;
        overflow: hidden;
        border: 1px solid var(--border);
    }

    .delete-modal-body { padding: 32px; }

    .delete-modal-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        background: rgba(239,68,68,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        font-size: 1.5rem;
        color: #dc2626;
    }

    .delete-modal-title {
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 8px;
    }

    .delete-modal-desc {
        color: var(--text-secondary);
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 24px;
    }

    .delete-modal-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
    }

    .form-error {
        color: #ef4444;
        font-size: 0.82rem;
        margin-top: 6px;
    }
</style>
