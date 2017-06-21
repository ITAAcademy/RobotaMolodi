<link href="{{ asset('/css/vacancies/vacanciesList.css') }}" rel="stylesheet">
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">
<div class="test">
    @foreach($vacancies as $vacancy)
            <div>
                <div class="section">
                    <a class="links" href="/vacancy/{{$vacancy->id}}">
                        <h3>{{ $vacancy->position}}</h3>
                    </a>
                    <h4>
                        <strong>{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</strong>
                    </h4>
                    <p class="text-left"> {{strip_tags($vacancy->description)}} </p>
                </div>

                <a class="links" href="/vacancy/{{$vacancy->id}}">
                    <p class="read-next">Читати далі...</p>
                </a>

                <div class="below-section">
                    <span>{{ $vacancy->company->company_name}}</span>
                </div>

                <div class="ratings">
                    <span class = "ratingsTitle">Рейтинг:</span>
                    <span class="morph">
                        {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike', 'id'=>'like']) !!}
                        <span class="findLike" id="{{route('res.rate', $vacancy->id)}}_1">{{$vacancy->rated()->getLikes($vacancy)}}</span>
                    </span>
                    <span class="morph">
                        {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike', 'id'=>'dislike']) !!}
                        <span class="findDislike" id="{{route('res.rate', $vacancy->id)}}_-1">{{$vacancy->rated()->getLikes($vacancy)}}</span>
                    </span>
                    <span class="likeError"></span>
                </div>

                <a class="links" href="#">
                    <div class="line">
                        <span class="town">@foreach($vacancy->Cities()->get() as $city){{ $city->name}} @endforeach</span>
                        <span class="drop">&bull;</span>
                        <span class="data">{{date('j m Y', strtotime($vacancy->updated_at))}}</span>
                    </div>
                </a>
                <hr>
            </div>
    @endforeach

    @include('newDesign.paginator', ['paginator' => $vacancies])
</div>

@include('newDesign.jsForFilter', ['urlController' => 'filter.vacancies'])

{!!Html::script('js/liker.js')!!}
<script>
    $('.likeDislike').click(function (e) {
        e.preventDefault();

        var elementId = (this.nextElementSibling.getAttribute('id')).split('_')[0];
        var log = Boolean({!! Auth::check() !!});

        if (log != 1) {
            $(this.parentNode.parentNode.lastElementChild).text("Увійдіть або зареєструйтесь!").css('color', 'red').animate({color: "white"}, "slow");
            return false;
        }
        liker(e.target, elementId);
    });
</script>