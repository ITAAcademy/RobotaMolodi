@extends('newDesign.layouts.admin')
@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    <div class="createNews">
        <a href="{{ URL::route('admin.slider.index') }}" class="btn">
            All sliders
        </a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Url</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $slider->id }}</td>
                <td>
                    <img class="picture" src="{{$slider->image}}" style="width: 100%">
                </td>
                <td>
                    <a href="{!! $slider->url !!}">{!! $slider->url !!}</a>
                </td>
                <td>{!! $slider->category->name !!}</td>
                <td>
                    <div class="btn-group">
                        {!! Form::open(['method' => 'DELETE','route' => ['admin.slider.destroy', $slider->id]]) !!}
                        <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-success btn-block">
                            Edit
                        </a>
                        {!! Form::submit('Delete ', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@endsection