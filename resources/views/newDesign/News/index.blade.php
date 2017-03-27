@extends('newDesign.layouts.admin')

@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    <div class="createNews"><a href="{{ URL::route('news.create') }}" class="btn btn-success btn-lg"> Create news</a>
    </div>

    <table class="table  table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Picture</th>
            <th>Show news</th>
            <th>Delete news</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($news as $new)
            <tr>
                <td>{{ $new->id }}</td>
                <td><h4>{{ $new->name }}</h4></td>
                <td>{!!  $new->description !!}</td>

                <td>
                    @if($new->img!='Not picture')
                        <img class="picture" src="{{ asset($new->getPath().$new->img) }}">
                    @else
                        Not picture
                    @endif
                </td>
                <td>
                    <a href="{{ route('news.show', $new->id) }}" class="btn btn-primary">Show news</a>
                    {{--<button type="button" class="btn btn-primary">Update</button>--}}
                </td>
                <td>
                    {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['news.destroy', $new->id]
                    ]) !!}
                    {!! Form::submit('Delete news', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@stop