@extends('newDesign.layouts.admin')
@section('content')
    <div class="contentAndmin">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
            <div>
                <h4 style="text-align: center">Список заблокованих компаній</h4>
            </div>
        <table class="striped bordered highlight">
            <thead>
                <tr>
                    <th class="s1 m2 l1 xl1">№</th>
                    <th class="s3 m3 l3 xl3">Blocked Company</th>
                    <th class="s3 m2 l2 xl3">Blocked since</th>
                    <th class="s2 m3 l3 xl2">Blocked by</th>
                    <th class="s3 m2 l3 xl3">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($blockedCompanies as $count => $blockedCompany)
                <tr>
                    <td>{{ $count + 1 }}</td>
                    <td>
                        <a href={{ url('company/'.$blockedCompany->id) }}>
                            {{ $blockedCompany->short_name }}
                        </a>
                    </td>
                    <td>{{ $blockedCompany->blocked_time }}</td>
                    <td>{{ $blockedCompany->blocked_by }}</td>
                    <td>
                        <div>
                            <span style="display: inline-block">
                                {!! Form::open([
                                    'method' => 'POST',
                                    'route' => ['setCompanyUnBlock', $blockedCompany->id],
                                    'style' => 'display:inline-block'
                                ]) !!}
                                {!! Form::submit('&#xf09c;', [' class' => 'fa']) !!}
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
