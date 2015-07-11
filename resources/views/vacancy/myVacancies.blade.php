@extends ('app')

@section ('content')

    <div>
        <ul class="nav nav-tabs">
            <li role = "presentation">{!!link_to_route('Vacancy.index','Мої вакансії')!!}</li>

        </ul>
    </div>

    <div>
        <ul class="nav nav-tabs">
            <li role = "presentation">{!!link_to_route('Vacancy.create','Створити вакансію')!!}</li>
            <li role = "presentation">{!!link_to_route('Vacancy.edit','Редагувати вакансію')!!}</li>
            <li role = "presentation">{!!link_to_route('Vacancy.destroy','Видалити вакансію')!!}</li>
            <li role = "presentation">{!!link_to_route('Company.create','Створити компанію')!!}</li>
            <li role = "presentation">{!!link_to_route('Company.edit','Редагувати компанію')!!}</li>

        </ul>
    </div>
    @yield('contents')

    <!--<address>
        foreach($vacancies as $vacancy)
        <strong>Вакансія : {$vacancy->position}}</strong><br>
        Галузь : {$vacancy->branch}}<br>
        Організація : {$vacancy->organisation}}<br>
        Зарплата : {$vacancy->salary}}<br>
        Опис :{$vacancy->description}}<br>
        </address>
    <br>
    endforeach-->

@stop