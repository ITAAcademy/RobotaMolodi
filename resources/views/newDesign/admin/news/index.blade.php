@extends('newDesign.layouts.admin')

@section('content')
    <div class=" col-md-10 col-sm-10 col-xs-10 contentAndmin">
        <div style="padding-top: 15px">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
        </div>
        <div class="createNews"><a href="{{ URL::route('admin.news.create') }}" class="btn btn-success btn-lg"> Create news</a>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Picture</th>
                <th>Published</th>
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
                            <img class="picture" src="{{ asset($new->getPath().$new->img) }}" style="width: 100%">
                        @else
                            Not picture
                        @endif
                    </td>
                    <td style="text-align: center">
                        @if($new->published)
                            <i class="fa fa-check-square-o set-main"></i>
                        @else
                            <i class="fa fa-square-o set-main"></i>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.news.show', $new->id) }}" class="btn btn-primary">Show news</a>
                        {{--<button type="button" class="btn btn-primary">Update</button>--}}
                    </td>
                    <td>
                        {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['admin.news.destroy', $new->id]
                        ]) !!}
                        {!! Form::submit('Delete news', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@stop