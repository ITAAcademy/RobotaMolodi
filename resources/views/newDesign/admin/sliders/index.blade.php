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
    <div class="col-md-3">
        <label>Show slider</label>
        <select class="select-cat">
            <option></option>
            @foreach($categories as $category)
                <option id={!! $category->id !!}>
                    {!! $category->name !!}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <div id="selected-2" style="display: none">
            @include('newDesign/sliders/byCategory', ['viewName' => 'underFooter', 'category' => 2])
        </div>

        <div id="selected-1" style="display: none">
            @include('newDesign/sliders/byCategory', ['viewName' => 'news', 'category' => 1])
        </div>
    </div>
    <div class="col-xs-12">
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

            $('.select-cat').change(function () {
                var allCategories = {!! $categories !!};
                var selectedCategoryId = $("select option:selected").attr('id');

                for(var index = 0; index < allCategories.length; index++) {
                    var currentId = allCategories[index].id;

                    if (currentId != selectedCategoryId) {
                        $('#selected-' + currentId).hide();
                    } else {
                        $('#selected-' + currentId).show();
                    }
                }
            })
        })
    </script>
    <div>
@stop