<footer class="footer">
    <div class="container-footer col-xs-12">
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">{{ trans('footer.information') }}</li>
                <hr class="li-header-rows">
                <li><a href="aboutus">{{ trans('footer.about') }}</a></li>
                <li><a href="https://profitday.info/allcompanies" target="_blank">{{ trans('footer.partners') }}</a></li>
            </ul>

        </div>
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">{{ trans('footer.education') }}</li>
                <hr class="li-header-rows">
                <li><a href="https://profitday.info/upcomingevents" target="_blank">{{ trans('footer.training') }}</a></li>
                <li><a href="https://intita.com/courses" target="_blank">{{ trans('footer.courses') }}</a></li>
            </ul>
        </div>
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">{{ trans('footer.service') }}</li>
                <hr class="li-header-rows">
                <li><a href="https://intita.com" target="_blank">{{ trans('footer.education') }}</a></li>
            </ul>
        </div>
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">{{ trans('footer.contacts') }}</li>
                <hr class="li-header-rows">
                <li>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <a href="mailto: robotamolodi@gmail.com">robotamolodi@gmail.com</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="down-footer col-xs-12">
        <div class="inner-footer col-md-7">
            <span>{{ trans('footer.copy') }}</span>
            <img  id="revival" src="{{asset('image/vidrodjenja.png')}}" >
        </div>
        <div class="inner-footer col-md-5">
            <div class="row" id="footerlinks" >
                <div class="col-xs-5 col-sm-4" id="footershare" >
                    <span>{{ trans('footer.share') }}</span>
                </div>
                <div class="col-xs-1 col-sm-2">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http://robotamolodi.org/"
                       target="_blank" title="Share on facebook.com">
                        <i class="fa-soc fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-xs-1 col-sm-2">
                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp&title=РОБОТАМОЛОДІ&url=http://robotamolodi.org/"
                       target="_blank">
                        <i class="fa-soc fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-xs-1 col-sm-2">
                    <a href="https://twitter.com/intent/tweet?url=http://robotamolodi.org/&text=РОБОТАМОЛОДІ"
                       target="_blank" title="Share on twitter.com">
                        <i class="fa-soc fa fa-twitter-square fa-2x" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-xs-1 col-sm-2">
                    <a href="https://plus.google.com/share?url=http://robotamolodi.org/"
                       target="_blank" title="Share on plus.google.com">
                        <i class="fa-soc fa fa-google-plus-square fa-2x" aria-hidden="true"></i>
                    </a>
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
