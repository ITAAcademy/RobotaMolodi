<address>

    @foreach($vacancies as $vacancy)


        <div class="panel panel-orange">
            <div class="panel-heading"><strong>Вакансія : {{$vacancy->position}}</strong></div>
            <ul class="list-group">
                <li class="list-group-item"> Галузь : {!!$vacancy->Industry()->name!!}</li>
                <li class="list-group-item">Зарплата : {{$vacancy->salary}} грн</li>
                <li class="list-group-item">Опис :{{$vacancy->description}}</li>
                <li class="list-group-item">Компанія : {{$vacancy->ReadCompany()->company_name}}</li>
                <li class="list-group-item"> <a href="vacancy/{{$vacancy->id}}">Переглянути</a></li>
            </ul>
        </div>
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