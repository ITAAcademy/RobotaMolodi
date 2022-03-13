<footer class="footer">
    <div class="container-footer col-xs-12">
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">{{ trans('footer.information') }}</li>
                <hr class="li-header-rows">
                <li><a href="about_us">{{ trans('footer.about') }}</a></li>
                <li><a href="https://profitday.info/allcompanies" target="_blank">{{ trans('footer.partners') }}</a></li>
                <li><a href="#" target="_blank">{{ trans('footer.support') }}</a></li>
                <li><a href="#" target="_blank">{{ trans('footer.business_ideas') }}</a></li>
            </ul>

        </div>
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">{{ trans('footer.education') }}</li>
                <hr>
                <li><a href="#" target="_blank">{{ trans('footer.schools') }}</a></li>
                <li><a href="https://profitday.info/upcomingevents" target="_blank">{{ trans('footer.training') }}</a></li>
                <li><a href="https://intita.com/courses" target="_blank">{{ trans('footer.courses') }}</a></li>
                <li><a href="#" target="_blank">{{ trans('footer.education_abroad') }}</a></li>
            </ul>
        </div>
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">{{ trans('footer.service') }}</li>
                <hr>
                <li><a href="#" target="_blank">{{ trans('footer.directory') }}</a></li>
                <li><a href="https://intita.com" target="_blank">{{ trans('footer.education') }}</a></li>
                <li><a href="#" target="_blank">{{ trans('footer.business_ideas') }}</a></li>
            </ul>
        </div>
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">{{ trans('footer.contacts') }}</li>
                <hr class="li-header-rows">
                <li>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <a href="tel:+380674311921">+38-067-431-19-21</a>
                </li>
                <li>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <a href="mailto: robotamolodi@gmail.com">robotamolodi@gmail.com</a>
                </li>
                <li>
                    <i class="fa fa-skype" aria-hidden="true"></i>
                    <a href="skype: #">robotamolodi</a>
                </li>

            </ul>
        </div>
    </div>

    <div class="down-footer col-xs-12 d-flex justify-content-between">
        <div class="inner-footer col-md-7">
            <span>{{ trans('footer.copy') }}</span>
            <img  id="revival" src="{{asset('image/vidrodjenja.png')}}" >
        </div>
        <div class="inner-footer col-md-5">
            <div class="row" id="footerlinks">
                <div class="col-xs-5 col-sm-4" id="footershare" >
                    <span>{{ trans('footer.share') }}</span>
                </div>
                <div class="col-xs-1 col-sm-1">
                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp&title=РОБОТАМОЛОДІ&url=http://robotamolodi.org/"
                       target="_blank" class="lnk">
                    </a>
                </div>
                <div class="col-xs-1 col-sm-1">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http://robotamolodi.org/"
                       target="_blank" title="Share on facebook.com" class="fb">
                    </a>
                </div>
                <div class="col-xs-1 col-sm-1">
                    <a href="https://twitter.com/intent/tweet?url=http://robotamolodi.org/&text=РОБОТАМОЛОДІ"
                       target="_blank" title="Share on twitter.com" class="ttr">
                    </a>
                </div>
                <div class="col-xs-1 col-sm-1">
                    <a href="https://plus.google.com/share?url=http://robotamolodi.org/"
                       class="ggl" target="_blank" title="Share on plus.google.com">
                    </a>
                </div>
                <div class="row" id="footer_partner">
                    <div class="col-xs-6 col-sm-4" id="footer_add_partn" >Вакансії на
                        {{--<span>{{ trans('footer.partners') }}</span>--}}
                    </div>
                    <div class="col-xs-1 col-sm-0">
                        <a href="https://jooble.org/"
                           target="_blank" class="partn">
                            jooble.org
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

{!!Html::script('js/socialNetWork.js')!!}
<script>
    socialNetWork('.inner-footer > a');
</script>

<script>
    $(document).ready(function () {
        $('.no-click').on('click', function (e) {
            e.preventDefault();
        })
    })
</script>
