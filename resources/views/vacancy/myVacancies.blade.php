@extends ('cabinet/cabinet')

@section('titles')
    <li role = "presentation" class="active">{!!link_to_route('vacancy.index','Мої вакансії')!!}</li>
    <li role = "presentation">{!!link_to_route('resume.index' ,'Мої резюме')!!}</li>
    <li role = "presentation">{!!link_to_route('company.index' ,'Мої компанії')!!}</li>
    @stop
@section ('contents')

    <div class="row">
        <div class="crResVac ">
            <h4 class="btn btn-default btn_cr_ResVac">{!!link_to_route('vacancy.create','Створити вакансію')!!}</h4>
        </div>
    </div>


    @yield('contents')
    <?php echo $child ?>



@stop