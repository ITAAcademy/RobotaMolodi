<div class="panel-body">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ой!</strong>{{ trans('auth.issue')}}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">{{ trans('auth.email') }}</label>
            <div class="col-md-6">
                <input type="email" placeholder="{{ trans('auth.email') }}" class="form-control" name="email" value="{{ old('email') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">{{ trans('auth.password') }}</label>
            <div class="col-md-6">
                <input type="password" placeholder="{{ trans('auth.password') }}" class="form-control" name="password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" checked>
                        {{ trans('auth.rememberme') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div>
                    <button type="submit" tabindex="1" class="btn btn-primary enter-button">{{ trans('auth.signin') }}</button>
                    <div>
                        <a class="btn btn-link login-text" href="{{ url('/password/email') }}">{{ trans('auth.forgotpwd')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="member-btn">
                    <a class="btn btn-link login-text as" href="{{ url('/auth/register') }}">{{ trans('auth.signup')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
