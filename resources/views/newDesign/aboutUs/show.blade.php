<link href="{{ asset('/css/aboutUsShow.css') }}" rel="stylesheet">
<div class="col-xs-12">
    <div class="container-link-menu">
        <div class="staticLinksMenu">
            <a class="btn" href="{{ url('about_us') }}">{{trans('header.about')}}</a>
        </div>
        <div class="staticLinksMenu">
            <a class="btn" href="{{ url('/news') }}">{{trans('header.news')}}</a>
        </div>
        <div class="staticLinksMenu">
            <a class="btn" href="{{ url('https://intita.com/courses')}}" target="_blank">{{trans('header.education')}}</a>
        </div>
        <div class="staticLinksMenu">
            <a class="btn" href="{{ url('http://www.profitday.info')}}" target="_blank">{{trans('header.carrierdays')}}</a>
        </div>
        <div class="staticLinksMenu">
            <a class="btn" href="{{ url('https://profitday.info/allcompanies')}}" target="_blank">{{trans('header.partners')}}</a>
        </div>
        <div class="staticLinksMenu">
            <a class="btn" href="{{ url('/contacts') }}">{{trans('header.contacts')}}</a>
        </div>
    </div>
</div>
