{{--{!! $vacancies->render(new App\Presenters\BootstrapTwoPresenter($vacancies)) !!}--}}

<link href="{{ asset('/css/cabinet/cabinetMyResVacCom.css') }}" rel="stylesheet">

{!!Form::open(['route' => 'vacancyDestroy', 'method' => 'post', 'name' => 'filthForm', 'id' => 'aform'])!!}
<input type="hidden" name="filterName" id="filterName" xmlns="http://www.w3.org/1999/html"/>
<input type = "hidden" name = "filterValue" id = "filterValue"/>
{!!Form::close()!!}

@foreach($vacancies as $vacancy)
    <div class="one-for-cabinet">
        <div class="row">
            <div class="col-xs-12 col-md-2">
                <div class="panel panel-orange" id="vimg">
                    <a href="{{route('vacancy.show', $vacancy->id)}}">
                        @if(File::exists(public_path('image/company/' . $vacancy->Company->users_id .'/'. $vacancy->Company->image)) and $vacancy->Company->image != '')
                            {!! Html::image('image/company/' . $vacancy->Company->users_id .'/'. $vacancy->Company->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @else
                            <h3 style="text-align: center; color: #f48952; margin-top: 40px">логотип вiдсутнiй</h3>
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-10">
                <div class="panel-heading-cabinet">
                    <p class="position-cabinet">
                        <a class="orangColor-cabinet-name" href="{{route('vacancy.show', $vacancy->id)}}">{!!$vacancy->position!!}</a>
                        <br>
                    </p>
                    <p class="price-cabinet">
                        <span>{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</span>
                    </p>
                    <p class="description-cabinet">{!! strip_tags($vacancy->description) !!}</p>
                    <p class="name-cabinet"> {{ $vacancy->company->company_name}}</p>
                </div>
                <div>
                    <p class="cityTime-cabinet">
                        <span class="description-cabinet">@foreach($vacancy->Cities()->get() as $city){{ $city->name}} @endforeach</span>
                        <span id="yellowCircle-cabinet">&#183;</span>
                        <span class="updateDate-cabinet-vac">{{ date('j m Y', strtotime($vacancy->updated_at))}}</span>

                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="col-xs-12 col-md-3">
                    <a class="orangColor-cabinet" href="/vacancy/{{$vacancy->id}}/destroy" onclick="return ConfirmDelete();">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        <span>видалити</span>
                    </a>
                </div>
                <div class="col-xs-12 col-md-3">
                    <a class="orangColor-cabinet" href="/vacancy/{{$vacancy->id}}/edit">
                        {!! Html::image('image/edit.png', 'del') !!}
                        <span>редагувати</span>
                    </a>
                </div>
                <div class="col-xs-12 col-md-3">
                    <a class="orangColor-cabinet" href="#">
                        {!! Html::image('image/podiumOrenge.png', 'del') !!}
                        <span> розмістити в ТОПі</span>
                    </a>
                </div>
                <div class="col-xs-12 col-md-3">
                    <a class="orangColor-cabinet update-date-cab-vac" href="{{ route('updateVacancyDate', $vacancy->id) }}">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span>Оновити дату вакансіїї</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr class="line-sort-box">
    @endforeach
{{--{!! $vacancies->render(new App\Presenters\BootstrapTwoPresenter($vacancies)) !!}--}}

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

    });

    function ConfirmDelete() {
        var conf = confirm("Ви дійсно хочете видалити вакансію?");

        if(conf){
            return true;
        } else{
            return false;
        }
    }

    $('.update-date-cab-vac').click(function (e) {
        var href = $(this).attr('href');
        var dateElement = $('.updateDate-cabinet-vac');
        e.preventDefault();
        $.ajax({
            url: href,
            method: 'post',
            success: function (data) {
                dateElement.text(data);
                dateElement.css('backgroundColor','orange');
                dateElement.animate({ backgroundColor: "white" }, "slow");
            }
        })
    })
</script>