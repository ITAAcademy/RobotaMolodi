<link  href="{{ asset('/css/vacancies/topVacancies.css') }}" rel="stylesheet">

<div id="topvac" class=" hidden-xs top-vac">

    <div id="topvac0">
        <a id="close-top-vac" class="close-bt" href="#" title="Закрити Топ вакансії. З'явиться знов після перезавантаження сторінки" >
            <img id="closetv" src="/image/topVacancies/modal_close_icon.png" alt="image_close">
        </a>
        <img id="topvac1" class="tv-news-header1" src="/image/topVacancies/topvacancies.png" alt="topvacancies">
        <p id="topvac2" class="tv-news-header2">топ вакансій</p>
    </div>

    <div id="add-vac-2-top" class="add2top">
        <a href="#"><p>+ <span>Розмістити вакансію в ТОПі</span></p></a>
    </div>

    <div id="tv-news-list" class="tv-news-list cool-scroll">
        <ul>
            @foreach($topVacancy as $vacancy)
            <li id="top-vac-li-{{$vacancy->id}}">
                <span id="top-vac-li-{{$vacancy->id}}-date" class="tv-news-date">{{date('j.m.Y', strtotime($vacancy->updated_at))}}</span>
                <a id="top-vac-{{$vacancy->id}}" class="tv-link" href="/vacancy/{{$vacancy->id}}">
                    <p id="top-vac-{{$vacancy->id}}-pos" class="tvl-position">{{$vacancy->position}}@foreach($vacancy->Cities()->get() as $city), {{ $city->name}}@endforeach</p>
                    <p id="top-vac-li-{{$vacancy->id}}-salary" class="tvl-salary">{{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</p>
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="tv-news-footer">
        <img src="/image/topVacancies/footer_logo.png" alt="image_logo_footer">
    </div>
</div>