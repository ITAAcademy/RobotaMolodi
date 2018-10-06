
<link href="{{ asset('/css/consults/consultsList.css') }}" rel="stylesheet">
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">

<div class="test">
    @foreach($consultants as $consultant)
        <div class="row">
            <div class="col-xs-12 oll-consults-list">
                <div class="col-xs-3 imeg-consults-list">

                    @if($consultant->user->avatar and File::exists(public_path(Auth::user()->getAvatarPath())))
                        {!! Html::image( asset($consultant->user->getAvatarPath()), 'logo',
                        array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}                    @else
                        {!! Html::image('image/it.jpg', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                    @endif
                </div>
                <div class="col-xs-9 content-consults-list">
                    <div class="section-links">
                        <div>
                            <h3 class="name-consultants-list">
                                <span>
                                  <a  href='/sconsult/{{$consultant->id}}'>
                                    {{ $consultant->userName()}}</a>
                                </span>
                            </h3>
                        </div>

                         <div class="ratings">
                            <span class = "ratingsTitle">{{ trans('content.rating') }}</span>
                            <span class="morph">

                                {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike']) !!}
                                <span class="findLike" id="{{route('con.rate', $consultant->id)}}_1">{{$consultant->rated()->getLikes($consultant)}}</span>
                            </span>
                            <span class="morph">
                                {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike']) !!}
                                <span class="findDislike" id="{{route('con.rate', $consultant->id)}}_-1">{{$consultant->rated()->getDisLikes($consultant)}}</span>
                            </span>
                            <span class="likeError"></span>
                        </div>
                       
                        <div class="row description-consultants">
                        <span> Галузь: {{($consultant->description)}}</span>
                            </div>

                            <div class="consultations-cost">
                             <div>Вартість консультації:<span id="value"> {{$consultant->currency['currency']}} {{($consultant->value)}} /час</span></div>
                            </div>
                           
                            <div class="consultations">
                              <div> <img src="{{ asset('/image/consult.png') }}" align="left"></div> 
                                  <a href='/sconsult/{{$consultant->id}}' >
                                         <div class="consultations-planing" > запланувати консультацію</div>
                                    </a>
                            </div>
                         
                        
                    </div>
                </div>
                <hr class="col-xs-12 limit-line-w">
            </div>
        </div>
    @endforeach

    @include('newDesign.paginator', ['paginator' => $consultants])
</div>

@include('newDesign.jsForFilter')
