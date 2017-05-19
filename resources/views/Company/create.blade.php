@extends ('NewVacancy/users')
@section('content')
    <h3 class="formTitle header-text-company">Додати компанію</h3>
    {!! Form::open(array('url' => 'company', 'method' => 'POST')) !!}
    @include('company.regCompany')
    {!! Form::close() !!}
@endsection