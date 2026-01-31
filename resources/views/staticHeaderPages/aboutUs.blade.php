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
                    <div class="row full-content small-row" >
                        <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 article-icon">
                            <img src="{{asset('image/aboutUsImages/icon_lamp.png')}}" alt="lamp">
                        </div>
                        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 idea">
                            {{ trans('aboutus.ideaofcreation') }}
                            <div class="row second_level">
                                <div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 article-icon">
                                    <img src="{{asset('image/aboutUsImages/map_icon.png')}}" alt="map">
                                </div>
                                <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
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
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2010_1.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2010_2.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2010_2.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2010_3.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2010_3.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2010_4.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2010_4.jpg')}}"/></a>
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
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_1.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_4.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_4.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_5.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_5.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_7.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_7.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_8.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_8.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_10.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_10.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_11.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_11.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_12.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_12.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_15.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_15.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2013_16.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2013_16.jpg')}}"/></a>
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
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_1.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_2.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_2.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_3.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_3.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_4.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_4.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_5.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_5.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_7.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_7.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_8.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_8.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2014_9.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2014_9.jpg')}}"/></a>
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
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2015_1.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2015_2.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2015_2.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2015_3.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2015_3.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2015_4.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2015_4.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2015_5.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2015_5.jpg')}}"/></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2016</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>{{ trans('aboutus.organiztprovide') }} <a href="https://profitday.info">«PROFIT DAY»</a>   {{ trans('aboutus.cycleofevents') }}</p>
                                            <div class="row galleries ">
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_1.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_1.jpg')}}"/></a>
                                                </div>

                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_7.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_7.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_8.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_8.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_9.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_9.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_10.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_10.jpg')}}"/></a>
                                                </div>

                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_12.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_12.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_13.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_13.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_14.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_14.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_15.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_15.jpg')}}"/></a>
                                                </div>

                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2016_18.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2016_18.jpg')}}"/></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2017</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>{{ trans('aboutus.in2017') }} <a href="https://profitday.info">«PROFIT DAY»</a>   {{ trans('aboutus.events2017') }}</p>
                                            <div class="row galleries ">
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery"
                                                       href="{{asset('image/aboutUsImages/gallery/gallery_2017_01.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2017_01.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery"
                                                       href="{{asset('image/aboutUsImages/gallery/gallery_2017_02.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2017_02.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery"
                                                       href="{{asset('image/aboutUsImages/gallery/gallery_2017_03.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2017_03.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery"
                                                       href="{{asset('image/aboutUsImages/gallery/gallery_2017_04.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2017_04.jpg')}}"/></a>
                                                </div>

                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery"
                                                       href="{{asset('image/aboutUsImages/gallery/gallery_2017_06.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2017_06.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery"
                                                       href="{{asset('image/aboutUsImages/gallery/gallery_2017_5.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2017_5.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery"
                                                       href="{{asset('image/aboutUsImages/gallery/gallery_2017_07.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2017_07.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery"
                                                       href="{{asset('image/aboutUsImages/gallery/gallery_2017_08.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2017_08.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery"
                                                       href="{{asset('image/aboutUsImages/gallery/gallery_2017_09.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2017_09.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery"
                                                       href="{{asset('image/aboutUsImages/gallery/gallery_2017_10.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2017_10.jpg')}}"/></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2018</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>
                                                {{ trans('aboutus.in2018') }}
                                                <a href="https://www.facebook.com/events/178781732773416/">{{ trans('aboutus.hackathon_YEPS') }}</a>
                                                {{ trans('aboutus.in2018_1') }}
                                                <a href="https://hack.intita.com/#itcamp">{{ trans('aboutus.Hackers_school') }} </a>
                                                {{ trans('aboutus.in2018_2') }}
                                                <a href="https://profitday.info/">«PROFIT DAY» </a>
                                                {{ trans('aboutus.in2018_3') }}
                                                <a href="https://www.facebook.com/events/172953163617012/">“Kids for kids” </a>
                                                {{ trans('aboutus.in2018_4') }}
                                            </p>
                                            <div class="row galleries ">
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2018_1.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2018_1.jpg')}}"/>
                                                    </a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2018_2.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2018_2.jpg')}}"/>
                                                    </a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2018_3.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2018_3.jpg')}}"/>
                                                    </a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2018_7.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2018_7.jpg')}}"/>
                                                    </a>
                                                </div>
                                                <div class="gallery-item nopadding">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/gallery_2018_6.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/resize/gallery_2018_6.jpg')}}"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2019</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>{!! trans('aboutus.19text') !!}</p>
                                            <div class="row galleries">
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2019/photo_1.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2019/photo_1.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2019/photo_2.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2019/photo_2.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2019/photo_3.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2019/photo_3.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2019/photo_4.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2019/photo_4.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2019/photo_5.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2019/photo_5.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2019/photo_6.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2019/photo_6.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2019/photo_7.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2019/photo_7.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2019/photo_8.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2019/photo_8.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2019/photo_9.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2019/photo_9.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2019/photo_10.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2019/photo_10.jpg')}}"/></a>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2020-2022</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>{!! trans('aboutus.20-22text_1') !!}</p>
                                            <div class="row galleries">
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-1.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-1.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-2.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-2.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-3.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-3.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-4.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-4.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-5.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-5.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-6.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-6.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-7.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-7.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-8.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-8.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-9.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-9.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-10.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-10.jpg')}}"/></a>
                                                </div>
                                            </div>
                                            <p>{!! trans('aboutus.20-22text_2') !!} <a href="https://www.facebook.com/media/set/?set=a.3042062996033496&type=3" target="_blank">{!! trans('aboutus.20-22text_3') !!}</a></p>
                                            <div class="row galleries">
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-11.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-11.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-12.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-12.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-13.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-13.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-14.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-14.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2022/2022-15.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2022/2022-15.jpg')}}"/></a>
                                                </div>
                                            </div>
                                            <p>{!! trans('aboutus.20-22text_4') !!} <a href="https://uspih.vn.ua" target="_blank">https://uspih.vn.ua</a></p>
                                        </div>
                                    </div>

                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2023</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>{!! trans('aboutus.23text_1') !!} - <a href="https://intita.com/news/yak-dzhunu-otrimati-pershu-robotu-v-it-_1690890026" target="_blank">https://intita.com/news/yak-dzhunu-otrimati-pershu-robotu-v-it-_1690890026</a></p>
                                            <p>{!! trans('aboutus.23text_2') !!} - <a href="https://getstrong.intita.com/ " target="_blank">https://getstrong.intita.com</a></p>
                                            <p>{!! trans('aboutus.23text_3') !!} - <a href="https://intita.com/news/u-vinnici-aitivci-dvi-dobi-rozroblyali-antishahraiski-tehnologii_1698139147" target="_blank">https://intita.com/news/u-vinnici-aitivci-dvi-dobi-rozroblyali-antishahraiski-tehnologii_1698139147</a></p>
                                            <div class="row galleries">
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2023/2023-2.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2023/2023-2.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2023/2023-3.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2023/2023-3.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2023/2023-4.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2023/2023-4.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2023/2023-5.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2023/2023-5.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2023/2023-6.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2023/2023-6.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2023/2023-7.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2023/2023-7.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2023/2023-8.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2023/2023-8.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2023/2023-9.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2023/2023-9.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2023/2023-10.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2023/2023-10.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2023/2023-1.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2023/2023-1.jpg')}}"/></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2024</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>{!! trans('aboutus.24text_1') !!} - <a href="https://stem.intita.com" target="_blank">https://stem.intita.com</a></p>
                                            <p>{!! trans('aboutus.24text_2') !!} - <a href="https://100.intita.com" target="_blank">https://100.intita.com</a></p>
                                            <p>{!! trans('aboutus.24text_3') !!} - <a href="https://intita.com/news/narodzhennya-intelektualnogo-kapitalu-ukraini-v-vinnici_1734356974" target="_blank">https://intita.com/news/narodzhennya-intelektualnogo-kapitalu-ukraini-v-vinnici_1734356974</a></p>
                                            <div class="row galleries">
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2024/2024-1.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2024/2024-1.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2024/2024-2.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2024/2024-2.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2024/2024-3.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2024/2024-3.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2024/2024-4.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2024/2024-4.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2024/2024-5.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2024/2024-5.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2024/2024-6.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2024/2024-6.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2024/2024-7.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2024/2024-7.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2024/2024-8.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2024/2024-8.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2024/2024-9.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2024/2024-9.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2024/2024-10.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2024/2024-10.jpg')}}"/></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row years">
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 year">
                                            <span>2025</span>
                                        </div>
                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 year-text">
                                            <p>{!! trans('aboutus.25text_1') !!}</p>
                                            <div class="row galleries">
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2025/2025-1.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2025/2025-1.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2025/2025-2.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2025/2025-2.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2025/2025-3.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2025/2025-3.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2025/2025-4.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2025/2025-4.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2025/2025-5.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2025/2025-5.jpg')}}"/></a>
                                                </div>
                                            </div>
                                            <p>{!! trans('aboutus.25text_2') !!}</p>
                                            <div class="row galleries">
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2025/2025-6.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2025/2025-6.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2025/2025-7.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2025/2025-7.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2025/2025-8.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2025/2025-8.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2025/2025-9.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2025/2025-9.jpg')}}"/></a>
                                                </div>
                                                <div class="gallery-item">
                                                    <a class="thumbnail gallery" href="{{asset('image/aboutUsImages/gallery/2025/2025-10.jpg')}}">
                                                        <img data-src="{{asset('image/aboutUsImages/gallery/2025/2025-10.jpg')}}"/></a>
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

    <script src="https://cdn.jsdelivr.net/npm/lozad"></script>


    <script type="text/javascript">
        lozad('.gallery-item a img', {
            load: function(el) {
                el.src = el.dataset.src;
                // el.onload = function() {
                //     el.classList.add('fade')
                // }
            }
        }).observe();
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
