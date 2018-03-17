@extends ('cabinet/cabinet')

@section('titles')
    <li role = "presentation">
        <a class="link-resume" href={{route('resume.index')}}>
            <span>{!! Html::image('image/allresumes.png','Res',['id'=>'allresumes']) !!}</span>
            Мої резюме</a>
    </li>
    <li role = "presentation" >
        <a class="link-vacancy" href={{route('vacancy.index')}}>
            <span>{!! Html::image('image/allvacancies.png','Vac',['id'=>'allvacancies']) !!}</span>
            Мої вакансії</a>
    </li>
    <li role = "presentation" class="active">
        <a class="link-company" href={{route('company.index')}}>
            <span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span>
            Мої компанії</a>
    </li>
    <li role = "presentation">
        <a class="link-project" href={{route('cabinet.my_projects', Auth()->user()->id)}}>
            <span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allprojects']) !!}</span>
            {{ trans('resume.myprojects') }}</a>
    </li>
@stop

@section('contents')
    @if(isset($mes))
        <span>{{$mes}} <a href="{{ url('/company/create') }}">Створiть</a></span>
    @endif
    @include('Company._company')
@stop
