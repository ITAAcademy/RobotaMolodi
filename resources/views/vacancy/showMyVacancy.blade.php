@extends('app')

@section('content')
    {!!Form::open(['route' => 'sortVacancies', 'method' => 'get', 'name' => 'filthForm', 'id' => 'aform'])!!}
    <input type = "hidden" name = "specialisation_" id = "idSpec"/>
    <input type = "hidden" name = "city_id" id = "idCity"/>
    <input type = "hidden" name = "industry_id" id = "idInd"/>
    {!!Form::close()!!}
    {!! Form::open(array('route' => 'upimg', 'files' => true, 'style' => 'display: none', 'name' => 'uploadImgForm')) !!}
    <input type="file" name="image" id="fileImg">
    <input type="hidden" name="rov" value="v">
    <input type="hidden" name="fname" value="{{$vacancy->company_id}}">
    {!! Form::close() !!}
    <div class="panel panel-orange" id="vrBlock">
        <div class="panel-heading" id="datAnnoyingSizes">
            <h2>
                <a class="orangeLinks" href="javascript:submit('0', '0' , '{{$vacancy->position}}')">{{$vacancy->position}}</a>
                <br><span style="color: red">{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->currency}}</span>
            </h2>
        </div>
        <ul class="list-group"  id="datAnnoyingSizes">
            <li class="list-group-item">{{$user->name}}</li>
            <li class="list-group-item">  <a class="orangeLinks" href="javascript:submit('0', {{$industry->id}} ,'empty')">{{$industry->name}}</a></li>
            <li class="list-group-item">  {{$vacancy->telephone}}</li>
            <li class="list-group-item" style="border-bottom: none"><span class="heading">Опис: </span>{{$vacancy->description}}</li>
            <li class="list-group-item">  <a style="text-decoration: underline" target="_blank" class="orangeLinks" href="@if($company->company_email != ''){{$company->company_email}} @else #@endif">{{$company->company_name}}</a>
            <li class="list-group-item" id="opt-data-low" style="color: #777777;">@if($cities!=null)@foreach($cities as $city)<a class="orangeLinks" href="javascript:submit({{$city->id}}, '0' ,'empty')">{{$city->name}}</a>@endforeach @else <a class="orangeLinks" href="/">Уся Україна</a> @endif <span id="yellowCircle">&#183;</span> {{ date('j.m.Y, H:i:s', strtotime($vacancy->created_at))}}</li>
        </ul>

        <div style="height: 270px">
            <div class="panel panel-orange" id="vimg">
                @if(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.png')))
                    {!! Html::image('image/vacancy/' . $vacancy->company_id . '.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.jpg')))
                    {!! Html::image('image/vacancy/' . $vacancy->company_id . '.jpg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.jpeg')))
                    {!! Html::image('image/vacancy/' . $vacancy->company_id . '.jpeg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @else
                    {!! Html::image('image/no_logo.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @endif
            </div>

            <a style="margin-left: 35px" class="orangeLinks" href="javascript:sendFile()">
                {!! Html::image('image/update.png', 'del') !!}
                <span style="font-size: 14px; text-decoration: underline">Змiнити лого</span>
            </a>
        </div>
    </div>

    <ul class="nav navbar-nav navbar-left" style="margin-left: 225px">
        <li>
            <a class="orangeLinks" href="{{$vacancy->id}}/destroy" onclick="return ConfirmDelete();">
                {!! Html::image('image/delete.png', 'del') !!}
                <span style="text-decoration: underline">Видалити</span>
            </a>
        </li>
        <li>
            <a class="orangeLinks" href="{{$vacancy->id}}/edit">
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
            var conf = confirm("Ви дійсно хочете видалити вакансію?");

            if(conf) return true;

            else return false;
        }
    </script>

@stop