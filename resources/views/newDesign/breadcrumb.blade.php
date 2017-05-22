<link href="{{ asset('/css/breadcrumb.css') }}" rel="stylesheet">
<div>
    <div class="routeBreadcrumb">
        <ol class="breadcrumb">
            <li><a href="{{route($mainRout)}}">{{$nameMainRout}}</a></li>
            <li style="display: {{$showDisplay}}"><a href="{{route($secondRout)}}" >{{$nameSecondRout}}</a> </li>
            <li class="active">{{$thirdRout}} {{$thirdRoutName}} </li>
        </ol>
    </div>
</div>