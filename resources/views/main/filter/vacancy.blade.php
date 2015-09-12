@if($vacancies == null)
    </br>
    <?php echo "Немає вакансій по Вашому пошуку"?>

@else
@foreach ($vacancies as $vacancy)

    <article>
        <a href="vacancy/{{$vacancy->id}}" class="list-group-item">
            <h3 class="list-group-item-heading">{{$vacancy->id}} Позиція: <span class="text-info" >{{$vacancy->position}}</span>
                <span class="text-muted text-right pull-right"><h5>{{$vacancy->created_at}}</h5></span></h3>
            <h4 class="list-group-item-heading">Галузь  <span class="text-success">{{ $vacancy->Industry()->name}}</span>...</h4>
            <h4 class="list-group-item-heading">Компанія  <span class="text-success">{{ $vacancy->Company()->company_name}}</span>...</h4>
            <h4 class="list-group-item-heading">Місто  <span class="text-success">@foreach($vacancy->City() as $city){{ $city->name}}@endforeach</span>...</h4>
            <h4 class="list-group-item-heading">Опис вакансії: <span class="text-success">{{ substr($vacancy->description, 0, 100)}}</span>...</h4>
            </p>
            <p class="list-group-item-text"><b>Зарплата: </b>{{$vacancy->salary}}</p>
            </a>
    </article>

@endforeach
{!!$vacancies->appends(['city_id' => $city_id, 'industry_id' => $industry_id])->render()!!}
@endif