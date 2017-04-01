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

<script>
    function initMultiselect(container)
    {
        $(container).multiselect(
            {
                buttonWidth: '100%'
                , maxHeight: 200
                ,enableFiltering: true
                ,width: '100%'
                ,enableCaseInsensitiveFiltering: true
                ,filterPlaceholder: 'Пошук...'
                //,nSelectedText: '-Три і більше'
                ,includeSelectAllOption: true
                ,enableFullValueFiltering: true
                ,selectAllText: 'Вибрати все'

                ,buttonText: function(options, select)
            {
                if (options.length === 0)
                {
                    return 'Не вибрано...';
                }
                else if (options.length > 3)
                {
                    return 'Вибрано більше трьох';
                }
                else
                {
                    var labels = [];
                    options.each(function() {
                        if ($(this).attr('label') !== undefined) {
                            labels.push($(this).attr('label'));
                        }
                        else {
                            labels.push($(this).html());
                        }
                    });

                    var maxCountCharacters = 0;
                    if($(select).attr('name') == 'selected-region'){
                        maxCountCharacters = 18;
                    }else {
                        maxCountCharacters = 55;
                    }


                    if(labels.length == 1){
                        var strLabel = labels.join(', ') + '';
                        return strLabel.length >= maxCountCharacters ? strLabel.slice(0, maxCountCharacters) + "."
                            : strLabel;
                    }else if(labels.length == 2){
                        if((labels.join(', ') + '').length >= maxCountCharacters){
                            return labels[0].slice(0,maxCountCharacters / 2 - 1) + '., ' + labels[1].slice(0,maxCountCharacters / 2 - 1) + '.' ;
                        }else{
                            return labels.join(', ') + '';
                        }
                    }else{
                        if((labels.join(', ') + '').length >= 18){
                            return labels[0].slice(0,maxCountCharacters / 3 - 2) + '., ' + labels[1].slice(0,maxCountCharacters / 3 - 2) + '., ' +
                                labels[2].slice(0,maxCountCharacters / 3 - 2) + '.';
                        }else{
                            return labels.join(', ') + '';
                        }
                    }
                }
            }
            });
    };
</script>
<script>
    $(document).ready(function(){
        initMultiselect('.getting-list-selected-box');
    });
</script>