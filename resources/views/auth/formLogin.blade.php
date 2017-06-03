<div class="panel-body">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Ой!</strong> Виникла якась проблема.<br><br>
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
            <label class="col-md-4 control-label">Електронна пошта</label>
            <div class="col-md-6">
                <input type="email" placeholder="Електронна пошта" class="form-control" name="email" value="{{ old('email') }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Пароль</label>
            <div class="col-md-6">
                <input type="password" placeholder="Пароль" class="form-control" name="password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Запам'ятати мене
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div>
                    <button type="submit" tabindex="1" class="btn btn-primary enter-button">УВІЙТИ</button>
                    <div>
                        <a class="btn btn-link login-text" href="{{ url('/password/email') }}">Забули пароль?</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="member-btn">
                    <a class="btn btn-link login-text as" href="{{ url('/auth/register') }}">Зареєструватися</a>
                </div>
            </div>
        </div>
    </form>
</div>