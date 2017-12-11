@extends('app')
@section('headLinks')
    <link href="{{ asset('/css/test/project.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/vue"></script>
@endsection
@section('content')
<h1 class="text-center">{{ trans('project.addProject')}} </h1>
<div class="container">
    <div class="row">
        <div class="col-xs-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($project, array('route' => array('project.store'), 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}

                    @include('project.partials.form._description')
                    @include('project.partials.form._slider')
                    @include('project.partials.form._team')
                    @include('project.partials.form._vacancy')

                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-6">
                          {!! Form::submit(trans('project.send'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@include('project.partials._scripts')

@endsection
