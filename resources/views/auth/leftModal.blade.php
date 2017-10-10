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
                    {!! Html::image('image/minilogo.png','Головна') !!}<span>   головна</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('aboutus') }}" class="afterChange">
                    <span>про нас</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('news') }}" class="afterChange">
                    <span>новини</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('https://intita.com/courses') }}" class="afterChange" target="_blank">
                    <span>навчання</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('http://www.profitday.info') }}" class="afterChange" target="_blank">
                    <span>дні кар'єри</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('https://profitday.info/allcompanies') }}" class="afterChange" target="_blank">
                    <span>партнери</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('/contacts') }}" class="afterChange">
                    <span>контакти</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('sresume') }}" class="afterChange">
                    <span>всі резюме</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('/') }}" class="afterChange">
                    <span>всі вакансії</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('scompany') }}" class="afterChange">
                    <span>всі компанії</span>
                </a>
            </div>
            @if (Auth::guest())
                <div class="col-xs-12 list-modal-left-register">
                    <a href="{{ url('/auth/register') }}">
                        <span>{!! Html::image('image/registry.png','Головна',['id'=>'registry']) !!}</span> реєстрація
                    </a>
                </div>
                <div class="col-xs-12 list-modal-left">
                    <a href="{{ url('/auth/login') }}">
                        <span>{!! Html::image('image/entry.png','Головна',['id'=>'entry']) !!}</span> вхід
                    </a>
                </div>
            @else
                <div class="col-xs-12 list-modal-left">
                    <a href="{{ url('/cabinet') }}">
                        <span>особистий кабінет</span>
                    </a>
                </div>
            @endif
        </div>
        <hr class="modal-hr col-xs-10">
        <div>
            <span class="glyphicon glyphicon-phone-alt icon-left-modal" aria-hidden="true"></span> +38-0432<strong> 52-82-67</strong>
        </div>
        <div>
            <span class="glyphicon glyphicon-envelope icon-left-modal" aria-hidden="true"></span> <span>robotamolodi@gmail.com</span>
        </div>
        {{--<div>--}}
        {{--<i class="fa fa-skype icon-left-modal" aria-hidden="true"></i> <span> robotamolodi</span>--}}
        {{--</div>--}}
        <hr class="modal-hr col-xs-10">
        <div id="share-txt">
            <span>Поділитись в соцмережах:</span>
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

        if(localization == 'ua'){
            $('#leftModal .modal-content .bars-left a.local-ua').css({'color' : 'orange'});
        }
        if(localization == 'en'){
            $('#leftModal .modal-content .bars-left a.local-en').css({'color' : 'orange'});
        }

    });

</script>