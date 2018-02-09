@extends('newDesign.layouts.admin')
@section('content')
    <div class="col-md-10 col-sm-10 col-xs-10 contentAndmin">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif


        <div class="col-md-3 createNews">
            <div class="row">
                <a href="{{ URL::route('admin.slider.create') }}" class="btn btn-success btn-lg">
                    Create slider
                </a>
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
                    {!! Form::submit(trans('main.save'), ['class' => 'saveCategory']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <span class="notice"></span>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
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

        <table class="table table-hover sliders table-bordered">
            <thead>
            <tr class="sliders sliders-title" style="display: none">
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
                <tr data-value="{!! $slider->category_id !!}" class="sliders">
                    <th scope="row">
                        <button class="btn btn-link change-position"
                                title="change position in slider loop" data-id="{{ $slider->id }}">
                            {{ $slider->position }}
                        </button>

                        <select class="positions" style="display: none">
                            @for($index = 1; $index <= $slider->category->number_of_positions; $index++)
                                <option {{$index == $slider->position ? 'selected' : ''}}>{{$index}}</option>
                            @endfor
                        </select>
                    </th>
                    <td>
                        <img class="picture img-responsive" src="{{ asset($slider->image) }}">
                    </td>
                    <td>
                        <a href="{!! $slider->url !!}" title="{!! $slider->url !!}">link</a>
                    </td>
                    <td>{!! $slider->category->name !!}</td>
                    <td style="text-align: center">
                        <div class="form-group">
                            <button data-value="{{$slider->published}}" data-slider-id="{{$slider->id}}"
                                    class="btn btn-link fa set-main fa-{{!$slider->published ? '' : 'check-'}}square-o">
                            </button>
                        </div>
                    </td>
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
                    autoplaySpeed: 100,
                    infinite: true,
                    speed: 2000
                });

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
                        methof: 'GET',
                        success: function (slider) {
                            if (slider.published) {
                                $("button[data-slider-id='" + id + "'").removeClass('fa-square-o').addClass('fa-check-square-o');
                            } else {
                                $("button[data-slider-id='" + id + "'").removeClass('fa-check-square-o').addClass('fa-square-o');
                            }
                        }
                    });
                });

                $("div[data-published='0']").fadeTo( 'fast', 0.25);

                $(".change-position").click(function(){
                    $(".change-position").show();
                    $("select.positions").hide();
                    
                    $(this).hide();
                    $(this).next().show();
                });

                $("select.positions").change(function(){
                    $(this).hide();
                    $(this).prev().show();
                });
            })

        </script>
    </div>
@stop