@extends('cabinet/cabinet')

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


<div class="posts">
    @include('main.vacancy')
</div>

<?php //echo $posts->render(); ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script>
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });
    $(document).ready(function() {
        $(document).on('click','.pagination a' , function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
        /////////////////////////////////////
        $('#selectIndustry').change(function(){
            $("div.list-group").empty();
            var city_id = $('[name=city]').val();
            var industry_id = $('[name=industry]').val();

            $.ajax({   //start of ajax
                url: "showVacancies",
                type: "POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {'city_id': city_id, 'industry_id': industry_id},
                success: function (json) {
                    $('.posts').html(json);
                    //location.hash = page;
                }
            });
        });
        /////////////////////////////////
        $('#selectCity').change(function(){
            $("div.list-group").empty();
            var city_id = $('[name=city]').val();
            var industry_id = $('[name=industry]').val();

            $.ajax({   //start of ajax
                url: "showVacancies",
                type: "POST",
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf_token"]').attr('content');
                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                data: {'city_id': city_id, 'industry_id': industry_id},
                success: function (json) {
                    $('.posts').html(json);

                }
            });
        });
    });
    function getPosts(page) {
        var city_id = $('[name=city]').val();
        var industry_id = $('[name=industry]').val();
        $.ajax({
            url : '?page=' + page + '&city_id=' + city_id + '&industry_id=' + industry_id ,
            dataType: 'json'
        }).done(function (data) {
            $('.posts').html(data);
            location.hash = page;
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }
</script>
@stop