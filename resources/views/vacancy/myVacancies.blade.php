@extends ('cabinet/cabinet')

@section('titles')
    <li role = "presentation" class="active"><a href={{route('vacancy.index')}}><span>{!! Html::image('image/allvacancies.png','Vac',['id'=>'allvacancies']) !!}</span> Мої вакансії</a></li>
    <li role = "presentation"><a href={{route('resume.index')}}><span>{!! Html::image('image/allresumes.png','Res',['id'=>'allresumes']) !!}</span> Мої резюме</a></li>
    <li role = "presentation"><a href={{route('company.index')}}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span> Мої компанії</a></li>
@stop

@section('Create_res_vac')
    <h4 class="btn btn-default" style="background:wheat; color:#ffffff; ">{!! link_to_route('vacancy.create', 'Створити вакансію') !!}</h4>
@stop

@section ('contents')
    @include('vacancy._vacancy')

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="js/pagination.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="js/pagination.js"></script>
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
        });
    </script>
@stop
