<address>

    @foreach($companies as $company)

        <article>

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

        </article>

</address>
@endforeach
