<address>

    @foreach($vacancies as $vacancy)
        <strong>Вакансія : {{$vacancy->position}}</strong><br>
        Галузь : {{$vacancy->branch}}<br>
        Організація : {{$vacancy->organisation}}<br>
        Зарплата : {{$vacancy->salary}}<br>
        Опис :{{$vacancy->description}}<br>
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