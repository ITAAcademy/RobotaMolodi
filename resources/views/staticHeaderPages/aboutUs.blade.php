@extends('app')

@section('title')
    <h2>{{ trans('content.about us') }}</h2>
@stop

@section('content')
    @include('newDesign/aboutUs/show')
    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
           ['url'=> 'head','name'=>trans('content.main')],
           ['name' => trans('content.aboutus'), 'url' => false]
           ])
       )
    <section class="content">
                <div class="article">
                    <h1 class="title">{{ trans('aboutus.about') }}</h1>
                    <div class="row full-content">
                        <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 article-icon">
                            <img src="{{asset('image/aboutUsImages/icon_lamp.png')}}" alt="lamp">
                        </div>
                        <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11">
                            {{ trans('aboutus.ideaofcreation') }}
                            <div class="row second_level">
                                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 article-icon">
                                    <img src="{{asset('image/aboutUsImages/map_icon.png')}}" alt="map">
                                </div>
                                <div class="col-xs-10 col-sm-11 col-md-11 col-lg-11">
                                    <p>{{ trans('aboutus.mainpurpose') }}</p>
                                    <p>{{ trans('aboutus.present') }}</p>
                                    <p>{{ trans('aboutus.highmember') }}</p>
                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <img src="{{asset('image/aboutUsImages/year_start_icon.png')}}" class="icon_start" alt="year start"><span>2008</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <div class="subtitle">{{ trans('aboutus.info') }}</div>
                                            <p>
                                                {{ trans('aboutus.in2008') }} <span
                                                        class="orange">{{ trans('aboutus.cycle') }}</span> {{trans('aboutus.seven') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2010</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>{{ trans('aboutus.in2010') }} <span class="orange">{{ trans('aboutus.wincon') }}</span>,
                                                {{ trans('aboutus.ministry') }}</p>
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
                                            <p> {{ trans('aboutus.2010intern') }}
                                                <span class="orange">{{ trans('aboutus.finance') }}</span>
                                                {{ trans('aboutus.frame') }}</p>
                                        </div>
                                    </div>

                                     <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2012</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>{{ trans('aboutus.in2012anti-crisis') }}
                                                <span class="orange">{{ trans('aboutus.RM') }}</span>, {{ trans('aboutus.interactive') }}</p>
                                        </div>
                                    </div>
                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2013</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>{{ trans('aboutus.charity') }}
                                                <span class="orange">{{ trans('aboutus.realize') }}</span>.
                                                {{ trans('aboutus.mainpurpose') }}</p>
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
                                            <p>{{ trans('aboutus.13provide') }}<span class="orange">{{ trans('aboutus.sectoral') }}</span>,
                                                {{ trans('aboutus.inparticular') }}<br/>
                                                {{ trans('aboutus.Ternopil') }} <span class="orange">{{ trans('aboutus.seminar') }}</span>
                                                {{ trans('aboutus.employment') }}</p>
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
                                            <p>{{ trans('aboutus.in2015') }} <span class="orange">{{ trans('aboutus.public') }}</span>,
                                                {{ trans('aboutus.thescopeofthefair') }}</p>
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
                                            <p>{{ trans('aboutus.organiztprovide') }} <a href="http://www.profitday.info/datedevents?year=2016">«PROFIT DAY»</a> -  {{ trans('aboutus.cycleofevents') }}</p>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/10.4.2/lazyload.min.js"></script>

    <script type="text/javascript">
        (function() {
            new LazyLoad({
                elements_selector: "a > img"
            });
        }());
    </script>


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
