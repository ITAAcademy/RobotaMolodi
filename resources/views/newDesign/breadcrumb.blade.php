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