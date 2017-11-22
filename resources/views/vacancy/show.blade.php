@extends('app')
@section('head')
    <link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
           ['url'=> 'head','name'=>'Головна'],
           ['name' => 'Вакансія: '.$vacancy->position , 'url' => false]
           ]
       )
       )
    <div class="panel panel-orange" id="vrBlock">
        <div class="row">
            <div class="col-md-2">
                <div class="logos">
                    <div class="panel panel-orange" id="vimg">
                        @if(File::exists(public_path('image/company/' . $vacancy->Company->users_id .'/'. $vacancy->Company->image)) and $vacancy->Company->image != '')
                            {!! Html::image('image/company/' . $vacancy->Company->users_id .'/'. $vacancy->Company->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @else
                            <h3 style="text-align: center; color: #f48952; margin-top: 40px">логотип вiдсутнiй</h3>
                        @endif
                    </div>
                    <div class="col-xs-12 case">
                        <div class="col-xs-2 case-img">
                            <i class="fa vacancy">&#xf0b1;</i>
                        </div>
                        <div class="col-xs-10 consult">
                            <a href="javascript:alert( {{ trans('main.dosent') }} )">запланувати консультацію</a>
                        </div>
                    </div>
                    <div class="share">
                        <p id="share-vacancy">Поділитись</p>
                    </div>
                    <div class="social">
                        <a href="https://www.linkedin.com/shareArticle?mini=true&amp&title=Вакансія{{' '.$vacancy->position}}&url=http://robotamolodi.org/vacancy/{{$vacancy->id}}" target="_blank"><i class="fa">&#xf08c;</i></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=http://robotamolodi.org/vacancy/{{$vacancy->id}}&title=Вакансія{{' '.$vacancy->position}}" target="_blank"><i class="fa">&#xf082;</i></a>
                        <a href="https://www.twitter.com/intent/tweet?url=http://robotamolodi.org/vacancy/{{$vacancy->id}}&text=Вакансія{{' '.$vacancy->position}}" target="_blank"><i class="fa">&#xf081;</i></a>
                        <a href="http://vk.com/share.php?url=http://robotamolodi.org/vacancy/{{$vacancy->id}}&title=Вакансія{{' '.$vacancy->position}}&image=http://robotamolodi.org/image/logo.png" target="_blank"><i class="fa" >&#xf189;</i></a>
                        <a href="https://plus.google.com/share?url=http://robotamolodi.org/vacancy/{{$vacancy->id}}" target="_blank"><i class="fa fa-google-plus-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div id="datAnnoyingSizes">
                    <div class="panel-headings">
                        {!! Html::linkRoute('vacancy.showVacancies', $vacancy->position, [ 'name' => 'specialisations', 'value' => $vacancy->position], ['class' => 'greyLinks', 'tabindex' => 1 ]) !!}
                    </div>
                    <div>
                        <div class="text_vac"><span>Компанія: </span><a class="orangeLinks" tabindex="1" href="/company/{{$company->id}}">{{$company->company_name}}</a> </div>
                    </div>

                    <div class="ratings text_vac">
                        <span class = "ratingsTitle">Рейтинг:</span>
                        <span class="morph">
                            {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike']) !!}
                            <span class="findLike" id="{{route('vac.rate', $vacancy->id)}}_1">{{$vacancy->rated()->getLikes($vacancy)}}</span>
                        </span>
                        <span class="morph">
                            {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike']) !!}
                            <span class="findDislike" id="{{route('vac.rate', $vacancy->id)}}_-1">{{$vacancy->rated()->getDisLikes($vacancy)}}</span>
                        </span>
                        <span class="likeError"></span>
                    </div>

                    <div>
                        <div class="text_vac">
                            <span>{{ trans('form.branch') }}: </span>
                            {!! Html::linkRoute('vacancy.showVacancies', $industry->name, [ 'name' => 'industries', 'value' => $industry->id], ['class' => 'orangeLinks', 'tabindex' => 1 ]) !!}
                        </div>
                    </div>
                    <div>
                        <div class="text_vac"><span>Заробітна платня: </span><span class="seleryvacancy">{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</span> </div>
                    </div>
                    <div>
                        <div class="descriptionStyle"><span class="anagraph">Подробиці </span><br>{!! strip_tags($vacancy->description, '<em><a><s><p><span><b><ul><ol><li><strong><h1><h2><h3><h4><h5><blockquote><body><table><tr><td>') !!}</div>
                    </div>
                    <div>
                        <div class="text_data">
                            @foreach($cities->get() as $city)
                                {!! Html::linkRoute('vacancy.showVacancies', $city->name, [ 'name' => 'regions', 'value' => $city->id], ['class' => 'orangeLinks', 'tabindex' => 1 ]) !!}
                            @endforeach
                                <span id="yellowCircleVacancy"><span>&bull;</span> {{date('j m Y', strtotime($vacancy->updated_at))}}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="right-colomn-vacancy">
        <div class="right-vac">
            <div class="list-but-vac">
                <ul class="list-inline">
                    <li class="li-link send-url-link" data-type="url">
                        <i class="fa fa-link"></i>
                        <button type="button" class="btn btn-link" onclick="showDiv('send-URL-vacancy')">відправити URL</button>
                    </li>
                    <li class="li-link send-file-link" data-type="file">
                        <i class="fa fa-file-o"></i>
                        <button type="button" class="btn btn-link" onclick="showDiv('send-file-vacancy')">відправити файл</button>
                    </li>
                    <li class="li-link send-resume-link" data-type="resume">
                        <i class="fa fa-file-text-o"></i>
                        <button type="button" class="btn btn-link" onclick="showDiv('send-resume-vacancy')">відправити резюме</button>
                    </li>
                </ul>
            </div>

            <div id="send-URL-vacancy">
                {!!Form::open(['route' => ['vacancy.response.link',$vacancy->id],'method'=>'get']) !!}
                {!!Form::label('url', 'Вставити посилання на URL:',['class' => 'url-text-vac'] )!!}
                {!!Form::text('link',null,array('class' => 'form-control url-input-vac','placeholder' =>'URL:','autocomplete'=>"off",'required','id'=>'Link'))!!}
                <div align="right">
                    {!!Form::submit('Відправити', ['class' => 'btn btn-warning btn-send'])!!}
                </div>

                {!!Form::close()!!}
            </div>

            <div id="send-file-vacancy">
                {!!Form::open(['route' => ['vacancy.response.sendFile',$vacancy->id],'method'=>"POST", 'enctype' => 'multipart/form-data', 'files' => true])!!}
                {!! Form::file('file',array('class' => 'open-file-vac', 'id'=>'File', 'name' => 'FileName')) !!}
                <div align="right">
                    {!!Form::submit('Відправити', ['class' => 'btn btn-warning btn-send'])!!}
                </div>

                {!!Form::close()!!}
            </div>


            <div id="send-resume-vacancy">
                <div>
                    <h3 style="margin-top: 5px">Виберіть резюме</h3>
                </div>
                <div>
                    {!!Form::open(['route' => ['vacancy.response.sendResume',$vacancy->id],'method'=>"POST"])!!}
                    <div class="form-group {{$errors-> has('Load') ? 'has-error' : ''}}" >
                        @if(!empty($resume))
                            <select class="form-control" id="resume" name="resumeId" style="margin-top: 10px">
                                @foreach($resume as $res)
                                    <option value="{{$res->id}}" selected>{{$res->position}}</option>
                                @endforeach
                            </select>
                    </div>
                    {!! Form::hidden('id', $vacancy->id, array('class' => 'form-control')) !!}
                    @else
                        <p>У вас немає резюме.Перейти до створення резюме</p>
                        <p>{!!link_to_route('resume.create','Створення резюме','','style="color:#f68c06"')!!}</p>
                    @endif
                </div>
                <div>
                    @if (!empty($resume))
                        <div align="right">
                            {!!Form::submit('Відправити', ['class' => 'btn btn-warning btn-send'])!!}
                        </div>
                    @endif
                </div>

                {!!Form::close()!!}
            </div>

            </div>
        </div>
            <script>
                function showDiv(id){
                    var closeAll = false;
                    if(document.getElementById(id).style.display == "block")
                        closeAll = true;
                    document.getElementById('send-URL-vacancy').style.display = "none";
                    document.getElementById('send-file-vacancy').style.display = "none";
                    document.getElementById('send-resume-vacancy').style.display = "none";
                    if(!closeAll)
                        document.getElementById(id).style.display = "block";
                }
            </script>
        </div>
    </div>

    {!!Html::script('js/socialNetWork.js')!!}

    <script>
        socialNetWork('.social > a');
    </script>

@stop
