
@foreach($vacancies as $vacancy)

            <div id="vac0">
                <div class="section">
                    <a class="links" href="/vacancy/{{$vacancy->id}}">
                        <h3>{{ $vacancy->position}}</h3>
                    </a>
                    <h4>
                        <strong>{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</strong>
                    </h4>
                    <p class="text-left"> {{$vacancy->description}} </p>
                </div>

                <a class="links" href="/vacancy/{{$vacancy->id}}">
                    <p class="read-next">Читати далі...</p>
                </a>

                <div class="below-section">
                    <span>{{ $vacancy->Company()->company_name}}</span>
                </div>

                <a class="links" href="#">
                    <div class="line">
                        <span class="town">@foreach($vacancy->City() as $city){{ $city->name}} @endforeach</span>
                        <span class="drop">&bull;</span>
                        <span class="data">{{date('j m Y', strtotime($vacancy->updated_at))}}</span>
                    </div>
                </a>

                <hr>
            </div>

@endforeach
