<hr>
<div class="row paginatorBlock">
    @if ($paginator->hasPages())
        <ul class="pagination">

            {{-- First Page Link / For Mobile --}}
            @if ($paginator->currentPage() == 1)
                <li class="disabled hide-md"><span>&#60;&#60;</span></li>
            @else
                <li class="prev hide-md"><a href="{{ $paginator->url(1) }}" rel="prev">&#60;&#60;</a></li>
            @endif

            {{-- Previous Page Link --}}
            @if ($paginator->currentPage() == 1)
                <li class="disabled"><span>&#60;</span></li>
            @else
                <li class="prev"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&#60;</a></li>
            @endif

            @if($paginator->currentPage() > 3)
                <li class="hidden-xs"><a href="{{ $paginator->url(1) }}">1</a></li>
            @endif

            {{-- Correct output when a few pages --}}
            @if($paginator->currentPage() > 3)
                @if( $paginator->lastPage()<8)
                    @if( $paginator->currentPage()>4)
                        <li class="disabled hidden-xs"><span>...</span></li>
                    @endif
                @else
                    <li class="disabled hidden-xs"><span>...</span></li>
                @endif
            @endif

            {{-- Active Page Iterator --}}
            @foreach(range(1, $paginator->lastPage()) as $i)
                @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                    @if ($i == $paginator->currentPage())
                        <li class="active"><span>{{ $i }}</span></li>
                    @else
                        <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endif
            @endforeach

            @if($paginator->currentPage() < $paginator->lastPage() - 3)
                <li class="disabled hidden-xs"><span>...</span></li>
            @endif

            @if($paginator->currentPage() < $paginator->lastPage() - 2)
                <li class="hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="next"><a href="{{ $paginator->nextPageUrl() }}" rel="next">&#62;</a></li>
            @else
                <li class="disabled"><span>&#62;</span></li>
            @endif

            {{-- Last Page Link / For Mobile --}}
            @if ($paginator->hasMorePages())
                <li class="next hide-md"><a href="{{ $paginator->url($paginator->lastPage()) }}" rel="next">&#62;&#62;</a></li>
            @else
                <li class="disabled hide-md"><span>&#62;&#62;</span></li>
            @endif

        </ul>
    @endif
</div>

<script>
    $(document).ready(
        function(){
            $(document).on('click', '.pagination a' , function(event){
                event.preventDefault();
                var url = $(this).attr('href');
                var dest = $('.test');
                console.log(url);

                $.ajax({
                    url: url,
                    success: function(resp){
                        var result = $(resp).filter('.test').html();
                        console.log(result);
                        $(dest).html(result)
                    }
                });
            });
        }
    );
</script>