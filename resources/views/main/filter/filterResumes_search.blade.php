@extends('main/filter/ajax')
@section('Create_res_vac')
    <h4 class="btn btn-default" style="background:wheat; color:#ffffff; ">{!! link_to_route('vacancy.create', 'Створити вакансію') !!}</h4>
@stop
@section('panelTitle')
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <li role = "presentation" ><a href={{route('head','Всі вакансії')}}><span>{!! Html::image('image/allvacancies.png','Головна',['id'=>'allvacancies']) !!}</span> Всі вакансії</a></li>
    <li role = "presentation" class="active"><a href={{route('main.resumes' ,'Всі резюме')}}><span>{!! Html::image('image/allresumes.png','Головна',['id'=>'allresumes']) !!}</span> Всі резюме</a></li>
@stop

@section('category')

    <div class="posts">
        @include('main.filter.resume')
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="js/pagination.js"></script>
    <script>

        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getPosts(page);
                }
            }
        });
        $(document).ready(function() {
            $(document).on('click','.pagination a' , function (e) {
                getPosts($(this).attr('href').split('page=')[1]);
                e.preventDefault();
            });
          
            /////////////////////////////////////
            $('#selectIndustry').change(function(){
                $("div.list-group").empty();
                var city_id = $('[name=city]').val();
                var industry_id = $('[name=industry]').val();
                var url = 'searchResumes';
				var speccc = $('[name=spec]').val();
          $.ajax({
							url: url,
							type: "POST",
							 beforeSend: function (xhr) {
									var token = $('meta[name="csrf_token"]').attr('content');

									if (token) {
										return xhr.setRequestHeader('X-CSRF-TOKEN', token);
									}
								},
							data: {'specialisation_': speccc,'city_id': city_id, 'industry_id': industry_id,data:'{{$data}}'},
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
				        var speccc = $('[name=spec]').val();
                var url = 'searchResumes';
			$.ajax({
							url: url,
							type: "POST",
							 beforeSend: function (xhr) {
									var token = $('meta[name="csrf_token"]').attr('content');

									if (token) {
										return xhr.setRequestHeader('X-CSRF-TOKEN', token);
									}
								},
							data: {'specialisation_': speccc,'city_id': city_id, 'industry_id': industry_id,data:'{{$data}}'},
							success: function (json) {
								$('.posts').html(json);

							}
						});


            });
			  $('#selectSpecialisation').change(function(){
                $("div.list-group").empty();
                var city_id = $('[name=city]').val();
                var industry_id = $('[name=industry]').val();
				var speccc = $('[name=spec]').val();
                var url = 'searchResumes';
				$.ajax({
							url: url,
							type: "POST",
							 beforeSend: function (xhr) {
									var token = $('meta[name="csrf_token"]').attr('content');

									if (token) {
										return xhr.setRequestHeader('X-CSRF-TOKEN', token);
									}
								},
							data: {'specialisation_': speccc,'city_id': city_id, 'industry_id': industry_id,data:'{{$data}}'},
							success: function (json) {
								$('.posts').html(json);

							}
						});
            });
        });

    </script>
@stop
