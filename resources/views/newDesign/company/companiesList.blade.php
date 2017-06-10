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
                        <h3 class="nologo-companies-list">логотип вiдсутнiй</h3>
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
                            <span class = "ratingsTitle">Рейтинг:</span>
                            <span class="morph">
                                {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike', 'id'=>'like']) !!}
                                <span class="findLike" id="{{$company->id}}_1">{{$company->getLikes()}}</span>
                            </span>
                            <span class="morph">
                                {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike', 'id'=>'dislike']) !!}
                                <span class="findDislike" id="{{$company->id}}_-1">{{$company->getDisLikes()}}</span>
                            </span>
                            <span class="likeError"></span>
                        </div>

                        <div class="amount-companies-list">
    {{--                        <p>  <a href="{{route('main.showVacancies', $company->id)}}" class="link">Вакансій</a></p>--}}
                            <p>  <a href="/company/{{$company->id}}" class="showCompanyVacancies"><span class="vacancy-text">Вакансій</span> {{$company->Vacancies()->count()}}</a></p>
                        </div>
                        <div class="row description-companies">
                            <div>{{strip_tags($company->description)}}</div>
                        </div>
                    </div>
                    <div>
                        <p class="read-next-link"><a class="next-com-list" href="/company/{{$company->id}}">Читати далі...</a></p>
                    </div>
                </div>
                <hr class="col-xs-12 limit-line-w">
            </div>
        </div>
    @endforeach

    @include('newDesign.paginator', ['paginator' => $companies])
</div>

@include('newDesign.jsForFilter', ['urlController' => 'filter.companies'])

{!!Html::script('js/liker.js')!!}
<script>
    $('.likeDislike').click(function (e) {
        e.preventDefault();

        var elementId = (this.nextElementSibling.getAttribute('id')).split('_')[0];
        var routeUri = "{{ route($company->getNameTable(), $company->id) }}".replace(String({!! $company->id !!}), elementId);
        var log = Boolean({!! Auth::check() !!});

        if (log != 1) {
            $(this.parentNode.parentNode.lastElementChild).text("Увійдіть або зареєструйтесь!").css('color', 'red').animate({color: "white"}, "slow");
            return false;
        }
        liker(e.target, routeUri);
    });
</script>

