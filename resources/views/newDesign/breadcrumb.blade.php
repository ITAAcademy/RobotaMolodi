<link href="{{ asset('/css/breadcrumb.css') }}" rel="stylesheet">


    <div class="routeBreadcrumb">
        <ol class="breadcrumb">
            @foreach($breadcrumbs as $breadcrumb)
                @if ( !$breadcrumb['url'] )
                    <li class="active" href="">{{$breadcrumb['name']}}</li>
                @else
                    <li><a href="{{route($breadcrumb['url'])}}">{{$breadcrumb['name']}}</a> </li>
                @endif
            @endforeach
        </ol>
    </div>


{{--<div>--}}
    {{--<div class="routeBreadcrumb">--}}
        {{--<ol class="breadcrumb">--}}
            {{--<li><a href="{{route($mainRout)}}">{{$nameMainRout}}</a></li>--}}
            {{--<li style="display: {{$showDisplay}}"><a href="{{route($secondRout)}}" >{{$nameSecondRout}}</a> </li>--}}
            {{--<li class="active">{{$thirdRout}} {{$thirdRoutName}} </li>--}}
        {{--</ol>--}}
    {{--</div>--}}
{{--</div>--}}