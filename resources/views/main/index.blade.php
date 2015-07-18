@extends('app');

@section('content')

    <!-- Form filters-->
    <div style="text-align: center; width: 100%;background-color: #d9edf7">There will be the Filter!</div>
    {!! Form::open(['route' => 'resume.store', 'class'=>'form-inline', 'role'=>'form']) !!} <!-- F-->
            <!-- <form class="form-inline" role="form">
                 <div class="form-group">  -->
                        {!! Form::text('position', null, ['class'=>'form-control', 'placeholder'=>'Позиція']) !!}
                <!--</div>
                    <!-- <div class="form-group">-->
                        <select name="industry" class="form-control" id="selectIndustry">
                            @foreach($cities as $city)
                                <option> {{$city->name}} </option>
                            @endforeach
                        </select>
                    <!-- </div>
                </form>-->
        <button type="button" class="btn btn-primary">Пошук</button>
         <!--  {!! Form::button('Login', array('class'=>'send-btn')) !!}-->
    {!!Form::close()!!}
            <div style="text-align: center; width: 100%">Main view</div>

    <!-- Output vacancies-->
        <div class="list-group">
            @foreach($data as $index=>$element)
              <a href="{{url('/vacancy',['id'=>$index])}}" class="list-group-item">
                @include("main.smallview",['index'=>$index, 'element' => $element['data']]);
              </a>
            @endforeach
        </div>


@endsection
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn').click(function(){
            alert("111dfghj");
            $.ajax({
                url: '/',
                type: "post",
                data: {'position':$('[name=position]').val(), 'city': $('[name=city]').val()},
                success: function(data){
                    alert("111dfghj");
                }
            });
        });
    });
</script>