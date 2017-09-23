<link href="{{ asset('/css/aboutUsShow.css') }}" rel="stylesheet">
<div class="col-xs-12">
    <div class="container-link-menu">
        <div class="staticLinksMenu">
            <a class="btn" href="{{ url('aboutus') }}">{{trans('aboutus.about')}}</a>
        </div>
        <div class="staticLinksMenu">
            <a class="btn" href="{{ url('/news') }}">{{trans('aboutus.news')}}</a>
        </div>
        <div class="staticLinksMenu">
            <a class="btn" href="{{ url('https://intita.com/courses')}}" target="_blank">{{trans('aboutus.education')}}</a>
        </div>
        <div class="staticLinksMenu">
            <a class="btn" href="{{ url('http://www.profitday.info')}}" target="_blank">{{trans('aboutus.about')}}</a>
        </div>
        <div class="staticLinksMenu">
            <a class="btn" href="{{ url('https://profitday.info/allcompanies')}}" target="_blank">{{trans('aboutus.about')}}</a>
        </div>
        <div class="staticLinksMenu">
            <a class="btn" href="{{ url('/contacts') }}">{{trans('aboutus.about')}}</a>
        </div>
    </div>
</div>