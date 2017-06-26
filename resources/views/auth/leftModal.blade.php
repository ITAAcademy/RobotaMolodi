<div id="leftModal" class="modal fade">
    <div class="modal-content col-xs-2 col-xs-offset-2">
        <div class="bars-left col-xs-12">
            <button type="button" class="btn btn-default col-xs-3 list-in-bars" data-dismiss="modal">
                <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
            </button>
            <div class="col-xs-offset-6">
                <span>| </span>
                <a class="local-ua">ua</a>
                <span> | </span>
                <a class="local-en">en</a>
                <span> | </span>
            </div>
        </div>
        <div class="text-left-modal">
            <div class="col-xs-12 minilogo">
                <a href="{{ url('/') }}" class="afterChange">
                    {!! Html::image('image/minilogo.png','Головна') !!}<span>   ГОЛОВНА</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('news') }}" class="afterChange">
                    <span>НОВИНИ</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('sresume') }}" class="afterChange">
                    <span>ВСІ РЕЗЮМЕ</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('/') }}" class="afterChange">
                    <span>ВСІ ВАКАНСІЇ</span>
                </a>
            </div>
            <div class="col-xs-12 list-modal-left">
                <a href="{{ url('scompany') }}" class="afterChange">
                    <span>ВСІ КОМПАНІЇ</span>
                </a>
            </div>
            @if (Auth::guest())
                <div class="col-xs-12 list-modal-left-register">
                    <a href="{{ url('/auth/register') }}">
                        <span>{!! Html::image('image/registry.png','Головна',['id'=>'registry']) !!}</span> РЕЄСТРАЦІЯ
                    </a>
                </div>
                <div class="col-xs-12 list-modal-left">
                    <a href="{{ url('/auth/login') }}">
                        <span>{!! Html::image('image/entry.png','Головна',['id'=>'entry']) !!}</span> ВХІД
                    </a>
                </div>
            @else
                <div class="col-xs-12 list-modal-left">
                    <a href="{{ url('/cabinet') }}">
                        <span>ОСОБИСТИЙ КАБІНЕТ</span>
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
        <div>
            <i class="fa fa-skype icon-left-modal" aria-hidden="true"></i> <span> robotamolodi</span>
        </div>
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