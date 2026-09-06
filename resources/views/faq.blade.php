@extends('layouts.home')

@section('title', 'FAQ — Olympiada')

@section('content')
<section class="page-hero">
    <div class="page-hero-orb page-hero-orb-1"></div>
    <div class="page-hero-orb page-hero-orb-2"></div>
    <div class="container">
        <div class="page-hero-content reveal">
            <div class="section-badge section-badge-light"><i class="bi bi-question-circle"></i> FAQ</div>
            <h1>Частые <span class="text-gradient">вопросы</span></h1>
            <p>Ответы на все вопросы о платформе Olympiada</p>
        </div>
    </div>
</section>

<section class="faq-section">
    <div class="container">
        <div class="faq-categories reveal">
            <button class="faq-cat-btn active" onclick="filterFaq('all')">Все вопросы</button>
            <button class="faq-cat-btn" onclick="filterFaq('platform')">Платформа</button>
            <button class="faq-cat-btn" onclick="filterFaq('olympiad')">Олимпиады</button>
            <button class="faq-cat-btn" onclick="filterFaq('account')">Аккаунт</button>
            <button class="faq-cat-btn" onclick="filterFaq('other')">Другое</button>
        </div>

        <div class="faq-grid reveal">
            @foreach($faqs as $index => $faq)
            <div class="faq-item" x-data="{ open: false }" data-category="{{ $faq['category'] ?? 'platform' }}">
                <button @click="open = !open" class="faq-question" :class="{ 'active': open }">
                    <div class="faq-left">
                        <div class="faq-icon-wrap">
                            <i class="bi bi-{{ $faq['icon'] ?? 'question-circle' }}"></i>
                        </div>
                        <div class="faq-text-wrap">
                            <span class="faq-tag">{{ $faq['tag'] ?? 'Общее' }}</span>
                            <span class="faq-text">{{ $faq['q'] }}</span>
                        </div>
                    </div>
                    <div class="faq-chevron" :class="{ 'rotated': open }">
                        <i class="bi bi-chevron-down"></i>
                    </div>
                </button>
                <div x-show="open" x-collapse x-cloak class="faq-answer-wrap">
                    <div class="faq-answer">
                        <p>{{ $faq['a'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="faq-stats reveal">
            <div class="faq-stat-card">
                <div class="faq-stat-icon"><i class="bi bi-chat-dots"></i></div>
                <div class="faq-stat-number">10+</div>
                <div class="faq-stat-label">Вопросов</div>
            </div>
            <div class="faq-stat-card">
                <div class="faq-stat-icon"><i class="bi bi-check-circle"></i></div>
                <div class="faq-stat-number">100%</div>
                <div class="faq-stat-label">Ответов</div>
            </div>
            <div class="faq-stat-card">
                <div class="faq-stat-icon"><i class="bi bi-headset"></i></div>
                <div class="faq-stat-number">24/7</div>
                <div class="faq-stat-label">Поддержка</div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-card reveal">
            <div class="cta-glow"></div>
            <div class="cta-icon"><i class="bi bi-envelope-heart"></i></div>
            <h2>Не нашли ответ?</h2>
            <p>Напишите нам, и мы поможем разобраться</p>
            <div class="cta-buttons">
                <a href="/contact" class="cta-btn-primary">
                    <i class="bi bi-envelope"></i> Написать нам
                </a>
                <a href="https://t.me/" class="cta-btn-secondary" target="_blank">
                    <i class="bi bi-telegram"></i> Telegram
                </a>
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

    .faq-section { padding: 80px 0 60px; }

    .faq-categories {
        display: flex; gap: 10px; justify-content: center; margin-bottom: 48px; flex-wrap: wrap;
    }
    .faq-cat-btn {
        padding: 10px 24px; border-radius: 12px; border: 2px solid var(--border);
        background: var(--bg-card); color: var(--text-secondary); font-weight: 600;
        font-size: 0.9rem; cursor: pointer; transition: all 0.3s;
    }
    .faq-cat-btn:hover { border-color: #6366f1; color: #6366f1; }
    .faq-cat-btn.active {
        background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white;
        border-color: transparent; box-shadow: 0 4px 12px rgba(99,102,241,0.3);
    }

    .faq-grid { max-width: 900px; margin: 0 auto; display: flex; flex-direction: column; gap: 14px; }

    .faq-item {
        background: var(--bg-card); border: 1px solid var(--border); border-radius: 18px;
        overflow: hidden; transition: all 0.3s;
    }
    .faq-item:hover { border-color: rgba(99,102,241,0.25); box-shadow: 0 8px 24px rgba(0,0,0,0.04); }
    .faq-item.hidden { display: none; }

    .faq-question {
        width: 100%; display: flex; align-items: center; justify-content: space-between;
        padding: 22px 28px; background: none; border: none; cursor: pointer;
        text-align: left; transition: all 0.3s;
    }
    .faq-question:hover { background: rgba(99,102,241,0.02); }
    .faq-question.active { background: rgba(99,102,241,0.03); }

    .faq-left { display: flex; align-items: center; gap: 18px; flex: 1; min-width: 0; }
    .faq-icon-wrap {
        width: 48px; height: 48px; border-radius: 14px;
        background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1));
        display: flex; align-items: center; justify-content: center;
        color: #6366f1; font-size: 1.2rem; flex-shrink: 0;
    }
    .faq-question.active .faq-icon-wrap {
        background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white;
    }

    .faq-text-wrap { flex: 1; min-width: 0; }
    .faq-tag {
        display: inline-block; font-size: 0.72rem; font-weight: 700; color: #6366f1;
        text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 4px;
    }
    .faq-text { display: block; font-size: 1.05rem; font-weight: 600; color: var(--text-heading); line-height: 1.4; }

    .faq-chevron {
        width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center;
        background: var(--bg-body); color: var(--text-muted); flex-shrink: 0;
        transition: all 0.3s;
    }
    .faq-chevron i { font-size: 1rem; transition: transform 0.3s; }
    .faq-chevron.rotated { background: rgba(99,102,241,0.1); color: #6366f1; }
    .faq-chevron.rotated i { transform: rotate(180deg); }

    .faq-answer-wrap { border-top: 1px solid var(--border); }
    .faq-answer { padding: 24px 28px 28px 94px; }
    .faq-answer p { color: var(--text-secondary); font-size: 0.95rem; line-height: 1.8; }

    .faq-stats {
        display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;
        max-width: 700px; margin: 60px auto 0;
    }
    .faq-stat-card {
        background: var(--bg-card); border: 1px solid var(--border); border-radius: 18px;
        padding: 32px 20px; text-align: center; transition: all 0.3s;
    }
    .faq-stat-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(0,0,0,0.06); }
    .faq-stat-icon {
        width: 56px; height: 56px; border-radius: 16px; margin: 0 auto 16px;
        background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1));
        display: flex; align-items: center; justify-content: center;
        color: #6366f1; font-size: 1.4rem;
    }
    .faq-stat-number { font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-heading); }
    .faq-stat-label { color: var(--text-secondary); font-size: 0.88rem; margin-top: 4px; }

    .cta-section { padding: 60px 0 100px; }
    .cta-card {
        text-align: center; padding: 70px 40px; background: var(--bg-card);
        border: 1px solid var(--border); border-radius: 28px;
        position: relative; overflow: hidden;
    }
    .cta-glow { position: absolute; top: -200px; left: 50%; transform: translateX(-50%); width: 600px; height: 600px; border-radius: 50%; background: radial-gradient(circle, rgba(99,102,241,0.12) 0%, transparent 70%); }
    .cta-icon {
        width: 72px; height: 72px; border-radius: 20px; margin: 0 auto 24px;
        background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1));
        display: flex; align-items: center; justify-content: center;
        color: #6366f1; font-size: 2rem; position: relative; z-index: 1;
    }
    .cta-card h2 { font-family: 'Montserrat', sans-serif; font-size: 1.8rem; font-weight: 900; color: var(--text-heading); margin-bottom: 8px; position: relative; z-index: 1; }
    .cta-card p { color: var(--text-secondary); font-size: 1.05rem; margin-bottom: 32px; position: relative; z-index: 1; }
    .cta-buttons { display: flex; gap: 14px; justify-content: center; position: relative; z-index: 1; flex-wrap: wrap; }
    .cta-btn-primary {
        display: inline-flex; align-items: center; gap: 10px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white;
        border: none; border-radius: 14px; padding: 14px 36px;
        font-size: 1rem; font-weight: 700; text-decoration: none;
        transition: all 0.3s; box-shadow: 0 4px 16px rgba(99,102,241,0.3);
    }
    .cta-btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(99,102,241,0.4); }
    .cta-btn-secondary {
        display: inline-flex; align-items: center; gap: 10px;
        background: var(--bg-card); color: var(--text-secondary);
        border: 2px solid var(--border); border-radius: 14px; padding: 12px 36px;
        font-size: 1rem; font-weight: 700; text-decoration: none;
        transition: all 0.3s;
    }
    .cta-btn-secondary:hover { border-color: #0088cc; color: #0088cc; transform: translateY(-2px); }

    @media (max-width: 768px) {
        .faq-categories { gap: 8px; }
        .faq-cat-btn { padding: 8px 16px; font-size: 0.82rem; }
        .faq-question { padding: 18px 20px; }
        .faq-left { gap: 14px; }
        .faq-icon-wrap { width: 42px; height: 42px; font-size: 1rem; }
        .faq-text { font-size: 0.95rem; }
        .faq-answer { padding: 20px 20px 24px 76px; }
        .faq-stats { grid-template-columns: 1fr; max-width: 300px; }
        .cta-card { padding: 50px 24px; }
        .cta-buttons { flex-direction: column; align-items: center; }
    }
</style>
@endpush

@push('scripts')
<script>
function filterFaq(category) {
    document.querySelectorAll('.faq-cat-btn').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    document.querySelectorAll('.faq-item').forEach(item => {
        if (category === 'all' || item.dataset.category === category) {
            item.classList.remove('hidden');
        } else {
            item.classList.add('hidden');
        }
    });
}
</script>
@endpush
