@extends('app')

@section('content')
    {!!Form::open(['route' => 'sortResumes', 'method' => 'get', 'name' => 'filthForm', 'id' => 'aform'])!!}
    <input type = "hidden" name = "specc" id = "idSpec"/>
    <input type = "hidden" name = "city_id" id = "idCity"/>
    <input type = "hidden" name = "industry_id" id = "idInd"/>
    {!!Form::close()!!}
    {!! Form::open(array('route' => 'upimg', 'files' => true, 'style' => 'display: none', 'name' => 'uploadImgForm')) !!}
    <input type="file" name="image" id="fileImg">
    <input type="hidden" name="rov" value="r">
    <input type="hidden" name="fname" value="{{$resume->id_u}}">
    {!! Form::close() !!}
    <div class="panel panel-orange" id="vrBlock">
        <div class="panel-heading" id="datAnnoyingSizes">
            <h2>
                <a class="orangeLinks" href="javascript:submit('0', '0' , '{{$resume->position}}')">{!!$resume->position!!}</a>
                <br><span style="color: red">{{$resume->salary}} - {{$resume->salary_max}} {{$resume->currency}}</span>
            </h2>
        </div>
        <ul class="list-group" id="datAnnoyingSizes">
            <li class="list-group-item"> {!!$resume->name_u!!}</li>
            <li class="list-group-item"><a class="orangeLinks" href="javascript:submit('0', {{$resume->Industry()->id}} ,'empty')">{!!$resume->Industry()->name!!}</a></li>
            <li class="list-group-item"><span class="heading">Опис:</span> {!!$resume->description!!} <span class="text-muted text-right pull-right"></span></li>
            <li class="list-group-item" id="opt-data-low" style="color: #777777;"><a class="orangeLinks" href="javascript:submit({{$city->id}}, '0' ,'empty')">{!!$city->name!!}</a> <span id="yellowCircle">&#183;</span> {{ date('j.m.Y, H:i:s', strtotime($resume->created_at))}}</li>
        </ul>

        <div style="height: 270px">
            <div class="panel panel-orange" id="vimg">
                @if(File::exists(public_path('image/resume/' . $resume->id_u . '.png')))
                    {!! Html::image('image/resume/' . $resume->id_u . '.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/resume/' . $resume->id_u . '.jpg')))
                    {!! Html::image('image/resume/' . $resume->id_u . '.jpg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/resume/' . $resume->id_u . '.jpeg')))
                    {!! Html::image('image/resume/' . $resume->id_u . '.jpeg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @else
                    {!! Html::image('image/m.jpg', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                @endif
            </div>

            <a style="margin-left: 35px" class="orangeLinks" href="javascript:sendFile()">
                {!! Html::image('image/update.png', 'del') !!}
                <span style="font-size: 14px; text-decoration: underline">Змiнити фото</span>
            </a>
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

        function submit(c, i, s)
        {
            document.getElementById("idCity").value = c;
            document.getElementById("idInd").value = i;
            document.getElementById("idSpec").value = s;
            document.filthForm.submit();
        }

        function ConfirmDelete()
        {
            var conf = confirm("Ви дійсно хочете видалити резюме?");

            if(conf) return true;

            else return false;
        }
    </script>
@stop