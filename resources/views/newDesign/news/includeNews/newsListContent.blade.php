<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">

<div class="ajaxLoader">
    <hr>

@foreach($newsPagin as $oneNews)

        <div class="sectionNewsList">
            <div class="row">
                <div id="pc" class="col-sm-4">
                    @if($oneNews->img!='Not picture')
                        <img class="pictureList" src="{{ asset($oneNews->getPath().$oneNews->img) }}" >
                    @else
                        <img class="pictureList" src="{{ asset('image/newsD.png') }}" >
                    @endif
                </div>

                <div class="col-sm-8">
                    <a class="links" href="/news/{{$oneNews->id}}">
                        <h3>{{ $oneNews->name}}</h3>
                    </a>
                </div>
            </div>

            <div class="row dateLink">
                <div class="col-xs-8">
                    <span class="drop">&bull;</span>
                    <span><h4>Опубліковано </h4>{{date('j.m.Y', strtotime($oneNews->updated_at))}}</span>
                </div>

                <div class="col-xs-4">
                    <a class="links" href="/news/{{$oneNews->id}}">
                        <p class="read-next">Читати далі...</p>
                    </a>
                </div>
            </div>

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