<link href="{{ asset('/css/vacancies/vacanciesList.css') }}" rel="stylesheet">
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">
<div class="test">
    @foreach($vacancies as $vacancy)
            <div>
                <div class="section">
                    <a class="links" href="/vacancy/{{$vacancy->id}}">
                        <h3>{{ $vacancy->position}}</h3>
                    </a>
                    <h4>
                        <strong>{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</strong>
                    </h4>
                    <p class="text-left"> {{strip_tags($vacancy->description)}} </p>
                </div>

                <a class="links" href="/vacancy/{{$vacancy->id}}">
                    <p class="read-next">Читати далі...</p>
                </a>

                <div class="below-section">
                    <span>{{ $vacancy->Company()->company_name}}</span>
                </div>

                <a class="links" href="#">
                    <div class="line">

                        <span class="town">@foreach($vacancy->Cities()->get() as $city){{ $city->name}} @endforeach</span>
                        <span class="drop">&bull;</span>
                        <span class="data">{{date('j m Y', strtotime($vacancy->updated_at))}}</span>
                    </div>
                </a>
                <hr>
            </div>
    @endforeach

    <div class="row paginatorr">
        <hr>
        @if($vacancies->lastPage() > 1)
            <div class="sort-by hidden"> {{--for open need delete class "hidden"--}}
                <p class="pag-text">Показувати по:</p>
                <div class="pag-block-by no-active-pag-block">5</div>
                <div class="pag-block-by active-pag-block">10</div>
                <div class="pag-block-by no-active-pag-block">15</div>
            </div>
            @include('newDesign.default', ['paginator' => $vacancies])
        @endif
    </div>
</div>

@include('newDesign.jsForFilter', ['urlController' => 'filter.vacancies'])
