@extends('cabinet/cabinet')
@section('btn')
    <div>
        <h4 class="btn btn-default btn_cr" style="background:wheat; color:#ffffff;">{!!link_to_route('company.create','Створити компанію')!!}</h4>
    </div>
@stop
@section('titles')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <li role = "presentation" ><a href={{route('head','Всі вакансії')}}><span>{!! Html::image('image/allvacancies.png','Головна',['id'=>'allvacancies']) !!}</span> Всі вакансії</a></li>
    <li role = "presentation" ><a href={{route('main.resumes' ,'Всі резюме')}}><span>{!! Html::image('image/allresumes.png','Головна',['id'=>'allresumes']) !!}</span> Всі резюме</a></li>
    <li role = "presentation" class="active"><a href={{route('main.companies')}}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span> Всі компанії</a></li>

@stop
@section('content')

    <div class="posts">
        @if(count($companies) === 0)
            <br>
            <?php echo "Немає компаній по Вашому пошуку"?>
        @else
            <address>
                @foreach($companies as $company)
                    <article>

                        <a href="{{$url}}/{{$company->id}}"  class="link">
                            @include('Company._company')
                        </a>
                    </article>
            </address>
                @endforeach


        @endif
    </div>
@stop
