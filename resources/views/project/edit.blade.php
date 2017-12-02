@extends('app')
@section('content')
<h1 class="text-center">{{ trans('project.editProject')}} </h1>
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::model($project, array('route' => array('project.update', $project->id), 'method'  => 'PUT', 'enctype' => 'multipart/form-data')) !!}

                    @include('project.partials.form._description')

                {!! Form::submit(trans('project.send'), ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
