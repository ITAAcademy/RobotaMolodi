@extends('newDesign.layouts.admin')
@section('content')
    <div class="col-md-10 col-sm-10 col-xs-10 contentAndmin">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Company page</th>
                <th>Options</th>
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
                    <td>
                        <div class="btn-group">
                                {!! Form::open([
                                    'method' => 'POST',
                                    'route' => ['setResumeUnBlock', $blockedResume->id],
                                    'style' => 'display:inline-block'
                                ]) !!}
                                {!! Form::submit(trans('main.unblock'), ['class' => 'btn btn-success']) !!}
                                {!! Form::close() !!}

                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['resume.destroy', $blockedResume->id],
                                    'style' => 'display:inline-block'
                                ]) !!}
                                {!! Form::submit(trans('main.delete'), ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
