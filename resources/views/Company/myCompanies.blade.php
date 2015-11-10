@extends ('cabinet/cabinet')
@section('titles')
    <li role = "presentation" >{!!link_to_route('vacancy.index','Мої вакансії')!!}</li>
    <li role = "presentation">{!!link_to_route('resume.index' ,'Мої резюме')!!}</li>
    <li role = "presentation" class="active">{!!link_to_route('company.index' ,'Мої компанії')!!}</li>
@stop

@section('btn')
    <div>
       <h4 class="btn btn-default btn_cr">{!!link_to_route('company.create','Створити компанію')!!}</h4>
    </div>
@stop

@section('contents')
    @yield('contents')
    <?php echo $child ?>
@stop