@extends('cabinet/cabinet')
@section('titles')
    @yield('panelTitle')
@stop
@section('content')

<title>Robota Molodi</title>
<meta name="csrf_token" content="{{ csrf_token() }}" />
{!! Form::open(['method' => 'get',  'class'=>'form-inline']) !!}
<select name="city" multiple id="selectCity" style="float: left; width: 27%">
{{--<option value="empty">Уся Україна</option>--}}
    @foreach($cities as $city)
        <option value="{{$city->id}}"> {{$city->name}} </option>
    @endforeach
</select>
<select name="industry" class="js_drop_menu" id="selectIndustry" style="float: left;width: 40%">
    <option value="empty">Усі галузі</option>
    @foreach($industries as $industry2)
        <option value="{{$industry2->id}}"> {{$industry2->name}} </option>
    @endforeach
</select>
<select name="spec" class="js_drop_menu" id="selectSpecialisation" style="float: left;width: 31.5%">
    <option value="empty">Усі спеціалізації</option>
    @foreach($specialisation as $spec)
        <option value="{{$spec}}"> {{$spec}} </option>
    @endforeach
</select>
<div class="panel-group" id="collapse-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" id="collapseButton" data-parent="#collapse-group" data-target="#el1">Карта</a>
            </h4>
        </div>
        <div id="el1" class="panel-collapse collapse">
            <div class="panel-body">
                <div id="map-canvas" style="height: 300px"></div>
            </div>
        </div>
    </div>
</div>
{!!Form::close()!!}

@yield('category')
@stop


