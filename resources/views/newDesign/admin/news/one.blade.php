@extends('newDesign.layouts.admin')

@section('content')
    <div class=" col-md-10 col-sm-10 col-xs-10 contentAndmin">
        <div class="col-lg-8 col-lg-push-2 wrapperOneNews">
            <div><h2>{{ $newsOne->name }}</h2></div>
            <div>
                @if($newsOne->img!='Not picture')
                    <img class="imageOneNews" src="{{ asset($newsOne->getPath().$newsOne->img) }}">
                @endif
            </div>
            <div>{!! $newsOne->description !!}</div>

            <a href="{{ route('admin.news.edit', $newsOne->id) }}" class="btn btn-primary">Edit News</a>
            <a href="{{ route('admin.news.index', $newsOne->id) }}" class="btn btn-primary">Show All</a>
            
            </div>

            @include('newDesign.paginator', ['paginator' => $news])

    </div>
@endsection