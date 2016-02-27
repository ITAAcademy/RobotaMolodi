@extends ('cabinet/cabinet')
@section('titles')
    <li role = "presentation" ><a href={{route('vacancy.index')}}><span>{!! Html::image('image/allvacancies.png','Vac',['id'=>'allvacancies']) !!}</span> Мої вакансії</a></li>
    <li role = "presentation"><a href={{route('resume.index')}}><span>{!! Html::image('image/allresumes.png','Res',['id'=>'allresumes']) !!}</span> Мої резюме</a></li>
    <li role = "presentation" class="active"><a href={{route('company.index')}}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span> Мої компанії</a></li>
@stop

@section('btn')
    <div>
       <h4 class="btn btn-default btn_cr" style="background:wheat; color:#ffffff;">{!!link_to_route('company.create','Створити компанію')!!}</h4>
    </div>
@stop

@section('contents')
    @yield('contents')
    <?php echo $child ?>
@stop
