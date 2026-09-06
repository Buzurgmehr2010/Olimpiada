@extends('layouts.home')

@section('title', 'Контакты — Olympiada')

@section('content')
<section class="page-hero">
    <div class="page-hero-orb page-hero-orb-1"></div>
    <div class="page-hero-orb page-hero-orb-2"></div>
    <div class="container">
        <div class="page-hero-content reveal">
            <div class="section-badge section-badge-light"><i class="bi bi-envelope"></i> Контакты</div>
            <h1>Свяжитесь с <span class="text-gradient">нами</span></h1>
            <p>Мы всегда рады помочь. Напишите нам!</p>
        </div>
    </div>
</section>

<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info reveal">
                <h2>Контактная информация</h2>
                <p class="contact-desc">Выберите удобный способ связи</p>
                <div class="contact-cards">
                    <div class="contact-card">
                        <div class="contact-card-icon"><i class="bi bi-envelope"></i></div>
                        <div><h4>Email</h4><p>support@olympiada.com</p></div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-card-icon"><i class="bi bi-telegram"></i></div>
                        <div><h4>Telegram</h4><p>@olympiada_support</p></div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-card-icon"><i class="bi bi-geo-alt"></i></div>
                        <div><h4>Адрес</h4><p>Душанбе, Таджикистан</p></div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-card-icon"><i class="bi bi-clock"></i></div>
                        <div><h4>Время ответа</h4><p>В течение 24 часов</p></div>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrap reveal">
                <div class="contact-form-card">
                    <h2>Напишите нам</h2>
                    <p class="contact-desc">Заполните форму и мы свяжемся с вами</p>
                    <form id="contactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Имя</label>
                                <input type="text" class="form-input" placeholder="Ваше имя" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-input" placeholder="your@email.com" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Тема</label>
                            <select class="form-select">
                                <option>Общий вопрос</option>
                                <option>Проблема с аккаунтом</option>
                                <option>Предложение о сотрудничестве</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Сообщение</label>
                            <textarea class="form-textarea" rows="5" placeholder="Ваше сообщение..." required></textarea>
                        </div>
                        <button type="submit" class="contact-submit-btn">
                            <i class="bi bi-send"></i> Отправить
                        </button>
                    </form>
                    <div id="contactSuccess" class="contact-success" style="display: none;">
                        <i class="bi bi-check-circle"></i>
                        <h3>Отправлено!</h3>
                        <p>Мы свяжемся с вами в ближайшее время.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .page-hero { padding: 160px 0 100px; text-align: center; position: relative; overflow: hidden; background: linear-gradient(135deg, rgba(99,102,241,0.08), rgba(139,92,246,0.05)); }
    [data-theme="dark"] .page-hero { background: linear-gradient(135deg, rgba(99,102,241,0.12), rgba(139,92,246,0.08)); }
    .page-hero-orb { position: absolute; border-radius: 50%; filter: blur(100px); opacity: 0.12; }
    .page-hero-orb-1 { width: 500px; height: 500px; background: #6366f1; top: -200px; left: -100px; }
    .page-hero-orb-2 { width: 400px; height: 400px; background: #8b5cf6; bottom: -150px; right: -100px; }
    .page-hero-content { position: relative; z-index: 1; max-width: 700px; margin: 0 auto; }
    .page-hero h1 { font-family: 'Montserrat', sans-serif; font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 900; color: var(--text-heading); margin-bottom: 16px; }
    .page-hero p { font-size: 1.2rem; color: var(--text-secondary); }
    .text-gradient { background: linear-gradient(135deg, #6366f1, #8b5cf6); -webkit-background-clip: text; background-clip: text; color: transparent; }
    .section-badge { display: inline-flex; align-items: center; gap: 8px; padding: 8px 20px; background: rgba(99,102,241,0.08); border: 1px solid rgba(99,102,241,0.15); border-radius: 100px; color: #6366f1; font-weight: 600; font-size: 0.85rem; margin-bottom: 20px; }
    .section-badge-light { background: rgba(255,255,255,0.15); border-color: rgba(255,255,255,0.2); color: white; }

    .contact-section { padding: 80px 0; }
    .contact-grid { display: grid; grid-template-columns: 1fr 1.2fr; gap: 48px; align-items: start; }
    .contact-info h2 { font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-heading); margin-bottom: 8px; }
    .contact-desc { color: var(--text-secondary); margin-bottom: 32px; }
    .contact-cards { display: flex; flex-direction: column; gap: 14px; }
    .contact-card { display: flex; align-items: center; gap: 16px; padding: 20px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; transition: all 0.3s; }
    .contact-card:hover { border-color: rgba(99,102,241,0.3); transform: translateX(4px); }
    .contact-card-icon { width: 48px; height: 48px; border-radius: 14px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; color: #6366f1; font-size: 1.15rem; flex-shrink: 0; }
    .contact-card h4 { font-size: 0.95rem; font-weight: 700; color: var(--text-heading); margin-bottom: 2px; }
    .contact-card p { color: var(--text-secondary); font-size: 0.88rem; }

    .contact-form-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: 24px; padding: 40px; box-shadow: 0 20px 40px rgba(0,0,0,0.08); }
    .contact-form-card h2 { font-family: 'Montserrat', sans-serif; font-size: 1.6rem; font-weight: 900; color: var(--text-heading); margin-bottom: 8px; }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .form-group { margin-bottom: 16px; }
    .form-label { display: block; font-weight: 600; color: var(--text-secondary); margin-bottom: 6px; font-size: 0.88rem; }
    .form-input, .form-select, .form-textarea { width: 100%; padding: 14px 16px; border: 2px solid var(--border); border-radius: 14px; font-size: 0.95rem; font-family: 'Inter', sans-serif; transition: all 0.3s; background: var(--bg-body); color: var(--text-heading); }
    .form-input:focus, .form-select:focus, .form-textarea:focus { outline: none; border-color: #6366f1; box-shadow: 0 0 0 4px rgba(99,102,241,0.1); }
    .form-textarea { resize: vertical; min-height: 120px; }
    .contact-submit-btn { display: inline-flex; align-items: center; gap: 10px; background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white; border: none; border-radius: 14px; padding: 14px 36px; font-size: 1rem; font-weight: 700; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 16px rgba(99,102,241,0.3); }
    .contact-submit-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(99,102,241,0.4); }
    .contact-success { text-align: center; padding: 40px 20px; }
    .contact-success i { font-size: 3rem; color: #10b981; margin-bottom: 16px; }
    .contact-success h3 { font-size: 1.2rem; font-weight: 700; color: var(--text-heading); margin-bottom: 8px; }
    .contact-success p { color: var(--text-secondary); }

    @media (max-width: 768px) { .contact-grid { grid-template-columns: 1fr; } .form-row { grid-template-columns: 1fr; } }
</style>
@endpush

@push('scripts')
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    this.style.display = 'none';
    document.getElementById('contactSuccess').style.display = 'block';
});
</script>
@endpush
