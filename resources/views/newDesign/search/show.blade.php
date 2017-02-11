
@section('searchShows')
    {{--<link href="{{ asset('/css/searchShows.css') }}" rel="stylesheet">--}}
@endsection


    <div class="row list-section" >
        <div class="col-md-2 wrapper-list" id="list-selected-region">
            <div class="col-xs-12 wrapper-list-label-box" id ="label-region">
                <img src="image/region.png" alt="Регіон" align="left">
                <label>Регіон</label>
            </div>
            <!-- Build select: -->
            <div class="col-xs-12 wrapper-list-select-box" >
                <select class="getting-list-selected-box"  data-placeholder="Вся країна" multiple="multiple" name="selected-region">
                    <option value="1">АР Крим</option>
                    <option value="2">Вінниця</option>
                    <option value="3">Волинь</option>
                    <option value="4">Донецька</option>
                    <option value="5">Дніпропетровсяка</option>
                    <option value="6">Житомирська</option>
                    <option value="7">Кіровоградська</option>
                    <option value="8">Луганська</option>
                    <option value="9">Хмельницька</option>
                </select>
            </div>
        </div>
        <div class="col-md-5 wrapper-list" id="list-selected-indastry">
            <div class="col-xs-12 wrapper-list-label-box">
                <img src="image/bell.png" alt="Сфера діяльності" align="left">
                <label>Сфера діяльності</label>
            </div>
            <!-- Build select: -->
            <div class="col-xs-12 wrapper-list-select-box">
                <select class="getting-list-selected-box" data-placeholder="Усі галузі" multiple="multiple" name="selected-indastry">
                    <option value="1">Соцільна сфера</option>
                    <option value="2">Державна служба/Державний сектор</option>
                    <option value="3">Медицина</option>
                    <option value="4">ІТ</option>
                    <option value="5">ЖКХ</option>
                    <option value="6">Будівництво</option>
                    <option value="7">Торгівля</option>
                    <option value="8">Реклама</option>
                </select>
            </div>
        </div>
        <div class="col-md-5 wrapper-list" id="list-selected-specialization">
            <div class="col-xs-12 wrapper-list-label-box">
                <img src="image/spetials.png" alt="Сфера діяльності" align="left">
                <label>Спеціальність</label>
            </div>
            <!-- Build select: -->
            <div class="col-xs-12 wrapper-list-select-box">
                <select class="getting-list-selected-box" data-placeholder="Усі спеціалізації" multiple="multiple" name="selected-specialization">
                    <option value="1">Программер</option>
                    <option value="2">Спеціаліст по тяжким випадкам</option>
                    <option value="3">Спеціаліст по викопуванню</option>
                    <option value="4">Тестировщик лопат</option>
                    <option value="5">Няня для програміста</option>
                    <option value="6">Говорун</option>
                    <option value="7">Менеджер по роботі з кліетнами</option>
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