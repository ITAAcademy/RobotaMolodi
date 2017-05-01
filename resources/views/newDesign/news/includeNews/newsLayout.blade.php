<!DOCTYPE html>
<html lang="en" xmlns:style="http://www.w3.org/1999/xhtml">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Robota Molodi</title>

		<!-- Main styles -->
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/aboutUsShow.css') }}" rel="stylesheet">

		@yield('head')

		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<!-- jQuery Bootstrap Ajax -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		@yield('headLinks')

	</head>

	<body>

		<div class="container-fluid container-main">
			@include('header/header')
			@include('main/mainContent')
		</div>

		<footer>
			@include('footer/footer')
		</footer>

		<script>
//-------------------Google Analytics Script-------------------//
			(function (i, s, o, g, r, a, m) {
			    i['GoogleAnalyticsObject'] = r;
			    i[r] = i[r] || function () {
			        (i[r].q = i[r].q || []).push(arguments)
			    }, i[r].l = 1 * new Date();
			    a = s.createElement(o),
					m = s.getElementsByTagName(o)[0];
					a.async = 1;
					a.src = g;
					m.parentNode.insertBefore(a, m)
			})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

			ga('create', 'UA-83807118-1', 'auto');
			ga('send', 'pageview');

//------------------------Main Scripts-------------------------//
			$(document).ready(function () {

                // ajax pagination:
			    $(document).on('click', '.pagination a', function(e) {
			        e.preventDefault();
			        var url = $(this).attr('href');
			        getNews(url);
			        window.history.pushState("", "", url);
			    });

			    function getNews(url) {
			        $.ajax({
			            url : url
			        }).done(function (data) {
			            $('.addNewsList').html(data);
			        }).fail(function () {
			            alert('Data not loaded!');
			        });
			    }

                //close topVacancy:
			    $('#close-top-vac').on('click', function (e) {
			        e.preventDefault();
			        if($('#news').hasClass('hidden')){
			            $('#topvac').addClass('hidden');
			            $('#left-content-column').removeClass('col-xs-9');
			            $('#right-content-column').removeClass('col-xs-3');
			            $('#left-content-column').addClass('col-xs-12');
			        }else{
			            $('#topvac').addClass('hidden');
			        }
			    })

                //close topNews:
				$('#close-news').on('click', function (e) {
				    e.preventDefault();
				    if($('#topvac').hasClass('hidden')){
				        $('#news').addClass('hidden');
				        $('#left-content-column').removeClass('col-xs-9');
				        $('#right-content-column').removeClass('col-xs-3');
				        $('#left-content-column').addClass('col-xs-12');
				    }else{
				        $('#news').addClass('hidden');
				    }
				})

			})
		</script>

	</body>
</html>