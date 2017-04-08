{!! $vacancies->render(new App\Presenters\BootstrapTwoPresenter($vacancies)) !!}
    @foreach($vacancies as $vacancy)
    <article>
        <div class="list">
            <a href="/vacancy/{{$vacancy->id}}" class="link">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="text-info" style="color: #555555; font-size: 16px">
                            {{$vacancy->position}}
                        </span>
                        <span class="vacancy-salary" style="font-size: 16px">
                            &#183;{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}
                        </span>
                        <span class="text-muted text-right pull-right">
                            <h5 id="{{$vacancy->id}}" title="{{ date('j.m.Y, H:i:s', strtotime($vacancy->updated_at))}}">
                                <script>
                                    $('#'+'{{$vacancy->id}}').text(FormatDate({{strtotime($vacancy->updated_at)}}));
                                </script>
                            </h5>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4 class="list-group-item-heading" style="color: #555555">{{ $vacancy->Industry()->name}}</h4>
                        <h4 class="list-group-item-heading" style="color: #555555">{{ $vacancy->Company()->company_name}}</h4>
                        <h4 class="list-group-item-heading" style="color: #555555">@foreach($vacancy->City() as $city){{ $city->name}} @endforeach</h4>
                    </div>
                </div>
            </a>
        </div>
    </article>
    @endforeach
{!! $vacancies->render(new App\Presenters\BootstrapTwoPresenter($vacancies)) !!}
