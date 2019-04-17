@extends('newDesign.layouts.admin')

@section('head')
    <link href="{{ asset('/css/slider.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

        <div class="createNews">
            <div class="row">
                <a href="{{ URL::route('admin.slider.create') }}" class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a><br>
            </div>

        <div>
            <label>Choose category</label>
            <select class="select-cat custom-select">
                <option></option>
                @foreach($categories as $category)
                    <option value={!! $category->id !!}>
                        {!! $category->name !!}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <div class="add-cat">
                {!! Form::text('categoryName', null, ['placeholder' => 'Додати категорію']) !!}
                {!! Form::submit(trans('main.save'), ['class' => 'waves-effect waves-light btn']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <span class="notice"></span>
            </div>
            <br>
        </div>

        <div class="slider-block" style="display: none">
            <div class="slick-slider slider-show">
                @foreach($sliders as $slider)
                    <div data-id="{{ $slider->category_id }}" data-published="{{ $slider->published }}">
                        <a href="{{ $slider->url }}" target="_blank" class="add-link">
                            <img src="{{ $slider->image }}" alt="" style="width:100%; height: auto">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs row custom-nav" role="tablist">
        @foreach ($categories as $category)
            <li role="presentation">
                <a href="#{{$category->id}}"
                   aria-controls="{{$category->id}}"
                   role="tab"
                   data-toggle="tab">
                    {{$category->name}}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content">
        @foreach ($categories as $category)
            <div role="tabpanel" class="tab-pane " id="{{$category->id}}">
                <table class="striped sliders bordered highlight">
                    <thead>
                    <tr class="sliders sliders-title">
                        <th>Pos.</th>
                        <th>Image</th>
                        <th>Url</th>
                        <th>Category</th>
                        <th>Published</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($sliders as $slider)
                        @if($slider->category_id == $category->id)
                            <tr data-value="{!! $slider->category_id !!}" class="sliders">
                                <th scope="row" style="height: 120px">
                                    <div class="btn-group-vertical change-position-wrapper">
                                        <div class="arrow-bottom">
                                            {!! Form::open([
                                            'method' => 'POST',
                                            'route' => ['slider.position.up', $slider->id]])
                                            !!}
                                            {!! Form::submit("", [
                                                'class' => 'btn btn-link fa fa-long-arrow-up fa-2x',
                                                'style' => $slider->position >= $category->number_of_positions || !$slider->position ? 'display: none' : '',
                                                'title' => $slider->position == 0 ? 'Move From Zero' : 'Move Image Up',
                                                'data-id' => $slider->id])
                                            !!}
                                        </div>
                                        <div class="flex-space">
                                            {!! Form::submit("", [
                                                'class' => 'btn btn-link fa fa-external-link fa-2x ',
                                                'style' => $slider->position != 0 ? 'display: none' : '',
                                                'title' => 'Move From Zero',
                                                'data-id' => $slider->id])
                                            !!}
                                        </div>
                                        {!! Form::close() !!}
                                        <div class="arrow-bottom">
                                            {!! Form::open([
                                                    'method' => 'POST',
                                                    'route' => ['slider.position.down', $slider->id]])
                                                !!}
                                            {!! Form::submit("",
                                                [
                                                    'class' => 'btn btn-link fa fa-long-arrow-down fa-2x',
                                                    'style' => $slider->position <= 1 ? 'display: none' : '',
                                                    'title' => 'Move Image Down',
                                                    'data-id' => $slider->id
                                                ])
                                            !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    <img class="picture img-responsive" src="{{ $slider->image }}">
                                </td>
                                <td>
                                    <a href="{!! $slider->url !!}" title="{!! $slider->url !!}" class="btn-floating blue"><i class="material-icons">link</i></a>
                                </td>

                                <td>{!! $slider->category->name !!}</td>
                                <td style="text-align: center">
                                    <div class="form-group">
                                        <button data-value="{{$slider->published}}"
                                                data-slider-id="{{$slider->id}}"
                                                class="btn btn-link fa set-main
                                                fa-{{!$slider->published ? '' : 'check-'}}square-o">
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['admin.slider.destroy', $slider->id]
                                        ])!!}
                                        <a href="{{ route('admin.slider.show', $slider->id) }}"
                                           class="btn btn-primary btn-block">
                                            Show
                                        </a>
                                        <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                           class="btn btn-success btn-block">
                                            Edit
                                        </a>
                                        {!! Form::submit('Delete ', ['class' => 'btn btn-danger btn-block']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>


    <script>
        $(document).ready(function () {
            $('.saveCategory').on('click', function () {
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
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
                autoplaySpeed: 100,
                infinite: true,
                speed: 2000
            });

            $("[aria-controls='1']").attr('aria-expanded', 'true').parent().addClass('active');
            $("div [role='tabpanel']").first().addClass('active');

            $('.select-cat').change(function () {
                $('tr.sliders').hide();

                $('.slider-block').hide();
                $('.slider-show').slick('slickUnfilter');
                var selectedCategoryId = $("select option:selected").val();
                $("tr[data-value='" + selectedCategoryId + "']").show();
                $('.slider-show').slick('slickFilter', "div[data-id='" + selectedCategoryId + "']");
                $('.slider-block').show();
                $('.sliders-title').show();
            });

            $("button.fa").click(function () {
                var id = $(this).attr('data-slider-id');
                $.ajax({
                    url: '/admin/sliders/updatePublished/' + id,
                    method: 'GET',
                    success: function (slider) {
                        if (slider.published) {
                            $("[data-slider-id='" + id + "'").removeClass('fa-square-o').addClass('fa-check-square-o');
                        } else {
                            $("[data-slider-id='" + id + "'").removeClass('fa-check-square-o').addClass('fa-square-o');
                        }
                    }
                });
            });

            $("div[data-published='0']").fadeTo('fast', 0.25);

            $(".btn-up").click(function () {
                var id = $(this).data('id');
                $.ajax({
                    url: "slider/" + id + "/positionUp",
                    method: 'POST',
                    success: function () {
                        location.reload();
                    }
                });
            });

            $(".btn-down").click(function () {
                var id = $(this).data('id');
                $.ajax({
                    url: "slider/" + id + "/positionDown",
                    method: 'POST',
                    success: function () {
                        location.reload();
                    }
                });
            });

            $(".positions").click(function () {
                $(".positions").hide();

                var self = $(this);
                var next = $(this).val();
                var id = $(this).siblings('.change-position').attr('data-id');

                $.ajax({
                    url: "slider/" + id + "/changePosition/" + next,
                    method: 'POST',
                    success: function () {
                        location.reload();
                    }
                });
            });
        })

    </script>

@stop