@extends('app')

@section('content')
    {!!Form::open(['route' => 'head', 'method' => 'post', 'name' => 'filthForm', 'id' => 'aform'])!!}
    <input type = "hidden" name = "filterName" id = "filterName"/>
    <input type = "hidden" name = "filterValue" id = "filterValue"/>
    {!!Form::close()!!}
    {!! Form::open(array('route' => 'upimg', 'files' => true, 'style' => 'display: none', 'name' => 'uploadImgForm')) !!}
    <input type="file" name="image" id="fileImg">
    <input type="hidden" name="rov" value="v">
    <input type="hidden" name="fname" value="{{$vacancy->company_id}}">
    {!! Form::close() !!}

    <div class="panel panel-orange" id="vrBlock">

        <div class="logos">
            <div class="panel panel-orange" id="vimg">
                @if(File::exists(public_path('image/company/' . $vacancy->Company->users_id .'/'. $vacancy->Company->image)) and $vacancy->Company->image != '')
                    {!! Html::image('image/company/' . $vacancy->Company->users_id .'/'. $vacancy->Company->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @else
                    <h3 style="text-align: center; color: #f48952; margin-top: 40px">логотип вiдсутнiй</h3>
                @endif
            </div>

            <a style="margin-left: 15px" class="orangeLinks" href="javascript:sendFile()">
                {!! Html::image('image/update.png', 'del') !!}
                <span style="font-size: 14px; text-decoration: none">Змiнити лого</span>
            </a>
        </div>

        <div id="datAnnoyingSizes">
            <div class="panel-heading">
                <h2>
                    <a class="orangeLinks" href="javascript:submit('selectSpecialisation', '{{$vacancy->position}}')">{{$vacancy->position}}</a>
                        <br><span style="color: red">{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</span>
                </h2>
            </div>
            <ul class="list-group">
                <li class="list-group-item">{{auth()->user()->name}}</li>
                <li class="list-group-item">  <a class="orangeLinks" href="javascript:submit('selectIndustry', {{$vacancy->Industry()->id}})">{{$industry->name}}</a></li>
                <li class="list-group-item" style="border-bottom: none"><span class="heading">Опис: </span>{{$vacancy->description}}</li>
                <li class="list-group-item">  <a style="text-decoration: underline" target="_blank" class="orangeLinks" href="/company/{{$company->id}}">{{$company->company_name}}</a>
                <li class="list-group-item" id="opt-data-low" style="color: #777777;">@foreach($cities as $city)<a class="orangeLinks" href="javascript:submit('selectCity' {{$city->id}})">{{$city->name}} </a>@endforeach<span id="yellowCircle">&#183;</span> {{ date('j.m.Y, H:i:s', strtotime($vacancy->updated_at))}}</li>
            </ul>
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

        function ConfirmDelete()
        {
            var conf = confirm("Ви дійсно хочете видалити вакансію?");

            if(conf) return true;

            else return false;
        }
    </script>

@stop