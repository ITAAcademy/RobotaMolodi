@extends('app')

@section('content')
    {!!Form::open(['route' => 'head', 'method' => 'post', 'name' => 'filthForm', 'id' => 'aform'])!!}
    <input type = "hidden" name = "filterName" id = "filterName"/>
    <input type = "hidden" name = "filterValue" id = "filterValue"/>
    {!!Form::close()!!}

    <div class="panel panel-orange" id="vrBlock">

        <div class="logos">
            <div class="panel panel-orange" id="vimg">
                @if(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.png')))
                    {!! Html::image('image/vacancy/' . $vacancy->company_id . '.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.jpg')))
                    {!! Html::image('image/vacancy/' . $vacancy->company_id . '.jpg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.jpeg')))
                    {!! Html::image('image/vacancy/' . $vacancy->company_id . '.jpeg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.bmp')))
                    {!! Html::image('image/vacancy/' . $vacancy->company_id . '.bmp', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @else
                    <h3 style="text-align: center; color: #f48952; margin-top: 80px">логотип вiдсутнiй</h3>
                @endif
            </div>
        </div>

        <div id="datAnnoyingSizes">
            <div class="panel-heading">
                <h2>
                    <a class="orangeLinks" href="javascript:submit('selectSpecialisation', '{{$vacancy->position}}')">{{$vacancy->position}}</a>
                    <br><span style="color: red">{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</span>
                </h2>
            </div>
            <ul class="list-group">
                <li class="list-group-item">  {{$user->name}}</li>
                <li class="list-group-item">  <a class="orangeLinks" href="javascript:submit('selectIndustry', {{$industry->id}})">{{$industry->name}}</a> </li>
                <li class="list-group-item" style="border-bottom: none"><span class="heading">Опис: </span>{{$vacancy->description}}</li>
                <li class="list-group-item">  <a style="text-decoration: underline" class="orangeLinks" target="_blank" href="@if($company->company_email != ''){{$company->company_email}} @else #@endif">{{$company->company_name}}</a></li>
                <li class="list-group-item" style="color: #777777;">@foreach($cities as $city)<a class="orangeLinks" href="javascript:submit('selectCity', {{$city->id}})">{{$city->name}} </a>@endforeach<span id="yellowCircle">&#183;</span> {{ date('j.m.Y, H:i:s', strtotime($vacancy->updated_at))}}</li>
                <li class="list-inline" id="opt-data-low">
                    <ul class="list-inline">
                    <li><i class="fa fa-link"><a href="#" id="sendLinkButton" data-toggle="modal" data-target="#sendLink" for="paste-link-form" @if(!Auth::check())
                            window.location='{{ url('auth/login') }}'@endif>Відправити URL</a></i></li>
                    <li><i class="fa fa-file-o"><a href="#" data-toggle="modal" data-target="#sendFile" for="paste-file-form" @if(!Auth::check())
                            window.location='{{ url('auth/login') }}'@endif>Відправити файл</a></i></li>
                    <li><i class="fa fa-file-text"><a href="#" data-toggle="modal" data-target="#sendRes" for="paste-resume-form" @if(!Auth::check())
                            window.location='{{ url('auth/login') }}'@endif>Відправити резюме</a></i></li>
                    @if(Auth::check()) @if(Auth::user()->role ==1)<li><i class="fa fa-check-square"><a href="#" for="paste-resume-form" onclick="blockVacancy()">Заблокувати</a></i></li>@endif @endif
                </ul>
                        </li>
            </ul>
        </div>

        @include('/vacancy/pasteVacancyForm/link')
        @include('/vacancy/pasteVacancyForm/file')
        @include('/vacancy/pasteVacancyForm/resume')
        <script>


        </script>
    </div>

    <div id="formContainer">

    </div>

    <script>

        function loadForm(f) {
            var id = {{$vacancy->id}};
            //console.log ("/vacancy/" + id + '/' + f);
            $.ajax({
                {{--{{dd('vacancy/' + (string) $vacancy->id)}};--}}
                url:"/vacancy/" + id + '/' + f,
                type: "GET",
                success: function (data) {
                    //$data = $(data);
                    $("#formContainer").html(data);
                }
            })
        }

        function buttonHandler(e)
        {
            var button = e.target;
            var formId = button.getAttribute("for");
            var forms = document.getElementsByClassName("col-sm-offset-2 col-sm-10 form");

            for(var i=0; i<forms.length; i++){
                if(forms[i].getAttribute("id") == formId){
                    forms[i].style.display = "block";
                }
                else { forms[i].style.display = "none";}

            }
        }

        $(document).ready(function() {
            if ({{$errors-> has('Link')}})
                $('#sendLinkButton').click();
        });

    </script>

    <script>
        function blockVacancy()
        {
            var dialogResult = confirm("Ви дійсно бажаєте заблокувати вакансію?");
            if(dialogResult)
            {
                $.post( '/vacancy/block',{_token: '{{ csrf_token() }}', id: '{{ $vacancy->id }}' },
                        function( data ) {
                            location="{{URL::to('/')}}";

                        });
            }

        }
    </script>

@stop