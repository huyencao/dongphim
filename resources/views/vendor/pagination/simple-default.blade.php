@if ($paginator->hasPages())
    <div class="link-backprev flex-center-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a><i class="fa fa-backward"></i>@lang('pagination.previous')</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-backward"></i>@lang('pagination.previous')</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')<i class="fa fa-forward"></i></a>
        @else
            <a>@lang('pagination.next')<i class="fa fa-forward"></i></a>
        @endif
    </div>
@endif
