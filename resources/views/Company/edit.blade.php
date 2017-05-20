@extends ('NewVacancy/users')
@section('content')
    <h3 class="formTitle header-text-company">Редагувати компанію</h3>
    {!! Form::open(array('method'=> 'put','route' => ['company.update',$company->id])) !!}
    @include('company.regCompany')
    {!! Form::close() !!}
@endsection