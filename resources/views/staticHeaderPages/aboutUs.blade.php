@extends('app')

@section('title')
    <h2>{{ trans('content.about us') }}</h2>
@stop

@section('content')
    @include('newDesign/aboutUs/show')
    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
           ['url'=> 'head','name'=>trans('content.main')],
           ['name' => trans('content.aboutus'), 'url' => false]
           ]
       )
       )
    <section class="content">
                <div class="article">
                    <h1 class="title">Про нас</h1>
                    <div class="row full-content">
                        <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 article-icon">
                            <img src="{{asset('image/aboutUsImages/icon_lamp.png')}}" alt="lamp">
                        </div>
                        <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11">
                            Iдея створення Всеукраїнської молодіжної громадської організації (ВМГО «МЦП») виникла серед
                            директорів обласних Молодіжних центрів праці в 2004 році, як певного громадського об’єднання,
                            яке б відстоювало інтереси членів цього об’єднання, а саме: керівників та працівників молодіжних
                            центрів праці, бізнес-інкубаторів, бізнес-центрів, членів трудових загонів, громадян, які
                            займаються постійним і тимчасовим працевлаштуванням, профорієнтацією молоді та розвитком
                            молодіжного підприємництва. 01 листопада 2007 року було проведено установчий з’їзд ВМГО «МЦП», а
                            29 грудня 2007 року – зареєстровано Міністерством юстиції України.
                            <div class="row second_level">
                                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 article-icon">
                                    <img src="{{asset('image/aboutUsImages/map_icon.png')}}" alt="map">
                                </div>
                                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11">
                                    <p>Основна мета діяльності організації - пошук нових механізмів зайнятості молоді та їх
                                        реалізація.</p>
                                    <p>На даний час в структуру ВМГО «МЦП» входять 18 обласних осередків, кількість членів
                                        організації – близько 150.</p>
                                    <p>Вищим керівним органом організації є З’їзд, в період між З’їздами вищим керівним
                                        органом є Рада, колегіальним органом управління в період між засіданнями Ради є
                                        Правління, яке підзвітне Раді, контрольні функції фінансово-господарської діяльності
                                        виконує Ревізійна комісія, вищою посадовою особою ВМГО «МЦП» є Голова.</p>
                                    <!--<div class="row galleries">
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 ">
                                            <a class="thumbnail gallery" href="images/gallery/full_img.png"><img
                                                    src="images/gallery/1_f_1.png"/></a>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 ">
                                            <a class="thumbnail gallery" href="images/gallery/full_img.png"><img
                                                    src="images/gallery/1_f_2.png"/></a>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 ">
                                            <a class="thumbnail gallery" href="images/gallery/full_img.png"><img
                                                    src="images/gallery/1_f_3.png"/></a>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 ">
                                            <a class="thumbnail gallery" href="images/gallery/full_img.png"><img
                                                    src="images/gallery/1_f_4.png"/></a>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 ">
                                            <a class="thumbnail gallery" href="images/gallery/full_img.png"><img
                                                    src="images/gallery/1_f_5.png"/></a>
                                        </div>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 ">
                                            <a class="thumbnail gallery" href="images/gallery/full_img.png"><img
                                                    src="images/gallery/1_f_6.png"/></a>
                                        </div>
                                    </div>-->

                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <img src="{{asset('image/aboutUsImages/year_start_icon.png')}}" class="icon_start" alt="year start"><span>2008</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <div class="subtitle">Iнформація про досвід реалізації проектів:</div>
                                            <p>
                                                У 2008 році спільно із ВГО «Фонд розвитку демократії» було проведено <span
                                                        class="orange">цикл громадських слухань</span> у семи областях
                                                (Вінницька, Волинська, Львівська, Івано-Франківська, Тернопільська,
                                                Хмельницька, Херсонська) України, на яких було обговорено становище молоді
                                                на ринку праці (значна увага приділялась проблемі зайнятості сільської
                                                молоді).
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2010</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>У 2010 році організація <span class="orange">виграла конкурс проектів громадських організацій</span>,
                                                який проводило Міністерство України у справах сім’ї, молоді та спорту, з
                                                проектом: «Трудове та патріотичне виховання молоді».</p>
                                            <div class="row galleries">
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2010_1.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2010_1.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2010_2.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2010_2.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2010_3.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2010_3.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2010_4.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2010_4.jpg')}}"/></a>
                                                </div>
                                            </div>
                                            <p> У 2010 році від Міжнародного фонду «Відродження» організація отримала
                                                <span class="orange">фінансування на проект «Наметовий табір «Відпочивай, працюй і не сумуй»</span>
                                                в рамках антикризової гуманітарної програми.</p>
                                        </div>
                                    </div>

                                     <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2012</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>У 2012 році за підтримки Антикризової гуманітарної програми Міжнародного
                                                фонду «Відродження» організація реалізовує проект «Інформаційно-аналітична
                                                система молодіжних центрів праці та центрів працевлаштування студентів:
                                                <span class="orange">«Робота для молоді»</span>, який передбачає створення
                                                інтерактивної інформаційно-аналітичної системи молодіжних центрів праці та
                                                центрів працевлаштування студентів для автоматизації, уніфікації та
                                                підвищення ефективності їх роботи з молоддю та взаємодії з партнерами і між
                                                собою.</p>
                                            <!--<div class="row galleries">
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="images/gallery/full_img.png"><img
                                                            src="images/gallery/1_f_1.png"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="images/gallery/full_img.png"><img
                                                            src="images/gallery/1_f_2.png"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="images/gallery/full_img.png"><img
                                                            src="images/gallery/1_f_3.png"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="images/gallery/full_img.png"><img
                                                            src="images/gallery/1_f_4.png"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="images/gallery/full_img.png"><img
                                                            src="images/gallery/1_f_5.png"/></a>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2013</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>У 2013 році за підтримки Благодійного фонду Богдана Гаврилишина організація
                                                <span class="orange">реалізує міжнародний проект «Пошук нових механізмів працевлаштування молоді»</span>.
                                                Основною метою якого є вивчити досвід у сфері працевлаштування молоді в
                                                Польщі та цей досвід, через конкретні засоби, впровадити в Україні.</p>
                                            <div class="row galleries">
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_1.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_1.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_2.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_2.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_3.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_3.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_4.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_4.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_5.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_5.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_6.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_7.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_7.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_7.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_8.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_8.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_9.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_9.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_10.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_10.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_11.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_11.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_12.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_12.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_13.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_13.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_14.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_14.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_15.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_15.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_16.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_16.jpg')}}"/></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2014</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>У 2013-2014 вперше в Україні проведено <span class="orange">галузеві ярмарки вакансій</span>,
                                                зокрема в ІТ сфері.<br/>
                                                За 2014 рік провели в місті Тернополі <span class="orange">Україно-польський семінар</span>
                                                з питань працевлаштування молоді, зокрема на перше робоче місце. Метою
                                                заходу стало вивчення кращих практик працевлаштування молоді в Польщі а
                                                результатом підписання меморандуму співпраці між українськими та польськими
                                                структурами, які реалізують політику зайнятості молоді.</p>
                                            <div class="row galleries">
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_1.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_1.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_2.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_2.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_3.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_3.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_4.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_4.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_5.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_5.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_7.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_7.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_8.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_8.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_9.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_9.jpg')}}"/></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2015</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>У 2015 році організація <span class="orange">виграла конкурс проектів громадських організацій</span>,
                                                який проводило Міністерство України у справах сім’ї, молоді та спорту, з
                                                проектом: «Проведення молодіжних ярмарок вакансій та кар’єри, зокрема для
                                                внутрішньо переміщених осіб» - «ДЕНЬ КАР’ЄРИ/ PROFITDAY» - це цикл заходів,
                                                які охопили більше, як 15 областей України і поєднали у собі ярмарки
                                                вакансій, тренінги від провідних роботодавців та виставки всеукраїнських та
                                                регіональних компаній. Основною цільовою авдиторією проекту є молодь та
                                                внутрішньо переміщені особи. Пріоритетною сферою ярмарок є інформаційні
                                                технології та сільське господарство.</p>
                                            <div class="row galleries">
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2015_1.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2015_1.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2015_2.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2015_2.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2015_3.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2015_3.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2015_4.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2015_4.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2015_5.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2015_5.jpg')}}"/></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2016</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>У 2016 році організація провела <a href="http://www.profitday.info/datedevents?year=2016">«PROFIT DAY»</a> - дні
                                                кар’єри - цикл заходів, які охопили більше 17 областей України і поєднали у
                                                собі ярмарки вакансій, тренінги від провідних роботодавців та виставки
                                                всеукраїнських та регіональних компаній. Основною цільовою авдиторією проекту
                                                є молодь та внутрішньо переміщені особи. Пріоритетною сферою ярмарок була
                                                сфера інформаційних технологій.</p>
                                            <div class="row galleries ">
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_1.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_1.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_2.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_2.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_3.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_3.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_4.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_4.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_5.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_5.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_6.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_6.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_7.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_7.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_8.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_8.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_9.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_9.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_10.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_10.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_11.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_11.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_12.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_12.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_13.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_13.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_14.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_14.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_15.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_15.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_16.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_16.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_17.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_17.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_18.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_18.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_19.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_19.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_20.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_20.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_21.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_21.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_22.jpg')}}">
                                                        <img src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_22.jpg')}}"/></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <script src="../../js/aboutUs/script.js"></script>
    <script src="../../js/aboutUs/featherlight.min.js" type="text/javascript"></script>
    <script src="../../js/aboutUs/featherlight.gallery.min.js" type="text/javascript"></script>

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
            a = s.createElement(o)
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-83807118-1', 'auto');
        ga('send', 'pageview');

        $(".profitday-btn").html("Події");

    </script>
@stop
