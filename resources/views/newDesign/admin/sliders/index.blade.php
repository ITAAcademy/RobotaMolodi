@extends('newDesign.layouts.admin')
@section('content')
    <div class="col-md-10 col-sm-10 col-xs-10 contentAndmin">
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    <div class="createNews">
        <a href="{{ URL::route('admin.slider.create') }}" class="btn btn-success btn-lg">
            Create slider
        </a>
    </div>

    <div>
        {!! Form::label('Добавити категорію') !!}
        {!! Form::text('categoryName') !!}
        {!! Form::submit(trans('main.save'), ['class' => 'saveCategory']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <span class="notice"></span>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Url</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($sliders as $slider)
            <tr>
                <td>{{ $slider->id }}</td>
                <td>
                    <img class="picture" src="{{ asset($slider->image) }}" style="width: 100%">
                </td>
                <td>
                    <a href="{!! $slider->url !!}">{!! $slider->url !!}</a>
                </td>
                <td>{!! $slider->category->name !!}</td>
                <td>
                    <div class="btn-group">
                        {!! Form::open(['method' => 'DELETE','route' => ['admin.slider.destroy', $slider->id]]) !!}
                            <a href="{{ route('admin.slider.show', $slider->id) }}" class="btn btn-primary btn-block">
                                Show
                            </a>
                            <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-success btn-block">
                                Edit
                            </a>
                            {!! Form::submit('Delete ', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('.saveCategory').on('click', function () {
                $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});
                $.ajax({
                    url: '{{ route('saveCategory') }}',
                    data: { name: $('input[name="categoryName"]').val() } ,
                    type: 'POST',
                    success: function (data) {
                        $('.notice').text(data);
                        $('input[name="categoryName"]').val('');
                        setTimeout(function(){
                            $('.notice').empty();
                        }, 2000);
                    }
                })
            });
        })
    </script>
    <div>
@stop