<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/auth/login') }}"><span>{!! Html::image('image/entry.png','Головна',['id'=>'entry']) !!}</span> Увійти</a></li>
                        <li><a href="{{ url('/auth/register') }}"><span>{!! Html::image('image/registry.png','Головна',['id'=>'registry']) !!}</span> Зареєструватись</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" @if(Auth::user()->role==1)style="color:red" @endif>{{ Auth::user()->name }} @if(Auth::user()->role==1)(Адміністратор) @endif<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/cabinet') }}" class="afterChange">Особистий кабінет</a></li>
                                <li><a href="{{ url('/auth/logout') }}" class="afterChange"><span>{!! Html::image('image/exit.png','Головна',['id'=>'exit']) !!}</span> Вийти</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="col-md-offset-4" id="logoImg">
            <a href="{{ url('/') }}" class="afterChange">{!! Html::image('image/logo.png','Головна') !!} </a>
        </div>
    </nav>
</header>