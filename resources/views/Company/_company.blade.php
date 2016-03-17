@include('/pagination/pagination', ['paginator' => $companies])
    <address>
        @foreach($companies as $company)
        <article>
            <a href="{{$url}}/{{$company->id}}"  class="link">
                <div class="list">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="list-group-item-heading panel-title">{{$company->company_name}}</h3>
                        </div>
                        <div class="panel-body">
                            <h4 class="list-group-item-heading">{{ $company->company_email}}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </article>
        @endforeach
    </address>
@include('/pagination/pagination', ['paginator' => $companies])

