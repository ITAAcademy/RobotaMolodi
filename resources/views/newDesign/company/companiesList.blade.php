<link href="{{ asset('/css/companies/companiesList.css') }}" rel="stylesheet">
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">

<div class="test">
    @foreach($companies as $company)
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

    @endforeach

    <div class="row paginatorr">
        <hr>
        @if($companies->lastPage() > 1)
            <div class="sort-by hidden"> {{--for open need delete class "hidden"--}}
                <p class="pag-text">Показувати по:</p>
                <div class="pag-block-by no-active-pag-block">5</div>
                <div class="pag-block-by active-pag-block">10</div>
                <div class="pag-block-by no-active-pag-block">15</div>
            </div>
            @include('newDesign.default', ['paginator' => $companies])
        @endif
    </div>

</div>

@include('newDesign.jsForFilter', ['urlController' => 'filter.companies'])

