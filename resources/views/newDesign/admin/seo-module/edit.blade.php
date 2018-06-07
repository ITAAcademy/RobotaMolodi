@extends('newDesign.layouts.admin')
@section('content')
    <div class=" col-md-10 col-sm-10 col-xs-10 contentAndmin" style="padding:20px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-heading">Змінити СЕО</h4>
            </div>
            <div class="panel-body">
                {!! Form::model($info, ['method' => 'PATCH','route' => ['admin.seo-module.update', $info->id]]) !!}
                @include('newDesign.admin.seo-module._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection