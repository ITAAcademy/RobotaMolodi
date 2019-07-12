@extends('newDesign.layouts.admin')

@section('content')
    <div class="col-md-10 col-sm-10 col-xs-10 contentAndmin">
        <h4 class="contentAndmin">Створити ClientId</h4>

        {!! Form::open(array('url' => '/admin/client-id', 'method' => 'POST')) !!}
        @include('newDesign.admin.clientId._form')
        {!! Form::close() !!}
    </div>
@endsection