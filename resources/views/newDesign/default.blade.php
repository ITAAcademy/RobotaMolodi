@if ($paginator->lastPage() > 1)
<div class="paginer-block">
    <ul class="pagination">
        <li class="color {{ ($paginator->currentPage() == 1) ? ' disabled color' : '' }}">
            <a href="{{ $paginator->url(1) }}"><b>&lt;&lt;</b></a>
        </li>
        <li class="color {{ ($paginator->currentPage() == 1) ? ' disabled color' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage()-1) }}"><b>&lt;</b></a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? 'activation' : '' }}">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="color {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled color' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage()+1) }}" ><b>&gt;</b></a>
        </li>
        <li class="color {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled color' : '' }}">
            <a href="{{ $paginator->url($paginator->lastPage()) }}" ><b>&gt;&gt;</b></a>
        </li>
    </ul>
</div>
@endif