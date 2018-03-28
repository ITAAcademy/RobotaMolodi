<div class="col l2 m2 s2 columnLeft">
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
                    <li><p>Индустрии</p></li>
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
        {{--dropdown start--}}
        <a href="#" class="dropdown-button" data-activates="dropdown3">
            <div class="row" style="background-color: grey">
                <div class="col l12">
                    <li><p>{{ trans('navtab.blockedcontent') }}</p></li>
                </div>
            </div>
        </a>
        <ul id="dropdown3" class="dropdown-content">
            <li><a href="{{ route('admin.companies.index') }}">{{ trans('navtab.companies') }}</a></li>
            <li><a href="{{ route('admin.vacancies.index') }}">{{ trans('navtab.vacancies') }}</a></li>
            <li><a href="{{ route('admin.resumes.index') }}">{{ trans('navtab.resume') }}</a></li>
        </ul>
        {{--dropdown end--}}
    </ol>
</div>

<script>
    $('a').each(function () {
        if ($(this).attr('href') == location.href) {
            $(this).find('div').addClass('active');
        }
    });
</script>