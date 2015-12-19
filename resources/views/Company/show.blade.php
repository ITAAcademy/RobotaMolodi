@extends('app')

@section('content')
    <ul class="nav navbar-nav navbar-right">
        <li> <li> <a href="{{$company->id}}/destroy" onclick="return ConfirmDelete();">Видалити</a></li></li>
        <li> <a href="{{$company->id}}/edit">Редагувати</a></li>
    </ul>

    <div class="panel panel-orange">
        <div class="panel-heading"><h3>Перегляд компанії</h3></div>
        <ul class="list-group">
            <li class="list-group-item">  {{$company->company_name}}</li>
            <li class="list-group-item"> Посилання :   {{$company->company_email}}</li>
        </ul>
    </div>

    <script>
        function ConfirmDelete()
        {
            var conf = confirm("Ви дійсно хочете видалити компанію?");

            if(conf) return true;

            else return false;
        }
    </script>

@stop
