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
                            <h3 style="text-align: center; color: #f48952; margin-top: 40px">{{ trans('vacancy.logo_missing') }}</h3>
                        @endif

                    </div>
                    @if($vacancy->published == '1')
                        @include('newDesign.socialModule.share-btn-block' , ['url' => URL::current()])
                    @endif
                </div>
                <div>
                    <div class="text_data">


                            @foreach($cities->get() as $city)
                       <li class=""> {!! Html::linkRoute('vacancy.showVacancies', $city->name, [ 'name' => 'regions', 'value' => $city->id], ['class' => 'orangeLinks', 'tabindex' => 1 ]) !!}</li>
                        @endforeach


                    </div>
                </div>

                @if(Auth::check() && Auth::user()->isAdmin())
                    <div>
                        <button class="btn btn-default block-vacancy" onclick="blockVacancy()">
                            {{ trans('vacancy.to_block') }}
                        </button>
                    </div>
                @endif

            </div>
            <div class="col-md-10" style="margin: 0;">
                <div id="datAnnoyingSizes">
                    <div class="panel-headings">
                        {{--{!! Html::linkRoute('vacancy.showVacancies', $vacancy->position, [ 'name' => 'specialisation', 'value' => $vacancy->position], ['class' => 'greyLinks', 'tabindex' => 1 ]) !!}--}}
                        <strong>{{ $vacancy->position }}</strong>
                    </div>
                    <div>
                        <div class="text_vac"><span>{{ trans('vacancy.company') }}</span><a class="orangeLinks" tabindex="1" href="/company/{{$company->id}}">{{$company->company_name}}</a> </div>
                    </div>

                    <div class="ratings text_vac">
                        <span class = "ratingsTitle">{{ trans('content.rating') }}</span>
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
                            <span>{{ trans('form.branch') }} </span>
                            {!! Html::linkRoute('vacancy.showVacancies', $industry->name, [ 'name' => 'industries', 'value' => $industry->id], ['class' => 'orangeLinks', 'tabindex' => 1 ]) !!}
                        </div>
                    </div>
                    <div>
                        <div class="text_vac"><span>{{ trans('vacancy.salary') }}</span><span class="seleryvacancy">{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</span> </div>
                    </div>
                    <div>
                        <span id="yellowCircleVacancy">{{ trans('vacancy.date') }}{{date('j m Y', strtotime($vacancy->updated_at))}}</span>
                    </div>
                    <div>
                        <div class="descriptionStyle"><span class="anagraph">{{ trans('vacancy.details') }} </span><br>{!! strip_tags($vacancy->description, '<em><a><s><p><span><b><ul><ol><li><strong><h1><h2><h3><h4><h5><blockquote><body><table><tr><td>') !!}</div>
                    </div>
                    {{--<div>--}}
                        {{--<div class="text_data">--}}
                            {{--@foreach($cities->get() as $city)--}}
                                {{--{!! Html::linkRoute('vacancy.showVacancies', $city->name, [ 'name' => 'regions', 'value' => $city->id], ['class' => 'orangeLinks', 'tabindex' => 1 ]) !!}--}}
                            {{--@endforeach--}}
                                {{--<span id="yellowCircleVacancy"><span>&bull;</span> {{date('j m Y', strtotime($vacancy->updated_at))}}</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}

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
                        <button type="button" class="btn btn-link" onclick="showDiv('send-URL-vacancy')">{{ trans('vacancy.send_url') }}</button>
                    </li>
                    <li class="li-link send-file-link" data-type="file">
                        <i class="fa fa-file-o"></i>
                        <button type="button" class="btn btn-link" onclick="showDiv('send-file-vacancy')">{{ trans('vacancy.send_file') }}</button>
                    </li>
                    <li class="li-link send-resume-link" data-type="resume">
                        <i class="fa fa-file-text-o"></i>
                        <button type="button" class="btn btn-link" onclick="showDiv('send-resume-vacancy')">{{ trans('vacancy.send_resume') }}</button>
                    </li>
                </ul>
            </div>

            <div id="send-URL-vacancy">
                {!!Form::open(['route' => ['vacancy.response.link',$vacancy->id],'method'=>'get']) !!}
                {!!Form::label('url',trans('vacancy.add_url'),['class' => 'url-text-vac'] )!!}
                {!!Form::text('link',null,array('class' => 'form-control url-input-vac','placeholder' =>'URL:','autocomplete'=>"off",'required','id'=>'Link'))!!}
                <div align="right">
                    {!!Form::submit(trans('vacancy.send'), ['class' => 'btn btn-warning btn-send'])!!}
                </div>

                {!!Form::close()!!}
            </div>

            <div id="send-file-vacancy" class="row">
                {!!Form::open(['route' => ['vacancy.response.sendFile',$vacancy->id],'method'=>"POST", 'enctype' => 'multipart/form-data', 'files' => true])!!}
                {!! Form::file('file',array('class' => 'open-file-vac', 'id'=>'File', 'name' => 'FileName')) !!}
                <div align="right">
                    {!!Form::submit(trans('vacancy.send'), ['class' => 'btn btn-warning btn-send'])!!}
                </div>

                {!!Form::close()!!}
            </div>


            <div id="send-resume-vacancy">
                <div>
                    <h3 style="margin-top: 5px">{{ trans('vacancy.choose_resume') }}</h3>
                </div>
                <div>
                    {!!Form::open(['route' => ['vacancy.response.sendResume',$vacancy->id],'method'=>"POST"])!!}
                    @if(!empty($userResumes))
                        <div class="form-group {{$errors-> has('Load') ? 'has-error' : ''}}" >
                            <select class="form-control" id="resume" name="resumeId" style="margin-top: 10px">
                                @foreach($userResumes as $res)
                                    <option value="{{$res->id}}" selected>{{$res->position}}</option>
                                @endforeach
                            </select>
                        </div>
                        {!! Form::hidden('id', $vacancy->id, array('class' => 'form-control')) !!}
                    @else
                        <p>{{ trans('vacancy.not_have_resume') }}</p>
                        <p>{!!link_to_route('resume.create',trans('vacancy.creating_resume'),'','style="color:#f68c06"')!!}</p>
                    @endif
                </div>
                <div>
                    @if (!empty($userResumes))
                        <div align="right">
                            {!!Form::submit(trans('vacancy.send'), ['class' => 'btn btn-warning btn-send'])!!}
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

    <script>
        function blockVacancy() {
            var dialogResult = confirm("Ви дійсно бажаєте заблокувати вакансію?");
            if(dialogResult) {
                $.post( '/vacancy/block', {_token: '{{ csrf_token() }}', id: '{{ $vacancy->id }}'},
                    function( data ) {
                        location="{{URL::to('vacancy')}}";
                    });
            }
        }
    </script>
@stop
