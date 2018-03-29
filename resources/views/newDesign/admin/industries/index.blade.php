@extends('newDesign.layouts.admin')
@section('content')
    <div class="contentAndmin">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        <div class="fixed-action-btn">
            <a href="{{ URL::route('admin.industry.create') }}" class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a><br>
        </div>
        <table class="striped bordered highlight">
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

                        <td data-id="{{$industry->id}}">
                            @if($industry->main)
                                <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                               <label for="filled-in-box"></label>
                            @else
                                <input type="checkbox" class="filled-in" id="filled-in-box"/>
                                <label for="filled-in-box"></label>
                            @endif
                        </td>

                        <td>
                            <div>
                            <span style="display: inline-block">
                                <a href="{{ route('admin.industry.edit', $industry->id) }}" class="btn btn-small blue">{{ trans('main.edit') }}</a>
                            </span>
                            <span style="display: inline-block">
                                {!! Form::open(['method' => 'DELETE','route' => ['admin.industry.destroy', $industry->id]]) !!}
                                    {!! Form::submit(trans('main.delete'), ['class' => 'btn btn-small red confirm']) !!}
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
                var id = that.parent().data('id');
                $.ajax({
                    url:'{{ route('setMainIndustry') }}',
                    method: 'post',
                    data: {id: id},
                    success: function () {
                        $('.fa-check-square-o')
                            .removeClass('fa-check-square-o')
                            .addClass('fa-square-o');
                        that.removeClass('fa-square-o')
                            .addClass('fa-check-square-o');
                    }
                })
            });
        })
    </script>
@endsection
