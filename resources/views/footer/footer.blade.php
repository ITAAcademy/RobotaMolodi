<footer class="row footer">
    <div class="container-footer col-xs-12">
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">IНФОРМАЦIЯ</li>
                <hr>
                <li><a href="aboutus">Про нас</a></li>
                <li><a href="https://profitday.info/allcompanies" target="_blank" >Партнери</a></li>
            </ul>

        </div>
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">НАВЧАННЯ</li>
                <hr>
                <li><a href="https://profitday.info/upcomingevents" target="_blank" >Тренінги і семінари</a></li>
                <li><a href="https://intita.com/courses" target="_blank" >Курси</a></li>
            </ul>
        </div>
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">ПОСЛУГИ</li>
                <hr>
                <li><a href="https://intita.com" target="_blank" >Навчання</a></li>
            </ul>
        </div>
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">КОНТАКТИ</li>
                <hr>
                <li>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>robotamolodi@gmail.com</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="down-footer col-xs-12">
        <div class="inner-footer col-md-7">
            <span>© 2012 | Проект реалізовано за підтримки міжнародного фонду "Відродження"</span>
            <img src="{{asset('image/vidrodjenja.png')}}">
        </div>
        <div class="inner-footer col-md-5" style="text-align: right;">
            <span>Поділитись у соцмережах:</span>
            <a href="https://www.facebook.com/sharer/sharer.php?u=http://robotamolodi.org/"
               target="_blank" title="Share on facebook.com">
                <i class="fa-soc fa fa-facebook-square fa-2x" aria-hidden="true"></i>
            </a>
            <a href="http://vk.com/share.php?url=http://robotamolodi.org/&title=РОБОТАМОЛОДІ&image=http://robotamolodi.org/image/logo.png"
               target="_blank" title="Share on vk.com">
                <i class="fa-soc fa fa-vk fa-2x" aria-hidden="true"></i>
            </a>
            <a href="http://www.linkedin.com/shareArticle?mini=true&amp&title=РОБОТАМОЛОДІ&url=http://robotamolodi.org/"
               target="_blank">
                <i class="fa-soc fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?url=http://robotamolodi.org/&text=РОБОТАМОЛОДІ"
               target="_blank" title="Share on twitter.com">
                <i class="fa-soc fa fa-twitter-square fa-2x" aria-hidden="true"></i>
            </a>
            <a href="https://plus.google.com/share?url=http://robotamolodi.org/"
               target="_blank" title="Share on plus.google.com">
                <i class="fa-soc fa fa-google-plus-square fa-2x" aria-hidden="true"></i>
            </a>
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
