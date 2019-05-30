<link href="{{ asset('/css/vacancies/vacanciesList.css') }}" rel="stylesheet">
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">
<div class="test">
    <div>
    @foreach($vacancies as $vacancy)

                <div>
                        <div class="section">
                            <a class="links ib-block" href="/vacancy/{{$vacancy->id}}">
                                <h3>{{ $vacancy->position}}</h3>
                            </a>
                            <h4>
                                <strong>{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</strong>
                            </h4>
                            <p class="overflow text-left"> {{strip_tags($vacancy->description)}} </p>
                        </div>

                <div class="section-link__right">
                   <a class="links ib-block" href="/vacancy/{{$vacancy->id}}">
                        <p class="read-next">{{ trans('content.read_next') }}</p>
                    </a>
                </div>


                <div class="below-section">
                    <span>{{ $vacancy->company->company_name}}</span>
                </div>

                <div class="ratings">
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

                <p class="links ib-block">
                    <div class="line">
                        <span class="town">@foreach($vacancy->Cities()->get() as $city){{ $city->name}} @endforeach</span>
                        <span class="drop">&bull;</span>
                        <span class="data">{{date('j m Y', strtotime($vacancy->updated_at))}}</span>
                    </div>
                </p>
                <hr>
            </div>

    @endforeach
            </div>
    @include('newDesign.paginator', ['paginator' => $vacancies])
</div>

@include('newDesign.jsForFilter')
