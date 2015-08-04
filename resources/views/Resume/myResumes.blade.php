@extends('cabinet/cabinet')
@section('titles')
    <li role = "presentation" >{!!link_to_route('vacancy.index','Мої вакансії')!!}</li>
    <li role = "presentation" class="active">{!!link_to_route('resume.index' ,'Мої резюме')!!}</li>
    <li role = "presentation" >{!!link_to_route('company.index' ,'Мої компанії')!!}</li>
@stop
@section('contents')

<div>
    {!! link_to_route('resume.create', 'Написати резюме') !!}
</div>


    @foreach($resumes as $resume) <!-- Прийом данних і вибірка необхідних полів і значень -->
        <article>
            <h2>{!!$resume->position!!}</h2>
            <p>
                {!!$resume->name_u!!}
            </p>
            <p>
                Промисловість: {!!$resume->industry!!}
            </p>
            <p>
               Зарплата: {!!$resume->salary!!} грн.
            </p>
            <p>
                Опис: {{$resume->description}}
                <hr >
            </p>

        </article>
    @endforeach

@stop
