@extends('app')

@section('content')
    {!!Form::open(['route' => 'sortResumes', 'method' => 'get', 'name' => 'filthForm', 'id' => 'aform'])!!}
    <input type = "hidden" name = "specialisation_" id = "idSpec"/>
    <input type = "hidden" name = "city_id" id = "idCity"/>
    <input type = "hidden" name = "industry_id" id = "idInd"/>
    {!!Form::close()!!}
    <div class="panel panel-orange" id="vrBlock">
        <div class="panel-heading" id="datAnnoyingSizes">
            <h2>
                <a class="orangeLinks" href="javascript:submit('0', '0' , '{{$resume->position}}')">{!!$resume->position!!}</a>
                <br><span style="color: red">{{$resume->salary}} - {{$resume->salary_max}} {{$resume->Currency()[0]['currency']}}</span>
            </h2>
        </div>
        <ul class="list-group" id="datAnnoyingSizes">
            <li class="list-group-item"> {!!$resume->name_u!!}</li>
            <li class="list-group-item"><a class="orangeLinks" href="javascript:submit('0', {{$resume->Industry()->id}} ,'empty')">{!!$resume->Industry()->name!!}</a></li>
            <li class="list-group-item"><span class="heading">Телефон: </span> {!!$resume->telephone!!}</li>
            <li class="list-group-item"><span class="heading">Опис: </span> {!!$resume->description!!}</li>
            <li class="list-group-item"><a class="orangeLinks" href="{{$resume->id}}/send_message">Написати на пошту</a></li>
            <li class="list-group-item" id="opt-data-low" style="color: #777777;"><a class="orangeLinks" href="javascript:submit({{$city->id}}, '0' ,'empty')">{!!$city->name!!}</a> <span id="yellowCircle">&#183;</span> {{ date('j.m.Y, H:i:s', strtotime($resume->created_at))}}</li>
        </ul>

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
    </div>

    <script>
        function submit(c, i, s)
        {
            document.getElementById("idCity").value = c;
            document.getElementById("idInd").value = i;
            document.getElementById("idSpec").value = s;
            document.filthForm.submit();
        }
    </script>
@stop