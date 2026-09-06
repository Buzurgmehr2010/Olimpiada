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
