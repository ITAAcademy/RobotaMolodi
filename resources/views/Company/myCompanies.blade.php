@extends ('cabinet/cabinet')
@section('titles')
    <li role = "presentation" >{!!link_to_route('vacancy.index','Мої вакансії')!!}</li>
    <li role = "presentation">{!!link_to_route('resume.index' ,'Мої резюме')!!}</li>
    <li role = "presentation" class="active">{!!link_to_route('company.index' ,'Мої компанії')!!}</li>
    <li role = "presentation" class="pull-right"><h4 class="btn btn-default btn_cr_ResVac">{!!link_to_route('company.create','Створити компанію')!!}</h4></li>


@stop
@section('contents')

    {{--<div class="row">--}}
        {{--<div class="crResVac navbar-right">--}}
            {{--<h4 class="btn btn-default btn_cr_ResVac">{!!link_to_route('company.create','Створити компанію')!!}</h4>--}}
        {{--</div>--}}
    {{--</div>--}}
    @yield('contents')
    <?php echo $child ?>




@stop