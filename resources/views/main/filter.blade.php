@extends('app')

@section('content')
    <!-- <meta name="csrf_token" content="{{ csrf_token() }}" /> -->
    {!! Form::open(['method' => 'get', 'route' => 'filter', 'class'=>'form-inline']) !!} <!-- F-->

        <select name="industry" class="form-control" id="selectIndustry">
            <option value="-1"> Усі галузі</option>
            @foreach($industries as $industry)
                @if($industry_f == $industry->id)
                    <option selected value="{{$industry->id}}"> {{$industry->name}} </option>
                @else
                    <option value="{{$industry->id}}"> {{$industry->name}} </option>
                @endif
            @endforeach
        </select>

        <select name="city" class="form-control" id="selectCity">
            <option value="-1"> Усі міста</option>
            @foreach($cities as $city)
                @if($city_f == $city->id)
                    <option selected value="{{$city->id}}"> {{$city->name}} </option>
                @else
                    <option value="{{$city->id}}"> {{$city->name}} </option>
                @endif
            @endforeach
        </select>

        <div class="form-group">
            {!! Form::submit('Пошук', ['class'=>'btn btn-primary']) !!}
        </div>

    {!!Form::close()!!}

    <div class="list-group">
        @foreach($vacancies as $vacancy)
            <a href="{{url('/vacancy',['id'=>$vacancy->id])}}" class="list-group-item">
                <p>
                    <h3 class="list-group-item-heading">{{$vacancy->id}} Позиція: <span class="text-info" >{{$vacancy->position}}</span>
                        <span class="text-muted text-right pull-right"><h5>{{$vacancy->date_field}}</h5></span></h3>
                <h4 class="list-group-item-heading">Опис вакансії: <span class="text-success">{{ substr($vacancy->description, 0, 100)}}</span>...</h4>

                </p>
                <p class="list-group-item-text"><b>Зарплата: </b> {{$vacancy->salary}} </p>
            </a>
        @endforeach
            {!! str_replace('/?', '?', $vacancies->render()) !!}
        <!-- {!! $vacancies->render()!!} -->
    </div>
    @if(count($vacancies) == 0)
        <p class="btn bg-danger">По даному запиту дані відсутні.</p>
    @endif
@stop
<script type="text/javascript" src="js/jquery-1.11.3.js"></script>