@extends('app')

@section('content')
    <div><h2>Необхiдно обрати файл розмiром до 5 Мб в текстовому форматi.</h2></div>

    <div><h3><a href={{url("/")}}>Перейти на головну сторінку</a></h3></div>

    @if (Auth::check())
        <div><h3><a href={{url("/cabinet/")}}>Перейти до особистого кабінету</a></h3></div>
    @endif


@stop

