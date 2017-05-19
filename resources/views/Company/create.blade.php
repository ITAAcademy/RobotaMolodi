@extends ('NewVacancy/users')
@section('content')
    <h3 class="formTitle header-text-company">додати компанію</h3>
    {!! Form::open(array('url' => 'company/edit', 'method' => 'POST')) !!}
    @include('company.regCompany')
    {!! Form::close() !!}
@endsection