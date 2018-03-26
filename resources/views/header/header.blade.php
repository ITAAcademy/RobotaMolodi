<header>
    <nav class="navbar navbar-default col-xs-12">
        <div class="row">
            <div class="col-xs-3 col-sm-4 col-md-4 bars-left-modal" style="margin:0; padding:0">
                <button type="button" class="btn btn-default only-bars">
                    <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
                </button>
            </div>
            <div class="col-xs-5 col-md-4 center-block">
                <div class="header-logo text-center">
                    <a href="{{ url('/') }}" class="afterChange">{!! Html::image('image/logo-img.png',trans('header.home'),
                    ['class'=>'img-responsive main-img col-xs-3'])!!}
                        {!! Html::image('image/logo2.png',trans('header.home'),
                            ['class'=>'img-responsive main-img col-xs-9'])!!}</a>
                </div>
            </div>
            <div class="col-xs-offset-6">
                <span>| </span>
                <a class="local-ua" href="{{url()}}/language/ua">ua</a>
                <span> | </span>
                <a class="local-en" href="{{url()}}/language/en">en</a>
                <span> | </span>
            </div>

            @if (Auth::guest())
                <div class="row">
                    <div id="navregenterbutn" class="col-xs-6 col-md-4 navtab-registraion">
                        <button type="button" class="btn btn-default modal-enter col-xs-6">
                            <span>{!! Html::image('image/entry.png',trans('auth.signin'),['id'=>'entry']) !!}</span>
                            <span>{{ trans('auth.signin') }}</span>
                        </button>
                        <button type="button" class="btn btn-default modal-regestry col-xs-6">
                            <span>{!! Html::image('image/registry.png',trans('auth.signup'),['id'=>'registry']) !!}</span>
                            <span>{{ trans('auth.signup') }}</span>
                        </button>
                    </div>
                </div>
            @else

                <div class="col-xs-4 navtab-exit">
                    <div class="row pull-left">
                        <a class="modal-user-button pensil7px" href="/user/{{ Auth::user()->id }}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a class="modal-user-button" @if(Auth::user()->isAdmin()) href="{{url('/admin')}}" @else href="{{ url('/cabinet') }}" @endif>
                            <span class="img-user">
                                @if(Auth::user()->avatar and File::exists(public_path(Auth::user()->getAvatarPath())))
                                    {!! Html::image( asset(Auth::user()->getAvatarPath()), 'logo',
                                    array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                                @else
                                    {!! Html::image('image/m.jpg', 'logo', array( 'width' => '100%', 'height' => '100%')) !!}
                                @endif
                            </span>
                            <span class="img-user-name">
                                <p>{{ Auth::user()->name }}</p>
                                @if(Auth::user()->isAdmin())<p style="color: red">(Admin)</p>@endif
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xs-2 navtab-exit">
                    <a href="{{ url('/auth/logout') }}">
                        <button type="button" class="btn btn-default modal-exit-button">
                            <i class="fa fa-sign-out fa-lg fa-rotate-180" aria-hidden="true"></i>
                            <span>{{trans('auth.signout')}}</span>
                        </button>
                    </a>
                </div>

            @endif
        </div>
    </nav>
</header>

@include('auth.rightModal')
@include('auth.leftModal')
@include('_modal')

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

        $('.modal-enter,.btn-modal-enter').click(function () {
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
