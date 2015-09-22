@extends('cabinet/cabinet')
@section('titles')
    <li role = "presentation" >{!!link_to_route('vacancy.index','Мої вакансії')!!}</li>
    <li role = "presentation" class="active">{!!link_to_route('resume.index' ,'Мої резюме')!!}</li>
    <li role = "presentation" >{!!link_to_route('company.index' ,'Мої компанії')!!}</li>
@stop
@section('contents')

<div>
   <h4>{!! link_to_route('resume.create', 'Написати резюме') !!}</h4>
</div>


    @foreach($resumes as $resume) <!-- Прийом данних і вибірка необхідних полів і значень -->
        <article>
            <div class="panel panel-orange">
                <div class="panel-heading">   <h3>{!!$resume->position!!}</h3></div>
                <ul class="list-group">
                    <li class="list-group-item">  Ім'я :   {!!$resume->name_u!!}</li>
                    <li class="list-group-item">Галузь: {!!$resume->Industry()->name!!}</li>
                    <li class="list-group-item">    Зарплата: {!!$resume->salary!!} грн.</li>
                    <li class="list-group-item">     Опис: {{$resume->description}}</li>
                    <li class="list-group-item">  <a href="resume/{{$resume->id}}">Переглянути</a></li>
                </ul>
            </div>
            </p>
        </article>
    @endforeach

@stop
