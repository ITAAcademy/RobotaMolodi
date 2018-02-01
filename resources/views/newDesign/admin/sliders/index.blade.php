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
                <option value={!! $category->id !!}>
                    {!! $category->name !!}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 slider" >
        <div class="slider-block">
            <div class="slick-slider slider-show">
                @foreach($sliders as $slider)
                    <div data-id="{{ $slider->category_id }}">
                        <a  href="{{ $slider->url }}"  target="_blank" class="add-link">
                            <img src="{{ $slider->image }}" alt="" class="img-responsive">
                        </a>
                    </div>
                @endforeach
            </div>
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
                    <img class="picture img-responsive" src="{{ asset($slider->image) }}" >
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
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});
                $.ajax({
                    url: '{{ route('saveCategory') }}',
                    data: {name: $('input[name="categoryName"]').val()},
                    type: 'POST',
                    success: function (data) {
                        $('.notice').text(data);
                        $('input[name="categoryName"]').val('');
                        setTimeout(function () {
                            $('.notice').empty();
                        }, 2000);
                    }
                })
            });

            $('.slider-show').slick({
                autoplay: true,
                autoplaySpeed: 3000,
                infinite: false,
                speed: 1000
            });

            $('.slider-block').hide();

            $('.select-cat').change(function () {
                $('.slider-block').hide();
                $('.slider-show').slick('slickUnfilter');
                var selectedCategoryId = $("select option:selected").val();
                $('.slider-show').slick('slickFilter', "div[data-id='" + selectedCategoryId + "']");
                $('.slider-block').show();
            });
        })

    </script>
    </div>
@stop