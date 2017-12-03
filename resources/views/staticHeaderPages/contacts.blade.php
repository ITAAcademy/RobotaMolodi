@extends('app')

@section('content')
    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
           ['url'=> 'head','name'=>trans('content.main')],
           ['name' => trans('content.contacts'), 'url' => false]
           ]
       )
       )
    <div class="row c_xs">
        <div class="col-sm-1"></div>
        <div class="col-sm-4 c_h3">
            <h3>{{ trans('content.contactus') }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-1 col-xs-1 icon" style="text-align: right">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </div>
        <div class="col-sm-3 c_link">
            <a href="mailto:robotamolodi@gmail.com" style="color:  #3f3e3e">robotamolodi@gmail.com</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-1 col-xs-1 icon" style="text-align: right">
            <i class="fa fa-phone-square" aria-hidden="true"></i>
        </div>
        <div class="col-sm-3 c_phone">
            <p style="color:  #3f3e3e">+38-0432-52-82-67</p>
        </div>
    </div>
    {{--<div class="row">--}}
        {{--<div class="col-sm-1"></div>--}}
        {{--<div class="col-sm-1 col-xs-1 icon " style="text-align: right">--}}
            {{--<i class="fa fa-skype" aria-hidden="true"></i>--}}
        {{--</div>--}}
        {{--<div class="col-sm-3 c_link">--}}
            {{--<a href="skype:robotamolodi" style="color:  #3f3e3e">Skype: robotamolodi</a>--}}
        {{--</div>--}}
    {{--</div>--}}
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@stop
