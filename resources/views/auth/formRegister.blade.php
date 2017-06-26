<div class="panel-body">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ой!</strong> Виникли деякі проблеми з вашим входом.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">Ім'я</label>
            <div class="col-md-6">
                <input type="text" placeholder="Ваше ім'я" class="form-control" name="name" value="{{ old('name') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Електронна адреса</label>
            <div class="col-md-6">
                <input type="email" placeholder="Електронна адреса" class="form-control" name="email" value="{{ old('email') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Пароль</label>
            <div class="col-md-6">
                <input type="password" placeholder="Пароль" class="form-control" name="password">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Підтвердження паролю</label>
            <div class="col-md-6">
                <input type="password" placeholder="Підтвердження паролю" class="form-control" name="password_confirmation">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input required type="checkbox" name="remember"><span>З</span>
                        <a href="{{ url('https://intita.com/courses')}}" target="_blank">політикою використання</a>
                        <span>я згоден</span>
                    </label>
                </div>
                <button type="submit" tabindex="1" class="btn btn-primary register-button">
                    ЗАРЕЄСТРУВАТИСЬ
                </button>
            </div>
        </div>
    </form>
</div>