@extends('app')
@section('head')
    @include("newDesign.company._metaTag")
    <link href="{{ asset('/css/oneCompany.css') }}" rel="stylesheet">
@stop
@section('content')
    @include('newDesign.scrollup')

    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
       ['url'=> 'head','name'=>'Головна'],
       ['name' => 'Компанія: '.$company->company_name, 'url' => false]
       ])
    )

    {!! Form::file('fileImg', array( 'id'=>'fileImg', 'style'=>'display:none', 'accept'=>'.jpg, .jpeg, .gif, .png, .svg')) !!}
    <input type="hidden" name="fcoords" id="coords" class="coords" value="" data-id="{{$company->id}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="row">
            <div class="col-md-2">
                <div class="logos">

                    <div class="panel panel-orange" id="vimg">
                        @if(File::exists(public_path('image/company/' . $company->users_id .'/'. $company->image)) and $company->image != '')
                            {!! Html::image('image/company/' . $company->users_id .'/'. $company->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @else
                            {!! Html::image('image/company_tmp.png', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                        @endif
                    </div>

                    @if(Auth::check() && Auth::id() == $company->users_id)
                    <div class="change-img-myresume">
                        <span class="orange-link-myresume"  id="changeImage">
                            <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                            <span>Змiнити фото</span>
                        </span>
                    </div>
                    @endif

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
                    <a href="https://www.linkedin.com/shareArticle?mini=true&amp&
                        itle=Компанія{{' '.$company->company_name}}&
                        url={!! env("APP_URL")."/company/".$company->id !!}"
                        target="_blank">
                        <i class="fa">&#xf08c;</i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?
                        u={!! env("APP_URL")."/company/".$company->id !!}
                        &title=Компанія{{$company->company_name}}" target="_blank">
                        <i class="fa">&#xf082;</i>
                    </a>
                    <a href="https://www.twitter.com/intent/tweet?url={!! env("APP_URL")."/company/".$company->id !!}
                        &text=Компанія{{' '.$company->company_name}}" target="_blank">
                        <i class="fa">&#xf081;</i>
                    </a>
                    <a href="http://vk.com/share.php?url={!! env("APP_URL")."/company/".$company->id !!}
                        &title=Компанія{{' '.$company->company_name}}
                        &image=http://robotamolodi.org/image/logo.png" target="_blank">
                        <i class="fa" >&#xf189;</i>
                    </a>
                    <a href="https://plus.google.com/share?
                        url={!! env("APP_URL")."/company/".$company->id !!}" target="_blank">
                        <i class="fa fa-google-plus-square"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-10 contentConpany">

                <div class="panelHeadings">
                    <div class="textCompany">
                        <a class="greyLinks" href="javascript:submit('companies' {{$company->id}})">
                            {{$company->company_name}}
                        </a>
                    </div>
                </div>

                <div class="row textCompany">

                    <div class="col-xs-12 text_com">
                        <div class="ratings">
                            <span class = "ratingsTitle">{{ trans('content.rating') }}</span>
                            <span class="morph">
                                {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike']) !!}
                                <span class="findLike" id="{{route('com.rate', $company->id)}}_1">
                                    {{$company->rated()->getLikes($company)}}
                                </span>
                            </span>
                            <span class="morph">
                                {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike']) !!}
                                <span class="findDislike" id="{{route('com.rate', $company->id)}}_-1">
                                    {{$company->rated()->getDisLikes($company)}}
                                </span>
                            </span>
                            <span class="likeError"></span>
                        </div>
                    </div>

                    <div class="col-xs-3 text_com">
                        <span>Аббревиатура: </span>
                    </div>
                    <div class="col-xs-9 text_com">
                        <span>{{ !empty($company->short_name) ? $company->short_name : "Не вказано"}}</span>
                    </div>

                    <div class="col-xs-3 text_com">
                        <span>{{ trans('form.branch') }}: </span>
                    </div>
                    <div class="col-xs-9 text_com">
                        <span>{{!empty($industry->name) ? $industry->name : "Не вказано"}}</span>
                    </div>


                    <div class="col-xs-3 text_com">
                        <span>Посилання: </span>
                    </div>
                    @if(!empty($company->link))
                        <div class="col-xs-9 text_com">
                            <a class="orangeLinks" href="{{$company->link}}">{{$company->link}}</a>
                        </div>
                    @else
                        <div class="col-xs-9 text_com">
                            <span>Не вказано</span>
                        </div>
                    @endif

                    <div class="col-xs-3 text_com">
                        <span>Мiсто: </span>
                    </div>
                    <div class="col-xs-9 text_com">
                        <span>{{!empty($city->name) ? $city->name : "Не вказано"}}</span>
                    </div>

                    <div class="col-xs-3 text_com">
                        <span>{{ trans('form.email') }}: </span>
                    </div>
                    <div class="col-xs-9 text_com">
                        <span>{{!empty($company->company_email) ? $company->company_email : "Не вказано"}}</span>
                    </div>

                    <div class="col-xs-3 text_com">
                        <span>{{ trans('main.phone') }}</span>
                    </div>
                    <div class="col-xs-9 text_com">
                        <span>{{!empty($company->phone) ? $company->phone : "Не вказано"}}</span>
                    </div>

                    <div class="col-xs-12 textCompany verticalIndent">
                        <span class="anagraph verticalIndent">Подробиці </span>
                    </div>
                    <div class="col-xs-12 description">
                       <span>
                           {!! !empty($company->description) ?
                            strip_tags(
                                $company->description,
                                '<em><a><s><p><span><b><ul><ol><li><strong><h1><h2><h3><h4><h5><blockquote><body><table><tr><td>'
                            ) :
                           "Детальна інформація про компанію відсутня." !!}
                       </span>
                    </div>

                    <div class="col-xs-12 textCompany verticalIndent">
                        <span class="anagraph verticalIndent">Вакансії </span>
                        @if(!empty($vacancies[0]))
                            @foreach($vacancies as $vacancy)
                                <div class="description">
                                    <a class="links" href="/vacancy/{{$vacancy->id}}">
                                        {{ $vacancy->position}}
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p>На даний момент немає активних вакансій</p>
                        @endif

                        @if(Auth::check() && Auth::user()->isAdmin())
                            <div>
                                <button class="btn btn-default" style="background: #f48952" onclick="blockCompany()">
                                    Заблокувати
                                </button>
                            </div>
                        @endif

                    </div>
                </div>
            <hr/>

            <div class="col-xs-12 configButton">
                @if(Auth::check() && Auth::id() == $company->users_id)
                <a href="{{$company->id}}/destroy" class="btn-default btn"
                   onclick="return confirm('Ви дійсно бажаєте видалити коментарій?');">{{ trans('main.delete') }}</a>
                <a href="{{$company->id}}/edit" class="btn-default btn">{{ trans('main.edit') }}</a>
                @endif
                <a href="{{route('company.response.index',$company->id)}}" class="response-call btn-default btn">Відгукнутись</a>
                <a href="{{route('scompany.company_formSendFile',$company->id)}}" class="file-call btn-default btn">Відправити файл</a>
                <a href="{{route('scompany.company_formSendResume',$company->id)}}" class="resume-call btn-default btn">Відправити резюме</a>
            </div>

        </div>
    </div>

    <div class="downlist col-xs-10 col-xs-offset-2"></div>

    @foreach($comments as $comment)
        <div id="comment-block-{{$comment->id}}" class="col-xs-10 col-xs-offset-2">
            <span>Автор: {{$comment->user->name}}</span>
            <span>, дата:
                <span id="date-{{$comment->id}}">{{date('j.m.Y h:ia', strtotime($comment->updated_at))}}</span>
            </span>
            <p id="comment-{{$comment->id}}-description">{{$comment->comment}}</p>
            @if(Auth::check() && (Auth::id() == $comment->user_id || Auth::user()->isAdmin()) )
                <div class="btn-block">
                {!!Form::model($comment,
                    ['route' => [
                        'company.response.update',
                        $company->id,
                        $comment->id
                        ],
                    'method'=>'PUT'])
                !!}
                {!!Form::textarea( 'comment', $comment->comment,
                    [
                        'id' => 'comment'.$comment->id,
                        'value' => $comment->id,
                        'class' => 'textarea-edit form-control',
                        'style' => 'height: 100px; display:none'
                    ])
                !!}
                {!!Form::button('<i class="fa fa-pencil fa-lg"></i>',
                    [
                        'value' => $comment->id,
                        'id' => 'btn-edit-submit'.$comment->id,
                        'class' => 'btn-edit-submit btn btn-xs btn-primary pull-left'
                    ])
                !!}
                {!!Form::close()!!}
                {!!Form::model($comment,
                    ['route' => [
                        'company.response.destroy',
                        $company->id,
                        $comment->id,
                        ],
                    'method'=>'DELETE'])
                !!}
                {!!Form::button('<i class="fa fa-times fa-lg"></i>',
                    [
                        'type' => 'submit',
                        'id' => $comment->id,
                        'class' => 'btn-delete btn btn-xs btn-danger pull-left '.$comment->id,
                        'onclick' => "return confirm('Ви дійсно бажаєте видалити коментарій?');"
                    ])
                !!}
                {!!Form::close()!!}
            </div>
            @endif
        </div>
    @endforeach

    {!!Html::script('js/socialNetWork.js')!!}

    <script>
        socialNetWork('.social > a');
    </script>

    <div id="changeImageBox" class="modal fade">
        @include('newDesign.cropModal')
    </div>

    {!!Html::script('js/crop.js')!!}

    <script>
    function blockCompany() {
        var dialogResult = confirm("Ви дійсно бажаєте заблокувати компанію?");
        if(dialogResult) {
            $.post( '/company/{{ $company->id }}/block', {_token: '{{ csrf_token() }}', id: '{{ $company->id }}'},
                function( data ) {
                    location="{{URL::to('company')}}";
                });
        }
    }
    $(document).ready(function () {
        $("button.btn-edit-submit").on('click', function () {
            id = $(this).val();
            $("#comment-" + id + "-description").hide();
            $(this).removeClass('btn-primary').addClass('btn-success');
            attributes = $(this).attr("class");
            buttonName = $(this).html();
            $("#comment" + id).show();
            $(this).replaceWith('<button class=\'' + attributes + '\' type=\'submit\' >' + buttonName + '</button>');
        });

        $('#changeImage').on('click', function () {
            $('#fileImg').click();
        });

        $('#fileImg').on('change', function (e) {
            $('#changeImageBox').modal({
                show: true,
                backdrop: 'static'
            });
            crop(e, 'img-src', '#crop', '#changeImageBox');
        });

        $('#changeImageBox').on('hidden.bs.modal', function () {
            if($('#coords').val()){
                var $input = $("#fileImg");
                var fd = new FormData;
                fd.append('fileImg', $input.prop('files')[0]);
                fd.append('coords', $('.coords').val());
                fd.append('id', $('.coords').attr('data-id'));
                $.ajax({
                    url: '{{ route('upimgcom') }}',
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                        $('#vimg img').attr('src', window.location.origin + '/' + data);
                    }
                });
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });


        $('a.vac-call, a.file-call, a.resume-call, a.response-call').click(function () {
            var that = this;
            var link = $(this).attr('href');
            if($(that).hasClass('active')){
                $(that).removeClass('active');
                $('.downlist').hide('slow');
            }else{
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
                $.ajax({
                    url: link,
                    success: function(data){
                        $('.active').removeClass('active');
                        $('.downlist').show('slow').html(data);
                        $(that).addClass('active');
                    }
                })
            }
            return false;
        })
    })
    </script>


@stop
