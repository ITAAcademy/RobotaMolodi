@extends('app')

@section('content')

    <ul class="nav navbar-nav navbar-right">
        <li> <li> <a href="{{\Illuminate\Support\Facades\URL::to('scompany/company_vac',['id'=>$company->id])}}">Вакансії компанії</a></li></li>
        <li> <li> <a href="{{$company->id}}/destroy" onclick="return ConfirmDelete();">{{ trans('main.delete') }}</a></li></li>
        <li> <a href="{{$company->id}}/edit">{{ trans('main.edit') }}</a></li>
    </ul>

    <div class="panel panel-orange">
        <div class="panel-heading"><h3>Перегляд компанії</h3></div>
        <ul class="list-group">
            <li class="list-group-item">  {{$company->company_name}}</li>
            <li class="list-group-item"> Посилання : <a href="{{$company->company_email}}">{{$company->company_email}}</a></li>
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
