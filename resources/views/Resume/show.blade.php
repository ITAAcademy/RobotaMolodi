@extends('app')

@section('content')

    <h2>{!!$resume->position!!}</h2>
    <p>
      Дата створення :  {!!$resume->created_at!!}
    </p>
<p>
      Ім'я :  {!!$resume->name_u!!}
</p>
    <p>
        Позиція :  {!!$resume->position!!}
    </p>
    <p>
       Місто  :  {!!$resume->city!!}
    </p>
<p>
    Промисловість: {!!$resume->industry!!}
</p>
<p>
    Зарплата: {!!$resume->salary!!} грн.
</p>
<p>
    Опис: {!!$resume->description!!}

</p>
    <a href="#">Написати на почту</a>
@stop