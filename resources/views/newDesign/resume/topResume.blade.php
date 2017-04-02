@extends('#root')

@section('css')
    <link rel="stylesheet" type="text/css" href="newDesign/css/topVacancies.css">
@endsection

<div id="topvac" class="col-sm-3 hidden-xs top-vac">

    <div id="topvac0">
        <a id="close-top-vac" class="close-bt" href="#" title="Закрити Топ вакансії. З'явиться знов після перезавантаження сторінки" onclick="topVacClose()">
            <img id="closetv" src="newDesign/image/topVacancies/modal_close_icon.png" alt="image_close">
        </a>
        <img id="topvac1" class="tv-news-header1" src="newDesign/image/topVacancies/topvacancies.png" alt="topvacancies">
        <p id="topvac2" class="tv-news-header2">топ вакансій</p>
    </div>

    <div id="add-vac-2-top" class="add2top">
        <a href="#"><p>+ <span>Розмістити вакансію в ТОПі</span></p></a>
    </div>

    <div id="tv-news-list" class="tv-news-list cool-scroll">
        <ul>
            <li id="top-vac-li-1">
                <span id="top-vac-li-1-date" class="tv-news-date">10.06.2014</span>
                <a id="top-vac-1" class="tv-link" href="index_resume_2.html">
                    <p id="top-vac-1-pos" class="tvl-position">Продавец шмоток и старого мотлоха, ООО Рекламное агентство Риелторская Сотня, Вінниця</p>
                    <p id="top-vac-li-1-salary" class="tvl-salary">500-5 000 USD</p>
                </a>
            </li>
            <li id="top-vac-li-2">
                <span id="top-vac-li-2-date" class="tv-news-date">02.11.2016</span>
                <a id="top-vac-2" class="tv-link" href="index_resume_4.html">
                    <p id="top-vac-2-pos" class="tvl-position">Разработка и оптимизация сайтов, Вінниця</p>
                    <p id="top-vac-li-2-salary" class="tvl-salary">1500 - 2 500 USD</p>
                </a>
            </li>
            <li id="top-vac-li-3">
                <span id="top-vac-li-3-date" class="tv-news-date">14.02.2016</span>
                <a id="top-vac-3" class="tv-link" href="index_resume_0.html">
                    <p id="top-vac-3-pos" class="tvl-position">Распространение информации (публикация рекламы), Киев</p>
                    <p id="top-vac-li-3-salary" class="tvl-salary">300 - 1 000 USD</p>
                </a>
            </li>
            <li id="top-vac-li-4">
                <span id="top-vac-li-4-date" class="tv-news-date">03.11.2016</span>
                <a id="top-vac-4" class="tv-link" href="#">
                    <p id="top-vac-4-pos" class="tvl-position">Бухгалтер, АСТАРТА, Київ</p>
                    <p id="top-vac-li-4-salary" class="tvl-salary">5000 - 7000 грн</p>
                </a>
            </li>
            <li id="top-vac-li-5">
                <span id="top-vac-li-5-date" class="tv-news-date">03.11.2016</span>
                <a id="top-vac-5" class="tv-link" href="#">
                    <p id="top-vac-5-pos" class="tvl-position">Електрогазозварник, ПАТ "МАЯК", Вінниця</p>
                    <p id="top-vac-li-5-salary" class="tvl-salary">5000 - 7000 грн</p>
                </a>
            </li>
            <li id="top-vac-li-6">
                <span id="top-vac-li-6-date" class="tv-news-date">06.12.2016</span>
                <a id="top-vac-6" class="tv-link" href="#">
                    <p id="top-vac-6-pos" class="tvl-position">Експерт, БТІ, Горішні Плавні</p>
                    <p id="top-vac-li-6-salary" class="tvl-salary">5500 - 7000 грн</p>
                </a>
            </li>
            <li id="top-vac-li-7">
                <span id="top-vac-li-7-date" class="tv-news-date">06.12.2016</span>
                <a id="top-vac-7" class="tv-link" href="#">
                    <p id="top-vac-7-pos" class="tvl-position">Стропальник, Кран-Ко, Горішні Плавні</p>
                    <p id="top-vac-li-7-salary" class="tvl-salary">3500 - 7000 грн</p>
                </a>
            </li>
            <li id="top-vac-li-8">
                <span id="top-vac-li-8-date" class="tv-news-date">06.12.2016</span>
                <a id="top-vac-8" class="tv-link" href="#">
                    <p id="top-vac-8-pos" class="tvl-position">Бендеровець, Львів</p>
                    <p id="top-vac-li-8-salary" class="tvl-salary">6600 - 7700 грн</p>
                </a>
            </li>
            <li id="top-vac-li-9">
                <span id="top-vac-li-9-date" class="tv-news-date">06.12.2016</span>
                <a id="top-vac-9" class="tv-link" href="#">
                    <p id="top-vac-9-pos" class="tvl-position">Солдат, ЗСУ, с.Піски</p>
                    <p id="top-vac-li-9-salary" class="tvl-salary">10000 - 12000 грн</p>
                </a>
            </li>
            <li id="top-vac-li-10">
                <span id="top-vac-li-10-date" class="tv-news-date">06.12.2016</span>
                <a id="top-vac-10" class="tv-link" href="#">
                    <p id="top-vac-10-pos" class="tvl-position">Блогер, на хаті</p>
                    <p id="top-vac-li-10-salary" class="tvl-salary">500 - 700 грн</p>
                </a>
            </li>
            <li id="top-vac-li-11">
                <span id="top-vac-li-11-date" class="tv-news-date">10.06.2014</span>
                <a id="top-vac-11" class="tv-link" href="#">
                    <p id="top-vac-11-pos" class="tvl-position">Call-менеджер, ТОВ "Дзвоніть-ми все розкажемо", Тернопіль</p>
                    <p id="top-vac-li-11-salary" class="tvl-salary">2500 - 3000 грн</p>
                </a>
            </li>
            <li id="top-vac-li-12">
                <span id="top-vac-li-12-date" class="tv-news-date">16.12.2015</span>
                <a id="top-vac-12" class="tv-link" href="#">
                    <p id="top-vac-12-pos" class="tvl-position">Программіст PHP, Ciclum, Вінниця</p>
                    <p id="top-vac-li-12-salary" class="tvl-salary">25000 - 30000 грн</p>
                </a>
            </li>
            <li id="top-vac-li-13">
                <span id="top-vac-li-13-date" class="tv-news-date">22.01.2015</span>
                <a id="top-vac-13" class="tv-link" href="#">
                    <p id="top-vac-13-pos" class="tvl-position">Прибиральник туалетів, ЖЕУ-3, Житомир</p>
                    <p id="top-vac-li-13-salary" class="tvl-salary">1500 - 2000 грн</p>
                </a>
            </li>
            <li id="top-vac-li-14">
                <span id="top-vac-li-14-date" class="tv-news-date">03.11.2016</span>
                <a id="top-vac-14" class="tv-link" href="#">
                    <p id="top-vac-14-pos" class="tvl-position">Бухгалтер, АСТАРТА, Київ</p>
                    <p id="top-vac-li-14-salary" class="tvl-salary">5000 - 7000 грн</p>
                </a>
            </li>
            <li id="top-vac-li-15">
                <span id="top-vac-li-15-date" class="tv-news-date">03.11.2016</span>
                <a id="top-vac-15" class="tv-link" href="#">
                    <p id="top-vac-15-pos" class="tvl-position">Сантехнік, Маріо, Гайсин</p>
                    <p id="top-vac-li-15-salary" class="tvl-salary">5000 - 7000 грн</p>
                </a>
            </li>

        </ul>
    </div>

    <div class="tv-news-footer">
        <img src="newDesign/image/topVacancies/footer_logo.png" alt="image_logo_footer">
    </div>
</div>