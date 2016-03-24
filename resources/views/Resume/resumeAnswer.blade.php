@extends('app')

@section('content')

    <div class="panel panel-orange">
        <div class="panel-heading"><p><h3>Повідомлення успішно надіслане!</h3></p>
        <p> <a href={{url("/resume")}}>Повернутись до перегляду резюме</a></p></div>
    </div>
@stop
