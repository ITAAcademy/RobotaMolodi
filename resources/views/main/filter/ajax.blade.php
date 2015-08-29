@extends('cabinet/cabinet')
@section('titles')
    @yield('panelTitle')
    @stop
@section('content')

<title>Robota Molodi</title>
<meta name="csrf_token" content="{{ csrf_token() }}" />
{!! Form::open(['method' => 'get',  'class'=>'form-inline']) !!}
<select name="city" class="form-control" id="selectCity" style="float: left;">
    <option value="0"> Усі міста</option>
    @foreach($cities as $city)
        <option value="{{$city->id}}"> {{$city->name}} </option>
    @endforeach
</select>
<select name="industry" class="form-control" id="selectIndustry" style="width: 200px">
    <option value="0"> Усі галузі</option>
    @foreach($industries as $industry)
        <option value="{{$industry->id}}"> {{$industry->name}} </option>
    @endforeach
</select>
{!!Form::close()!!}

@yield('category')


<?php //echo $posts->render(); ?>

<script>

//    $(window).on('hashchange', function() {
//        if (window.location.hash) {
//            var page = window.location.hash.replace('#', '');
//            if (page == Number.NaN || page <= 0) {
//                return false;
//            } else {
//                getPosts(page);
//            }
//        }
//    });
//    $(document).ready(function() {
//        $(document).on('click','.pagination a' , function (e) {
//            getPosts($(this).attr('href').split('page=')[1]);
//            e.preventDefault();
//        });
//        /////////////////////////////////////
//        $('#selectIndustry').change(function(){
//            $("div.list-group").empty();
//            var city_id = $('[name=city]').val();
//            var industry_id = $('[name=industry]').val();
//            var url = 'showVacancies';
//            sendAjax(city_id,industry_id,url);
//        });
//        /////////////////////////////////
//        $('#selectCity').change(function(){
//            $("div.list-group").empty();
//            var city_id = $('[name=city]').val();
//            var industry_id = $('[name=industry]').val();
//            var url = 'showVacancies';
//            sendAjax(city_id,industry_id,url);
//
//        });
//    });

</script>
@stop