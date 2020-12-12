@extends('newDesign.layouts.admin')
@section('content')

    <div class="contentAndmin">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        <div class="createNews">
            <div class="row">
                <a href="{{ URL::route('admin.parsers.create') }}" class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a><br>
                <div>
                    <h4 style="text-align: center">Список парсерів</h4>
                </div>
            </div>
        </div>

        <table class="striped bordered highlight">
            <thead>
                <tr>
                    <th>№ п/п</th>
                    <th>Назва сайту</th>
                    <th>Client_id</th>
                    <th>Client_secret</th>
                    <th>Options</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($clients_id as $count => $client_id)
                    <tr>
                        <td>{{ $count + 1 }}</td>
                        <td>{{ $client_id->site_name }}</td>

                        <td data-id="{{$client_id->id}}">
                            {{ $client_id->client_id }}
                        </td>
                        <td data-id="{{$client_id->client_secret}}">
                            {{ $client_id->client_secret }}
                        </td>
                        <td>
                            <div>
                            <span style="display: inline-block">
                                <a href="{{ route('admin.parsers.edit', $client_id->id) }}"><i class="fa fa-edit"></i></a>
                            </span>
                                <span style="display: inline-block">
                                {!! Form::open(['method' => 'DELETE','route' => ['admin.parsers.destroy', $client_id->id]]) !!}
                                    {!! Form::submit('&#xf014;', [' class' => 'fa']) !!}
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
