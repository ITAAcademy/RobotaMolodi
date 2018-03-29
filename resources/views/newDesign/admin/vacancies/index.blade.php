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
                    <th class="s3 m3 l3 xl3">Blocked Vacancy</th>
                    <th class="s3 m2 l2 xl3">Blocked since</th>
                    <th class="s2 m3 l3 xl2">Blocked by</th>
                    <th class="s3 m2 l3 xl3">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($blockedVacancies as $count => $blockedVacancy)
                <tr>
                    <td>{{ $count + 1 }}</td>
                    <td>
                        <a href={{ url('vacancy/'.$blockedVacancy->id) }}>
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
                                {!! Form::submit(trans('main.unblock'), ['class' => 'btn btn-small confirm']) !!}
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
