<style>
    .pagination {
        position: relative;
        z-index: 999;
    }

    .pagination .page-link {
        position: relative;
        z-index: 999;
    }
</style>

@if ($paginator->hasPages())
    <div class="col-span-12 text-center">
        <ul class="pagination justify-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link arrow"><i class="fas fa-chevron-left text-xs"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link arrow" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                        <i class="fas fa-chevron-left text-xs"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @php
                            $bn_page = preg_replace_callback('/\d+/', function ($matches) {
                                return bangla_number($matches[0]);
                            }, $page);
                        @endphp

                        @if ($page == $paginator->currentPage())
                            <li class="page-item"><a class="page-link active" href="#">{{ isEnglish()?$page:$bn_page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ isEnglish()?$page:$bn_page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link arrow" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link arrow"><i class="fas fa-chevron-right text-xs"></i></span>
                </li>
            @endif
        </ul>
    </div>
@endif
