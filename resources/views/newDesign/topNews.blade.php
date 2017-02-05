@extends('#root')

@section('css')
    <link rel="stylesheet" type="text/css" href="newDesign/css/topVacancies.css">
@endsection

<div id="news" class="hidden-xs col-sm-3 news">

    <div>
        <a class="close-bt" href="#" title="Закрити Новини. З'явиться знов після перезавантаження сторінки" onclick="newsClose()">
            <img id="closenews" src="newDesign/image/topVacancies/modal_close_icon.png" alt="image_close">
        </a>
        <img class="tv-news-header1" src="newDesign/image/topVacancies/news.png" alt="image logo news">
        <p id="topvac2" class="tv-news-header2">НОВИНИ</p>
    </div>

    <div class="tv-news-list cool-scroll">
        <ul>
            <li>
                <span class="tv-news-date">10.06.2014</span><br>
                <a class="tv-link" href="#">
                    <p class="tvl-position">Інформацшйна компанія "Бабці голосують! А ти?</p>
                    <img src="#" alt="image">
                </a>
            </li>
            <li>
                <span class="tv-news-date">10.06.2014</span><br>
                <a class="tv-link" href="#">
                    <p class="tvl-position">Флешмоб "Не спи, не сри, не лінись, йди на вибори - зайебись"</p>
                    <img src="#" alt="image">
                </a>
            </li>
            <li>
                <span class="tv-news-date">10.06.2014</span><br>
                <a class="tv-link" href="#">
                    <p class="tvl-position">Менеджер по роботы  з продаж це втрата</p>
                    <img src="newDesign/image/topVacancies/elephant_1.png" alt="image_elephant">
                </a>
            </li>
            <li>
                <span class="tv-news-date">10.06.2014</span><br>
                <a class="tv-link" href="#">
                    <p class="tvl-position">Інформацшйна компанія бабці голосують! А ти?</p>
                    <img src="#" alt="image">
                </a>
            </li>
            <li>
                <span class="tv-news-date">10.06.2014</span><br>
                <a class="tv-link" href="#">
                    <p class="tvl-position">Інформацшйна компанія бабці голосують! А ти?</p>
                    <img src="newDesign/image/topVacancies/elephant_2.png" alt="image_elephant">
                </a>
            </li>
            <li>
                <span class="tv-news-date">10.06.2014</span><br>
                <a class="tv-link" href="#">
                    <p class="tvl-position">Інформацшйна компанія бабці голосують! А ти?</p>
                    <img src="#" alt="image_elephant">
                </a>
            </li>
            <li>
                <span class="tv-news-date">10.06.2014</span><br>
                <a class="tv-link" href="#">
                    <p class="tvl-position">Інформацшйна компанія бабці голосують! А ти?</p>
                    <img src="newDesign/image/topVacancies/elephant_2.png" alt="image_elephant">
                </a>
            </li>
        </ul>
    </div>
    <div class="tv-news-footer">
        <img src="newDesign/image/topVacancies/footer_logo.png" alt="image_logo_footer">
    </div>
</div>