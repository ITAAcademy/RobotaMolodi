@extends('newDesign.layouts.admin')
@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    <div class="createNews"><a href="{{ URL::route('admin.industry.create') }}" class="btn btn-success btn-lg">Створити</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Name</th>
                <th>Main</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($industries as $count => $industry)
                <tr>
                    <td>{{ $count + 1 }}</td>
                    <td>{{ $industry->name }}</td>
                    <td>
                        <i class="fa fa-square-o"></i>
                    </td>
                    <td>
                        <div>
                        <span style="display: inline-block">
                            <a href="{{ route('admin.industry.edit', $industry->id) }}" class="btn btn-primary">Редагувати</a>
                        </span>
                        <span style="display: inline-block">
                            {!! Form::open(['method' => 'DELETE','route' => ['admin.industry.destroy', $industry->id]]) !!}
                            {!! Form::submit('Видалити', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </span>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection