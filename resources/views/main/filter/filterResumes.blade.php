@extends('main/filter/ajax')
@section('Create_res_vac')
    <h4 class="btn btn-default" style="background:wheat; color:#ffffff; ">{!! link_to_route('vacancy.create', 'Створити вакансію') !!}</h4>
@stop
@section('panelTitle')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <li role = "presentation" ><a href={{route('head')}}><span>{!! Html::image('image/allvacancies.png','Головна',['id'=>'allvacancies']) !!}</span> Всі вакансії</a></li>
    <li role = "presentation" class="active"><a href={{route('main.resumes')}}><span>{!! Html::image('image/allresumes.png','Головна',['id'=>'allresumes']) !!}</span> Всі резюме</a></li>
    <li role = "presentation"><a href={{route('main.companies')}}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span> Всі компанії</a></li>

@stop

@section('category')

    <div class="posts">
        @include('Resume._resume')
    </div>
    <script>
        $(document).ready(function() {
            $('#selectIndustry').change(function(){
                $("div.list-group").empty();
                var city_id = $('[name=city]').val();
                var industry_id = $('[name=industry]').val();
				var specialisation = $('[name=spec]').val();

                  var url = 'showResumes';
          $.ajax({
							url: url,
							type: "POST",
							 beforeSend: function (xhr) {
									var token = $('meta[name="csrf_token"]').attr('content');

									if (token) {
										return xhr.setRequestHeader('X-CSRF-TOKEN', token);
									}
								},
							data: {'specialisation_': specialisation,'city_id': city_id, 'industry_id': industry_id,data:'{{$data}}'},
							success: function (json) {
								$('.posts').html(json);

							}
						});
            });
            /////////////////////////////////
            $('#selectCity').change(function(){
                $("div.list-group").empty();
                var city_id = $('[name=city]').val();
                var industry_id = $('[name=industry]').val();
                var specialisation = $('[name=spec]').val();

                  var url = 'showResumes';
			$.ajax({
							url: url,
							type: "POST",
							 beforeSend: function (xhr) {
									var token = $('meta[name="csrf_token"]').attr('content');

									if (token) {
										return xhr.setRequestHeader('X-CSRF-TOKEN', token);
									}
								},
							data: {'specialisation_': specialisation,'city_id': city_id, 'industry_id': industry_id,data:'{{$data}}'},
							success: function (json) {
								$('.posts').html(json);

							}
						});


            });
			  $('#selectSpecialisation').change(function(){
                $("div.list-group").empty();
                var city_id = $('[name=city]').val();
                var industry_id = $('[name=industry]').val();
				        var specialisation = $('[name=spec]').val();

                  var url = 'showResumes';
				$.ajax({
							url: url,
							type: "POST",
							 beforeSend: function (xhr) {
									var token = $('meta[name="csrf_token"]').attr('content');

									if (token) {
										return xhr.setRequestHeader('X-CSRF-TOKEN', token);
									}
								},
							data: {'specialisation_': specialisation,'city_id': city_id, 'industry_id': industry_id,data:'{{$data}}'},
							success: function (json) {
								$('.posts').html(json);

							}
						});
            });
        });

        @if($search_boolean)
            fakeFilter('{{$search_boolean}}', '{{$data}}', 'showResumes');
        @endif
    </script>
@stop
