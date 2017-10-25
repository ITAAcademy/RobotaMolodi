@extends('app')
@section('content')
    <link href="{{ asset('/css/resumes/myResume.css') }}" rel="stylesheet">
    {!!Form::open(['route' => 'main.resumes', 'method' => 'post', 'name' => 'filthForm', 'id' => 'aform'])!!}
    <input type="hidden" name="filterName" id="filterName" xmlns="http://www.w3.org/1999/html"/>
    <input type = "hidden" name = "filterValue" id = "filterValue"/>
    {!!Form::close()!!}

    {!! Form::file('fileImg', array( 'id'=>'fileImg', 'style'=>'display:none', 'accept'=>'.jpg, .jpeg, .gif, .png, .svg')) !!}
    <input type="hidden" name="fcoords" id="coords" class="coords" value="" data-id="{{$resume->id}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
        ['url'=> 'head','name'=>'Головна','showDisplay'=>'none'],
        ['showDisplay'=>'none','url' =>'resumes','name' => 'Особистий кабінет'],
        ['name' => 'Резюме: '.$resume->position, 'url' => false]
        ]
    ))

    <div class="panel" id="vrBlock">
        <div class="row">
            <div class="col-xs-12 col-md-3">
                <div class="panel panel-orange" id="vimg">
                    @if(File::exists(public_path('image/resume/'.$resume->id_u.'/'.$resume->image)) and $resume->image != '')
                        {!! Html::image('image/resume/'.$resume->id_u.'/'.$resume->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                    @else
                        {!! Html::image('image/m.jpg', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                    @endif
                </div>
                <div class="change-img-myresume">
                    <span class="orange-link-myresume"  id="changeImage">
                        <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                        <span>Змiнити фото</span>
                    </span>
                    <br>
                    @if(File::exists(public_path('image/resume/'.$resume->id_u.'/'.$resume->image)) and $resume->image != '')
                        <span class="orange-link-myresume" id="deleteImage">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            <span>Видалити фото</span>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-md-9">
                <div id="datAnnoyingSizes">
                    <div class="panel-heading-resume">
                        <p class="position-resume">
                            {!! Html::linkRoute('resume.showResumes', $resume->position, [ 'name' => 'specialisation', 'value' => $resume->position], ['class' => 'orangColor-resume-name', 'tabindex' => 1 ]) !!}
                            <br>
                        </p>
                        <p class="price-resume">
                            <span>{{$resume->salary}} - {{$resume->salary_max}} {{$resume->Currency()[0]['currency']}}</span>
                        </p>
                        <p class="name-resume"> {!! strip_tags($resume->name_u)!!}</p>
                    </div>

                    <div class="ratings">
                        <span class = "ratingsTitle">Рейтинг:</span>
                        <span class="morph">
                            {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike']) !!}
                            <span class="findLike" id="{{route('res.rate', $resume->id)}}_1">{{$resume->rated()->getLikes($resume)}}</span>
                        </span>
                        <span class="morph">
                            {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike']) !!}
                            <span class="findDislike" id="{{route('res.rate', $resume->id)}}_-1">{{$resume->rated()->getDisLikes($resume)}}</span>
                        </span>
                        <span class="likeError"></span>
                    </div>

                    <div class="panel-description-resume">
                        <p class="position-resume">
                            {!! Html::linkRoute('resume.showResumes', $resume->Industry()->name, [ 'name' => 'industries', 'value' => $resume->Industry()->id], ['class' => 'orangColor-resume', 'tabindex' => 1 ]) !!}
                        </p>
                        <p class="phone-nomber-resume"><span>{{ trans('main.phone') }} </span> {!!$resume->telephone!!}</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <p class="description-one-resume"><span>{{ trans('main.description') }}</span></p>
                <p class="description-footer-resume">{!! strip_tags($resume->description, '<em><a><s><p><span><b><ul><ol><li><strong><h1><h2><h3><h4><h5><blockquote><body><table><tr><td>') !!}</p>
                <p class="cityTime-resume">
                    {!! Html::linkRoute('resume.showResumes', $city->name, [ 'name' => 'regions', 'value' => $city->id], ['class' => 'orangColor-resume', 'tabindex' => 1 ]) !!}
                    <span id="yellowCircle-resume">&#183;</span>
                    <span id="updateDate">{{ date('j m Y', strtotime($resume->updated_at))}}</span>
                </p>
            </div>
            <div class="col-xs-12 button-change-resume">
                <div class="col-xs-offset-4 col-md-offset-3 col-xs-4 col-md-3">
                    <a class="whiteText" id="writeOnPost" href="{{$resume->id}}/destroy" onclick="return ConfirmDelete();">
                        <span class="writeOnPost"><span>{{ trans('main.delete') }}</span></span>
                    </a>
                </div>
                <div class="col-xs-4 col-md-3">
                    <a class="whiteText" id="writeOnPost" href="{{$resume->id}}/edit">
                        <div class="writeOnPost">{{ trans('main.edit') }}</div>
                    </a>
                </div>
                <div class="col-xs-4 col-md-3">
                    <a class="whiteText" id="updateDateRes" href="#">
                        <div class="writeOnPost">{{ trans('main.updatedate') }}</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="changeImageBox" class="modal fade">
        @include('newDesign.cropModal')
    </div>

    {!!Html::script('js/crop.js')!!}
    <script>
        $(document).ready(function () {
            $('#changeImage').on('click', function () {
                $('#fileImg').click();
            });

            $('#fileImg').on('change', function (e) {
                $('#changeImageBox').modal({
                    show: true,
                    backdrop: 'static'
                });
                crop(e, 'img-src', '#crop', '#changeImageBox');
            });

            $('#changeImageBox').on('hidden.bs.modal', function () {
                if($('#coords').val()){
                    var $input = $("#fileImg");
                    var fd = new FormData;
                    fd.append('fileImg', $input.prop('files')[0]);
                    fd.append('coords', $('.coords').val());
                    fd.append('id', $('.coords').attr('data-id'));
                    $.ajax({
                        url: '{{ route('upimg') }}',
                        data: fd,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (data) {
                            $('#vimg img').attr('src', window.location.origin + '/' + data);
                        }
                    });
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });

            $('#deleteImage').on('click', function () {
                if(ConfirmDelete()){
                    $.ajax({
                        url: '{{ route('deleteimg') }}',
                        data: {'id' : $('.coords').attr('data-id')},
                        type: 'POST',
                        success: function (data) {
                            $('#vimg img').attr('src', window.location.origin + '/' + data);
                        }
                    })
                }
            })
        });

        function ConfirmDelete() {
            var conf = confirm("Ви дійсно хочете видалити фото?");

            if(conf){
                return true;
            } else{
                return false;
            }
        }

        $('#updateDateRes').click(function (e) {
            var that = $('#updateDate');
            e.preventDefault();
            $.ajax({
                url: '{{ route('updateResumeDate', $resume->id) }}',
                method: 'post',
                success: function (data) {
                    that.text(data);
                    that.css('backgroundColor','orange');
                    that.animate({ backgroundColor: "white" }, "slow");
                }
            })
        })
    </script>

@stop
