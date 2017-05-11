{{--@extends('main/filter/ajax')--}}

@section('content')
    @include('newDesign/aboutUs/show')
    @include('newDesign/navTab/navTab')
    @include('newDesign/search/show')
    <div id="left-content-column" class="col-xs-9">
        @include('newDesign/sortAds/sort')
        @include('newDesign/vacancies/vacanciesList')
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" class="category" data-id="sliderUnderFooter" value="1">
        <div class="slider1"  style="padding-top: 60px"></div>
    </div>
    <div id="right-content-column" class="col-xs-3">
        @include('newDesign/vacancies/topVacancies')
        <input type="hidden" class="category2" data-id="sliderRightNews" value="2">
        <div class="slider2"></div>
        @include('newDesign/topNews')
    </div>
    {{--<div class="posts">--}}
        {{--@include('vacancy._vacancy')--}}
    {{--</div>--}}
    <script>
           $(document).ready(function() {
               $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});
               $.ajax({
                   url: '{{route('setCategory')}}',
                   data: { category: $('.category').val(),
                            slider: $('.category').attr('data-id')},
                   type: 'POST',
                   success: function (data) {
                       $('.slider1').html(data);
                   }
               });

               $.ajax({
                   url: '{{route('setCategory')}}',
                   data: { category: $('.category2').val(),
                           slider: $('.category2').attr('data-id')},
                   type: 'POST',
                   success: function (data) {
                       $('.slider2').html(data);
                   }
               });



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
//                for (var i = 0; i < allCities.options.length; i++) {
//                    arrCities[i] = allCities.options[i].text;
//                }

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
        {{--@if($search_boolean)--}}
            {{--fakeFilter('{{$search_boolean}}', '{{$data}}', 'showVacancies');--}}
         {{--@endif--}}
    </script>

@stop
