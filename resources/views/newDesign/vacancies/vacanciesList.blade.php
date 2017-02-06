
@foreach($vacancies as $vacancy)
        <a href="/vacancy/{{$vacancy->id}}">
            <div id="vac0" class="links">
                <div class="section">
                    <h3>{{ $vacancy->Industry()->name}}</h3>
                    <h4>
                        <strong>{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</strong>
                    </h4>
                    <p class="text-left"> {{$vacancy->description}} </p>
                </div>
                <div class="below-section">
                    <span>{{ $vacancy->Company()->company_name}}</span>
                </div>
                <a href="#"><div class="line">
                        <span class="town">@foreach($vacancy->City() as $city){{ $city->name}} @endforeach</span>
                        <span class="drop">&bull;</span>
                        <span class="data">{{date('j m Y', strtotime($vacancy->updated_at))}}</span>
                    </div></a>
                <hr>
            </div>
        </a>
@endforeach
