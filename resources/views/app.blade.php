<!DOCTYPE html>
<html lang="en" xmlns:style="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="_token" content="{{ csrf_token() }}">

	<!-- External Resources -->
	<!-- Styles -->

	<link rel="shortcut icon" href="{{ asset('/image/favicon.png') }}" type="image/png">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css"/>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/css/Jcrop.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"

		  integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw"
		  crossorigin="anonymous">

	<!-- Scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/js/Jcrop.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/js/Jcrop.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

	<!-- head-->
	@yield('head')
	<!-- headLinks-->
	@yield('headLinks')
	@yield('seo-module')
	<!-- App styles -->
	<link href="{{ asset('./rm-styles.css') }}" rel="stylesheet">
	<!-- App Scripts -->
	<script src="{{ asset('./rm-scripts.js') }}"></script>
</head>
<body>
{{--    <div class="wrapper-page">--}}
{{--			@include('header/header')--}}
{{--			<div class="container container-main">--}}
{{--				<div class="row">--}}
{{--					<img src="https://ichef.bbci.co.uk/news/800/cpsprodpb/1B3B/production/_123617960_photo_2022-03-09_19-23-00.jpg.webp" class="img-responsive" style='margin: 0 auto;' alt="">--}}
{{--					<h3>--}}
{{--						Today we’re reaching out to you to ask to donate and contribute to peace in Ukraine. --}}
{{--					</h3>--}}
{{--					<h4>--}}
{{--						Donations and any other help are extremely important to our country to support the Ukrainian people and the Ukrainian army, defending not only our country but the whole world from russian aggressor.--}}
{{--					</h4>--}}
{{--					<h4>--}}
{{--						Ukraine is being invaded by russia. Every day hundreds of civilians including children and women are killed, as russian troops ruthlessly bomb and shell Ukrainian cities.--}}
{{--					</h4>--}}
{{--					<h4>--}}
{{--						Even your smallest support will make Ukraine stronger and get us closer to victory in the Russia-Ukraine war!--}}
{{--					</h4>--}}
{{--					</br>--}}
{{--					<dl>--}}
{{--						<p>--}}
{{--							NATIONAL YOUTH NON-GOVERMENT ORGANIZATION "THE YOUTH EMPLOYMENT CENTRE"--}}
{{--						</p>--}}
{{--						<dt>Сurrency account:</dt>--}}
{{--						<dd>USD</dd>--}}
{{--						<dt>IBAN Code:</dt>--}}
{{--						<dd>UA393006140000026004000012081</dd>--}}
{{--						<dt>Назва банку / Name of the bank</dt>--}}
{{--						<dd>JSC "CREDIT AGRICOLE BANK", 42/4 PUSHKINSKA STR., KYIV, 01024, UKRAINE</dd>--}}
{{--						<dt>SWIFT code банку / Bank SWIFT Code</dt>--}}
{{--						<dd>AGRIUAUK</dd>--}}
{{--						<dt>Адреса підприємства / Company address</dt>--}}
{{--						<dd>UA 21007 Вінницька, м. Вінниця, вул. Київська, б.52, кв. 95 </dd>--}}
{{--						<dt>Банки кореспонденти / Correspondent banks</dt>--}}
{{--						<dd>Рахунок в банку кореспонденті / Account in the correspondent bank: 20586620000</dd>--}}
{{--						<dd>SWIFT Code банку-кореспондента / SWIFT Code of the correspondent bank: AGRIFRPP</dd>--}}
{{--						<dd>Банк кореспондент / Correspondent bank: CREDIT AGRICOLE SA (FRANCE); 12, PLACE DES ETATS-UNIS 92127 MONTROUGE CEDEX, FRANCE</dd>--}}
{{--						<dt>Payment details:</dt>--}}
{{--						<dd>non-refundable financial assistance</dd>--}}
{{--					</dl>--}}
{{--					--}}
{{--					<dl>--}}
{{--						<p>--}}
{{--							NATIONAL YOUTH NON-GOVERMENT ORGANIZATION "THE YOUTH EMPLOYMENT CENTRE"--}}
{{--						</p>--}}
{{--						<dt>Сurrency account:</dt>--}}
{{--						<dd>EUR</dd>--}}
{{--						<dt>IBAN Code:</dt>--}}
{{--						<dd>UA393006140000026004000012081</dd>--}}
{{--						<dt>Назва банку / Name of the bank</dt>--}}
{{--						<dd>JSC "CREDIT AGRICOLE BANK", 42/4 PUSHKINSKA STR., KYIV, 01024, UKRAINE</dd>--}}
{{--						<dt>SWIFT code банку / Bank SWIFT Code</dt>--}}
{{--						<dd>AGRIUAUK</dd>--}}
{{--						<dt>Адреса підприємства / Company address</dt>--}}
{{--						<dd>UA 21007 Вінницька, м. Вінниця, вул. Київська, б.52, кв. 95 </dd>--}}
{{--						<dt>Банки кореспонденти / Correspondent banks</dt>--}}
{{--						<dd>Рахунок в банку кореспонденті / Account in the correspondent bank: 20586612000</dd>--}}
{{--						<dd>SWIFT Code банку-кореспондента / SWIFT Code of the correspondent bank: AGRIFRPP</dd>--}}
{{--						<dd>Банк кореспондент / Correspondent bank: CREDIT AGRICOLE SA (FRANCE); 12, PLACE DES ETATS-UNIS 92127 MONTROUGE CEDEX, FRANCE</dd>--}}
{{--						<dt>Payment details:</dt>--}}
{{--						<dd>non-refundable financial assistance</dd>--}}
{{--					</dl>--}}

{{--					<dl>--}}
{{--						<p>--}}
{{--							ВСЕУКРАЇНСЬКА МОЛОДІЖНА ГРОМАДСЬКА ОРГАНІЗАЦІЯ “МОЛОДІЖНИЙ ЦЕНТР ПРАЦЕВЛАШТУВАННЯ”--}}
{{--						</p>--}}
{{--						<dt>Валюта</dt>--}}
{{--						<dd>ГРН</dd>--}}
{{--						<dt>IBAN Code:</dt>--}}
{{--						<dd>UA 393006140000026004000012081</dd>--}}
{{--						<dt>Назва банку / Name of the bank</dt>--}}
{{--						<dd>АТ “КРЕДІ АГРІКОЛЬ БАНК”</dd>--}}
{{--						<dt>ЄДРПОУ</dt>--}}
{{--						<dd>35662522</dd>--}}
{{--						--}}
{{--						<dt>Призначення платежу:</dt>--}}
{{--						<dd>безповоротна фінансова допомога</dd>--}}
{{--					</dl>--}}
{{--						@include('main/mainContent')--}}
{{--				</div>--}}
{{--			</div>--}}
{{--			@include('footer/footer')--}}
{{--    </div>--}}
	<div class="wrapper-page">
		@include('header/header')
		<div class="container container-main">
			<div class="row">
				@include('main/mainContent')
			</div>
		</div>
		@include('footer/footer')
	</div>
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

	<script type="text/javascript">
        $(document).ready(function() {
            $(function() {

                $('#datetimepicker').datetimepicker({
					inline: true,
					format: 'DD/MM/YYYY',
                    sideBySide: true
                });
            });
        });
	</script>

	<script type="text/javascript">
        $(function () {
            $('#datetimepicker6').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:SS',
            });
            $('#datetimepicker7').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:SS',
            });
            $("#datetimepicker6").on("dp.change", function (e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker7").on("dp.change", function (e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
        });
	</script>

</body>
</html>
