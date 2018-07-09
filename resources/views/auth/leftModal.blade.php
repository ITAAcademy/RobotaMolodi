<div id="leftModal" class="modal fade">
    <div class="modal-content col-xs-2 col-xs-offset-2">
        <div class="bars-left col-xs-12">
            <button type="button" class="btn btn-default col-xs-3 list-in-bars" data-dismiss="modal">
                <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
            </button>
            <div class="col-xs-offset-6">
                <span>| </span>
                <a class="local-ua" href="{{url()}}/language/ua">ua</a>
                <span> | </span>
                <a class="local-en" href="{{url()}}/language/en">en</a>
                <span> | </span>
            </div>
        </div>
        <div class="text-left-modal">
            <div class="col-xs-12 minilogo">
                <a href="{{ url('/') }}" class="afterChange">
                    {!! Html::image('image/minilogo.png',trans('header.home')) !!}<span>{{trans('header.home')}}</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('about_us') }}" class="afterChange">
                    <span>{{ trans('header.about') }}</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('news') }}" class="afterChange">
                    <span>{{ trans('header.news') }}</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('https://intita.com/courses') }}" class="afterChange" target="_blank">
                    <span>{{ trans('header.education') }}</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('https://profitday.info') }}" class="afterChange" target="_blank">
                    <span>{{ trans('header.carrierdays') }}</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('https://profitday.info/allcompanies') }}" class="afterChange" target="_blank">
                    <span>{{ trans('header.partners') }}</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('/contacts') }}" class="afterChange">
                    <span>{{ trans('header.contacts') }}</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('consults') }}" class="afterChange">
                    <span>{{ trans('navtab.alladvisor') }}</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('sresume') }}" class="afterChange">
                    <span>{{ trans('header.allresume') }}</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('/') }}" class="afterChange">
                    <span>{{ trans('header.allvacancy') }}</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('scompany') }}" class="afterChange">
                    <span>{{ trans('header.allcompany') }}</span>
                </a>
            </div>
            @if (Auth::guest())
                <div class="col-xs-12 list-modal-left-register">
                    <a href="{{ url('/auth/register') }}">
                        <span>{!! Html::image('image/registry.png',trans('header.home'),['id'=>'registry']) !!}</span> {{ trans('auth.signup') }}
                    </a>
                </div>
                <div class="col-xs-12 list-modal-left">
                    <a href="{{ url('/auth/login') }}">
                        <span>{!! Html::image('image/entry.png',trans('header.home'),['id'=>'entry']) !!}</span>{{ trans('auth.signin') }}
                    </a>
                </div>
            @else
                <div class="col-xs-12 list-modal-left">
                    <a href="{{ url('/cabinet') }}">
                        <span>{{ trans('header.cabinet') }}</span>
                    </a>
                </div>
            @endif
        </div>
        <hr class="modal-hr col-xs-10">
        <div>
            <span class="glyphicon glyphicon-phone-alt icon-left-modal" aria-hidden="true"></span><b>+38(0432)52-82-67</b>
        </div>
        <div>
            <span class="glyphicon glyphicon-envelope icon-left-modal" aria-hidden="true"></span>
            <span><a href="mailto: robotamolodi@gmail.com">robotamolodi@gmail.com</a></span>
        </div>

        <hr class="modal-hr col-xs-10">
        <div id="share-txt">
            <span>{{ trans('auth.share')}}</span>
        </div>
        <div class="modal-social-share">
            <a href="https://twitter.com/intent/tweet?url=http://robotamolodi.org/&text=РОБОТАМОЛОДІ"
               target="_blank" title="Share on twitter.com">
                <i class="fa-soc fa fa-twitter-square fa-2x" aria-hidden="true"></i>
            </a>
            <a href="https://plus.google.com/share?url=http://robotamolodi.org/"
               target="_blank" title="Share on plus.google.com">
                <i class="fa-soc fa fa-google-plus-square fa-2x" aria-hidden="true"></i>
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=http://robotamolodi.org/"
               target="_blank" title="Share on facebook.com">
                <i class="fa-soc fa fa-facebook-square fa-2x" aria-hidden="true"></i>
            </a>
            <a href="http://www.linkedin.com/shareArticle?mini=true&amp&title=РОБОТАМОЛОДІ&url=http://robotamolodi.org/"
               target="_blank">
                <i class="fa-soc fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {

        var localization = "{{config()->get('app.locale')}}";

        $('.local-' + localization).css({'color': '#9d9d9d', 'pointer-events': 'none'});
    });

</script>
