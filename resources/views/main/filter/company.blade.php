@if(count($companies) === 0)
    <br>
    <?php echo "Немає компаній по Вашому пошуку"?>

@else
    <address>

        @foreach($companies as $company)

            <article>
                <a href="company/{{$company->id}}" class="link">
                    <div class="list">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="list-group-item-heading panel-title">{{$company->company_name}}</h3>
                            </div>
                            <div class="panel-body">
                                <h4 class="list-group-item-heading">Сайт:{{ $company->company_email}}</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </article>

    </address>
    @endforeach
    @include('/pagination/pagination', ['paginator' => $companies])
    {{--{!!$vacancies->appends(['city_id' => $city_id, 'industry_id' => $industry_id])->render()!!}--}}
@endif