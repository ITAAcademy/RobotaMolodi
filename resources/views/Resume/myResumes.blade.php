@extends('cabinet/cabinet')

@section('titles')
    <li role = "presentation" ><a href={{route('vacancy.index')}}><span>{!! Html::image('image/allvacancies.png','Vac',['id'=>'allvacancies']) !!}</span> Мої вакансії</a></li>
    <li role = "presentation" class="active"><a href={{route('resume.index')}}><span>{!! Html::image('image/allresumes.png','Res',['id'=>'allresumes']) !!}</span> Мої резюме</a></li>
    <li role = "presentation" ><a href={{route('company.index')}}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span> Мої компанії</a></li>
@stop

@section('Create_res_vac')
    <h4 class="btn btn-default" style="background:wheat; color:#ffffff;">{!! link_to_route('resume.create', 'Написати резюме') !!}</h4>
@stop

@section('contents')

    @foreach($resumes as $resume) <!-- Прийом данних і вибірка необхідних полів і значень -->
    <article>
        <a href="resume/{{$resume->id}}" class="link">
            <div class="list">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="list-group-item-heading panel-title">{{$resume->branch}} Позиція: <span class="text-info" >{{$resume->position}}</span>  &#183; {{$resume->salary}} грн
                            <span class="text-muted text-right pull-right"><h5 id="{{$resume->id}}">
                                    <script>
                                        $('#'+'{{$resume->id}}').text(FormatDate({{strtotime($resume->created_at)}}));
                                    </script>
                                </h5></span></h3>
                </div>
                <div class="panel-body">
                    <h4 class="list-group-item-heading">@if(!$resume->getAttribute('resumeAllUkraine')){{ $resume->City()->name}} @else {{'Уся Україна'}} @endif </h4>
                    <h4 class="list-group-item-heading">{{ $resume->Industry()->name}}</h4>
                </div>
                </div>
            </div>
        </a>
    </article>
    @endforeach

{!! str_replace('/?', '?', $resumes->render()) !!}


@stop
