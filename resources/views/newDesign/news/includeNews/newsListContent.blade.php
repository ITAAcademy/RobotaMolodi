<link href="{{ asset('/css/newsList.css') }}" rel="stylesheet">
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">

<section class="contentNewsList">

    <div id="left-content-column" class="col-xs-9">
        @foreach($newsPagin as $oneNews)

            <div class="sectionNewsList">
                <a class="links" href="/news/{{$oneNews->id}}">
                    <h3>{{ $oneNews->name}}</h3>
                </a>
                @if($oneNews->img!='Not picture')
                    <img class="picture" src="{{ asset($oneNews->getPath().$oneNews->img) }}" >
                @endif

                <a class="links" href="/news/{{$oneNews->id}}">
                    <p class="read-next">Читати далі...</p>
                </a>

                <span class="drop">&bull;</span>
                <span><h4>Опубліковано </h4>{{date('j.m.Y', strtotime($oneNews->updated_at))}}</span>
            </div>
            <hr>
        @endforeach

            <div class="row paginatorr">
                <hr>
                @if($newsPagin->lastPage() > 1)
                    @include('newDesign.default', ['paginator' => $newsPagin])
                @endif
            </div>

    </div>

</section>