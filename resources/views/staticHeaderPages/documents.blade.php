@extends('app')

@section('content')
    @include('newDesign/aboutUs/show')
    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
           ['url'=> 'head','name'=>trans('content.main')],
           ['name' => trans('content.documents'), 'url' => false]
           ])
       )
    <section class="content">
        <div class="documents">
            <h1 class="title">{{ trans('content.documents') }}</h1>
            <div class="documents__list">
                <div class="documents__list">
                    @foreach($docs as $doc)
                        <a class="documents__item" href="{{ asset('files/'.$doc['file']) }}" target="_blank" rel="noopener">
                            <div class="documents__icon">
                                <img src="{{ asset('image/document.svg') }}" alt="document">
                            </div>
                            <div class="documents__name">{{ trans($doc['title_key']) }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@stop

<style>
    .documents__list{ margin-top:16px; display:grid; gap:12px; }
    .documents__item{
        display:flex; align-items:center; gap:12px;
        padding:14px; border:1px solid #e9e9e9; border-radius:10px;
        background:#fff; text-decoration:none; color:#111;
    }
    .documents__item:hover{ border-color:#cfcfcf; color: #f48952; text-decoration: none}
    .documents__icon img{ width:64px; height:64px; display:block; }
    .documents__name{ font-size:16px; font-weight:600; }
</style>