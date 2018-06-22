<div class="panel-body">
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-danger-register">
            <strong>Ой!</strong>{{ trans('auth.issue')}}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-register form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group row_width">
            <label class="col-md-4 control-label">{{ trans('auth.name') }}</label>
            <div class="col-md-6 col1_width">
                <input type="text" placeholder="{{ trans('auth.name') }}" class="form-control col1_width" name="name"
                       value="{{ old('name') }}">
            </div>
                <span class="red-star col2_width">* </span>
        </div>

        <div class="form-group row_width">
            <label class="col-md-4 control-label col1_width">{{ trans('auth.email') }}</label>
            <div class="col-md-6 col1_width">
                <input type="email" placeholder="{{ trans('auth.email') }}" class="form-control col1_width" name="email"
                       value="{{ old('email') }}">
            </div>
            <div class=" col2_width">
                <span class="red-star">* </span>
            </div>
        </div>

        <div class="form-group row_width">
            <label class="col-md-4 control-label">{{ trans('auth.password') }}</label>
            <div class="col-md-6 col1_width">
                <input type="password" placeholder="{{ trans('auth.password') }}" class="form-control col1_width" name="password">
            </div>
            <div class=" col2_width">
                <span class="red-star">* </span>
            </div>
        </div>

        <div class="form-group row_width">
            <label class="col-md-4 control-label">{{ trans('auth.confirmpassword') }}</label>
            <div class="col-md-6 col1_width">
                <input type="password" placeholder="{{ trans('auth.confirmpassword') }}" class="form-control"
                       name="password_confirmation">
            </div>
            <div class=" col2_width">
                <span class="red-star">* </span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div>
                    <span class="red-star">* </span> – Обов'язкові для заповнення.
                </div>
                <div class="checkbox">
                    <label>
                        <input required type="checkbox" title="{{ trans('auth.checkbox') }}"><span>{{ trans('auth.with') }}</span>
                        <a href="{{ route('policy')}}" target="_blank">{{ trans('auth.policy') }}</a>
                        <span>{{ trans('auth.agree') }}</span>
                    </label>
                </div>
                <button type="submit" tabindex="1" class="btn btn-primary register-button">
                    {{ trans('auth.signup') }}
                </button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $('.form-register').submit(function (event) {
        event.preventDefault();
        var form = $(this),
            spiner = $(document.createElement('i')).addClass('fa fa-spinner fa-spin fa-2x');
        $.ajax({
            type: 'POST',
            url: '{{ route('auth.ajaxValidation') }}',
            data: form.serialize(),
            beforeSend: function () {
                form.find('[type="submit"]')
                    .append(spiner);
            },
            success: function (data) {
                if (data['success']) {
                    form.unbind('submit').submit();
                } else {
                    if (form.prev().hasClass('alert-danger-register')) {
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
