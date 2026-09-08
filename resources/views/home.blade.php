@extends('layouts.home')

@section('title', 'Olympiada — Найди свой вызов | Международные олимпиады')

@section('content')
<!-- Hero -->
<section class="hero" id="hero">
    <div class="hero-particles" id="particles"></div>
    <div class="hero-gradient-orb hero-orb-1"></div>
    <div class="hero-gradient-orb hero-orb-2"></div>
    <div class="hero-gradient-orb hero-orb-3"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge reveal">
                <span class="hero-badge-dot"></span>
                Платформа №1 для олимпиад
            </div>
            <h1 class="hero-title reveal">
                Найди свой<br>
                <span class="hero-gradient-text">вызов</span>
            </h1>
            <p class="hero-subtitle reveal">
                Более 250 олимпиад из 50+ стран мира. Найди подходящую олимпиаду по предмету, уровню и стране.
            </p>
            <div class="hero-actions reveal">
                <a href="/register" class="hero-btn-primary">
                    <span>Начать бесплатно</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
                <a href="#features" class="hero-btn-secondary">
                    <i class="bi bi-play-circle"></i>
                    <span>Как это работает</span>
                </a>
            </div>
            <div class="hero-trust reveal">
                <div class="hero-avatars">
                    <div class="hero-avatar" style="background: linear-gradient(135deg, #6366f1, #8b5cf6);">A</div>
                    <div class="hero-avatar" style="background: linear-gradient(135deg, #06b6d4, #10b981);">M</div>
                    <div class="hero-avatar" style="background: linear-gradient(135deg, #f59e0b, #ef4444);">D</div>
                    <div class="hero-avatar" style="background: linear-gradient(135deg, #8b5cf6, #ec4899);">E</div>
                    <div class="hero-avatar" style="background: linear-gradient(135deg, #10b981, #6366f1);">+</div>
                </div>
                <div class="hero-trust-text">
                    <strong>100,000+</strong> участников<br>
                    <span>уже используют Olympiada</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Logos -->
<section class="logos-section">
    <div class="container">
        <p class="logos-title reveal">Нам доверяют ведущие организации</p>
        <div class="logos-grid reveal">
            <div class="logo-item"><i class="bi bi-building"></i> UNESCO</div>
            <div class="logo-item"><i class="bi bi-globe-americas"></i> World Science</div>
            <div class="logo-item"><i class="bi bi-mortarboard"></i> MIT</div>
            <div class="logo-item"><i class="bi bi-cpu"></i> Tech Corp</div>
            <div class="logo-item"><i class="bi bi-award"></i> Science Foundation</div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="features-section" id="features">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-badge"><i class="bi bi-stars"></i> Возможности</div>
            <h2 class="section-title">Всё что нужно для <span class="text-gradient">победы</span></h2>
            <p class="section-desc">Мы создали платформу, которая помогает найти и участвовать в олимпиадах максимально удобно</p>
        </div>

        <div class="features-grid">
            <div class="feature-card feature-card-large reveal">
                <div class="feature-icon-wrap">
                    <i class="bi bi-search-heart"></i>
                </div>
                <h3>Умный поиск</h3>
                <p>Находите олимпиады по предмету, уровню, стране и дате. Наш алгоритм подберёт идеальный вариант именно для вас.</p>
                <div class="feature-tag">AI-powered</div>
            </div>

            <div class="feature-card reveal">
                <div class="feature-icon-wrap">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h3>Проверенные олимпиады</h3>
                <p>Каждая олимпиада проходит строгую модерацию перед публикацией на платформе.</p>
            </div>

            <div class="feature-card reveal">
                <div class="feature-icon-wrap">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <h3>Аналитика прогресса</h3>
                <p>Отслеживайте свой прогресс, участвуйте в нескольких олимпиадах и достигайте новых высот.</p>
            </div>

            <div class="feature-card reveal">
                <div class="feature-icon-wrap">
                    <i class="bi bi-globe-americas"></i>
                </div>
                <h3>Глобальное покрытие</h3>
                <p>Олимпиады из 50+ стран мира. Участвуйте в международных соревнованиях не выходя из дома.</p>
            </div>

            <div class="feature-card reveal">
                <div class="feature-icon-wrap">
                    <i class="bi bi-bell"></i>
                </div>
                <h3>Уведомления</h3>
                <p>Получайте уведомления о новых олимпиадах, дедлайнах и результатах в реальном времени.</p>
            </div>

            <div class="feature-card reveal">
                <div class="feature-icon-wrap">
                    <i class="bi bi-trophy"></i>
                </div>
                <h3>Сертификаты</h3>
                <p>Получайте сертификаты участника и победителя от ведущих образовательных организаций.</p>
            </div>
        </div>
    </div>
</section>

<!-- How it works -->
<section class="how-section" id="how">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-badge"><i class="bi bi-lightning"></i> Процесс</div>
            <h2 class="section-title">Как это работает</h2>
            <p class="section-desc">Три простых шага к вашей первой олимпиаде</p>
        </div>

        <div class="how-steps">
            <div class="how-step reveal">
                <div class="how-step-number">01</div>
                <div class="how-step-icon">
                    <i class="bi bi-person-plus"></i>
                </div>
                <h3>Регистрация</h3>
                <p>Создайте аккаунт за 30 секунд. Бесплатно, без ограничений.</p>
            </div>

            <div class="how-step-connector reveal"><i class="bi bi-arrow-right"></i></div>

            <div class="how-step reveal">
                <div class="how-step-number">02</div>
                <div class="how-step-icon">
                    <i class="bi bi-search"></i>
                </div>
                <h3>Поиск</h3>
                <p>Найдите подходящую олимпиаду с помощью умных фильтров.</p>
            </div>

            <div class="how-step-connector reveal"><i class="bi bi-arrow-right"></i></div>

            <div class="how-step reveal">
                <div class="how-step-number">03</div>
                <div class="how-step-icon">
                    <i class="bi bi-trophy"></i>
                </div>
                <h3>Победа</h3>
                <p>Участвуйте, побеждайте и получайте сертификаты.</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="stats-section" id="stats">
    <div class="stats-bg-pattern"></div>
    <div class="container">
        <div class="stats-grid reveal">
            <div class="stat-card">
                <div class="stat-icon-wrap"><i class="bi bi-trophy"></i></div>
                <div class="stat-number" data-count="250">0</div>
                <div class="stat-label">Олимпиад</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon-wrap"><i class="bi bi-globe-americas"></i></div>
                <div class="stat-number" data-count="50">0</div>
                <div class="stat-label">Стран мира</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon-wrap"><i class="bi bi-people"></i></div>
                <div class="stat-number" data-count="100000">0</div>
                <div class="stat-label">Участников</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon-wrap"><i class="bi bi-award"></i></div>
                <div class="stat-number" data-count="98">0</div>
                <div class="stat-label">% Довольных</div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials-section" id="testimonials">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-badge"><i class="bi bi-chat-quote"></i> Отзывы</div>
            <h2 class="section-title">Что говорят участники</h2>
            <p class="section-desc">Реальные отзывы от студентов, которые уже используют Olympiada</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card reveal">
                <div class="testimonial-stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p class="testimonial-text">"Olympiada помогла мне найти международную олимпиаду по математике. Я получил сертификат и теперь поступаю в лучший университет!"</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" style="background: linear-gradient(135deg, #6366f1, #8b5cf6);">A</div>
                    <div>
                        <div class="testimonial-name">Алексей Петров</div>
                        <div class="testimonial-role">Студент, Таджикистан</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card reveal">
                <div class="testimonial-stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p class="testimonial-text">"Удобный интерфейс, быстрый поиск. Нашёл олимпиаду по информатике за 2 минуты. Рекомендую всем!"</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" style="background: linear-gradient(135deg, #06b6d4, #10b981);">M</div>
                    <div>
                        <div class="testimonial-name">Мария Иванова</div>
                        <div class="testimonial-role">Ученица, Россия</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card reveal">
                <div class="testimonial-stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                </div>
                <p class="testimonial-text">"Лучшая платформа для поиска олимпиад. Я участвую уже 3-й год и каждый раз нахожу что-то новое."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" style="background: linear-gradient(135deg, #f59e0b, #ef4444);">D</div>
                    <div>
                        <div class="testimonial-name">Дмитрий Козлов</div>
                        <div class="testimonial-role">Преподаватель, Казахстан</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing -->
<section class="pricing-section" id="pricing">
    <div class="container">
        <div class="section-header reveal">
            <div class="section-badge"><i class="bi bi-tag"></i> Тарифы</div>
            <h2 class="section-title">Прозрачные <span class="text-gradient">цены</span></h2>
            <p class="section-desc">Выберите план, который подходит вам. Масштабируйтесь по мере роста</p>
        </div>

        <!-- Toggle -->
        <div style="display: flex; justify-content: center; gap: 8px; margin-bottom: 48px;" class="pricing-toggle reveal">
            <button class="pricing-toggle-btn active" id="toggleMonthly" onclick="switchPricing('monthly')">Ежемесячный</button>
            <button class="pricing-toggle-btn" id="toggleYearly" onclick="switchPricing('yearly')">
                Годовой <span style="background: rgba(16,185,129,0.1); color: #10b981; padding: 2px 8px; border-radius: 6px; font-size: 0.72rem; font-weight: 700; margin-left: 4px;">-20%</span>
            </button>
        </div>

        <div class="pricing-grid">
            <!-- Базовый -->
            <div class="pricing-card reveal">
                <div class="pricing-header">
                    <h3>Базовый</h3>
                    <div class="pricing-price">
                        <span class="price-monthly">₽0</span>
                        <span class="price-yearly" style="display:none;">₽0</span>
                    </div>
                    <p>Для начала пути</p>
                </div>
                <ul class="pricing-features">
                    <li><i class="bi bi-check-circle-fill"></i> Доступ ко всем олимпиадам</li>
                    <li><i class="bi bi-check-circle-fill"></i> Умный поиск и фильтры</li>
                    <li><i class="bi bi-check-circle-fill"></i> Базовые уведомления</li>
                    <li><i class="bi bi-check-circle-fill"></i> Профиль и личный кабинет</li>
                    <li style="color: #ccc;"><i class="bi bi-x-circle-fill"></i> Расширенная аналитика</li>
                    <li style="color: #ccc;"><i class="bi bi-x-circle-fill"></i> Сертификаты</li>
                    <li style="color: #ccc;"><i class="bi bi-x-circle-fill"></i> Поддержка 24/7</li>
                </ul>
                <a href="/register" class="pricing-btn">Начать бесплатно</a>
            </div>

            <!-- Про (популярный) -->
            <div class="pricing-card pricing-card-featured reveal">
                <div class="pricing-badge">⭐ Популярный</div>
                <div class="pricing-header">
                    <h3>Про</h3>
                    <div class="pricing-price">
                        <span class="price-monthly">₽990<span>/мес</span></span>
                        <span class="price-yearly" style="display:none;">₽792<span>/мес</span></span>
                    </div>
                    <p>Для серьёзных участников</p>
                </div>
                <ul class="pricing-features">
                    <li><i class="bi bi-check-circle-fill"></i> Всё из «Базовый»</li>
                    <li><i class="bi bi-check-circle-fill"></i> Расширенная аналитика и статистика</li>
                    <li><i class="bi bi-check-circle-fill"></i> Приоритетная поддержка</li>
                    <li><i class="bi bi-check-circle-fill"></i> Эксклюзивные олимпиады</li>
                    <li><i class="bi bi-check-circle-fill"></i> Сертификаты участника</li>
                    <li><i class="bi bi-check-circle-fill"></i> Подготовка к олимпиадам</li>
                    <li><i class="bi bi-check-circle-fill"></i> Облачное хранилище результатов</li>
                </ul>
                <a href="/register" class="pricing-btn pricing-btn-featured">Выбрать Про</a>
            </div>

            <!-- Команда -->
            <div class="pricing-card reveal">
                <div class="pricing-badge" style="background: linear-gradient(135deg, #f59e0b, #ef4444);">Для организаций</div>
                <div class="pricing-header">
                    <h3>Команда</h3>
                    <div class="pricing-price">
                        <span class="price-monthly">₽2990<span>/мес</span></span>
                        <span class="price-yearly" style="display:none;">₽2392<span>/мес</span></span>
                    </div>
                    <p>Для школ и образовательных учреждений</p>
                </div>
                <ul class="pricing-features">
                    <li><i class="bi bi-check-circle-fill"></i> Всё из «Про»</li>
                    <li><i class="bi bi-check-circle-fill"></i> До 50 учеников</li>
                    <li><i class="bi bi-check-circle-fill"></i> Панель управления командой</li>
                    <li><i class="bi bi-check-circle-fill"></i> API доступ</li>
                    <li><i class="bi bi-check-circle-fill"></i> Выделенный менеджер</li>
                    <li><i class="bi bi-check-circle-fill"></i> Кастомные олимпиады</li>
                    <li><i class="bi bi-check-circle-fill"></i> Отчёты и аналитика</li>
                    <li><i class="bi bi-check-circle-fill"></i> Интеграция с LMS</li>
                </ul>
                <a href="/contact" class="pricing-btn">Связаться</a>
            </div>
        </div>

        <!-- Trust bar -->
        <div style="text-align: center; margin-top: 48px;" class="reveal">
            <div style="display: inline-flex; align-items: center; gap: 32px; padding: 24px 40px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; flex-wrap: wrap; justify-content: center;">
                <div style="display: flex; align-items: center; gap: 8px; color: var(--text-secondary); font-size: 0.9rem;">
                    <i class="bi bi-shield-check" style="color: #10b981; font-size: 1.2rem;"></i>
                    <span>Безопасные платежи</span>
                </div>
                <div style="width: 1px; height: 24px; background: var(--border);"></div>
                <div style="display: flex; align-items: center; gap: 8px; color: var(--text-secondary); font-size: 0.9rem;">
                    <i class="bi bi-rotate-counterclockwise" style="color: #6366f1; font-size: 1.2rem;"></i>
                    <span>Отмена в любое время</span>
                </div>
                <div style="width: 1px; height: 24px; background: var(--border);"></div>
                <div style="display: flex; align-items: center; gap: 8px; color: var(--text-secondary); font-size: 0.9rem;">
                    <i class="bi bi-cash-coin" style="color: #10b981; font-size: 1.2rem;"></i>
                    <span>Гарантия возврата 30 дней</span>
                </div>
                <div style="width: 1px; height: 24px; background: var(--border);"></div>
                <div style="display: flex; align-items: center; gap: 8px; color: var(--text-secondary); font-size: 0.9rem;">
                    <i class="bi bi-headset" style="color: #6366f1; font-size: 1.2rem;"></i>
                    <span>Поддержка 24/7</span>
                </div>
            </div>
        </div>
    </div>
    <script>
        function switchPricing(type) {
            const monthlyEls = document.querySelectorAll('.price-monthly');
            const yearlyEls = document.querySelectorAll('.price-yearly');
            const monthlyBtn = document.getElementById('toggleMonthly');
            const yearlyBtn = document.getElementById('toggleYearly');

            if (type === 'yearly') {
                monthlyEls.forEach(el => el.style.display = 'none');
                yearlyEls.forEach(el => el.style.display = 'inline');
                yearlyBtn.classList.add('active');
                monthlyBtn.classList.remove('active');
            } else {
                monthlyEls.forEach(el => el.style.display = 'inline');
                yearlyEls.forEach(el => el.style.display = 'none');
                monthlyBtn.classList.add('active');
                yearlyBtn.classList.remove('active');
            }
        }
    </script>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container">
        <div class="cta-card reveal">
            <div class="cta-glow"></div>
            <h2>Готов начать свой путь к победе?</h2>
            <p>Присоединяйтесь к 100,000+ участников со всего мира</p>
            <div class="cta-actions">
                <a href="/register" class="cta-btn-primary">
                    <span>Зарегистрироваться бесплатно</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Hero */
    .hero {
        padding: 160px 0 120px;
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    .hero-particles { position: absolute; inset: 0; z-index: 0; }
    .hero-gradient-orb { position: absolute; border-radius: 50%; filter: blur(100px); opacity: 0.12; z-index: 0; }
    .hero-orb-1 { width: 600px; height: 600px; background: var(--primary); top: -200px; left: -150px; animation: float 8s ease-in-out infinite; }
    .hero-orb-2 { width: 500px; height: 500px; background: #8b5cf6; top: 30%; right: -150px; animation: float 10s ease-in-out infinite reverse; }
    .hero-orb-3 { width: 400px; height: 400px; background: #06b6d4; bottom: -100px; left: 40%; animation: float 12s ease-in-out infinite; }

    @keyframes float {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -30px) scale(1.05); }
        66% { transform: translate(-20px, 20px) scale(0.95); }
    }

    .hero-content { position: relative; z-index: 1; text-align: center; max-width: 850px; margin: 0 auto; }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 24px;
        background: rgba(var(--primary-rgb), 0.08);
        border: 1px solid rgba(var(--primary-rgb), 0.15);
        border-radius: 100px;
        color: var(--primary);
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 32px;
        backdrop-filter: blur(10px);
    }

    .hero-badge-dot {
        width: 8px; height: 8px; border-radius: 50%;
        background: #10b981; animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.5); }
    }

    .hero-title {
        font-family: 'Montserrat', sans-serif;
        font-size: clamp(3.5rem, 7vw, 6rem);
        font-weight: 900;
        line-height: 1.05;
        margin-bottom: 28px;
        color: var(--text-heading);
        letter-spacing: -0.02em;
    }

    .hero-gradient-text {
        background: linear-gradient(135deg, var(--primary), #8b5cf6, #06b6d4);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        position: relative;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        color: var(--text-secondary);
        margin-bottom: 44px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.7;
    }

    .hero-actions { display: flex; gap: 16px; justify-content: center; margin-bottom: 48px; flex-wrap: wrap; }

    .hero-btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, var(--primary), #8b5cf6);
        color: white;
        border: none;
        border-radius: 16px;
        padding: 18px 40px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        box-shadow: 0 4px 24px rgba(var(--primary-rgb), 0.35);
        position: relative;
        overflow: hidden;
    }

    .hero-btn-primary::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.2), transparent);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .hero-btn-primary:hover { transform: translateY(-3px); box-shadow: 0 8px 32px rgba(var(--primary-rgb), 0.45); }
    .hero-btn-primary:hover::before { opacity: 1; }
    .hero-btn-primary i { transition: transform 0.3s; }
    .hero-btn-primary:hover i { transform: translateX(4px); }

    .hero-btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--bg-card);
        color: var(--text-heading);
        border: 2px solid var(--border);
        border-radius: 16px;
        padding: 18px 36px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
    }

    .hero-btn-secondary:hover { border-color: var(--primary); color: var(--primary); transform: translateY(-3px); }

    .hero-trust { display: flex; align-items: center; gap: 16px; justify-content: center; }
    .hero-avatars { display: flex; }
    .hero-avatar {
        width: 44px; height: 44px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        color: white; font-weight: 700; font-size: 0.9rem;
        border: 3px solid var(--bg-body);
        margin-left: -12px;
    }
    .hero-avatar:first-child { margin-left: 0; }
    .hero-trust-text { text-align: left; font-size: 0.9rem; color: var(--text-secondary); }
    .hero-trust-text strong { color: var(--text-heading); font-size: 1.1rem; }

    /* Logos */
    .logos-section { padding: 60px 0; border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .logos-title { text-align: center; color: var(--text-muted); font-size: 0.88rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 32px; }
    .logos-grid { display: flex; justify-content: center; gap: 48px; flex-wrap: wrap; }
    .logo-item { display: flex; align-items: center; gap: 10px; color: var(--text-muted); font-size: 1.1rem; font-weight: 700; opacity: 0.5; transition: opacity 0.3s; }
    .logo-item:hover { opacity: 1; }
    .logo-item i { font-size: 1.4rem; }

    /* Section Common */
    .section-header { text-align: center; margin-bottom: 64px; }
    .section-badge {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 8px 20px; background: rgba(var(--primary-rgb), 0.08);
        border: 1px solid rgba(var(--primary-rgb), 0.15);
        border-radius: 100px; color: var(--primary);
        font-weight: 600; font-size: 0.85rem; margin-bottom: 20px;
    }
    .section-title { font-family: 'Montserrat', sans-serif; font-size: 2.8rem; font-weight: 900; color: var(--text-heading); margin-bottom: 16px; }
    .text-gradient { background: linear-gradient(135deg, var(--primary), #8b5cf6); -webkit-background-clip: text; background-clip: text; color: transparent; }
    .section-desc { color: var(--text-secondary); font-size: 1.15rem; max-width: 550px; margin: 0 auto; }

    /* Features */
    .features-section { padding: 120px 0; }
    .features-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
    .feature-card {
        background: var(--bg-card); border: 1px solid var(--border); border-radius: 24px;
        padding: 36px; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative; overflow: hidden;
    }
    .feature-card::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
        background: linear-gradient(90deg, var(--primary), #8b5cf6);
        opacity: 0; transition: opacity 0.3s;
    }
    .feature-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0,0,0,0.08); border-color: rgba(var(--primary-rgb), 0.3); }
    .feature-card:hover::before { opacity: 1; }
    .feature-card-large { grid-column: span 2; }
    .feature-icon-wrap {
        width: 60px; height: 60px; border-radius: 16px;
        background: linear-gradient(135deg, rgba(var(--primary-rgb), 0.1), rgba(139,92,246,0.1));
        display: flex; align-items: center; justify-content: center;
        font-size: 1.5rem; color: var(--primary); margin-bottom: 20px;
    }
    .feature-card h3 { font-size: 1.2rem; font-weight: 700; color: var(--text-heading); margin-bottom: 10px; }
    .feature-card p { color: var(--text-secondary); line-height: 1.7; font-size: 0.95rem; }
    .feature-tag {
        display: inline-block; padding: 4px 12px; border-radius: 6px;
        background: rgba(var(--primary-rgb), 0.1); color: var(--primary);
        font-size: 0.75rem; font-weight: 700; margin-top: 16px;
    }

    /* How it works */
    .how-section { padding: 120px 0; background: var(--bg-card); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .how-steps { display: flex; align-items: center; justify-content: center; gap: 32px; }
    .how-step {
        text-align: center; padding: 40px 32px; background: var(--bg-body);
        border-radius: 24px; border: 1px solid var(--border);
        flex: 1; max-width: 300px; transition: all 0.3s;
    }
    .how-step:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }
    .how-step-number {
        font-family: 'Montserrat', sans-serif; font-size: 3rem; font-weight: 900;
        background: linear-gradient(135deg, var(--primary), #8b5cf6);
        -webkit-background-clip: text; background-clip: text; color: transparent;
        opacity: 0.2; margin-bottom: 16px;
    }
    .how-step-icon {
        width: 64px; height: 64px; border-radius: 18px;
        background: linear-gradient(135deg, var(--primary), #8b5cf6);
        display: flex; align-items: center; justify-content: center;
        color: white; font-size: 1.5rem; margin: 0 auto 20px;
        box-shadow: 0 8px 24px rgba(var(--primary-rgb), 0.3);
    }
    .how-step h3 { font-size: 1.2rem; font-weight: 700; color: var(--text-heading); margin-bottom: 8px; }
    .how-step p { color: var(--text-secondary); font-size: 0.92rem; }
    .how-step-connector { color: var(--text-muted); font-size: 1.5rem; }

    /* Stats */
    .stats-section { padding: 100px 0; background: linear-gradient(135deg, var(--primary), #8b5cf6); position: relative; overflow: hidden; }
    .stats-bg-pattern {
        position: absolute; inset: 0;
        background-image: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 30px 30px; opacity: 0.4;
    }
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; position: relative; z-index: 1; }
    .stat-card {
        text-align: center; padding: 40px 20px;
        background: rgba(255,255,255,0.1); border-radius: 24px;
        backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.15);
        transition: all 0.3s;
    }
    .stat-card:hover { transform: translateY(-6px); background: rgba(255,255,255,0.15); }
    .stat-icon-wrap {
        width: 60px; height: 60px; border-radius: 16px;
        background: rgba(255,255,255,0.2);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 18px; font-size: 1.5rem; color: white;
    }
    .stat-number { font-family: 'Montserrat', sans-serif; font-size: 3rem; font-weight: 900; color: white; }
    .stat-label { color: rgba(255,255,255,0.85); font-size: 1rem; margin-top: 4px; }

    /* Testimonials */
    .testimonials-section { padding: 120px 0; }
    .testimonials-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
    .testimonial-card {
        background: var(--bg-card); border: 1px solid var(--border); border-radius: 24px;
        padding: 36px; transition: all 0.3s;
    }
    .testimonial-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }
    .testimonial-stars { color: #f59e0b; font-size: 0.9rem; margin-bottom: 16px; display: flex; gap: 2px; }
    .testimonial-text { color: var(--text-secondary); font-size: 1rem; line-height: 1.7; margin-bottom: 24px; font-style: italic; }
    .testimonial-author { display: flex; align-items: center; gap: 12px; }
    .testimonial-avatar {
        width: 48px; height: 48px; border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        color: white; font-weight: 700; font-size: 1rem;
    }
    .testimonial-name { font-weight: 700; color: var(--text-heading); font-size: 0.95rem; }
    .testimonial-role { color: var(--text-secondary); font-size: 0.82rem; }

    /* Pricing */
    .pricing-section { padding: 120px 0; background: var(--bg-card); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); }
    .pricing-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; align-items: start; }
    .pricing-card {
        background: var(--bg-body); border: 1px solid var(--border); border-radius: 24px;
        padding: 40px; transition: all 0.3s; position: relative;
    }
    .pricing-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }
    .pricing-card-featured {
        background: var(--bg-card);
        border: 2px solid var(--primary);
        box-shadow: 0 20px 40px rgba(var(--primary-rgb), 0.15);
        transform: scale(1.05);
    }
    .pricing-card-featured:hover { transform: scale(1.05) translateY(-6px); }
    .pricing-badge {
        position: absolute; top: -14px; left: 50%; transform: translateX(-50%);
        background: linear-gradient(135deg, var(--primary), #8b5cf6);
        color: white; padding: 6px 20px; border-radius: 100px;
        font-size: 0.82rem; font-weight: 700; white-space: nowrap;
    }
    .pricing-header { text-align: center; margin-bottom: 32px; }
    .pricing-header h3 { font-size: 1.3rem; font-weight: 700; color: var(--text-heading); margin-bottom: 8px; }
    .pricing-price { font-family: 'Montserrat', sans-serif; font-size: 3rem; font-weight: 900; color: var(--text-heading); margin-bottom: 4px; }
    .pricing-price span { font-size: 1rem; font-weight: 500; color: var(--text-secondary); }
    .pricing-header p { color: var(--text-secondary); font-size: 0.9rem; }
    .pricing-features { list-style: none; margin-bottom: 32px; }
    .pricing-features li { display: flex; align-items: center; gap: 10px; padding: 10px 0; color: var(--text-secondary); font-size: 0.92rem; border-bottom: 1px solid var(--border); }
    .pricing-features li:last-child { border-bottom: none; }
    .pricing-features i { font-size: 1rem; }
    .pricing-features .bi-check-circle-fill { color: #10b981; }
    .pricing-features .bi-x-circle-fill { color: #d1d5db; }
    .pricing-btn {
        display: block; text-align: center; padding: 16px;
        border-radius: 14px; font-weight: 700; font-size: 1rem;
        text-decoration: none; transition: all 0.3s;
        border: 2px solid var(--border); color: var(--text-heading);
    }
    .pricing-btn:hover { border-color: var(--primary); color: var(--primary); }
    .pricing-btn-featured {
        background: linear-gradient(135deg, var(--primary), #8b5cf6);
        color: white; border-color: transparent;
        box-shadow: 0 4px 16px rgba(var(--primary-rgb), 0.3);
    }
    .pricing-btn-featured:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(var(--primary-rgb), 0.4); }

    /* Pricing Toggle */
    .pricing-toggle { display: flex; justify-content: center; gap: 8px; margin-bottom: 48px; }
    .pricing-toggle-btn {
        padding: 10px 24px; border-radius: 12px; border: 2px solid var(--border);
        background: var(--bg-body); color: var(--text-secondary); font-weight: 600;
        font-size: 0.9rem; cursor: pointer; transition: all 0.3s;
        font-family: 'Inter', sans-serif;
    }
    .pricing-toggle-btn.active {
        background: linear-gradient(135deg, var(--primary), #8b5cf6);
        color: white; border-color: transparent;
        box-shadow: 0 4px 14px rgba(var(--primary-rgb), 0.3);
    }
    .pricing-toggle-btn:hover:not(.active) { border-color: var(--primary); color: var(--primary); }

    /* Trust bar */
    .trust-bar { display: flex; align-items: center; gap: 32px; padding: 24px 40px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; flex-wrap: wrap; justify-content: center; }
    .trust-item { display: flex; align-items: center; gap: 8px; color: var(--text-secondary); font-size: 0.9rem; }
    .trust-item i { font-size: 1.2rem; }
    .trust-divider { width: 1px; height: 24px; background: var(--border); }

    /* CTA */
    .cta-section { padding: 120px 0; }
    .cta-card {
        text-align: center; padding: 80px 40px;
        background: var(--bg-card); border: 1px solid var(--border);
        border-radius: 32px; position: relative; overflow: hidden;
    }
    .cta-glow {
        position: absolute; top: -200px; left: 50%; transform: translateX(-50%);
        width: 600px; height: 600px; border-radius: 50%;
        background: radial-gradient(circle, rgba(var(--primary-rgb), 0.15) 0%, transparent 70%);
    }
    .cta-card h2 { font-family: 'Montserrat', sans-serif; font-size: 2.5rem; font-weight: 900; color: var(--text-heading); margin-bottom: 16px; position: relative; z-index: 1; }
    .cta-card p { color: var(--text-secondary); font-size: 1.15rem; margin-bottom: 36px; position: relative; z-index: 1; }
    .cta-actions { position: relative; z-index: 1; }
    .cta-btn-primary {
        display: inline-flex; align-items: center; gap: 10px;
        background: linear-gradient(135deg, var(--primary), #8b5cf6);
        color: white; border: none; border-radius: 16px;
        padding: 18px 44px; font-size: 1.1rem; font-weight: 700;
        cursor: pointer; transition: all 0.3s; text-decoration: none;
        box-shadow: 0 4px 24px rgba(var(--primary-rgb), 0.35);
    }
    .cta-btn-primary:hover { transform: translateY(-3px); box-shadow: 0 8px 32px rgba(var(--primary-rgb), 0.45); }
    .cta-btn-primary i { transition: transform 0.3s; }
    .cta-btn-primary:hover i { transform: translateX(4px); }

    /* Responsive */
    @media (max-width: 992px) {
        .features-grid { grid-template-columns: 1fr 1fr; }
        .feature-card-large { grid-column: span 1; }
        .how-steps { flex-direction: column; }
        .how-step-connector { transform: rotate(90deg); }
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .testimonials-grid { grid-template-columns: 1fr; }
        .pricing-grid { grid-template-columns: 1fr; max-width: 400px; margin: 0 auto; }
        .pricing-card-featured { transform: none; }
        .pricing-card-featured:hover { transform: translateY(-6px); }
    }

    @media (max-width: 768px) {
        .hero { padding: 120px 0 80px; min-height: auto; }
        .hero-actions { flex-direction: column; align-items: center; }
        .features-grid { grid-template-columns: 1fr; }
        .logos-grid { gap: 24px; }
        .section-title { font-size: 2rem; }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Counter animation
    const counters = document.querySelectorAll('.stat-number[data-count]');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.dataset.count);
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    if (target >= 1000) {
                        entry.target.textContent = Math.floor(current).toLocaleString() + '+';
                    } else {
                        entry.target.textContent = Math.floor(current) + (target < 100 ? '%' : '+');
                    }
                }, 16);

                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => counterObserver.observe(counter));

    // Particles
    const particlesContainer = document.getElementById('particles');
    if (particlesContainer) {
        for (let i = 0; i < 30; i++) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: absolute;
                width: ${Math.random() * 4 + 2}px;
                height: ${Math.random() * 4 + 2}px;
                background: rgba(var(--primary-rgb), ${Math.random() * 0.3 + 0.1});
                border-radius: 50%;
                left: ${Math.random() * 100}%;
                top: ${Math.random() * 100}%;
                animation: particleFloat ${Math.random() * 10 + 10}s linear infinite;
                animation-delay: ${Math.random() * 5}s;
            `;
            particlesContainer.appendChild(particle);
        }
    }

    // Particle animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes particleFloat {
            0% { transform: translateY(0) translateX(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(${Math.random() > 0.5 ? '' : '-'}100px); opacity: 0; }
        }
    `;
    document.head.appendChild(style);
});
</script>
@endpush
