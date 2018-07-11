@extends('app')
<link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">
<link href="{{ asset('/css/consult.css') }}" rel="stylesheet">
@section('content')
    <div class="content">
        <form class="form" role="form" method="POST" action="{{ url('sconsult') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <div class="col-md-5">
                    <input type="text" placeholder="{{ trans('auth.name') }}" class="form-control" name="name"
                           value="{{ old('name') }}">
                </div>
                <div class=" col2-width">
                    <span class="red-star">* </span>
                </div>
            </div>

            <div class="form-group row-width">
                <label class="col-md-4 control-label col1_width">{{ trans('auth.email') }}</label>
                <div class="col-md-6 col1-width">
                    <input type="email" placeholder="{{ trans('auth.email') }}" class="form-control" name="email"
                           value="{{ old('email') }}">
                </div>
                <div class=" col2-width">
                    <span class="red-star">* </span>
                </div>
            </div>

            <div class="form-group row-width">
                <label class="col-md-4 control-label">{{ trans('auth.password') }}</label>
                <div class="col-md-6 col1-width">
                    <input type="password" placeholder="{{ trans('auth.password') }}" class="form-control" name="password">
                </div>
                <div class=" col2-width">
                    <span class="red-star">* </span>
                </div>
            </div>

            <div class="form-group row-width">
                <label class="col-md-4 control-label">{{ trans('auth.confirmpassword') }}</label>
                <div class="col-md-6 col1-width">
                    <input type="password" placeholder="{{ trans('auth.confirmpassword') }}" class="form-control"
                           name="password_confirmation">
                </div>
                <div class=" col2-width">
                    <span class="red-star">* </span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div>
                        <span class="red-star">* </span> – Обов'язкові для заповнення.
                    </div>
                    <button type="submit" tabindex="1" class="btn btn-primary">
                        {{ trans('auth.signup') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@stop