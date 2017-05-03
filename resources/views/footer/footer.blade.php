<footer class="row footer">
    <div class="container-footer col-xs-12">
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">IНФОРМАЦIЯ</li>
                <hr>
                <li><a href="about/index.html">Про нас</a></li>
                <li><a href="https://profitday.info/allcompanies">Партнери</a></li>
                <li><a href="#">Підтримка</a></li>
                <li><a href="#">Бізнес-ідеї</a></li>
            </ul>

        </div>
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">НАВЧАННЯ</li>
                <hr>
                <li><a href="#">Навчальні заклади</a></li>
                <li><a href="#">Тренінги і семінари</a></li>
                <li><a href="#">Курси</a></li>
                <li><a href="#">Навчання за кордоном</a></li>
            </ul>
        </div>
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">ПОСЛУГИ</li>
                <hr>
                <li><a href="#">Довідник</a></li>
                <li><a href="https://intita.com/courses">Навчання</a></li>
                <li><a href="#">Бізнес-ідеї</a></li>
            </ul>
        </div>
        <div class="inner-footer col-sm-6 col-md-3">
            <ul class="footer-list">
                <li class="li_header"><img src="{{asset('image/redHat.png')}}">КОНТАКТИ</li>
                <hr>
                <li>
                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                    <a href="#" class="no-click">+38-0432 52-82-67</a>
                </li>
                <li>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <a href="#" class="no-click">robotamolodi@gmail.com</a>
                </li>
                <li>
                    <i class="fa fa-skype" aria-hidden="true"></i>
                    <a href="#" class="no-click">robotamolodi</a>
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
<script>
    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.inner-footer > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>
<script>
    $(document).ready(function () {
        $('.no-click').on('click', function (e) {
            e.preventDefault();
        })
    })
</script>
