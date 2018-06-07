@extends('newDesign.layouts.admin')

@section('content')
    <div class=" col-md-11 col-sm-11 col-xs-11 contentAndmin">
        <div class="col-lg-10 col-lg-push-1 wrapperOneNews">
            <div><h4>{{ $newsOne->name }}</h4></div>
            <div>
                @if($newsOne->img!='Not picture')
                    <img class="imageOneNews" src="{{ asset($newsOne->getPath().$newsOne->img) }}">
                @endif
            </div>
            <div>{!! $newsOne->description !!}</div>

        </div>

        {{--@include('newDesign.paginator', ['paginator' => $news])--}}
    </div>

    <div class="col-md-1 col-sm-1 col-xs-1">
        <a href="{{ route('admin.news.edit', $newsOne->id) }}"><i class="fa fa-edit"></i></a>
        <a href="{{ route('admin.news.index', $newsOne->id) }}"><i class="fa fa-reply-all"></i></a>
    </div>
@endsection
