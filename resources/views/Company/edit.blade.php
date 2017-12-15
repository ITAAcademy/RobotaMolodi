@extends ('NewVacancy/users')
@section('content')
    <h3 class="formTitle header-text-company"><b>{{ trans('content.editCompany') }}</b></h3>
    {!! Form::open(array('method'=> 'put','route' => ['company.update',$company->id])) !!}
    {!! csrf_field() !!}
    @include('Company.regCompany')
    {!! Form::close() !!}
@endsection
