<link href="{{ asset('/css/companies/companiesList.css') }}" rel="stylesheet">
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">

<div class="test">
    @foreach($consultants as $consultant)
        <div class="row">
            <div class="col-xs-12 oll-companies-list">
                <div class="col-xs-3 imeg-companies-list">
                    @if(File::exists(public_path('image/consult/' . $consultant->users_id .'/'. $consultant->image)) and $consultant->image != '')
                        {!! Html::image('image/consult/' . $consultant->users_id .'/'. $consultant->image, 'logo', ['id' => 'conImg', 'width' => '100%', 'height' => '100%']) !!}
                    @else
                        {!! Html::image('image/consultant_tmp.png', 'logo', array('id' => 'conImg', 'width' => '100%', 'height' => '100%')) !!}
                    @endif
                </div>
                <div class="col-xs-9 content-companies-list">
                    <div class="section-links">
                        <div>
                            <h3 class="name-consultants-list">
                                <span>{{ $consultant->user->name}}</span>
                            </h3>
                        </div>
                        <div class="ratings">
                            <span class = "ratingsTitle">{{ trans('content.rating') }}</span>
                            <span class="morph">
                                {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike']) !!}
                                {{--<span class="findLike" id="{{route('com.rate', $consultant->id)}}_1">{{$consultant->rated()->getLikes($consultant)}}</span>--}}
                            </span>
                            <span class="morph">
                                {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike']) !!}
                                {{--<span class="findDislike" id="{{route('com.rate', $consultant->id)}}_-1">{{$consultant->rated()->getDisLikes($consultant)}}</span>--}}
                            </span>
                            <span class="likeError"></span>
                        </div>
                        <div class="row description-companies">
                            <div>{{strip_tags($consultant->description)}}</div>
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
