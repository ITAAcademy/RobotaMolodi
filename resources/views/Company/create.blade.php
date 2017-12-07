@extends ('NewVacancy/users')
@section('content')
    <h3 class="formTitle header-text-company"><b>{{ trans('content.addCompany') }}</b></h3>
    {!! Form::open(['route' => 'company.store','enctype' => 'multipart/form-data', 'id'=>'form_id']) !!}
    @include('Company.regCompany')
    {!! Form::close() !!}
@endsection