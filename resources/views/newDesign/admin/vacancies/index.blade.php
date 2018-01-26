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
                <th>Blocked since</th>
                <th>Blocked by</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blockedVacancies as $count => $blockedVacancy)
                <tr>
                    <td>{{ $count + 1 }}</td>
                    <td>
                        <a href={{ url('company/'.$blockedVacancy->id) }}>
                            <strong>
                                {{ $blockedVacancy->getCompanyName() }}
                            </strong>
                            - {{ $blockedVacancy->position }}
                        </a>
                    </td>
                    <td>{{ $blockedVacancy->blocked_time }}</td>
                    <td>{{ $blockedVacancy->blocked_by }}</td>
                    <td>
                        <div>
                            <span style="display: inline-block">
                                {!! Form::open([
                                    'method' => 'POST',
                                    'route' => ['setVacancyUnBlock', $blockedVacancy->id],
                                    'style' => 'display:inline-block'
                                ]) !!}
                                {!! Form::submit(trans('main.unblock'), ['class' => 'btn btn-success']) !!}
                                {!! Form::close() !!}
                            </span>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
