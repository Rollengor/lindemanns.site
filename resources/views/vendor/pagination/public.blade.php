@if($paginator->hasPages())
    @php
        $currentPage = $paginator->currentPage();
        $lastPage = $paginator->lastPage();
    @endphp

    <ul>
        <li>
            @if ($paginator->onFirstPage())
                <span class="page-prev-link is-disabled" aria-hidden="true"></span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="page-prev-link {{ $paginator->onFirstPage() ? 'is-disabled' : '' }}"></a>
            @endif
        </li>

        @foreach ($elements as $element)
            @foreach ($element as $page => $url)
                @php
                    $isDisplayed = true;
                    $isDotts = false;
                    $isCurrentPage = $page == $currentPage;

                    if ($lastPage > 5) {
                        if ($currentPage < 3 && $page > 3 && $page < $lastPage) {
                            $isDisplayed = false;
                        } elseif ($currentPage > 2 && $currentPage < $lastPage - 1 && $page > 1 && ($page < $currentPage - 1 || $page > $currentPage + 1) && $page < $lastPage) {
                            $isDisplayed = false;
                        } elseif ($currentPage > $lastPage - 2 && $page > 1 && $page < $lastPage - 2) {
                            $isDisplayed = false;
                        }

                        if ($currentPage < 4 && $page === $lastPage - 1) {
                            $isDotts = true;
                        } elseif ($currentPage > 3 && $currentPage < $lastPage - 2 && ($page === 1 || $page === $lastPage - 1)) {
                            $isDotts = true;
                        } elseif ($currentPage > $lastPage - 3 && $page === 1) {
                            $isDotts = true;
                        }
                    }
                @endphp

                @if($isDisplayed)
                    <li><a href="{{ $url }}" class="page-link {{ $isCurrentPage ? 'is-active' : '' }}" {{ $isCurrentPage ? 'aria-current="page"' : '' }}>{{ $page }}</a></li>
                @endif

                @if($isDotts)
                    <li><span class="dots">...</span></li>
                @endif
            @endforeach
        @endforeach

        <li>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="page-next-link"></a>
            @else
                <span class="page-next-link is-disabled"></span>
            @endif
        </li>
    </ul>
@endif
