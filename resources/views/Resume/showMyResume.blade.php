@extends('app')
<link href="{{ asset('/css/resumes/myResume.css') }}" rel="stylesheet">
@section('content')
    {!!Form::open(['route' => 'main.resumes', 'method' => 'post', 'name' => 'filthForm', 'id' => 'aform'])!!}
    <input type="hidden" name="filterName" id="filterName" xmlns="http://www.w3.org/1999/html"/>
    <input type = "hidden" name = "filterValue" id = "filterValue"/>
    {!!Form::close()!!}
{{--    {!! Form::open(array('route' => 'upimg', 'enctype' => 'multipart/form-data', 'id'=>'updateImgResume', 'style' => 'display: none', 'name' => 'uploadImgForm')) !!}--}}
        {!! Form::file('fileImg', array( 'id'=>'fileImg', 'style'=>'display:none',)) !!}
    {{--<input type="file" name="image" id="fileImg">--}}
        {{--<input type="hidden" name="rov" value="r">--}}
        {{--<input type="hidden" name="fname" value="">--}}
        <input type="hidden" name="fcoords" id="coords" class="coords" value="">
{{--    {!! Form::close() !!}--}}

    <div class="panel" id="vrBlock">
        <div class="row">
            <div class="col-xs-12 col-md-3">
                <div class="panel panel-orange" id="vimg">
                    @if(File::exists(public_path('image/resume/'.$resume->id_u.'/'.$resume->image)))
                        {!! Html::image('image/resume/'.$resume->id_u.'/'.$resume->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                    @else
                        {!! Html::image('image/m.jpg', 'logo', array('id' => 'vacImg', 'width' => 'auto', 'height' => '100%')) !!}
                    @endif
                </div>
                <div class="change-img-myresume">
                    <span class="orange-link-myresume"  id="changeImage">
                        <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                        <span>Змiнити фото</span>
                    </span>
                    <div id="sendImage">Відправити</div>
                    <br>
                    @if(File::exists(public_path('image/resume/'.$resume->id_u.'/'.$resume->image)))
                        <a class="orange-link-myresume" href="javascript:deletePhoto()">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            <span>Видалити фото</span>
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-md-9">
                <div id="datAnnoyingSizes">
                    <div class="panel-heading-resume">
                        <p class="position-resume">
                            <a class="orangColor-resume-name" href="javascript:submit('selectSpecialisation', '{{$resume->position}}')">{!!$resume->position!!}</a>
                            <br>
                        </p>
                        <p class="price-resume">
                            <span>{{$resume->salary}} - {{$resume->salary_max}} {{$resume->Currency()[0]['currency']}}</span>
                        </p>
                        <p class="name-resume"> {!!$resume->name_u!!}</p>
                    </div>
                    <div class="panel-description-resume">
                        <p class="position-resume"><a class="orangColor-resume" href="javascript:submit('selectIndustry', {{$resume->Industry()->id}})">{!!$resume->Industry()->name!!}</a></p>
                        <p class="phone-nomber-resume"><span>Телефон: </span> {!!$resume->telephone!!}</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <p class="description-one-resume"><span>Опис:</span></p>
                <p class="description-footer-resume">{!! strip_tags($resume->description, '<em><a><s><p><span><b><ul><ol><li><strong><h1><h2><h3><h4><h5><blockquote><body><table><tr><td>') !!}</p>
                <p class="cityTime-resume">
                    <a class="orangColor-resume" href="javascript:submit('selectCity', '{{$city->id}}')">{!!$city->name!!}</a>
                    <span id="yellowCircle-resume">&#183;</span>
                    {{ date('j m Y', strtotime($resume->updated_at))}}
                </p>
            </div>
            <div class="col-xs-12 button-change-resume">
                <div class="col-xs-12 col-md-3"></div>
                <div class="col-xs-4 col-md-3"></div>
                <div class="col-xs-4 col-md-3">
                    <a id="writeOnPost" href="{{$resume->id}}/destroy" onclick="return ConfirmDelete();">
                        <span class="writeOnPost"><span>Видалити</span></span>
                    </a>
                </div>
                <div class="col-xs-4 col-md-3">
                    <a id="writeOnPost" href="{{$resume->id}}/edit">
                        <div class="writeOnPost">Редагувати</div>
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

            $('#closeModalBtn').on('click', function () {
                $('#sendImage').css('display', 'none');
            });

            $('#fileImg').on('change', function (e) {
                $('#changeImageBox').modal('show');
                crop(e, 'img-src', '#crop', '#changeImageBox');
                $('#sendImage').css('display', 'block');
            });




            $('#sendImage').on('click', function () {
                var $input = $("#fileImg");
                var fd = new FormData;
                fd.append('fileImg', $input.prop('files')[0]);
                fd.append('coords', $('.coords').val());

                $.ajax({
                    url: '{{ route('upimg') }}',
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                        alert(data);
                    }
                });
            });






            {{--var $input = $("#fileImg");--}}
            {{--var fd = new FormData;--}}
            {{--fd.append('img', $input.prop('files')[0]);--}}

            {{--$.ajax({--}}
                {{--url: '{{ route('upimg') }}',--}}
                {{--data: fd,--}}
                {{--processData: false,--}}
                {{--contentType: false,--}}
                {{--type: 'POST',--}}
                {{--success: function (data) {--}}
                    {{--alert(data);--}}
                {{--}--}}
            {{--});--}}


//            javascript:sendFile()

//            $('#changeResumeImg').on('change', function(e) {
//                $('#newfilename').text($('#changeResumeImg').val());
//                crop(e, 'img-src-resume', '#changeImageBox', '#cropBtn');
//            });
//
//            $('#cropBtn').on('click', function () {
//                console.log($('.coords').val());
//            });
//
//            $("#changeResumeImg").replaceWith($("#changeResumeImg").val('').clone(true));
        });

//        document.getElementById("fileImg").onchange = function()
//        {
////            document.uploadImgForm.submit();
//        };

        function sendFile()
        {
            var input = document.getElementById('fileImg');
            input.click();
        }
        function deletePhoto()
        {
            var conf = confirm("Ви дійсно хочете видалити фото?");

            if(conf)
            {
                //This is Костыль
                var photo = document.getElementById('vacImg').getAttribute('src').split('/');
                $.post( '/resume/deletephoto',{_token: '{{ csrf_token() }}', name: photo[photo.length-1] },
                function( data ) {
                   location.reload()
                });
            }

        }
        function ConfirmDelete()
        {
            var conf = confirm("Ви дійсно хочете видалити резюме?");

            if(conf) return true;

            else return false;
        }
    </script>
@stop