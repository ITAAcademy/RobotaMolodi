@extends('app')
@section('content')
    <div>
        <ul class="nav nav-tabs">
            <li role = "presentation">{!!link_to_route('vacancy.index','Мої вакансії')!!}</li>
            <li role = "presentation">{!!link_to_route('resume.index' ,'Мої резюме')!!}</li>

        </ul>
    </div>
@yield('contents')




@stop


