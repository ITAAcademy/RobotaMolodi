<address>

    @foreach($vacancies as $vacancy)


        <div class="panel panel-orange">
            <div class="panel-heading"><h3> {{$vacancy->position}} &#183; {{$vacancy->salary}} грн</h3></div>
            <ul class="list-group">
                <li class="list-group-item"> <a href="#">{{$vacancy->ReadCompany()->company_name}}</a> &#183; {!!$vacancy->Industry()->name!!} </li>
                <li class="list-group-item"> <a href="vacancy/{{$vacancy->id}}">Переглянути</a></li>
            </ul>
        </div>
    @endforeach
        {!! str_replace('/?', '?', $vacancies->render()) !!}
</address>
<br>



