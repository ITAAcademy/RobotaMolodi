<address>

    @foreach($companies as $company)
        <br>
        <strong>Назва : {{$company->company_name}}</strong><br>
        Сайт : {{$company->company_email}}<br>
        Переглянути : <a href="company/{{$company->id}}">Переглянути</a><br>
</address>
@endforeach
