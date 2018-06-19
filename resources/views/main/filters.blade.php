@extends('app')

@section('content')
    <div class="list-group">
        <?php $i = 1; ?>
        @foreach($vacancies as $vacancy)
            <a href="{{url('/vacancy',['id'=>$vacancy->id])}}" class="list-group-item">
                <p>
                <h3 class="list-group-item-heading">{{$vacancy->id}} {{ trans('form.position') }}: <span
                            class="text-info">{{$vacancy->position}}</span>
                    <span class="text-muted text-right pull-right"><h5>{{$vacancy->date_field}}</h5></span></h3>
                <h4 class="list-group-item-heading">{{ trans('form.description') }} вакансії: <span
                            class="text-success">{{$vacancy->description}}</span></h4>
                </p>
                <p class="list-group-item-text"><b>Зарплата: </b> {{$vacancy->salary}} </p>
            </a>
        @endforeach
        {!! $vacancies->render()!!}
    </div>
@stop