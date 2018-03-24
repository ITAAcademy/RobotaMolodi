<nav>
    <a name="" href="{{ url('/') }}" class="brand-logo">
        <div class=" col m9 l9 s9">
            <img src={{asset('/image/logo.png')}} height="68" width="293"/>
        </div>
    </a>

    <div class="col l3 s3 m3 right hide-on-med-and-down">
        @if (Auth::guest())
            <li><a href="{{ url('/auth/login') }}">
                    <span>{!! Html::image('image/entry.png','Головна',['id'=>'entry']) !!}</span> Увійти</a></li>
            <li><a href="{{ url('/auth/register') }}"><span>{!! Html::image('image/registry.png','Головна',['id'=>'registry']) !!}</span> Зареєструватись</a></li>
        @else
            <a href="#" class="btn dropdown-button"  data-activates="dropdown2"
                @if(Auth::user()->role_id==1) @endif>{{ Auth::user()->name }}
                @if(Auth::user()->role_id==1)(Адміністратор) @endif<i class="material-icons right"></i>
            </a>
            <ul id="dropdown2" class="dropdown-content">
                <li><a href="{{ url('/cabinet') }}">Особистий кабінет</a></li>
                {{--@if(Auth::user()->role_id==1)<li> <a href="{{ url('/admin') }}">Админка</a></li>@endif--}}
                <li><a href="{{ url('/auth/logout') }}"><span>{!! Html::image('image/exit.png','Головна',['id'=>'exit']) !!}</span> Вийти</a></li>
            </ul>
        @endif
    </div>
</nav>