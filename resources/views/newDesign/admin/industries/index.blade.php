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
                                <input type="checkbox" class="filled-in" id="{{ $industry->id }}" checked="checked" />
                               <label for="{{ $industry->id }}"></label>
                            @else
                                <input type="checkbox" class="filled-in" id="{{ $industry->id }}"/>
                                <label for="{{ $industry->id }}"></label>
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
            $('[type="checkbox"]').click(function () {
                var that = $(this);
                var id = that.parent().data('id');
                var checkField = that.parent().context.checked;
                $.ajax({
                    url:'{{ route('setMainIndustry') }}',
                    method: 'post',
                    data: {id: id, checked: checkField},
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
