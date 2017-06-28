{{--<!DOCTYPE html>--}}
{{--<html lang="en" xmlns:style="http://www.w3.org/1999/xhtml">--}}

	{{--<head>--}}

		{{--<meta charset="utf-8">--}}
		{{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
		{{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
		{{--<title>Robota Molodi</title>--}}

		{{--<!-- Main styles -->--}}
		{{--<link href="{{ asset('/css/app.css') }}" rel="stylesheet">--}}
		{{--<link href="{{ asset('/css/style.css') }}" rel="stylesheet">--}}
		{{--<link href="{{ asset('/css/aboutUsShow.css') }}" rel="stylesheet">--}}

		{{--@yield('head')--}}

		{{--<!-- Fonts -->--}}
		{{--<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>--}}
		{{--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">--}}
		{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
		{{--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}

		{{--<!-- jQuery Bootstrap Ajax -->--}}
		{{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
		{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
		{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}

		{{--@yield('headLinks')--}}

	{{--</head>--}}

	{{--<body>--}}

		{{--<div class="container-fluid container-main">--}}
			{{--@include('header/header')--}}
			{{--@include('main/mainContent')--}}
		{{--</div>--}}

		{{--<footer>--}}
			{{--@include('footer/footer')--}}
		{{--</footer>--}}

		{{--{!!Html::script('js/news.js')!!}--}}

		{{--<script>--}}
			{{--(function (i, s, o, g, r, a, m) {--}}
			    {{--i['GoogleAnalyticsObject'] = r;--}}
			    {{--i[r] = i[r] || function () {--}}
			        {{--(i[r].q = i[r].q || []).push(arguments)--}}
			    {{--}, i[r].l = 1 * new Date();--}}
			    {{--a = s.createElement(o),--}}
					{{--m = s.getElementsByTagName(o)[0];--}}
					{{--a.async = 1;--}}
					{{--a.src = g;--}}
					{{--m.parentNode.insertBefore(a, m)--}}
			{{--})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');--}}

			{{--ga('create', 'UA-83807118-1', 'auto');--}}
			{{--ga('send', 'pageview');--}}
		{{--</script>--}}

	{{--</body>--}}
{{--</html>--}}


@extends('app')
@section('content')
	<div class="container-fluid container-main">
		@include('header/header')
		@include('main/mainContent')
	</div>

	<footer>
		@include('footer/footer')
	</footer>

	{!!Html::script('js/news.js')!!}

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
@stop