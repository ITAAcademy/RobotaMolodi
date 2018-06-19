@extends('newDesign.layouts.admin')

@section('content')
    <div class=" col-md-12 col-sm-12 col-xs-12 contentAndmin">
        <div class="col-lg-10 col-lg-push-1 wrapperOneNews">
            <div><h4>{{ $newsOne->name }}</h4></div>
            <div>
                @if($newsOne->img!='Not picture')
                    <img class="imageOneNews" src="{{ asset($newsOne->getPath().$newsOne->img) }}">
                @endif
            </div>
            {{--<div class="short">{!! $newsOne->description !!}</div>--}}
            <div class="short"> <?= mb_substr($newsOne->description, 0, 103); ?></div>

        </div>

        {{--@include('newDesign.paginator', ['paginator' => $news])--}}

        <div class="buttonNav">
            <a href="{{ route('admin.news.edit', $newsOne->id) }}"><i class="fa fa-edit"></i></a>
            <a href="{{ route('admin.news.index', $newsOne->id) }}"><i class="fa fa-reply-all"></i></a>
        </div>
    </div>
@endsection
