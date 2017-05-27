<style>
    .multiselect-container>li.not-found-message{
        display: none;
        padding: 5px 0 10px 20px;
    }
</style>
<link href="{{ asset('/css/searchShow.css') }}" rel="stylesheet">

    <div class="row list-section-filter" >
        <div class="col-md-2 wrapper-list" id="list-selected-region">
            <div class="col-xs-12 wrapper-list-label-box" id ="label-region">
                <img src="{{ asset('/image/region.png') }}" alt="Регіон" align="left">
                <label>Регіон</label>
            </div>
            <!-- Build select: -->
            <div class="col-xs-12 wrapper-list-select-box" >
                <select class="getting-list-selected-box"  data-placeholder="Вся країна" multiple="multiple" name="selected-region">
                    @foreach($cities as $city)
                        <option value={{$city->id}}>{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-5 wrapper-list" id="list-selected-indastry">
            <div class="col-xs-12 wrapper-list-label-box">
                <img src="{{ asset('/image/bell.png') }}" alt="Сфера діяльності" align="left">
                <label>Сфера діяльності</label>
            </div>
            <!-- Build select: -->
            <div class="col-xs-12 wrapper-list-select-box">
                <select class="getting-list-selected-box" data-placeholder="Усі галузі" multiple="multiple" name="selected-indastry">
                    @foreach($industries as $industry)
                        <option value={{$industry->id}}>{{$industry->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-5 wrapper-list" id="list-selected-specialization">
            <div class="col-xs-12 wrapper-list-label-box">
                <img src="{{asset('/image/spetials.png')}}" alt="Сфера діяльності" align="left">
                <label>Спеціальність</label>
            </div>
            <!-- Build select: -->
            <div class="col-xs-12 wrapper-list-select-box">
                <select class="getting-list-selected-box" data-placeholder="Усі спеціалізації" multiple="multiple" name="selected-specialization">
                    @foreach($specialisations as $specialisation)
                        <option>{{$specialisation}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    {!!Html::script('js/script.js')!!}

<script>
    $(document).ready(function(){
        initMultiselect('.getting-list-selected-box');

        var notFoundLi = $('<li> За вашим запитом нічого не знайдено </li>');
        notFoundLi.addClass('not-found-message');

        $('input.multiselect-search').on('keyup', function(){
            var staticOption = 2;
            var list = $(this).parents('ul');
            setTimeout(function(){
                var hiddenOptions = list.find('li.filter-hidden').length;
                var totalOptions = list.find('li').not('.not-found-message').length;
                if(!(totalOptions - hiddenOptions - staticOption)){
                    list.find('li.multiselect-all').addClass('hidden');
                    list.append(notFoundLi);
                    $('.not-found-message').show();
                }else{
                    list.find('li.multiselect-all').removeClass('hidden');
                    $('li.not-found-message').hide();
                }
            },300);
        })
    });
</script>