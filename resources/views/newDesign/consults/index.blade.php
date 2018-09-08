@extends('app')
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">

@section('content')
    @include('newDesign.scrollup')
    @include('newDesign/aboutUs/show')
    @include('newDesign/navTab/navTab')
<div class="content">
    Всі радники кар'єри
    @foreach($consultants as $consultant)
        <div>
            <div class="col-xs-3 imeg-companies-list">AVATAR
            {{ $consultant->user->avatar}}
            </div>
            <div class="section">
                {{--<a class="links ib-block" href="/vacancy/{{$vacancy->id}}">--}}
                    <h3>{{ $consultant->position}}</h3>
                {{--</a>--}}
                <h4>
                    <strong>{{$consultant->telephone}} - {{$consultant->area}} {{$consultant->city}}</strong>
                </h4>
                <p class="text-left"> {{strip_tags($consultant->description)}} </p>
            </div>



            <div class="below-section">
                <span>{{ $consultant->user->name}}</span>
                <span>{{ $consultant->user->email}}</span>
            </div>

            <hr>
        </div>


    @endforeach



</div>

@stop
