@extends('newDesign.layouts.admin')
@section('content')
    <div class=" col-md-10 col-sm-10 col-xs-10 contentAndmin">

        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        <div class="createNews"><a href="{{ URL::route('admin.seo-module.create') }}" class="btn btn-success btn-lg">Створити</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <th scope="col">id</th>
                <th scope="col">Url</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Keywords</th>
                <th scope="col"></th>
            </thead>

            <tbody>
                @forelse($infos as $info)
                    <tr>
                        <td>{{$info->id}}</td>
                        <td>{{$info->url}}</td>
                        <td>{{$info->title}}</td>
                        <td>{{$info->description}}</td>
                        <td>{{$info->keywords}}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.seo-module.show',$info->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('admin.seo-module.edit',$info->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.seo-module.destroy', $info->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center">
                            <h2>No one info objects were created yet</h2>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection