@extends('app')

@section('content')

    <h1>Перегляд вакансії</h1>
    Дата розміщення : {{$vacancy->created_at}}<br>
    Компанія :        {{$company->company_name}}<br>
    Зарплата :        {{$vacancy->salary}}<br>
    Позиція :         {{$vacancy->position}}<br>
    Місто :           @foreach($cities as $city) {{$city->name}},<br> @endforeach
    Галузь :          {{$industry->name}}<br>
    Опис :            {{$vacancy->description}}<br>
    Від кого :        {{$user->name}}<br>
    <a href="{{$vacancy->id}}/response">Відгукнутися</a>
    <hr >



@stop