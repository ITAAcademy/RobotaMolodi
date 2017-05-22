@extends('app')
@section('title')

@stop
@section('content')
    @include('newDesign.breadcrumb',['mainRout'=>'head','nameMainRout'=>'Головна', 'thirdRout'=>'Особистий кабінет','thirdRoutName'=>'','showDisplay'=>'none','secondRout'=>'head', 'nameSecondRout'=>''])

    <div class="row">
        <div class="col-xs-11 col-md-7 header-tabs">
            <ul class="nav nav-tabs">
                @yield('titles')
            </ul>
        </div>
    </div>


    <div class="contentAjax">
        @yield('contents')

    </div>
<script>
//    $('li[role="presentation"] a').click(function(){
//        var link = $(this).attr('href');
//        $.ajax({
//            url: link,
//            success: function(data){
//                $('.contentAjax').html(data)
//            }
//        });
//
//        return false;
//    })
</script>

@stop

