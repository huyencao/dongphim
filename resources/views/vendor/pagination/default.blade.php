@if ($paginator->hasPages())
    <div class="pagination">
        <ul class="list-inline">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="list-inline-item"><span>Trang</span></li>
            @else
                <li class="list-inline-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Trang</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="list-inline-item">{{ $element }}</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="list-inline-item"><a  class="active">{{ $page }}</a></li>
                        @else
                            <li class="list-inline-item"><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="list-inline-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next"></a></li>
            @else
                <li class="list-inline-item"><span></span></li>
            @endif
        </ul>
    </div>
@endif
