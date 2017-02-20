@extends('app')
@section('head')

 <link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/one_vacancy_style.css') }}" rel="stylesheet">
@endsection

@section('content')
    {!!Form::open(['route' => 'head', 'method' => 'post', 'name' => 'filthForm', 'id' => 'aform'])!!}
    <input type = "hidden" name = "filterName" id = "filterName"/>
    <input type = "hidden" name = "filterValue" id = "filterValue"/>
    {!!Form::close()!!}

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/one_vacancy_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>One_company</title>
    </head>

    <body>

        <!-- the left part of vacancy -->
        <div class="row">
            <div class="col-md-2">
                <div class="logos">
                    <div class="panel panel-orange" id="vimg">
                        @if(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.png')))
                            {!! Html::image('image/vacancy/' . $vacancy->company_id . '.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @elseif(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.jpg')))
                            {!! Html::image('image/vacancy/' . $vacancy->company_id . '.jpg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @elseif(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.jpeg')))
                            {!! Html::image('image/vacancy/' . $vacancy->company_id . '.jpeg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @elseif(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.bmp')))
                            {!! Html::image('vacancies' . $vacancy->company_id . '.bmp', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @else
                            <h3 class="nologo">логотип вiдсутнiй</h3>
                        @endif
                    </div>
                    <div class="case">
  						<span>
  							<i class="fa">&#xf0b1;</i>
  						</span>
                        <div class="consult">
                            <a href="#">запланувати консультацію</a>
                        </div>
                    </div>
                    <div class="share">
                        <p>Поділитись</p>
                    </div>
                    <div class="social">
                        <a href="https://www.linkedin.com/" target="_blank"><i class="fa">&#xf08c;</i></a>
                        <a href="https://www.facebook.com" target="_blank"><i class="fa">&#xf082;</i></a>
                        <a href="https://www.twitter.com" target="_blank"><i class="fa">&#xf081;</i></a>
                        <a href="https://vk.com" target="_blank"><i class="fa" >&#xf189;</i></a>
                        <a href="https://plus.google.com" target="_blank"><i class="fa fa-google-plus-square"></i></a>
                    </div>
            </div>
            </div>
            <div class="col-md-10">
                <div class="right_vac">

                    <div class="text_vac otstup1"><span>Компанія: </span><a class="orangeLinks" href="javascript:submit('companies' {{$company->id}})">{{$company->company_name}}</a> </div>
                    <div class="text_vac otstup1"><span>Галузь: </span><a class="orangeLinks" href="javascript:submit('selectIndustry'{{$industry->id}})">{{$industry->name}}</a> </div>
                    <p class="text_vac otstup1 orang"><b>Подробиці</b></p>
                    <p class="text_vac"> {!! $company->description !!}</p>

                    <div class="button_vac">
                        <a href="index_main.html">
                        <input type="submit" class="recall" value="Переглянути вакансії"></a>
                        <input type="submit" class="recall" value="Відправити файл">
                        <input type="submit" class="recall" value="Відправити резюме">
                        <input type="submit" class="recall" value="Відгукнутись">
                    </div>

                </div>
            </div>
        <script>
            function showDiv(id){
                var closeAll = false;
                if(document.getElementById(id).style.display == "block")
                    closeAll = true;
                document.getElementById('send_URL_company').style.display = "none";
                document.getElementById('send_file_company').style.display = "none";
                document.getElementById('send_resume_company').style.display = "none";
                if(!closeAll)
                    document.getElementById(id).style.display = "block";
            }

            function getFileName () {
                var file = document.getElementById ('uploaded-file').value;
                file = file.replace(/\\/g, "/").split('/').pop();
                document.getElementById ('file-name').innerHTML = file;
            }
        </script>

        <!-- end left part of vacancy -->

    </body>

    </html>

@stop