@if ($paginator->hasPages())
<nav class="custom-pagination">
    <ul class="pagination-list">
        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link"><i class="bi bi-chevron-left"></i></span>
            </li>
        @else
            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}" class="page-link"><i class="bi bi-chevron-left"></i></a>
            </li>
        @endif

        {{-- Numbers --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <span class="page-link">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" class="page-link"><i class="bi bi-chevron-right"></i></a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link"><i class="bi bi-chevron-right"></i></span>
            </li>
        @endif
    </ul>
</nav>
@endif

<style>
.custom-pagination {
    display: flex;
    justify-content: center;
    padding: 20px 0;
}
.pagination-list {
    display: flex;
    gap: 8px;
    list-style: none;
    margin: 0;
    padding: 0;
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 8px 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.pagination-list .page-item {
    display: flex;
    align-items: center;
    justify-content: center;
}
.pagination-list .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 12px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.9rem;
    color: var(--text-secondary);
    text-decoration: none;
    transition: all 0.25s ease;
    background: transparent;
}
.pagination-list .page-link:hover:not(.disabled):not(.active) {
    background: rgba(99,102,241,0.08);
    color: #6366f1;
    transform: translateY(-1px);
}
.pagination-list .page-item.active .page-link {
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    color: white;
    box-shadow: 0 4px 12px rgba(99,102,241,0.35);
    font-weight: 700;
}
.pagination-list .page-item.disabled .page-link {
    color: var(--text-muted);
    opacity: 0.4;
    cursor: not-allowed;
    background: transparent;
}
.pagination-list .page-link i {
    font-size: 1rem;
}
</style>
