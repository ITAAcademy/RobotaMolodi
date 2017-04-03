@extends('app')
<link href="{{ asset('/css/resumes/myResume.css') }}" rel="stylesheet">
@section('content')
    {!!Form::open(['route' => 'main.resumes', 'method' => 'post', 'name' => 'filthForm', 'id' => 'aform'])!!}
    <input type="hidden" name="filterName" id="filterName" xmlns="http://www.w3.org/1999/html"/>
    <input type = "hidden" name = "filterValue" id = "filterValue"/>
    {!!Form::close()!!}
    {!! Form::open(array('route' => 'upimg', 'files' => true, 'style' => 'display: none', 'name' => 'uploadImgForm')) !!}
    <input type="file" name="image" id="fileImg">
    <input type="hidden" name="rov" value="r">
    <input type="hidden" name="fname" value="{{$resume->id_u}}">
    {!! Form::close() !!}

    <div class="panel panel-orange" id="vrBlock">
        <div>
            <div class="col-md-3">
                <div class="panel panel-orange" id="vimg">
                    @if(File::exists(public_path('image/resume/' . $resume->id_u . '.png')))
                        {!! Html::image('image/resume/' . $resume->id_u . '.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                    @elseif(File::exists(public_path('image/resume/' . $resume->id_u . '.jpg')))
                        {!! Html::image('image/resume/' . $resume->id_u . '.jpg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                    @elseif(File::exists(public_path('image/resume/' . $resume->id_u . '.jpeg')))
                        {!! Html::image('image/resume/' . $resume->id_u . '.jpeg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                    @elseif(File::exists(public_path('image/resume/' . $resume->id_u . '.bmp')))
                        {!! Html::image('image/resume/' . $resume->id_u . '.bmp', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                    @else
                        {!! Html::image('image/m.jpg', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                    @endif
                </div>
                <div>
                    <a class="orangeLinks" href="javascript:sendFile()">
                        {!! Html::image('image/update.png', 'del') !!}
                        <span style="font-size: 14px; text-decoration: underline">Змiнити фото</span>
                    </a>
                    <br>
                    @if(File::exists(public_path('image/resume/' . $resume->id_u . '.jpg')) ||
                        File::exists(public_path('image/resume/' . $resume->id_u . '.jpeg')) ||
                        File::exists(public_path('image/resume/' . $resume->id_u . '.png')) ||
                        File::exists(public_path('image/resume/' . $resume->id_u . '.bmp')) )
                    <a class="orangeLinks" href="javascript:deletePhoto()">
                        {!! Html::image('image/delete.png', 'del') !!}
                        <span style="font-size: 14px; text-decoration: underline">Видалити фото</span>
                    </a>'
                   @endif
                </div>
            </div>
            <div class="col-md-9">
                <div id="datAnnoyingSizes">
                    <div class="panel-heading">
                        <p class="position_resume">
                            <a class="orangColor-resume-name" href="javascript:submit('selectSpecialisation', '{{$resume->position}}')">{!!$resume->position!!}</a>
                            <br>
                        </p>
                        <p class="price_resume">
                            <span>{{$resume->salary}} - {{$resume->salary_max}} {{$resume->Currency()[0]['currency']}}</span>
                        </p>
                        <p class="name_resume"> {!!$resume->name_u!!}</p>
                    </div>
                    <div class="panel-description-resume">
                        <p class="position_resume"><a class="orangColor-resume" href="javascript:submit('selectIndustry', {{$resume->Industry()->id}})">{!!$resume->Industry()->name!!}</a></p>
                        <p class="list-group-item"><span class="heading">Телефон: </span> {!!$resume->telephone!!}</p>
                        <p class="list-group-item"><span class="heading">Опис:</span> {!!$resume->description!!} <span class="text-muted text-right pull-right"></span></p>
                        <p class="list-group-item" id="opt-data-low" style="color: #777777;"><a class="orangeLinks" href="javascript:submit('selectCity', {{$city->id}})">{!!$city->name!!}</a> <span id="yellowCircle">&#183;</span> {{ date('j.m.Y, H:i:s', strtotime($resume->updated_at))}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav navbar-nav navbar-left"  style="margin-left: 225px">
        <li>
            <a class="orangeLinks" id="myLink" href="{{$resume->id}}/destroy" onclick="return ConfirmDelete();">
                {!! Html::image('image/delete.png', 'del') !!}
                <span style="text-decoration: underline">Видалити</span>
            </a>
        </li>
        <li>
            <a class="orangeLinks" href="{{$resume->id}}/edit">
                {!! Html::image('image/edit.png', 'del') !!}
                <span style="text-decoration: underline">Редагувати</span>
            </a>
        </li>
    </ul>

    <script>
        document.getElementById("fileImg").onchange = function()
        {
            document.uploadImgForm.submit();
        };
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