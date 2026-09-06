@extends('layouts.home')

@section('title', 'Олимпиады — Olympiada')

@section('content')
<section class="page-hero">
    <div class="page-hero-orb page-hero-orb-1"></div>
    <div class="page-hero-orb page-hero-orb-2"></div>
    <div class="container">
        <div class="page-hero-content reveal">
            <div class="section-badge section-badge-light"><i class="bi bi-trophy"></i> Олимпиады</div>
            <h1>Найди свой <span class="text-gradient">вызов</span></h1>
            <p>{{ $olympiads->total() }} олимпиад из разных стран мира</p>
        </div>
    </div>
</section>

<section class="search-section">
    <div class="container">
        <div class="search-filters reveal">
            <div class="search-filter-group">
                <label class="search-filter-label"><i class="bi bi-funnel"></i> Страна</label>
                <select class="search-filter-select" id="filterCountry" onchange="filterOlympiads()">
                    <option value="all">Все страны</option>
                    @foreach($countries as $country)
                        <option value="{{ $country }}">{{ $country }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search-filter-group">
                <label class="search-filter-label"><i class="bi bi-bar-chart"></i> Уровень</label>
                <select class="search-filter-select" id="filterLevel" onchange="filterOlympiads()">
                    <option value="all">Все уровни</option>
                    @foreach($levels as $level)
                        <option value="{{ $level }}">{{ $level }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search-filter-group">
                <label class="search-filter-label"><i class="bi bi-search"></i> Поиск</label>
                <input type="text" class="search-filter-input" id="filterSearch" placeholder="Название..." oninput="filterOlympiads()">
            </div>
        </div>

        <div class="search-results" id="olympiadsGrid">
            @foreach($olympiads as $olympiad)
            <div class="olympiad-card reveal"
                 data-country="{{ $olympiad->country }}"
                 data-level="{{ $olympiad->level }}"
                 data-title="{{ strtolower($olympiad->title) }}">
                <div class="card-top-bar"></div>
                <div class="card-badge">{{ $olympiad->level }}</div>
                <div class="card-body">
                    <div class="card-icon">
                        <i class="bi bi-{{ $olympiad->icon ?? 'trophy' }}"></i>
                    </div>
                    <h3 class="card-title">{{ $olympiad->title }}</h3>
                    <div class="card-subtitle">
                        <i class="bi bi-geo-alt"></i> {{ $olympiad->country }}
                    </div>
                    <p class="card-description">{{ $olympiad->description }}</p>
                    <div class="card-meta">
                        <div class="meta-item">
                            <i class="bi bi-calendar-event"></i>
                            <span>{{ $olympiad->date }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="bi bi-wallet2"></i>
                            <span>{{ $olympiad->cost }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div id="noResults" class="search-no-results" style="display: none;">
            <i class="bi bi-search"></i>
            <h3>Олимпиады не найдены</h3>
            <p>Попробуйте изменить фильтры</p>
            <button onclick="resetFilters()" class="search-reset-btn">
                <i class="bi bi-arrow-counterclockwise"></i> Сбросить
            </button>
        </div>

        @if($olympiads->hasPages())
        <div class="search-pagination">
            {{ $olympiads->links('pagination.custom') }}
        </div>
        @endif
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

    .search-section { padding: 60px 0 100px; }

    .search-filters {
        display: flex; gap: 16px; margin-bottom: 40px;
        background: var(--bg-card); border: 1px solid var(--border);
        border-radius: 20px; padding: 24px; flex-wrap: wrap;
    }

    .search-filter-group { flex: 1; min-width: 200px; }
    .search-filter-label { display: block; font-weight: 600; color: var(--text-secondary); margin-bottom: 8px; font-size: 0.85rem; }
    .search-filter-select, .search-filter-input {
        width: 100%; padding: 12px 16px; border: 2px solid var(--border); border-radius: 12px;
        font-size: 0.95rem; font-family: 'Inter', sans-serif; transition: all 0.3s;
        background: var(--bg-body); color: var(--text-heading);
    }
    .search-filter-select:focus, .search-filter-input:focus { outline: none; border-color: #6366f1; box-shadow: 0 0 0 4px rgba(99,102,241,0.1); }

    .search-results {
        display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 24px;
    }

    .olympiad-card {
        background: var(--bg-card); border: 1px solid var(--border); border-radius: 20px;
        overflow: hidden; transition: all 0.3s; position: relative;
    }
    .olympiad-card:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(0,0,0,0.08); }
    .olympiad-card.hidden { display: none; }
    .card-top-bar { height: 4px; background: linear-gradient(90deg, #6366f1, #8b5cf6, #06b6d4); }
    .card-badge { position: absolute; top: 18px; right: 18px; background: rgba(99,102,241,0.12); color: #6366f1; padding: 5px 14px; border-radius: 8px; font-weight: 600; font-size: 0.78rem; }
    .card-body { padding: 28px; }
    .card-icon { width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(139,92,246,0.1)); display: flex; align-items: center; justify-content: center; margin-bottom: 18px; font-size: 1.3rem; color: #6366f1; }
    .card-title { font-size: 1.15rem; font-weight: 700; margin-bottom: 8px; color: var(--text-heading); line-height: 1.3; }
    .card-subtitle { display: flex; align-items: center; gap: 6px; color: var(--text-secondary); margin-bottom: 14px; font-weight: 500; font-size: 0.9rem; }
    .card-subtitle i { color: #6366f1; }
    .card-description { color: var(--text-secondary); line-height: 1.6; margin-bottom: 20px; font-size: 0.9rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .card-meta { display: flex; gap: 16px; padding-top: 16px; border-top: 1px solid var(--border); }
    .meta-item { display: flex; align-items: center; gap: 6px; color: var(--text-secondary); font-size: 0.85rem; }
    .meta-item i { color: #6366f1; }

    .search-no-results {
        text-align: center; padding: 80px 20px; color: var(--text-muted);
    }
    .search-no-results i { font-size: 3rem; display: block; margin-bottom: 16px; }
    .search-no-results h3 { font-size: 1.3rem; font-weight: 700; color: var(--text-heading); margin-bottom: 8px; }
    .search-no-results p { margin-bottom: 20px; }
    .search-reset-btn {
        display: inline-flex; align-items: center; gap: 8px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: white; border: none; border-radius: 12px; padding: 12px 28px;
        font-weight: 600; cursor: pointer; transition: all 0.3s;
    }
    .search-reset-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(99,102,241,0.4); }

    .search-pagination { margin-top: 40px; }
    .search-pagination .custom-pagination { display: flex; justify-content: center; }
    .search-pagination .pagination-list {
        display: flex; gap: 8px; list-style: none; margin: 0; padding: 0;
        background: var(--bg-card); border: 1px solid var(--border);
        border-radius: 14px; padding: 8px 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
    .search-pagination .page-link {
        display: flex; align-items: center; justify-content: center;
        min-width: 42px; height: 42px; padding: 0 14px; border-radius: 10px;
        font-weight: 600; font-size: 0.92rem; color: var(--text-secondary);
        text-decoration: none; transition: all 0.25s ease; background: transparent;
    }
    .search-pagination .page-link:hover {
        background: rgba(99,102,241,0.08); color: #6366f1; transform: translateY(-1px);
    }
    .search-pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white;
        box-shadow: 0 4px 12px rgba(99,102,241,0.35); font-weight: 700;
    }
    .search-pagination .page-item.disabled .page-link {
        color: var(--text-muted); opacity: 0.4; cursor: not-allowed; background: transparent;
    }
    .search-pagination .page-link i { font-size: 1rem; }

    @media (max-width: 768px) {
        .search-results { grid-template-columns: 1fr; }
        .search-filters { flex-direction: column; }
    }
</style>
@endpush

@push('scripts')
<script>
function filterOlympiads() {
    const country = document.getElementById('filterCountry').value;
    const level = document.getElementById('filterLevel').value;
    const search = document.getElementById('filterSearch').value.toLowerCase();
    const cards = document.querySelectorAll('.olympiad-card');
    let visible = 0;

    cards.forEach(card => {
        const c = card.dataset.country;
        const l = card.dataset.level;
        const t = card.dataset.title;
        let show = true;
        if (country !== 'all' && c !== country) show = false;
        if (level !== 'all' && l !== level) show = false;
        if (search && !t.includes(search)) show = false;

        if (show) { card.classList.remove('hidden'); visible++; }
        else { card.classList.add('hidden'); }
    });

    document.getElementById('noResults').style.display = visible === 0 ? 'block' : 'none';
}

function resetFilters() {
    document.getElementById('filterCountry').value = 'all';
    document.getElementById('filterLevel').value = 'all';
    document.getElementById('filterSearch').value = '';
    filterOlympiads();
}
</script>
@endpush
