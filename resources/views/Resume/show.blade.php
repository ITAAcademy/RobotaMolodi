@extends('app')

@section('content')

    <div class="panel panel-orange">
        <div class="panel-heading"> <h2>{!!$resume->position!!}  &#183;  {!!$resume->salary!!} грн. <span class="text-muted text-right pull-right"><h5>{{ date('j.m.Y,H:i:s', strtotime($resume->created_at))}}</h5></span></h2></div>
        <ul class="list-group">
            <li class="list-group-item"> {!!$resume->name_u!!}</li>
            {!!Form::open(['route' => 'sortResumes', 'method' => 'get', 'name' => 'filthForm'])!!}
                <li class="list-group-item"><a href="javascript:submitCity()" id = "valCity">{!!$city->name!!}</a></li>
                <input type = "hidden" name = "city" id = "idCity"/>
                <li class="list-group-item"><a href="javascript:submitInd()"  id = "valInd">{!!$resume->Industry()->name!!}</a></li>
                <input type = "hidden" name = "industry" id = "idInd"/>
            {!!Form::close()!!}
            <li class="list-group-item"><span class="heading"> Опис: </span> {!!$resume->description!!}</li>
            <li class="list-group-item"><a href="{{$resume->id}}/send_message">Написати на пошту</a></li>
        </ul>
    </div>

    <script>
        function submitCity()
        {
            var x = document.getElementById("valCity").innerHTML;
            document.getElementById("idCity").value = x;
            document.getElementById("idInd").value = null; //set null to industry
            document.filthForm.submit();
        }
        function submitInd()
        {
            var x = document.getElementById("valInd").innerHTML;
            document.getElementById("idInd").value = x;
            document.getElementById("idCity").value = null; //set null to city
            document.filthForm.submit();
        }
    </script>
@stop

