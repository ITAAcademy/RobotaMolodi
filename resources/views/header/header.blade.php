<header>
    <nav class="navbar navbar-default">
        <div class="col-xs-1 col-sm-1" style="padding: 0">
            <div class="bars-left-modal">
                <button type="button" class="btn btn-default only-bars">
                    <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
                </button>
            </div>
        </div>
        <div class="headerRemoveOffsetLogo col-xs-offset-2 col-xs-6 col-sm-offset-2 col-sm-6 col-lg-6" style="padding: 0">
            <a href="{{ url('/') }}" class="afterChange">
                <div class="row">
                    <div class="col-xs-offset-1 col-xs-2" style="padding: 0">
                        {!! Html::image('image/logo-img.png',trans('header.home'),['class'=>'img-responsive','style' => 'padding: 0'])!!}
                    </div>
                    <div class="col-xs-8" style="padding: 0">
                        {!! Html::image('image/logo2.png',trans('header.home'), ['class'=>'img-responsive','style' => 'padding: 0'])!!}
                    </div>
                </div>
            </a>
        </div>
        @if (Auth::guest())
            <div class="headerChangeRowXS3 col-xs-3 col-sm-3 col-lg-offset-1 col-lg-2" style="padding: 0;">
                <div class="navtab-exit">
                    <div class="navtab-registraion" id="navregenterbutn">
                        <button type="button" class="btn btn-default modal-enter">
                            <span>{!! Html::image('image/entry.png',trans('auth.signin'),['id'=>'entry']) !!}</span>
                            <span>{{ trans('auth.signin') }}</span>
                        </button>
                        <button type="button" class="btn btn-default modal-regestry">
                            <span>{!! Html::image('image/registry.png',trans('auth.signup'),['id'=>'registry']) !!}</span>
                            <span>{{ trans('auth.signup') }}</span>
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="headerChangeRowXS1 col-xs-2 col-sm-2 col-lg-2" style="padding: 0">
                <div class="navtab-exit">
                    <a class="modal-user-button pensil7px" href="/user/{{ Auth::user()->id }}/edit"><i
                                class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a class="modal-user-button" style="margin-right: 25px; margin-top: -25px;" 
                       @if(Auth::user()->isAdmin()) href="{{url('/admin')}}"
                       @else href="{{ url('/cabinet') }}" @endif>
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
            <div class="headerChangeRowXS2 col-xs-1 col-sm-1 col-lg-1" style="padding: 0">
                <div class="navtab-exit">
                    <a href="{{ url('/auth/logout') }}">
                        <button type="button" class="btn btn-default modal-exit-button">
                            <i class="fa fa-sign-out fa-lg fa-rotate-180" aria-hidden="true"></i>
                            <span>{{trans('auth.signout')}}</span>
                        </button>
                    </a>
                </div>
            </div>
        @endif
    </nav>
</header>

@include('auth.rightModal')
@include('auth.leftModal')
@include('_modal')

{!!Html::script('js/socialNetWork.js')!!}

<script>
    $(window).resize(function () {
        if ($(window).width() <= 483) {
            $('.headerRemoveOffsetLogo').removeClass('col-xs-offset-2');
            $('.headerChangeRowXS1').removeClass('col-xs-2').addClass('col-xs-3');
            $('.headerChangeRowXS2').removeClass('col-xs-1').addClass('col-xs-2');
            $('.headerChangeRowXS3').removeClass('col-xs-3').addClass('col-xs-5');
        } else {
            $('.headerRemoveOffsetLogo').addClass('col-xs-offset-2');
            $('.headerChangeRowXS1').removeClass('col-xs-3').addClass('col-xs-2');
            $('.headerChangeRowXS2').removeClass('col-xs-2').addClass('col-xs-1');
            $('.headerChangeRowXS3').removeClass('col-xs-5').addClass('col-xs-3');
        }
    });
</script>

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
