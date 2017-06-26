{{--{!! $companies->render(new App\Presenters\BootstrapTwoPresenter($companies)) !!}--}}
{{--<link href="{{ asset('/css/cabinet/cabinetMyResVacCom.css') }}" rel="stylesheet">--}}

{{--{!!Form::open(['route' => 'vacancyDestroy', 'method' => 'post', 'name' => 'filthForm', 'id' => 'aform'])!!}--}}
{{--<input type="hidden" name="filterName" id="filterName" xmlns="http://www.w3.org/1999/html"/>--}}
{{--<input type = "hidden" name = "filterValue" id = "filterValue"/>--}}
{{--{!!Form::close()!!}--}}

@foreach($companies as $company)
    <div class="one-for-cabinet">
        <div class="row">
            <div class="col-xs-12 col-md-2">
                <div class="panel panel-orange" id="vimg">
                    <a href="{{route('company.show', $company->id)}}">
                        @if(File::exists(public_path('image/company/' . $company->users_id .'/'. $company->image)) and $company->image != '')
                            {!! Html::image('image/company/' . $company->users_id .'/'. $company->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @else
                            <h3 class="nologo">логотип вiдсутнiй</h3>
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-10">
                <div class="panel-heading-cabinet">
                    <p class="position-cabinet">
                        <a class="orangColor-cabinet-name" href="{{route('company.show', $company->id)}}">{{$company->company_name}}</a>
                        <br>
                    </p>
                    <p class="description-cabinet">{!! strip_tags($company->description) !!}</p>
                    {{--<p class="name-cabinet"> {{ $company->Industry()->name}}</p>--}}
                </div>
                <div>
                    <p class="cityTime-cabinet">
{{--                        <span class="description-cabinet">@foreach($company->Cities() as $city){{ $city->name}} @endforeach</span>--}}
                        <span id="yellowCircle-cabinet">&#183;</span>
                        <span class="updateDate-cabinet-vac">{{ date('j m Y', strtotime($company->updated_at))}}</span>
                    </p>
                </div>
            </div>
        </div>
        {{--<div class="row">--}}
            {{--<div class="col-md-2"></div>--}}
            {{--<div class="col-md-10">--}}
                {{--<div class="col-xs-12 col-md-3">--}}
                    {{--<a class="orangColor-cabinet" href="/vacancy/{{$vacancy->id}}/destroy" onclick="return ConfirmDelete();">--}}
                        {{--<i class="fa fa-trash" aria-hidden="true"></i>--}}
                        {{--<span>видалити</span>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col-xs-12 col-md-3">--}}
                    {{--<a class="orangColor-cabinet" href="/vacancy/{{$vacancy->id}}/edit">--}}
                        {{--{!! Html::image('image/edit.png', 'del') !!}--}}
                        {{--<span>редагувати</span>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col-xs-12 col-md-3">--}}
                    {{--<a class="orangColor-cabinet" href="#">--}}
                        {{--{!! Html::image('image/podiumOrenge.png', 'del') !!}--}}
                        {{--<span> розмістити в ТОПі</span>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="col-xs-12 col-md-3">--}}
                    {{--<a class="orangColor-cabinet update-date-cab-vac" href="{{ route('updateVacancyDate', $vacancy->id) }}">--}}
                        {{--<i class="fa fa-calendar" aria-hidden="true"></i>--}}
                        {{--<span>Оновити дату вакансіїї</span>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    <hr class="line-sort-box">

<article>
    <div class="col-xs-3 imeg-companies-list">
        @if(File::exists(public_path('image/company/' . $company->users_id .'/'. $company->image)) and $company->image != '')
            {!! Html::image('image/company/' . $company->users_id .'/'. $company->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
        @else
            <h3 class="nologo">логотип вiдсутнiй</h3>
        @endif
    </div>
    <a href="/company/{{$company->id}}" class="link">
        <div class="list">
            <div class="panel panel-default">
                <div class="panel-heading">
               <h3 class="list-group-item-heading panel-title">{{$company->company_name}}</h3>
                </div>
                <div class="panel-body">
                    <h4 class="list-group-item-heading">{{ $company->company_email}}</h4>
                </div>
            </div>
        </div>
    </a>
</article>
@endforeach

{{--{!! $companies->render(new App\Presenters\BootstrapTwoPresenter($companies)) !!}--}}