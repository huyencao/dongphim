@if ($paginator->lastPage() > 1)
    <div class="link-backprev flex-center-between">
            <a class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}" href="{{ $paginator->url(1) }}"><i class="fa fa-backward"></i>Mới hơn</a>
            <a class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}" href="{{ $paginator->url($paginator->currentPage()+1) }}">Cũ hơn<i class="fa fa-forward"></i></a>
    </div>
@endif