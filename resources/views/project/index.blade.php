@extends('app')

@section('content')
    <h1>Список проектів</h1>
    <ul>
        @forelse ($projects as $project)
            <li><a href="{{route('project.show',['id' => $project->id])}}">{{$project->name}}</a></li>
        @empty
            <li><p>No projects</p></li>
        @endforelse
    </ul>
@endsection
