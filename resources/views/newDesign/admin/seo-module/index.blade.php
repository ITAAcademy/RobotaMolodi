@extends('newDesign.layouts.admin')
@section('content')
<div class="contentAndmin">
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_message') }}
        </div>
    @endif
        <div class="createNews">
            <div class="row">
                <a href="{{ URL::route('admin.seo-module.create') }}" class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a>
                <div>
                    <h4 style="text-align: center">Список СЕО</h4>
                </div>
            </div>
        </div>

    <table class="striped bordered highlight">
        <thead>
            <tr>
                {{--<th class="s1 m1 l1 xl1">Id</th>--}}
                <th class="s2 m3 l3 xl3">Url</th>
                <th class="s2 m3 l2 xl3">Title</th>
                <th class="s4 m3 l3 xl3">Description</th>
                <th class="s3 m2 l3 xl2">Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($infos as $info)
            <tr>
                {{--<td>{{$info->id}}</td>--}}
                <td>{{$info->url}}</td>
                <td>{{$info->title}}</td>
                <td>{{$info->description}}</td>
                {{--<td>{{$info->keywords}}</td>--}}
                <td>
                    {{--<a class="btn btn-info btn-group optionBtn" href="{{ route('admin.seo-module.show',$info->id) }}">Show</a>--}}
                    <a href="{{ route('admin.seo-module.edit',$info->id) }}"><i class="fa fa-edit"></i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['admin.seo-module.destroy', $info->id]]) !!}
                    {!! Form::submit('&#xf014;', [' class' => 'fa']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center">
                    <h4>No one info objects were created yet</h4>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection