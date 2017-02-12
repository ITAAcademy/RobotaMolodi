<link href="{{ asset('/css/vacancies/vacanciesList.css') }}" rel="stylesheet">
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">

@foreach($vacancies as $vacancy)
            <div id="vac0">
                <div class="section">
                    <a class="links" href="/vacancy/{{$vacancy->id}}">
                        <h3>{{ $vacancy->position}}</h3>
                    </a>
                    <h4>
                        <strong>{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</strong>
                    </h4>
                    <p class="text-left"> {{$vacancy->description}} </p>
                </div>

                <a class="links" href="/vacancy/{{$vacancy->id}}">
                    <p class="read-next">Читати далі...</p>
                </a>

                <div class="below-section">
                    <span>{{ $vacancy->Company()->company_name}}</span>
                </div>

                <a class="links" href="#">
                    <div class="line">
                        <span class="town">@foreach($vacancy->City() as $city){{ $city->name}} @endforeach</span>
                        <span class="drop">&bull;</span>
                        <span class="data">{{date('j m Y', strtotime($vacancy->updated_at))}}</span>
                    </div>
                </a>

                <hr>
            </div>
@endforeach

<div class="row paginator">
    <hr>

        <div class="sort-by">
            <p class="pag-text">Показувати по:</p>
            <div class="pag-block">20</div>
            <div class="pag-block activ-pag-block">50</div>
            <div class="pag-block">100</div>
        </div>
        <div class="paginator-page">
            <div class="pag-block">&lt;&lt;</div>
            <div class="pag-block">&lt;</div>
            <div class="pag-block">1</div>
            <div class="pag-block">2</div>
            <div class="pag-block">3</div>
            <div class="pag-block activ-pag-block">4</div>
            <div class="pag-block">...</div>
            <div class="pag-block">50</div>
            <div class="pag-block">&gt;</div>
            <div class="pag-block">&gt;&gt;</div>
        </div>

</div>
