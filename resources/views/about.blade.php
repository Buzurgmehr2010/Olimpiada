@extends('layouts.home')

@section('title', 'О нас — Olympiada')

@section('content')
<section class="page-hero">
    <div class="page-hero-orb page-hero-orb-1"></div>
    <div class="page-hero-orb page-hero-orb-2"></div>
    <div class="container">
        <div class="page-hero-content reveal">
            <div class="section-badge section-badge-light"><i class="bi bi-info-circle"></i> О нас</div>
            <h1>Делаем олимпиады<br><span class="text-gradient">доступными</span></h1>
            <p>Мы команда энтузиастов, которая верит в каждый талант</p>
        </div>
    </div>
</section>

<section class="about-mission">
    <div class="container">
        <div class="about-grid reveal">
            <div class="about-text">
                <div class="section-badge"><i class="bi bi-bullseye"></i> Миссия</div>
                <h2>Каждый талант заслуживает шанса</h2>
                <p>Мы создали платформу, которая помогает школьникам и студентам найти подходящую олимпиаду. Более 250 олимпиад из 50+ стран — все в одном месте.</p>
                <p>Наша цель — чтобы каждый талантливый ученик мог найти свой путь к победе, независимо от того, где он находится.</p>
                <a href="/register" class="hero-btn-primary" style="margin-top: 16px;">
                    <span>Присоединиться</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="about-visual">
                <div class="about-visual-card">
                    <div class="about-visual-icon"><i class="bi bi-trophy"></i></div>
                    <div class="about-visual-number">250+</div>
                    <div class="about-visual-label">Олимпиад</div>
                </div>
                <div class="about-visual-card about-visual-card-accent">
                    <div class="about-visual-icon"><i class="bi bi-globe-americas"></i></div>
                    <div class="about-visual-number">50+</div>
                    <div class="about-visual-label">Стран мира</div>
                </div>
                <div class="about-visual-card">
                    <div class="about-visual-icon"><i class="bi bi-people"></i></div>
                    <div class="about-visual-number">100K+</div>
                    <div class="about-visual-label">Участников</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-values">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-badge"><i class="bi bi-heart"></i> Ценности</div>
            <h2 class="section-title">Что нас <span class="text-gradient">движет</span></h2>
        </div>
        <div class="values-grid reveal">
            <div class="value-card">
                <div class="value-icon"><i class="bi bi-lightbulb"></i></div>
                <h3>Инновации</h3>
                <p>Используем современные технологии для лучшего опыта</p>
            </div>
            <div class="value-card">
                <div class="value-icon"><i class="bi bi-people-fill"></i></div>
                <h3>Сообщество</h3>
                <p>Создаём среду для общения и обмена опытом</p>
            </div>
            <div class="value-card">
                <div class="value-icon"><i class="bi bi-globe2"></i></div>
                <h3>Глобальность</h3>
                <p>Работаем для участников со всего мира</p>
            </div>
            <div class="value-card">
                <div class="value-icon"><i class="bi bi-shield-check"></i></div>
                <h3>Надёжность</h3>
                <p>Гарантируем качество и безопасность данных</p>
            </div>
        </div>
    </div>
</section>

<section class="about-team">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-badge"><i class="bi bi-people"></i> Команда</div>
            <h2 class="section-title">Наша команда</h2>
            <p class="section-desc">Люди, которые делают Olympiada лучше</p>
        </div>
        <div class="team-grid reveal">
            @foreach($team as $member)
            <div class="team-card">
                <div class="team-avatar">{{ $member['avatar'] }}</div>
                <h3>{{ $member['name'] }}</h3>
                <p>{{ $member['role'] }}</p>
                <div class="team-socials">
                    <a href="#"><i class="bi bi-telegram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-card reveal">
            <div class="cta-glow"></div>
            <h2>Присоединяйся к нам</h2>
            <p>Начни свой путь к победе уже сегодня</p>
            <a href="/register" class="cta-btn-primary">
                <span>Зарегистрироваться</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .page-hero {
        padding: 160px 0 100px;
        text-align: center;
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, rgba(99,102,241,0.08), rgba(139,92,246,0.05));
    }
    [data-theme="dark"] .page-hero { background: linear-gradient(135deg, rgba(99,102,241,0.12), rgba(139,92,246,0.08)); }
    .page-hero-orb { position: absolute; border-radius: 50%; filter: blur(100px); opacity: 0.12; }
    .page-hero-orb-1 { width: 500px; height: 500px; background: #6366f1; top: -200px; left: -100px; }
    .page-hero-orb-2 { width: 400px; height: 400px; background: #8b5cf6; bottom: -150px; right: -100px; }
    .page-hero-content { position: relative; z-index: 1; max-width: 700px; margin: 0 auto; }
    .page-hero h1 { font-family: 'Montserrat', sans-serif; font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 900; color: var(--text-heading); margin-bottom: 16px; }
    .page-hero p { font-size: 1.2rem; color: var(--text-secondary); }
    .text-gradient { background: linear-gradient(135deg, #6366f1, #8b5cf6); -webkit-background-clip: text; background-clip: text; color: transparent; }

    .about-mission { padding: 100px 0; }
    .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center; }
    .about-text h2 { font-family: 'Montserrat', sans-serif; font-size: 2.2rem; font-weight: 900; color: var(--text-heading); margin-bottom: 20px; }
    .about-text p { color: var(--text-secondary); font-size: 1.05rem; line-height: 1.8; margin-bottom: 16px; }

    .about-visual { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .about-visual-card {
        background: var(--bg-card); border: 1px solid var(--border); border-radius: 24px;
        padding: 32px 24px; text-align: center; transition: all 0.3s;
    }
    .about-visual-card:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(0,0,0,0.08); }
    .about-visual-card-accent { background: linear-gradient(135deg, #6366f1, #8b5cf6); border-color: transparent; color: white; }
    .about-visual-card-accent .about-visual-label { color: rgba(255,255,255,0.8); }
    .about-visual-icon { font-size: 1.5rem; margin-bottom: 12px; color: var(--primary); }
    .about-visual-card-accent .about-visual-icon { color: white; }
    .about-visual-number { font-family: 'Montserrat', sans-serif; font-size: 2.2rem; font-weight: 900; color: var(--text-heading); }
    .about-visual-card-accent .about-visual-number { color: white; }
    .about-visual-label { color: var(--text-secondary); font-size: 0.88rem; margin-top: 4px; }

    .about-values { padding: 100px 0; background: var(--bg-card); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .section-header { text-align: center; margin-bottom: 64px; }
    .section-badge { display: inline-flex; align-items: center; gap: 8px; padding: 8px 20px; background: rgba(99,102,241,0.08); border: 1px solid rgba(99,102,241,0.15); border-radius: 100px; color: #6366f1; font-weight: 600; font-size: 0.85rem; margin-bottom: 20px; }
    .section-title { font-family: 'Montserrat', sans-serif; font-size: 2.5rem; font-weight: 900; color: var(--text-heading); margin-bottom: 12px; }
    .section-desc { color: var(--text-secondary); font-size: 1.1rem; }
    .values-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; }
    .value-card { background: var(--bg-body); border: 1px solid var(--border); border-radius: 20px; padding: 32px 24px; text-align: center; transition: all 0.3s; }
    .value-card:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(0,0,0,0.08); }
    .value-icon { width: 56px; height: 56px; border-radius: 16px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; font-size: 1.3rem; color: #6366f1; }
    .value-card h3 { font-size: 1.1rem; font-weight: 700; color: var(--text-heading); margin-bottom: 8px; }
    .value-card p { color: var(--text-secondary); font-size: 0.9rem; }

    .about-team { padding: 100px 0; }
    .team-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; }
    .team-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: 24px; padding: 36px 20px; text-align: center; transition: all 0.3s; }
    .team-card:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(0,0,0,0.08); }
    .team-avatar { width: 72px; height: 72px; border-radius: 20px; background: linear-gradient(135deg, #6366f1, #8b5cf6); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; color: white; font-weight: 800; font-size: 1.5rem; }
    .team-card h3 { font-size: 1.05rem; font-weight: 700; color: var(--text-heading); margin-bottom: 4px; }
    .team-card p { color: var(--text-secondary); font-size: 0.88rem; margin-bottom: 16px; }
    .team-socials { display: flex; gap: 10px; justify-content: center; }
    .team-socials a { width: 36px; height: 36px; border-radius: 10px; background: rgba(99,102,241,0.08); display: flex; align-items: center; justify-content: center; color: #6366f1; text-decoration: none; transition: all 0.2s; }
    .team-socials a:hover { background: #6366f1; color: white; }

    .cta-section { padding: 100px 0; }
    .cta-card { text-align: center; padding: 80px 40px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 32px; position: relative; overflow: hidden; }
    .cta-glow { position: absolute; top: -200px; left: 50%; transform: translateX(-50%); width: 600px; height: 600px; border-radius: 50%; background: radial-gradient(circle, rgba(99,102,241,0.15) 0%, transparent 70%); }
    .cta-card h2 { font-family: 'Montserrat', sans-serif; font-size: 2.2rem; font-weight: 900; color: var(--text-heading); margin-bottom: 12px; position: relative; z-index: 1; }
    .cta-card p { color: var(--text-secondary); font-size: 1.1rem; margin-bottom: 32px; position: relative; z-index: 1; }
    .cta-btn-primary { display: inline-flex; align-items: center; gap: 10px; background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white; border: none; border-radius: 16px; padding: 16px 40px; font-size: 1.05rem; font-weight: 700; cursor: pointer; transition: all 0.3s; text-decoration: none; box-shadow: 0 4px 24px rgba(99,102,241,0.35); position: relative; z-index: 1; }
    .cta-btn-primary:hover { transform: translateY(-3px); box-shadow: 0 8px 32px rgba(99,102,241,0.45); }

    @media (max-width: 992px) { .about-grid { grid-template-columns: 1fr; } .values-grid, .team-grid { grid-template-columns: 1fr 1fr; } }
    @media (max-width: 768px) { .values-grid, .team-grid { grid-template-columns: 1fr; } .about-visual { grid-template-columns: 1fr; } }
</style>
@endpush
