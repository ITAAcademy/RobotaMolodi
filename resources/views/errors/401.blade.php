@extends('app')

@section('content')
    <div><h2>Посилання спідкала невдачка.</h2></div>
    <div><h3>Помилка 401 - необхідно авторизуватись</h3></div>
    <div><h3><a href="/public/">Перейти на головну сторінку</a></h3></div>

    @if (Auth::check())
        <div><h3><a href="/cabinet/">Перейти до особистого кабінету</a></h3></div>
    @endif

@stop
