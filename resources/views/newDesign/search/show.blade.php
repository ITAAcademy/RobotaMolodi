@section('headLinks')
    <style>
        .multiselect-container > li.not-found-message {
            display: none;
            padding: 5px 0 10px 20px;
        }
    </style>
    <link href="{{ asset('/css/searchShow.css') }}" rel="stylesheet">
    {!!Html::script('js/script.js')!!}
@endsection

<div class="row list-section-filter animated fadeIn">
    <div class="col-md-2 wrapper-list" id="list-selected-region">
        <div class="col-xs-12 wrapper-list-label-box" id="label-region">
            <img src="{{ asset('/image/region.png') }}" align="left">
            <label>{{ trans('content.region') }}</label>
        </div>
        <!-- Build select: -->
        <div class="col-xs-12 wrapper-list-select-box">
            <select class="getting-list-selected-box" data-placeholder="Вся країна" multiple="multiple"
                    name="selected-region">
                @if(Session::has('regions'))
                    @foreach($cities as $city)
                        <option value={{$city->id}} {{$city->id == Session::get('regions') ? 'selected' : ''}}>
                            {{$city->name}}
                        </option>
                    @endforeach
                @else
                    @foreach($cities as $city)
                        <option value={{$city->id}}>{{$city->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-5 wrapper-list" id="list-selected-indastry">
        <div class="col-xs-12 wrapper-list-label-box">
            <img src="{{ asset('/image/bell.png') }}" align="left">
            <label>{{ trans('content.activity') }}</label>
        </div>
        <!-- Build select: -->
        <div class="col-xs-12 wrapper-list-select-box">
            <select class="getting-list-selected-box" data-placeholder="Усі галузі" multiple="multiple"
                    name="selected-indastry">
                @if(Session::has('industries'))
                    @foreach($industries as $industry)
                        <option value={{$industry->id}} {{ $industry->id == Session::get('industries') ? 'selected' : ''}}>
                            {{$industry->name}}
                        </option>
                    @endforeach
                @else
                    @foreach($industries as $industry)
                        <option value={{$industry->id}}>{{$industry->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-5 wrapper-list" id="list-selected-specialization">
        <div class="col-xs-12 wrapper-list-label-box">
            <img src="{{asset('/image/spetials.png')}}" align="left">
            <label>{{ trans('content.specialty') }}</label>
        </div>
        <!-- Build select: -->
        <div class="col-xs-12 wrapper-list-select-box">
            <select class="getting-list-selected-box" data-placeholder="Усі спеціалізації" multiple="multiple" name="selected-specialization">
                @if(Session::has('specialisation'))
                    @foreach($specialisations as $specialisation)
                        <option {{ $specialisation == Session::get('specialisation') ? 'selected' : ''}}>
                            {{$specialisation}}
                        </option>
                    @endforeach
                @else
                    @foreach($specialisations as $specialisation)
                        <option>{{$specialisation}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        {{--{{ dd($specialisations) }}--}}
    </div>
</div>
<script>
    initMultiselect('.getting-list-selected-box');

    var notFoundLi = $('<li class="not-found-message"> За вашим запитом нічого не знайдено </li>');
    notFoundLi.addClass('not-found-message');
    $(document).ready(function () {
        $('#list-selected-specialization > div > div > ul').append(notFoundLi);
        $('input.multiselect-search').on('keyup', function () {
            var staticOption = 2;
            var list = $(this).parents('ul');
            setTimeout(function () {
                var hiddenOptions = list.find('li.filter-hidden').length;
                var totalOptions = list.find('li').not('.not-found-message').length;
                if (!(totalOptions - hiddenOptions - staticOption)) {
                    list.find('li.multiselect-all').addClass('hidden');
                    list.append(notFoundLi);
                    $('.not-found-message').show();
                } else {
                    list.find('li.multiselect-all').removeClass('hidden');
                    $('li.not-found-message').hide();
                }
            }, 300);
        });
        $(document).find('.list-section-filter').removeClass('fadeIn');
    });
</script>