@extends('app')

@section('content')
	@include('newDesign.scrollup')
	@include('newDesign/aboutUs/show')

	@include('newDesign/navTab/navTab')
	@include('newDesign/search/show')
	<div id="left-content-column" class="col-sm-9">
		@include('newDesign/sortAds/sort')
		@include('newDesign/resume/resumesList')
		@include('newDesign/sliders/byCategory', ['viewName' => 'underFooter', 'category' => 1])
	</div>
	<div id="right-content-column" class="col-sm-3">
		@include('newDesign/vacancies/topVacancies')
		@include('newDesign/sliders/byCategory', ['viewName' => 'news', 'category' => 2])
		@include('newDesign/topNews')
	</div>
	{{--@section('category')--}}

	{{--<div class="posts">--}}
	{{--@include('Resume._resume')--}}
	{{--</div>--}}
	{!!Html::script('js/scrollup.js')!!}
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
			var urlRoute = 'showResumes';
//			for (var i = 0; i < allCities.options.length; i++) {
//				arrCities[i] = allCities.options[i].text;
//			}
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
//				console.log(nameRemoveCity);
				deleteMarker(markers, nameRemoveCity);
//                    console.log(evt);
				citiesRes.pop(idRemoveCity);
//                    console.log(citiesRes);
				ajaxSend(citiesRes, urlRoute);
			});
			//-----------------event-add-to-select-cities----------------------------
			$('#selectCity').on('select2:select',function (evt) {
				idAddCity = evt.params.data.id;
				citiesRes.push(idAddCity);
//                    addAddress(geocoder, map, arrCities[idAddCity]);
				console.log( $('#selectCity').select2('val'));
				ajaxSend($('[name=city]').select2().val(), urlRoute);
//				console.log(markers);
			});
			//-----------------event-select-in-select-industries----------------------------
			$('#selectIndustry').change(function () {
				ajaxSend($('[name=city]').select2().val(), urlRoute);
			});
			//-----------------event-select-in-select-specializations----------------------------
			$('#selectSpecialisation').change(function () {
				ajaxSend($('[name=city]').select2().val(), urlRoute);
			});



//			allCities = document.getElementById("selectCity");
//			arrCities = new Array;
//			markers = new Array;
//			urlRoute = 'showResumes';
//			for (var i = 0; i < allCities.options.length; i++) {
//				arrCities[i] = allCities.options[i].text;
//			}
//			$('#selectIndustry').change(function () {
//				ajaxSend($('[name=city]').val(), urlRoute);
//			});
//			$('#selectCity').change(function () {
//				ajaxSend($('[name=city]').val(), urlRoute);
//			});
//			$('#selectSpecialisation').change(function () {
//				ajaxSend($('[name=city]').val(), urlRoute);
//			});
		});
        {{--@if($search_boolean)--}}
            {{--fakeFilter('{{$search_boolean}}', '{{$data}}', 'showResumes');--}}
        {{--@endif--}}
    </script>
@stop
