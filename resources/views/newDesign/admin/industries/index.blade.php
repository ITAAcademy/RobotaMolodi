@extends('newDesign.layouts.admin')
@section('content')
    <div class="contentAndmin">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        <div>
            <h4 style="text-align: center">Список індустрій</h4>
        </div>
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
                                <input type="checkbox" class="filled-in" id="{{$industry->id}}" checked="checked" myAttr="forAjax"/>
                               <label for="{{$industry->id}}"></label>
                            @else
                                <input type="checkbox" class="filled-in" id="{{$industry->id}}" myAttr="forAjax"/>
                                <label for="{{$industry->id}}"></label>
                            @endif
                        </td>

                        <td>
                            <div>
                            <span style="display: inline-block">
                                <a href="{{ route('admin.industry.edit', $industry->id) }}"><i class="fa fa-edit"></i></a>
                            </span>
                            <span style="display: inline-block">
                                {!! Form::open(['method' => 'DELETE','route' => ['admin.industry.destroy', $industry->id]]) !!}
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
    <script>
        $(document).ready(function () {
            $('[myAttr="forAjax"]').click(function () {
                var that = $(this);
                var checkField = that.parent().context.checked;
                var id = that.parent().data('id');
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
