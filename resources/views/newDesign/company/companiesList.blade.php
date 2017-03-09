<link href="{{ asset('/css/companies/companiesList.css') }}" rel="stylesheet">
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">

<div class="test">
    @foreach($companies as $company)
        <div class="col-xs-12 oll-companies-list">
            <div class="col-xs-3 imeg-companies-list">
                @if(File::exists(public_path('image/vacancy/' . $company->company_id . '.png')))
                    {!! Html::image('image/vacancy/' . $company->company_id . '.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/vacancy/' . $company->company_id . '.jpg')))
                    {!! Html::image('image/vacancy/' . $company->company_id . '.jpg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/vacancy/' . $company->company_id . '.jpeg')))
                    {!! Html::image('image/vacancy/' . $company->company_id . '.jpeg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @elseif(File::exists(public_path('image/vacancy/' . $company->company_id . '.bmp')))
                    {!! Html::image('vacancies' . $company->company_id . '.bmp', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                @else
                    <h3 class="nologo-companies-list">логотип вiдсутнiй</h3>
                @endif
            </div>
            <div class="col-xs-9 content-companies-list">
                <div class="section-links">
                    <div>
                        <a class="links-line-companies-list" href="/company/{{$company->id}}" >
                            <h3 class="name-companies-list">{{$company->company_name}}</h3>
                        </a>
                    </div>
                    <div class="amount-companies-list">
                        <p>  <a href="{{$company->url}}{{$company->id}}"  class="link">1 Вакансія</a></p>
                    </div>
                    <div class="row description-companies">
                        <div>{{strip_tags($company->description)}}</div>
                    </div>
                </div>
                <a class="links-line-companies-list" href="/company/{{$company->id}}">
                    <p class="read-next-link">Читати далі...</p>
                </a>
            </div>
            <hr class="col-xs-12 limit-line-w">
        </div>

    @endforeach

    <div class="row paginatorr">
        <hr>
        @if($companies->lastPage() > 1)
            <div class="sort-by">
                <p class="pag-text">Показувати по:</p>
                <div class="pag-block-by no-active-pag-block">20</div>
                <div class="pag-block-by active-pag-block">50</div>
                <div class="pag-block-by no-active-pag-block">100</div>
            </div>
            @include('newDesign.default', ['paginator' => $companies])
        @endif
    </div>

</div>
<script>
    $(document).ready(function () {
        $('.pag-block-by').click(function () {
            $('.active-pag-block').removeClass('active-pag-block');
            $(this).toggleClass('active-pag-block');
        })

        function getFilters() {
            return {
                regions: $('select[name="selected-region"]').val(),
                industries: $('select[name="selected-indastry"]').val(),
                specialisations: $('select[name="selected-specialization"]').val()
            }
        }

        $('.getting-list-selected-box').on('change',function () {
            $.ajax({
                url: '{{route('filter.companies')}}',
                data: getFilters(),
                success: function(data){
                    $('.test').html(data);
                }
            });
        })


        function click() {
            return {click:true};
        }

        $('.opsion-sort-box').click(function () {
            $.ajax({
                url: '{{route('filter.companies')}}',
                data: click(),
                success: function(data){
                    $('.test').html(data);
                }
            });
        })
    })
</script>