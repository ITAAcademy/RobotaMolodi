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
                <th>Main</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blockedCompaneis as $count => $blockedCompany)
                <tr>
                    <td>{{ $count + 1 }}</td>
                    <td>
                        <a href={{ url('company/'.$blockedCompany->id) }}>
                            {{ $blockedCompany->short_name }}
                        </a>
                    </td>
                    <td data-id="{{ $blockedCompany->id }}">
                        {!! Form::open([
                                    'method' => 'POST',
                                    'route' => ['setUnBlock', $blockedCompany->id]
                                ]) !!}
                            {!! Form::submit("Unblock", ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>
                        <div>
                            <span style="display: inline-block">
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['admin.industry.destroy', $blockedCompany->id]
                                ]) !!}
                                {!! Form::submit(trans('main.delete'), ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </span>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            $('.set-main').click(function () {
                var that = $(this);
                var url = that.attr('href');
                var id = that.parent().data('id');
                console.log(id);
                $.ajax({
                    url: url,
                    method: 'POST'
                })
            });
        })
    </script>
@endsection
