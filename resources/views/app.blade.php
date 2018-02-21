<!DOCTYPE html>
<html lang="en" xmlns:style="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Robota Molodi</title>

	<meta name="_token" content="{{ csrf_token() }}">

	<link href="{{ asset('/css/aboutUs/featherlight.gallery.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/aboutUs/featherlight.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/select2.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/navTab.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/aboutUsShow.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/aboutUs/aboutUs.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/cabinet.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/creating.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/header.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/errors/base.css') }}" rel="stylesheet">

	@yield('head')

	<link rel="shortcut icon" href="{{ asset('/image/favicon.png') }}" type="image/png">

	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css"/>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/js/Jcrop.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/js/Jcrop.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/css/Jcrop.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
	<link href="{{ asset('/css/slick/slick.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/slick/slick-theme.css') }}" rel="stylesheet">
	{!!Html::script('js/slick/slick.min.js')!!}


	 <script src="/js/lib/CLDRPluralRuleParser/CLDRPluralRuleParser.js"></script>
	 <script src="/js/lib/jquery_i18n/jquery.i18n.js"></script>
	 <script src="/js/lib/jquery_i18n/jquery.i18n.messagestore.js"></script>
	 <script src="/js/lib/jquery_i18n/jquery.i18n.fallbacks.js"></script>
	 <script src="/js/lib/jquery_i18n/jquery.i18n.language.js"></script>
	 <script src="/js/lib/jquery_i18n/jquery.i18n.parser.js"></script>
	 <script src="/js/lib/jquery_i18n/jquery.i18n.emitter.js"></script>
	 <script src="/js/lib/jquery_i18n/jquery.i18n.emitter.bidi.js"></script>

	 <!-- <script src="js/global.js"></script> -->

	{!!Html::script('js/robotaMolodiUtils.js')!!}
	{!!Html::script('js/formatDate.js')!!}
	{!!Html::script('js/initMap.js')!!}

	@yield('headLinks')
	@yield('seo-module')
</head>
<body>
    <div class="wrapper-page">
        <div class="container container-main">
            <div class="row">
                @include('header/header')
                @include('main/mainContent')
            </div>
        </div>
        @include('footer/footer')
    </div>

	{!!Html::script('js/select2.full.js')!!}
	{!!Html::script('js/liker.js')!!}

	<script>
        $(document).ready(function() {
            $(document).on("click", ".likeDislike", function (e) {
                e.preventDefault();
                var authRez = String({!! !Auth::check() !!});
                var errNode = this.parentElement.parentElement.lastElementChild;
                if (authRez && !$(errNode).attr('disabled')) {
                    $(errNode).attr('disabled', true);
                    $(errNode).text("Авторизуйтесь!").css('color', 'red').animate({color: "white"}, 1000, function () {
                        $(errNode).attr('disabled', false);
                    });
                }
            });
        });
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$(".js_drop_menu").select2()
			$("#position").select2({
				tags: []
			});
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
