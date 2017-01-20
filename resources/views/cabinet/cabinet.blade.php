@extends('app')
@section('title')

    <div class="panel panel-default">

        <div class="panel-body" style="padding: inherit;position: absolute; margin-top: -5px;" >
            <ul class="nav nav-tabs">
                @yield('titles')
            </ul>

        </div>
    </div>
@stop
@section('content')


@yield('contents')




@stop


