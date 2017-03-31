@extends('app')
@section('title')

    <div class="panel panel-default">

        <div class="panel-body" style="padding: inherit;position: absolute; margin-top: -5px;" >
            <ul class="nav nav-tabs">

            </ul>

        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-xs-11 col-md-7 header-tabs">
            <ul class="nav nav-tabs">
                @yield('titles')
            </ul>
        </div>
    </div>

    @yield('contents')




@stop

