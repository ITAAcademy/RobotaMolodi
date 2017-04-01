
var arrResult = [];
var urlRoute;
var latitudeMap=50.45;
var longitudeMap=30.52;


function loadMap() {
	dfd = $.Deferred();
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=finishMapLoading";
	document.body.appendChild(script);
	return dfd.promise();
}
function finishMapLoading() {
	dfd.resolve();
}

function loadData(latMap, lngMap, zoomMap, map, geocoder, arrResult, arrCities, markers) {
	var LMap = loadMap();
	$.when( LMap).then( function() {
		var mapLatlng = new google.maps.LatLng(latMap, lngMap);
		var mapOptions = {
			zoom: zoomMap,
			center: mapLatlng
		};
		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		geocoder = new google.maps.Geocoder();
		for(var i=0; i<arrResult.length; i++) {
			geocodeAddress(geocoder, map, arrResult[i], arrCities, markers);
		}
		map.addListener('click', function(e) {
		addMarkerClick(e.latLng, map, arrResult, arrCities, markers);
		});
		
	});
}
function geocodeAddress(geocoder, resultsMap, result, arrCities, markers) {
		var index = result-1;
		var address = arrCities[index];
		geocoder.geocode({'address': address}, function (results, status) {
			if (status === google.maps.GeocoderStatus.OK) {
				resultsMap.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: resultsMap,
					position: results[0].geometry.location
				});
				if(results[0]) {
					for (var i = 0; i < results[0].address_components.length; i++) {
						for (var j = 0; j < arrCities.length; j++) {
							if (results[0].address_components[i].long_name == arrCities[j]) {
								arrResult.push(j + 1);
								var markerArr = [];
								markerArr.push(marker);
								markerArr.push(arrCities[j]);
								markers.push(markerArr);
								ajaxSend(arrResult, urlRoute);
								break;
							}
						}
					}
				}
			} else {
				alert('Geocode was not successful for the following reason: ' + status);
			}
		})

}

function addMarkerClick(latLng, map, citiesRes, arrCities, markers) {
	var marker = new google.maps.Marker({
		position: latLng,
		map: map
	});
	var markerArr = [];
	var geocoder = new google.maps.Geocoder();
	geocoder.geocode({'latLng': marker.getPosition()},
		function(results, status){
			if (status == google.maps.GeocoderStatus.OK){
				if (results[0]){
					for(var i=0; i<results[0].address_components.length; i++){
						for(var j=0; j<arrCities.length; j++){
							if (results[0].address_components[i].long_name == arrCities[j]){
								citiesRes.push(j+1);
								markerArr.push(marker);
								markerArr.push(arrCities[j]);
								markers.push(markerArr);
								ajaxSend(citiesRes, urlRoute);
								break;
							}
						}
					}

				}
			}
		}

	)

}
	function ajaxSend(value, mapUrl) {
		$("div.list-group").empty();
		var city_id = value;
		var industry_id = $('[name=industry]').val();
		var specialisation = $('[name=spec]').val();
		var url = mapUrl;
		$.ajax({
			url: url,
			type: "POST",
			beforeSend: function (xhr) {
				var token = $('meta[name="csrf_token"]').attr('content');
				if (token) {
					return xhr.setRequestHeader('X-CSRF-TOKEN', token);
				}
			},
			data: {
				'specialisation_': specialisation,
				'city_id': city_id,
				'industry_id': industry_id,
			data: '{{$data}}'
			},

			success: function (json) {
				$('#selectCity').select2('val',city_id);
				$('.posts').html(json);

			}
		});
	}
function deleteMarker(arrMarkers, nameCity){
	for(var i = 0; i<arrMarkers.length; i++){
		if(arrMarkers[i][0] == nameCity){
			arrMarkers[i][1].setMap(null);
			arrMarkers.pop(i);
		}
	}
}

			