@if ($paginator->hasPages())
    <div class="pagi">
        <ul class="flex-center-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
{{--                <li><a href="?page={{$paginator->onFirstPage()}}" rel="prev">Đầu</a></li>--}}
            @else
                <li><span><a href="?page=1">Đầu</a></span></li>
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Trước</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>{{ $element }}</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a {{ $url }}>{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
{{--                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"></a></li>--}}
            @else
                <li><span></span></li>
            @endif
        </ul>
    </div>
@endif
