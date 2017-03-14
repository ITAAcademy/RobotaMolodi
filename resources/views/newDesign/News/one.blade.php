@extends('newDesign.layouts.admin')

@section('content')

    <div class="col-lg-8 col-lg-push-2 wrapperOneNews">
        <div><h2>{{ $newsOne->name }}</h2></div>
        <div>
            @if($newsOne->img!='Not picture')
                <img class="imageOneNews" src="{{ asset($patch.$newsOne->img) }}">
            @endif
        </div>
        <div>{!! $newsOne->description !!}</div>

        <a href="{{ route('news.edit', $newsOne->id) }}" class="btn btn-primary">Edit News</a>
        <a href="{{ route('news.index', $newsOne->id) }}" class="btn btn-primary">Show All</a>
    </div>

@endsection