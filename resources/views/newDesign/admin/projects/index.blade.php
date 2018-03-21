@extends('newDesign.layouts.admin')

@section('content')
    <div class=" col-md-10 col-sm-10 col-xs-10 contentAndmin">
        <table class=" striped bordered highlight " >
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Published</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @forelse($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->name}}</td>

                    @if($project->published == '1')
                        <td >
                            <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                            <label for="filled-in-box"></label>
                        </td>
                    @else
                        <td>
                            <input type="checkbox" class="filled-in" id="filled-in-box"/>
                            <label for="filled-in-box"></label>
                        </td>
                    @endif
                </tr>

                @empty
                <div>
                    <h5 class="center-align truncate">There are no companies</h5>
                </div>
            @endforelse
            </tbody>
        </table>
    </div>
@stop
