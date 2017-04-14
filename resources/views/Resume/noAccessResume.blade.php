@extends('app')

@section('content')
    {!!Form::open(['route' => 'main.resumes', 'method' => 'post', 'name' => 'filthForm', 'id' => 'aform'])!!}
    <input type="hidden" name="filterName" id="filterName" xmlns="http://www.w3.org/1999/html"/>
    <input type = "hidden" name = "filterValue" id = "filterValue"/>
    {!!Form::close()!!}
    {!! Form::open(array('route' => 'upimg', 'files' => true, 'style' => 'display: none', 'name' => 'uploadImgForm')) !!}
    <input type="file" name="image" id="fileImg">
    <input type="hidden" name="rov" value="r">
    <input type="hidden" name="fname" value="{{$resume->id_u}}">
    {!! Form::close() !!}

    <div style="margin-left: 20px; height: 200px;">
        <p>Резюме не доступне для перегляду незареєстрованим користувачам. Для перегляду даного резюме зареєструйтеся або ввійдіть у свій акаунт.</p>
    </div>


@stop

