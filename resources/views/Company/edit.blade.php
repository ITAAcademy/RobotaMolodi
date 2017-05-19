@extends ('NewVacancy/users')
@section('content')
    <h3 class="formTitle header-text-company">додати компанію</h3>
    {!! Form::open(array('method'=> 'PUT','route' => ['company.update',$company->id])) !!}
    @include('company.regCompany')
    {!! Form::close() !!}
@endsection