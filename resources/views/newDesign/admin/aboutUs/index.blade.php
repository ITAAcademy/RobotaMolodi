@extends('newDesign.layouts.admin')

@section('content')
    <div class=" col l10 col s10 col m10 contentAndmin">
        <br>
        <a href="{{ URL::route('admin.about-us.create') }}"
           class="btn-floating btn-large waves-effect waves-light red right">
            <i class="material-icons">add</i></a><br>
        <br>
        <table class=" striped bordered highlight " >
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Short description</th>
                <th>Year</th>
                {{--<th>Images</th>--}}
                <th>Published</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @forelse($aboutUses as $aboutUs)

                <tr>
                    <td>{{$aboutUs->id}}</td>
                    <td>{{$aboutUs->title}}</td>
                    <td>{{$aboutUs->short_description}}</td>
                    <td>{{$aboutUs->year}}</td>
                    {{--<td>{{$aboutUs->photos->image}}</td>--}}
                    @if($aboutUs->published == '1')
                        <td>
                            <input type="checkbox" disabled="disabled" class="filled-in" id="filled-in-box" checked="checked" />
                            <label for="filled-in-box"></label>
                        </td>
                    @else
                        <td>
                            <input type="checkbox" disabled="disabled" class="filled-in" id="filled-in-box"/>
                            <label for="filled-in-box"></label>
                        </td>
                    @endif

                    <td class="optButtons">

                        <a href="{{route('admin.about-us.edit',$aboutUs->id)}}"
                           class="btn-floating btn-large waves-effect waves-light yellow">
                            <i class="material-icons">edit</i></a>

                        <a href="{{route('admin.about-us.show',$aboutUs->id)}}"
                           class="btn-floating btn-large waves-effect waves-light green">
                            <i class="material-icons">airplay</i></a>

                        {!! Form::open(['method'=>'DELETE', 'route'=>['admin.about-us.destroy',$aboutUs->id]]) !!}
                        <button onclick ="return confirm('Are you sure?')"
                                class="btn-floating btn-large waves-effect waves-light red">
                            <i class="material-icons">delete</i></button>
                        {!! Form::close(); !!}

                    </td>
                </tr>
            @empty
                <div>
                    <h5 class="center-align truncate">There are no records</h5>
                </div>


            @endforelse
            </tbody>
        </table>
    </div>

@endsection