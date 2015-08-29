<address>

    @foreach($vacancies as $vacancy)
        <strong>Вакансія : {{$vacancy->position}}</strong><br>
        Галузь : {!!$vacancy->company()->company_name!!}<br>
        Зарплата : {{$vacancy->salary}}<br>
        Опис :{{$vacancy->description}}<br>
        Компанія : {{$vacancy->ReadCompany()->company_name}}<br>
        <a href="vacancy/{{$vacancy->id}}">Переглянути</a>
</address>
<br>
@endforeach
<?php
/**
 * Created by PhpStorm.
 * User: Quicks
 * Date: 15.07.2015
 * Time: 13:54
 */