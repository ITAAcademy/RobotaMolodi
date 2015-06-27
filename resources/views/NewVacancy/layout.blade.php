@extends('app')

@section('content')
    <div>
    <ul class="nav nav-tabs">
        <li role = "presentation">{!!link_to_route('Vacancy.create','Створити вакансію')!!}</li>
        <li role = "presentation">{!!link_to_route('Vacancy.edit','Редагувати вакансію')!!}</li>
        <li role = "presentation">{!!link_to_route('Company.create','Створити компанію')!!}</li>

    </ul>
    </div>

    @yield('contents')
    @stop

<?php 
?>
