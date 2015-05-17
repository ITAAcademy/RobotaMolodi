@extends('app');

@section('content')
<div style="text-align: center; width: 100%;background-color: #d9edf7">There will be the Filter!</div>
<div style="text-align: center; width: 100%">Main view</div>
<div class="list-group">
@foreach($data as $index=>$element)
  <a href="{{url('/vacancy',['id'=>$index])}}" class="list-group-item">
    @include("main.smallview",['index'=>$index, 'element' => $element['data']]);  
  </a>
@endforeach
</div>
@endsection