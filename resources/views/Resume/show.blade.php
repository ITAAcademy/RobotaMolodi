@extends('app')

@section('content')
    {!!Form::open(['route' => 'main.resumes', 'method' => 'post', 'name' => 'filthForm', 'id' => 'aform'])!!}
    <input type = "hidden" name = "filterName" id = "filterName"/>
    <input type = "hidden" name = "filterValue" id = "filterValue"/>
    {!!Form::close()!!}

    <div class="panel panel-orange" id="vrBlock">

        <div class="col-md-3">
            <div class="panel panel-orange" id="vimg">
                @if(File::exists(public_path('image/resume/' . $resume->id_u . '.png')))
                    {!! Html::image('image/resume/' . $resume->id_u . '.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/resume/' . $resume->id_u . '.jpg')))
                    {!! Html::image('image/resume/' . $resume->id_u . '.jpg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/resume/' . $resume->id_u . '.jpeg')))
                    {!! Html::image('image/resume/' . $resume->id_u . '.jpeg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/resume/' . $resume->id_u . '.bmp')))
                    {!! Html::image('image/resume/' . $resume->id_u . '.bmp', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @else
                    {!! Html::image('image/m.jpg', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                @endif
            </div>
        </div>

        <div id="datAnnoyingSizes">
            <div class="panel-heading">
                <p class="position_resume">
                    <a class="orangColor" href="javascript:submit('selectSpecialisation', '{{$resume->position}}')">{!!$resume->position!!}</a>
                </p>
                    <br/>
                <p class="price_resume">
                    {{$resume->salary}} - {{$resume->salary_max}} {{$resume->Currency()[0]['currency']}}
                </p>

                <p class="name_resume">{!!$resume->name_u!!}</p>
            </div>
            <div class="panel-heading">
                <p class="position_resume"><a class="orangColor" href="javascript:submit('selectIndustry', {{$resume->Industry()->id}})">{!!$resume->Industry()->name!!}</a></p>
                <hr/>
                <p><span class="heading bold">Телефон: </span> {!!$resume->telephone!!}</p>
                <hr/>
                <p><span class="heading bold">Опис: </span> {!!$resume->description!!}</p>
                <hr/>
                <div class="button-city-time">
                    <p class="cityTime_resume">
                        <a class="orangColor" href="javascript:submit('selectCity', {{$city->id}})">{!!$city->name!!}</a>
                        <span id="yellowCircle">&#183;</span>
                        {{ date('j.m.Y, H:i:s', strtotime($resume->updated_at))}}
                    </p>
                    <a id="writeOnPost" href="{{$resume->id}}/send_message">
                       <div class="writeOnPost">НАПИСАТИ НА ПОШТУ</div>
                    </a>
                </div>
            </div>
        </div>

    </div>

        @if(Auth::check()) @if(Auth::user()->role ==1)<div><button class="btn btn-default" style="background: #f48952; margin-left: 50px" onclick="blockResume()">Заблокувати</button></div>@endif @endif

    <script>
        function blockResume()
        {
            var dialogResult = confirm("Ви дійсно бажаєте заблокувати резюме?");
            if(dialogResult)
            {
                $.post( '/resume/block',{_token: '{{ csrf_token() }}', id: '{{ $resume->id }}' },
                        function( data ) {
                            location="{{URL::to('resume')}}";

                        });
            }

        }
    </script>
@stop