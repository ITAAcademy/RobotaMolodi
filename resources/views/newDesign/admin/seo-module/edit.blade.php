@extends('newDesign.layouts.admin')
@section('content')
    <div class=" col-md-10 col-sm-10 col-xs-10 contentAndmin">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Seo info</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.seo-module.index') }}"> Back</a>
                </div>
            </div>
        </div>


        @if (count($errors) < 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::model($info, ['method' => 'PATCH','route' => ['admin.seo-module.update', $info->id]]) !!}
        @include('newDesign.admin.seo-module._form')
        {!! Form::close() !!}
    </div>
@endsection