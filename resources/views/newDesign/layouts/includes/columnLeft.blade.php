<div class=" columnLeft">

    <ol class="menu">
        <a href="{{route('admin.news.index')}}">
            <div class="row">
                <div class="col l12">
                    <li><p>Новини</p></li>
                </div>
            </div>
        </a>

        <a href="{{route('admin.slider.index')}}">
            <div class="row">
                <div class="col l12">
                    <li><p>Слайдер</p></li>
                </div>
            </div>
        </a>

        <a href="{{route('admin.industry.index')}}">
            <div class="row">
                <div class="col l12">
                    <li><p>Індустрії</p></li>
                </div>
            </div>
        </a>


        <a href="{{route('admin.about-us.index')}}">
            <div class="row">
                <div class="col l12">
                    <li><p>Про нас</p></li>
                </div>
            </div>
        </a>

        <a href="{{route('admin.seo-module.index')}}">
            <div class="row">
                <div class="col l12">
                    <li><p>СЕО модуль</p></li>
                </div>
            </div>
        </a>
        <a href="{{route('admin.users.index')}}">
            <div class="row">
                <div class="col l12">
                    <li><p>Користувачі</p></li>
                </div>
            </div>
        </a>

        <a href="{{route('admin.projects.index')}}">
            <div class="row">
                <div class="col l12">
                    <li><p>Проекти</p></li>
                </div>
            </div>
        </a>

        <div class="row blocked">
            <div class="col l12">
                <li><p align="center" class="blockedContent">Заблокований контент</p></li>
            </div>
        </div>

        <a href="{{route('admin.companies.index')}}">
            <div class="row">
                <div class="col l12">
                    <li><p>Компанії</p></li>
                </div>
            </div>
        </a>
        <a href="{{route('admin.vacancies.index')}}">
            <div class="row">
                <div class="col l12">
                    <li><p>Вакансії</p></li>
                </div>
            </div>
        </a>
        <a href="{{route('admin.resumes.index')}}">
            <div class="row">
                <div class="col l12">
                    <li><p>Резюме</p></li>
                </div>
            </div>
        </a>
        <a href="{{route('admin.client-id.index')}}">
            <div class="row">
                <div class="col 112">
                    <li><p>ClientId</p></li>
                </div>
            </div>
        </a>
    </ol>
</div>

<script>
    $('a').each(function () {
        if ($(this).attr('href')==location.href) {
            $(this).find('div').addClass('active');
        }});
</script>
