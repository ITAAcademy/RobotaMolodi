{!! $vacancies->render(new App\Presenters\BootstrapTwoPresenter($vacancies)) !!}
    @foreach($vacancies as $vacancy)
    <article>
        <a href="/vacancy/{{$vacancy->id}}" class="link">
            <div class="list">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <h4 class="list-group-item-heading">{{ $vacancy->Industry()->name}}</h4>
                        <h4 class="list-group-item-heading">{{ $vacancy->Company()->company_name}}</h4>
                        <h4 class="list-group-item-heading">@foreach($vacancy->City() as $city){{ $city->name}} @endforeach</h4>
                    </div>
                </div>
            </div>
        </a>
    </article>
    @endforeach
{!! $vacancies->render(new App\Presenters\BootstrapTwoPresenter($vacancies)) !!}
