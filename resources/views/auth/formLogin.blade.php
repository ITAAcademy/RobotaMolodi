<div class="panel-body">
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-danger-login">
            <strong>Ой!</strong>{{ trans('auth.issue')}}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-horizontal form-login" role="form" method="POST" action="{{ url('/auth/login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">{{ trans('auth.email') }}</label>
            <div class="col-md-6">
                <input type="email" placeholder="{{ trans('auth.email') }}" class="form-control" name="email"
                       value="{{ old('email') }}">
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
                    <button type="submit" tabindex="1"
                            class="btn btn-primary enter-button">{{ trans('auth.signin') }}</button>
                    <div>
                        <a class="btn btn-link login-text"
                           href="{{ url('/password/email') }}">{{ trans('auth.forgotpwd')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="member-btn">
                    <a class="btn btn-link login-text as"
                       href="{{ url('/auth/register') }}">{{ trans('auth.signup')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $('.form-login').submit(function (event) {
        event.preventDefault();
        var form = $(this),
            spiner = $(document.createElement('i')).addClass('fa fa-spinner fa-spin fa-2x');
        $.ajax({
            type: 'POST',
            url: '{{ route('auth.loginValidator') }}',
            data: form.serialize(),
            beforeSend: function () {
                form.find('[type="submit"]')
                    .append(spiner);
            },
            success: function (data) {
                if (data['success']) {
                    form.unbind('submit').submit();
                } else {
                    if (form.prev().hasClass('alert-danger-login')) {
                        form.prev().remove();
                    }
                    form.before(data['errors']);
                }
            },
            complete: function () {
                spiner.remove();
            },
            error: function (e) {
                console.log(e);
            }
        });
    });
</script>