@extends('app')

@section('headLinks')
    <link href="{{ asset('/css/style_resume.css') }}" rel="stylesheet">
@endsection
@section('seo-module')
    @include('newDesign.seoModule._meta', ['name' => 'description' , 'content' => $resume->description ])
@endsection

@section('content')
    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
        ['url'=> 'head','name'=>trans('content.main')],
        ['name' => trans('content.resume').': '.$resume->position, 'url' => false]
        ]
    )
    )
    <div class="panel" id="vrBlock">
        <div>
            <div class="col-md-3">
                <div class="panel panel-orange" id="vimg">
                    @if(File::exists(public_path('image/resume/'.$resume->user_id.'/'.$resume->image)))
                        {!! Html::image('image/resume/'.$resume->user_id.'/'.$resume->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                    @else
                        {!! Html::image('image/m.jpg', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                    @endif
                </div>
            </div>

            <div id="datAnnoyingSizes">
                <div class="panel-heading">
                    <p class="position_resume">
                        {!! Html::linkRoute('resume.showResumes', $resume->position, [ 'name' => 'specialisation', 'value' => $resume->position], ['class' => 'orangColor-resume-name', 'tabindex' => 1 ]) !!}
                    </p>
                    <p class="price_resume">
                        {{$resume->salary}} - {{$resume->salary_max}} {{$resume->currency->currency}}
                    </p>
                    <p class="name_resume">{!! strip_tags($resume->name_u) !!}</p>
                    </br>
                </div>

                <div class="ratings">
                    <span class = "ratingsTitle">{{ trans('content.rating') }}</span>
                    <span class="morph">
                        {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike']) !!}
                        <span class="findLike" id="{{route('res.rate', $resume->id)}}_1">{{$resume->rated()->getLikes($resume)}}</span>
                    </span>
                    <span class="morph">
                        {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike']) !!}
                        <span class="findDislike" id="{{route('res.rate', $resume->id)}}_-1">{{$resume->rated()->getDisLikes($resume)}}</span>
                    </span>
                    <span class="likeError"></span>
                </div>

                <div class="panel-description-resume">
                    <p class="position_resume">
                        {!! Html::linkRoute('resume.showResumes', $resume->industry->name, [ 'name' => 'industries', 'value' => $resume->industry->id], ['class' => 'orangColor-resume', 'tabindex' => 1 ]) !!}
                    </p>

                    <p class="phone-nomber-resume"><span>{{ trans('main.phone') }}</span> {!!$resume->telephone!!}</p>

                    <p class="description-one-resume"><span>{{ trans('main.description') }}</span></p>
                    <p class="description-footer-resume">{!! strip_tags($resume->description, '<em><a><s><p><span><b><ul><ol><li><strong><h1><h2><h3><h4><h5><blockquote><body><table><tr><td>') !!}</p>
                    <div class="button-city-time">
                        <p class="cityTime_resume">
                            {!! Html::linkRoute('resume.showResumes', $city->name, [ 'name' => 'regions', 'value' => $city->id], ['class' => 'orangColor-resume', 'tabindex' => 1 ]) !!}
                            <span id="yellowCircle-resume">&#183;</span>
                            {{ date('j m Y', strtotime($resume->updated_at))}}
                        </p>
                        <a id="writeOnPost" href="{{$resume->id}}/send_message">
                           <div class="writeOnPost">НАПИСАТИ НА ПОШТУ</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::check() &&  Auth::user()->isAdmin())
        <div>
            <button class="btn btn-default" style="background: #f48952; margin-left: 50px" onclick="blockResume()">
                Заблокувати
            </button>
        </div>
    @endif

    <script>
        function blockResume() {
            var dialogResult = confirm("Ви дійсно бажаєте заблокувати резюме?");
            if(dialogResult) {
                $.post( '/resume/block',{_token: '{{ csrf_token() }}', id: '{{ $resume->id }}' },
                    function( data ) {
                    location="{{URL::to('resume')}}";
                });
            }
        }
    </script>

@stop
