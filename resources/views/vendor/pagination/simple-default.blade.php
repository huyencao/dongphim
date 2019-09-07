@if ($paginator->hasPages())
    <div class="link-backprev flex-center-between">
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-backward"></i>@lang('pagination.next')</a>
        @else
            <a><i class="fa fa-backward"></i>@lang('pagination.next')</a>
        @endif


        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a>@lang('pagination.previous')<i class="fa fa-forward"></i></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')<i class="fa fa-forward"></i></a>
        @endif
    </div>
@endif