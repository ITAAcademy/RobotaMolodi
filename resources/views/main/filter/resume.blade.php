@if(empty($resumes))
    <br>
    <?php echo "Немає рєзюме по Вашому пошуку"?>

@else
    @foreach ($resumes as $resume)

        <article>
            <a href="resume/{{$resume->id}}" class="list-group-item">


                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="list-group-item-heading panel-title">{{$resume->branch}} Позиція: <span class="text-info" >{{$resume->position}}</span>
                                <span class="text-muted text-right pull-right"><h5>{{$resume->created_at}}</h5></span></h3>
                    </div>
                    <div class="panel-body">
                        <h4 class="list-group-item-heading">Ім'я  <span class="text-success">{{ $resume->name_u}}</span>...</h4>
                        <h4 class="list-group-item-heading">Місто  <span class="text-success">{{ $resume->City()->name}}</span>...</h4>
                        <h4 class="list-group-item-heading">Галузь  <span class="text-success">{{ $resume->Industry()->name}}</span>...</h4>
                        <h4 class="list-group-item-heading">Опис рєзюме: <span class="text-success">{{ substr($resume->description, 0, 100)}}</span>...</h4>
                        </p>
                        <p class="list-group-item-text"><b>Зарплата: </b>{{$resume->salary}}</p>
                    </div>
                </div>
            </a>
        </article>

    @endforeach
    {!!$resumes->appends(['city_id' => $city_id, 'industry_id' => $industry_id])->render()!!}
@endif