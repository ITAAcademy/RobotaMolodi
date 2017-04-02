@extends('app')
@section('head')
{{--<link href="{{ asset('..resources/views/newDesign/css/oneCompany.css') }}" rel="stylesheet">--}}
<link href="{{ asset('/css/oneCompany.css') }}" rel="stylesheet">
@stop
@section('content')
        <div class="row">
            <div class="col-md-2">
                <div class="logos">
                    <div class="panel panel-orange" id="vimg">
                        @if(File::exists(public_path('image/vacancy/' . $company->id . '.png')))
                            {!! Html::image('image/vacancy/' . $company->id . '.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @elseif(File::exists(public_path('image/vacancy/' . $company->id . '.jpg')))
                            {!! Html::image('image/vacancy/' . $company->id . '.jpg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @elseif(File::exists(public_path('image/vacancy/' . $company->id . '.jpeg')))
                            {!! Html::image('image/vacancy/' . $company->id . '.jpeg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @elseif(File::exists(public_path('image/vacancy/' . $company->id . '.bmp')))
                            {!! Html::image('vacancies' . $company->id . '.bmp', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @else
                            <h3 class="nologo">логотип вiдсутнiй</h3>
                        @endif
                    </div>
                    <div class="case">
  						<span>
  							<i class="fa newFa">&#xf0b1;</i>
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

                <div id="datAnnoyingSizes">
                    <div class="panelHeadings">
                        <div class="textCompany verticalIndent"><a class="greyLinks" href="javascript:submit('companies' {{$company->id}})">{{$company->company_name}}</a> </div>
                    </div>
                    <div>
                        <div class="textCompany verticalIndent"><span>Галузь: </span><a class="orangeLinks" href="javascript:submit('selectIndustry')">{{$industryName}}</a> </div>
                    </div>
                    <div>
                        <div class="textCompany verticalIndent">
                            <span class="anagraph verticalIndent">Подробиці </span>
                            <br><div class="description">{!! $company->description !!}</div>
                        </div>
                    </div>
                    <div>
                        <div class="text_data verticalIndent"> <a class="textCompany"> </a></div>
                    </div>
                </div>
                {{--{{ dd('test')}}--}}
                <div class="button_vac">
                    <a href="#"><input type="submit" class="recall" value="Переглянути вакансії"></a>
                    <a href="#"><input type="submit" class="recall" value="Відправити файл"></a>
                    <a href="#"><input type="submit" class="recall" value="Відправити резюме"></a>
                    <a href="#"><input type="submit" class="recall" value="Відгукнутись"></a>
                </div>
            </div>
        </div>
@stop