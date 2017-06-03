<link href="{{ asset('/css/header.css') }}" rel="stylesheet">

<header>
    <nav class="navbar navbar-default col-xs-12">
        <div class="col-xs-1 col-md-4 bars-left-modal">
            <button type="button" class="btn btn-default only-bars">
                <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
            </button>
        </div>
        <div class="col-xs-5 col-md-4 center-block">
            <div class="header-logo text-center">
                <a href="{{ url('/') }}" class="afterChange">{!! Html::image('image/logo-img.png','Головна',
                    ['class'=>'img-responsive main-img col-xs-3'])!!}
                    {!! Html::image('image/logo2.png','Головна',
                        ['class'=>'img-responsive main-img col-xs-9'])!!}</a>
            </div>
        </div>
        @if (Auth::guest())
        <div class="col-xs-6 col-md-4 navtab-registraion">
            <button type="button" class="btn btn-default modal-enter">
                <span>{!! Html::image('image/entry.png','Вхід',['id'=>'entry']) !!}</span>
                <span>Вхід</span>
            </button>
            <button type="button" class="btn btn-default modal-regestry">
                <span>{!! Html::image('image/registry.png','Реєстрація',['id'=>'registry']) !!}</span>
                <span>Реєстрація</span>
            </button>
        </div>
        @else
            <div class="col-xs-3 navtab-exit">
                <a href="{{ url('/cabinet') }}">
                    <button type="button" class="btn btn-default modal-user-button">
                        <div class="img-user">
                            {!! Html::image('image/m.jpg', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                        </div>
                        <div class="img-user-name">
                            <span style="color:red; font-size: 12px">@if(Auth::user()->role_id==1) @endif{{ Auth::user()->name }} @if(Auth::user()->role_id==1)(Адміністратор) @endif</span>
                        </div>
                    </button>
                </a>
            </div>
            <div class="col-xs-1 navtab-exit">
                <a href="{{ url('/auth/logout') }}">
                    <button type="button" class="btn btn-default modal-exit-button">
                        <i class="fa fa-sign-out fa-lg fa-rotate-180" aria-hidden="true"></i>
                        <span>Вихід</span>
                    </button>
                </a>
            </div>
        @endif
    </nav>
</header>

@include('auth.rightModal')
@include('auth.leftModal')

{!!Html::script('js/socialNetWork.js')!!}
<script>
    $(document).ready(function () {
        $('.only-bars').click(function () {
            $('#leftModal').modal({
                show: true,
                keyboard: true
            })
        });
        var btn_enter = document.getElementsByClassName('btn-modal-enter');
        var btn_regesrty = document.getElementsByClassName('btn-modal-reg');
        var tab_content = document.getElementsByClassName('tab-content');
        $('.modal-regestry, .btn-modal-reg').click(function () {
            $('#rightModal').modal({
                show: true,
                keyboard: true
            });
            $('#modalTab a[href="#panel2"]').tab('show');
            btn_enter[0].classList.remove('css-btn-modal-enter');
            btn_regesrty[0].classList.add('btn-modal-reg', 'css-btn-modal-reg');
            btn_regesrty[0].classList.remove('css-btn-modal-reg-opacity');
            btn_enter[0].classList.add('css-btn-modal-enter-opacity')
            tab_content[0].style.borderRadius = "15px 0 15px 15px";
        });

        $('.modal-enter,.btn-modal-enter' ).click(function () {
            $('#rightModal').modal({
                show: true,
                keyboard: true
            });
            $('#modalTab a[href="#panel1"]').tab('show');

//            var style = btn_regesrty[0].style;
            btn_enter[0].classList.add('btn-modal-enter', 'css-btn-modal-enter');
            btn_regesrty[0].classList.remove('css-btn-modal-reg');
            btn_regesrty[0].classList.add('css-btn-modal-reg-opacity');
            btn_enter[0].classList.remove('css-btn-modal-enter-opacity');

            tab_content[0].style.borderRadius = "0 15px 15px 15px";
        });


        socialNetWork('.modal-social-share > a');
    })
</script>