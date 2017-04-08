
<link  href="{{ asset('/css/vacancies/topVacancies.css') }}" rel="stylesheet">


<div id="news" class="hidden-xs news">

    <div>
        <a id="close-news" class="close-bt" href="#" title="Закрити Новини. З'явиться знов після перезавантаження сторінки" onclick="newsClose()">
            <img id="closenews" src="/image/topVacancies/modal_close_icon.png" alt="image_close">
        </a>
        <img class="tv-news-header1" src="/image/topVacancies/news.png" alt="image logo news">
        <p id="topvac2" class="tv-news-header2">НОВИНИ</p>
    </div>
    <div class="tv-news-list cool-scroll">
    @foreach($news as $oneNews)

        <ul>
            <li>
                <span class="tv-news-date">{{$oneNews->created_at->format('d.m.Y')}}</span><br>
                <a class="tv-link" href="#">
                    <p class="tvl-position">{{$oneNews->name}}</p>
                    @if($oneNews->img!='Not picture')
                    <img class="picture" src="{{ asset($oneNews->getPath().$oneNews->img) }}">
                    @endif
                </a>
            </li>
        </ul>
    @endforeach
    </div>
    <div class="tv-news-footer">
        {{--<img src="/image/topVacancies/footer_logo.png" alt="image_logo_footer">--}}
    </div>
</div>