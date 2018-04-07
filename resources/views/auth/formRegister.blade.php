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

    <form class="form-register form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">{{ trans('auth.name') }}</label>
            <div class="col-md-6">
                <input type="text" placeholder="{{ trans('auth.name') }}" class="form-control" name="name"
                       value="{{ old('name') }}">
            </div>
        </div>

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
            <label class="col-md-4 control-label">{{ trans('auth.confirmpassword') }}</label>
            <div class="col-md-6">
                <input type="password" placeholder="{{ trans('auth.confirmpassword') }}" class="form-control"
                       name="password_confirmation">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input required type="checkbox" title="press to continue"><span>{{ trans('auth.with') }}</span>
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
                    if (form.prev().hasClass('alert-danger'))
                        form.prev().remove();

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
