@extends('newDesign.layouts.admin')
@section('content')
    <div class="col-md-10 col-sm-10 col-xs-10 contentAndmin">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif

        <table class="striped bordered highlight">
            <thead>
            <tr>
                <th>№</th>
                <th>Blocked Resume</th>
                <th>Blocked since</th>
                <th>Blocked by</th>
                <th>Actions</th>
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
                            {!! Form::submit(trans('main.unblock'), ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
