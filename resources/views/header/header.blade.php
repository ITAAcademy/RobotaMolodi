<link href="{{ asset('/css/header.css') }}" rel="stylesheet">

<header>
    <nav class="navbar navbar-default col-xs-12">
        <div class="row">
        <div class="col-xs-1 col-md-4 bars-left-modal">
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
        @if (Auth::guest())
        <div class="col-xs-6 col-md-4 navtab-registraion">
            <button type="button" class="btn btn-default modal-enter col-xs-6">
                <span>{!! Html::image('image/entry.png',trans('auth.signin'),['id'=>'entry']) !!}</span>
                <span>{{ trans('auth.signin') }}</span>
            </button>
            <button type="button" class="btn btn-default modal-regestry col-xs-6">
                <span>{!! Html::image('image/registry.png',trans('auth.signup'),['id'=>'registry']) !!}</span>
                <span>{{ trans('auth.signup') }}</span>
            </button>
        </div>
        @else
            <div class="col-xs-4 navtab-exit">
                <div class="row">
                    <div class="col-xs-8">
                        <a @if(Auth::user()->isAdmin()) href="{{url('/admin')}}" @else href="{{ url('/cabinet') }}" @endif>
                            <button type="button" class="btn btn-default modal-user-button">
                                <div class="img-user">
                                    {!! Html::image('image/m.jpg', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                                </div>
                                <div class="img-user-name">
                                    <p>{{ Auth::user()->name }}</p>
                                    @if(Auth::user()->isAdmin())<p style="color: red">(Admin)</p>@endif
                                </div>
                            </button>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a class="edit-user-name" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </div>
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
    //Hamburger position
    $(document).ready(function () {
        var scroller = $('button.btn.btn-default.only-bars');
        $(window).scroll(function (){
            $(this).scrollTop() > 15
                ? scroller.css('position', 'fixed').css('left', '0px')
                && $('.modal-content.col-xs-2.col-xs-offset-2').css('margin-left', '10px')
                : scroller.css('position', 'relative')
                && $('.modal-content.col-xs-2.col-xs-offset-2').css('margin-left', '145px');
        });
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
@if (Auth::check())
    <script>
        $(document).ready(function (){
            $('.edit-user-name').on('click',function(e){
                e.preventDefault();
                e.stopPropagation();
                $('#modal-common').modal('show');
                $.ajax({
                   url: '{{ route('user.edit', ['id' => Auth::user()->id]) }}',
                   type: 'GET',
                   success: function(response) {
                     $('#modal-common .modal-content').html(response);
                   },
                   error: function(xhr, error){
                      console.log(xhr);
                      console.log(error);
                    }
                });

            });
        });
    </script>
@endif
