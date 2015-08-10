@extends ('cabinet/cabinet')
@section('titles')
    <li role = "presentation" >{!!link_to_route('vacancy.index','Мої вакансії')!!}</li>
    <li role = "presentation">{!!link_to_route('resume.index' ,'Мої резюме')!!}</li>
    <li role = "presentation" class="active">{!!link_to_route('company.index' ,'Мої компанії')!!}</li>
@stop
@section('contents')

    <div>
        <ul class="nav nav-tabs">
            <li role = "presentation">{!!link_to_route('company.create','Створити компанію')!!}</li>
        </ul>
    </div>
    @yield('contents')
    <?php echo $child ?>




@stop