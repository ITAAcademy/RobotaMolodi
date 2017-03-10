@extends('newDesign.layouts.admin')

@section('content')

    <div class="col-lg-8 col-lg-push-2 wrapperOneNews">

        <div><h2>{{ $newsOne->name }}</h2></div>
        <div class="imageOneNews">
            @if($newsOne->img!='Not picture')
                <img class="picture" src="{{ asset($patch.$newsOne->img) }}">
            @endif
        </div>
        <div>{!! $newsOne->description !!}</div>
        <div>{{ $newsOne->id }}</div>


        <a href="{{ route('news.edit', $newsOne->id) }}" class="btn btn-info">Edit Task</a>
        <button type="button" class="btn btn-primary">Delete</button>

    </div>


@endsection