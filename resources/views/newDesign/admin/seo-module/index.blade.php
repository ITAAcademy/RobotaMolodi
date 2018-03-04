@extends('newDesign.layouts.admin')

@section('content')
    <div class=" col-md-10 col-sm-10 col-xs-10 contentAndmin" style="padding:20px">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_message') }}
            </div>
        @endif
        <div class="createNews">
        </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="clearfix"> Seo meta data <a class="btn btn-lg btn-success pull-right" href="{{ URL::route('admin.seo-module.create') }}">Create</a></h2>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover ">
                        <thead>
                        <tr>
                            <th scope="col" class="col-md-1">Id</th>
                            <th scope="col" class="col-md-2">Url</th>
                            <th scope="col" class="col-md-1">Title</th>
                            <th scope="col" class="col-md-4">Description</th>
                            <th scope="col" class="col-md-2">Keywords</th>
                            <th scope="col" class="col-md-2">Options</th>
                        </tr>
                        </thead>
                        @forelse($infos as $info)
                        <tr>
                            <td>{{$info->id}}</td>
                            <td>{{$info->url}}</td>
                            <td>{{$info->title}}</td>
                            <td  style="word-break:break-all ">{{$info->description}}</td>
                            <td>{{$info->keywords}}</td>
                            <td>
                                {{--<a class="btn btn-info btn-group optionBtn" href="{{ route('admin.seo-module.show',$info->id) }}">Show</a>--}}
                                <a class="btn btn-primary btn-group optionBtn" href="{{ route('admin.seo-module.edit',$info->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['admin.seo-module.destroy', $info->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-group optionBtn']) !!}
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
                    </table>
                </div>
            </div>
    </div>
@endsection
