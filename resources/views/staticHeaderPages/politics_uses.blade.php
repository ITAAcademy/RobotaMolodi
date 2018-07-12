@extends('app')

@section('content')
    <div class="listArticles">
        @include('newDesign.breadcrumb',array('breadcrumbs' =>[
               ['url'=> 'head','name'=>'Головна'],
               ['name' => 'Политика использования', 'url' => false]
               ]))
        <article class="mainArticle">

            <strong><h4 class="infoPolicy">{{trans('policy.structure')}}:</h4></strong>
            <em class="policyLocation"><span class="personalData">{{trans('policy.personalD')}} – </span>{{trans('policy.personalData')}}.</em><br>
            <ol class="addressPolicy">
                <li>{{trans('policy.fullName')}}.</li>
                <li>{{trans('policy.address')}}.</li>
                <li>{{trans('policy.crn')}} {{ trans('form.regcomapany') }}.</li>
                <li>{{trans('policy.mail')}}.</li>
                <li>{{trans('policy.other')}}.</li>
            </ol>
            <h4 class="infoPolicy">{{trans('policy.owner')}}:</h4>
            <p class="policyLocation">{{trans('policy.location')}}.<br>
                {{ trans('main.phone') }} +38 (097) 934-25-24<br>
                E-mail: <a href="mailto:robotamolodi@gmail.com">robotamolodi@gmail.com</a><br>
                Website: <a href="https://robotamolodi.org">www.robotamolodi.org</a></p><br>
            <h4 class="infoPolicy">{{trans('policy.dataprocessing')}}:</h4>
            <p class="policyLocation">{{trans('policy.consent')}}</p>
            <h4 class="infoPolicy">{{trans('policy.rightTo')}}</h4>
            <ul class="rightPolicy">
                <li>{{trans('policy.right1')}};</li>
                <li>{{trans('policy.right2')}};</li>
                <li>{{trans('policy.right3')}};</li>
                <li>{{trans('policy.right4')}};</li>
                <li>{{trans('policy.right5')}};</li>
                <li>{{trans('policy.right6')}};</li>
                <li>{{trans('policy.right7')}};</li>
                <li>{{trans('policy.right8')}};</li>
                <li>{{trans('policy.right9')}};</li>
                <li>{{trans('policy.right10')}};</li>
                <li>{{trans('policy.right11')}};</li>
                <li>{{trans('policy.right12')}};</li>
                <li>{{trans('policy.right13')}}.</li>
            </ul><br>
            <h4 class="infoPolicy">{{trans('policy.collecting')}}:</h4>
            <ul class="rightPolicy">
                <li>{{trans('policy.purpose1')}};</li>
                <li>{{trans('policy.purpose2')}};</li>
                <li>{{trans('policy.purpose3')}}.</li>
            </ul><br>
            <h4 class="infoPolicy">{{trans('policy.receiveInformation')}}:</h4>
            <p class="policyLocation">{{trans('policy.consentToReceive')}}.</p><br>
            <h4 class="infoPolicy">{{trans('policy.personsWhoTransfer')}}:</h4>
            <p class="policyLocation">{{trans('policy.transfer')}}.
                <em>{{trans('policy.guarantees')}}.</em></p>
        </article>
    </div>
@stop
