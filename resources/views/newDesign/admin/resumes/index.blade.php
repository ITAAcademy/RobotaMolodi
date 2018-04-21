@extends('newDesign.layouts.admin')
@section('content')
    <div class="contentAndmin">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        <table class="striped bordered highlight">
            <thead>
                <tr>
                    <th class="s1 m2 l1 xl1">№</th>
                    <th class="s3 m3 l3 xl3">Blocked Resume</th>
                    <th class="s3 m2 l2 xl3">Blocked since</th>
                    <th class="s2 m3 l3 xl2">Blocked by</th>
                    <th class="s3 m2 l3 xl3">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($blockedResumes as $count => $blockedResume)
                <tr>
                    <td>{{ $count + 1 }}</td>
                    <td>
                        <a href={{ url('resume/'.$blockedResume->id) }}>
                            <strong>{{$blockedResume->name_u}}</strong> - {{ $blockedResume->position }}
                        </a>
                    </td>
                    <td>{{ $blockedResume->blocked_time }}</td>
                    <td>{{ $blockedResume->blocked_by }}</td>
                    <td>
                        <div class="btn-group">
                            {!! Form::open([
                                'method' => 'POST',
                                'route' => ['setResumeUnBlock', $blockedResume->id],
                                'style' => 'display:inline-block'
                            ]) !!}
                            {!! Form::submit(trans('main.unblock'), ['class' => 'btn btn-small confirm']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
