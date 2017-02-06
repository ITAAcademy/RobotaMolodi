<!DOCTYPE html>
<html lang="en" xmlns:style="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Robota Molodi</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/select2.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/vacancies/vacanciesList.css') }}" rel="stylesheet">

	<!-- sort -->
	<link href="{{ asset('/css/sortAds/sortAds.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/sortAds/jquery-datapicker-theme.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/sortAds/jquery-datapicker-ui.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/sortAds/jquery-ui-datapicer-structure.css') }}" rel="stylesheet">
	<!-- EndSort -->

	@yield('head')

	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

	<!-- <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" /> -->

	<!--<script type="text/javascript" src="/newDesign/JS/sortAds.js"></script>

	<!-- geoFilter yandex links -->
	<script src="http://yastatic.net/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=uk-UA" type="text/javascript"></script>
	<!-- end here -->

	<!-- sort -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- EndSort -->

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
{!!Html::script('js/robotaMolodiUtils.js')!!}
{!!Html::script('js/formatDate.js')!!}
{!!Html::script('js/initMap.js')!!}
</head>
<body>
	<div class="container-fluid container-main">
		@include('header/header')
		@include('main/mainContent')
	</div>
	<footer>
		@include('footer/footer')
	</footer>

	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<!-- Sort -->
	<script type="text/javascript" src="newDesign/JS/datapicker-ul.js"></script>
	<script type="text/javascript" src="newDesign/JS/script.js"></script>
	<!-- EndSort -->

	{!!Html::script('js/select2.full.js')!!}

		<script type="text/javascript">
			$(document).ready(function() {
				$(".js_drop_menu").select2()
				$("#position").select2({
					tags: []
	//		tokenSeparators: [",", " "]
				});
	//	$("#e12").select2({tags:[]});

				//$(".js_drop_menu").on("change", function(e){
				//console.dir(e);
				//})
			});
		</script>

		<script>
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
		</script>
</body>
</html>