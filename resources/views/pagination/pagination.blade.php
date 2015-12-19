@if ($paginator->lastPage() > 1)
    <ul class="pagination">

        {{-- First page button --}}
    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url(1) }}"> << </a>
    </li>
        {{-- Prewious page button --}}
    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url($paginator->currentPage()-1) }}"> < </a>
    </li>

    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
    @endfor

        {{-- Next page button --}}
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" > > </a>
    </li>
        {{-- Last page button --}}

    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url($paginator->lastPage()) }}" > >> </a>
    </li>

</ul>
@endif