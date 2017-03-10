@extends('newDesign.layouts.admin')

@section('content')

    <div class="createNews"><a href="{{ URL::route('news.create') }}" class="btn btn-success btn-lg"> Create news</a></div>

    <table class="table  table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Picture</th>
            <th>Update</th>
            <th>Delete</th>
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
                        <img class="picture" src="{{ asset($patch.$new->img) }}">
                    @else
                        Not picture
                    @endif
                </td>
                <td>
                    <a href="{{ route('news.show', $new->id) }}" class="btn btn-info">View Task</a>
                    <button type="button" class="btn btn-primary">Update</button>
                </td>
                <td>
                    <button type="button" class="btn btn-primary">Delete</button>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>

    {{--@if(Session::has('flash_message'))--}}
    {{--<div class="alert alert-success">--}}
    {{--{{ Session::get('flash_message') }}--}}
    {{--</div>--}}
    {{--@endif--}}




@endsection