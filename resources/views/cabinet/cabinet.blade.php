@extends('app')
@section('title')

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

