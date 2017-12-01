<link href="{{ asset('/css/companies/companiesList.css') }}" rel="stylesheet">
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">

<div class="test">
    @foreach($companies as $company)
        <div class="row">
            <div class="col-xs-12 oll-companies-list">
                <div class="col-xs-3 imeg-companies-list">
                    @if(File::exists(public_path('image/company/' . $company->users_id .'/'. $company->image)) and $company->image != '')
                        {!! Html::image('image/company/' . $company->users_id .'/'. $company->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                    @else
                        {!! Html::image('image/company_tmp.png', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                    @endif
                </div>
                <div class="col-xs-9 content-companies-list">
                    <div class="section-links">
                        <div>
                            <h3 class="name-companies-list">
                                <a class="links-line-companies-list" href="/company/{{$company->id}}" >{{$company->company_name}}</a>
                            </h3>
                        </div>

                        <div class="ratings">
                            <span class = "ratingsTitle">{{ trans('content.rating') }}</span>
                            <span class="morph">
                                {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike']) !!}
                                <span class="findLike" id="{{route('com.rate', $company->id)}}_1">{{$company->rated()->getLikes($company)}}</span>
                            </span>
                            <span class="morph">
                                {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike']) !!}
                                <span class="findDislike" id="{{route('com.rate', $company->id)}}_-1">{{$company->rated()->getDisLikes($company)}}</span>
                            </span>
                            <span class="likeError"></span>
                        </div>

                        <div class="amount-companies-list">
    {{--                        <p>  <a href="{{route('main.showVacancies', $company->id)}}" class="link">
        {{ trans('content.vsc') }}
    </a></p>--}}
                            <p>  <a href="/company/{{$company->id}}" class="showCompanyVacancies"><span class="vacancy-text">{{ trans('content.vac') }}</span> {{$company->Vacancies()->count()}}</a></p>
                        </div>
                        <div class="row description-companies">
                            <div>{{strip_tags($company->description)}}</div>
                        </div>
                    </div>
                    <div>
                        <p class="read-next-link"><a class="next-com-list" href="/company/{{$company->id}}">{{ trans('content.read_next') }}</a></p>
                    </div>
                </div>
                <hr class="col-xs-12 limit-line-w">
            </div>
        </div>
    @endforeach

    @include('newDesign.paginator', ['paginator' => $companies])

</div>

@include('newDesign.jsForFilter')
