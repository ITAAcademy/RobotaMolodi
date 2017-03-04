{{--@extends('main/filter/ajax')--}}
{{--@section('Create_res_vac')--}}
    {{--<h4 class="btn btn-default" style="background:#f5f5f5; color:#ffffff; ">{!! link_to_route('vacancy.create', 'Створити вакансію') !!}</h4>--}}
{{--@stop--}}
{{--@section('panelTitle')--}}
    {{--<meta name="csrf_token" content="{{ csrf_token() }}" />--}}
    {{--<li role = "presentation" id="presVac"><a href={{route('head')}}><span>{!! Html::image('image/allvacancies.png','Головна',['id'=>'allvacancies']) !!}</span> Всі вакансії</a></li>--}}
    {{--<li role = "presentation" id="presRes" class="active"><a href={{route('main.resumes')}}><span>{!! Html::image('image/allresumes.png','Головна',['id'=>'allresumes']) !!}</span> Всі резюме</a></li>--}}
    {{--<li role = "presentation" id="presComp"><a href={{route('main.companies')}}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span> Всі компанії</a></li>--}}

{{--@stop--}}

@section('content')
	@include('newDesign/aboutUs/show')

	@include('newDesign/navTab/navTab')
	@include('newDesign/search/show')
	<div class="col-xs-9">
		@include('newDesign/sortAds/sort')
		@include('newDesign/resume/resumesList')
	</div>
	<div class="col-xs-3">
		@include('newDesign/vacancies/topVacancies')
		@include('newDesign/topNews')
	</div>
	{{--@section('category')--}}

	{{--<div class="posts">--}}
	{{--@include('Resume._resume')--}}
	{{--</div>--}}
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
