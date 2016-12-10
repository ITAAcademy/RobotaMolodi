@extends('main/filter/ajax')
@section('Create_res_vac')
    <h4 class="btn btn-default" style="background:#f5f5f5;/*Stoha*/ color:#ffffff;">{!! link_to_route('resume.create', 'Написати резюме') !!}</h4>
@stop
@section('panelTitle')
    <li role = "presentation" id="presVac" class="active"><a href={{route('head')}}><span>{!! Html::image('image/allvacancies.png','Vac',['id'=>'allvacancies']) !!}</span> Всі вакансії</a></li>
    <li role = "presentation" id="presRes"><a href={{route('main.resumes')}}><span>{!! Html::image('image/allresumes.png','Res',['id'=>'allresumes']) !!}</span> Всі резюме</a></li>
	<li role = "presentation"><a href={{route('main.companies')}}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span> Всі компанії</a></li>
@stop

@section('category')

    <div class="posts">
        @include('vacancy._vacancy')
    </div>
    <script>
           $(document).ready(function() {
                $('#selectCity').select2({
                    placeholder: 'Вся Україна',
                });
                var map;
                var geocoder;
                var markers = [];
                var idAddCity;
                var allCities = document.getElementById("selectCity");
                var arrCities = new Array;
                var citiesRes = new Array;
                var urlRoute = 'showVacancies';
                for (var i = 0; i < allCities.options.length; i++) {
                    arrCities[i] = allCities.options[i].text;
                }

    //------------------event-click-on-button-map-------------------------------
                $('#collapseButton').one('click', function(){
                    longitudeMap = ymaps.geolocation.longitude;
                    latitudeMap = ymaps.geolocation.latitude;
                    var locationCity = ymaps.geolocation.city;
                    for (var i = 0; i <= arrCities.length; i++) {
                        if(arrCities[i] == locationCity)
                        {
                            if(citiesRes.length ==0){
                                citiesRes.push(i+1);
                                ajaxSend(citiesRes, urlRoute);
                                break;
                            }
                        }
                    }
                    loadData(latitudeMap, longitudeMap, 8, map, geocoder, citiesRes, arrCities, markers);
                    $('#selectCity').select2('val', citiesRes);

                });
    //-----------------event-remove-from-select-cities----------------------------
                $('#selectCity').on('select2:unselect', function (evt) {
                    var idRemoveCity = evt.params.data.id;
                    var nameRemoveCity = evt.params.data.text;
                    deleteMarker(markers, nameRemoveCity);
                    citiesRes.pop(idRemoveCity);
                    ajaxSend(citiesRes, urlRoute);
                });
    //-----------------event-add-to-select-cities----------------------------
                $('#selectCity').on('select2:select',function (evt) {
                    idAddCity = evt.params.data.id;
                    citiesRes.push(idAddCity);
                    ajaxSend($('[name=city]').select2().val(), urlRoute);
                });
    //-----------------event-select-in-select-industries----------------------------
                $('#selectIndustry').change(function () {
                    ajaxSend($('[name=city]').select2().val(), urlRoute);
                });
    //-----------------event-select-in-select-specializations----------------------------
                $('#selectSpecialisation').change(function () {
                    ajaxSend($('[name=city]').select2().val(), urlRoute);
                });
            });
        @if($search_boolean)
            fakeFilter('{{$search_boolean}}', '{{$data}}', 'showVacancies');
         @endif
    </script>

@stop
