<!DOCTYPE html>
<html lang="en" xmlns:style="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Robota Molodi</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/select2.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
     <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />

    <!-- geoFilter yandex links -->
    <script src="http://yastatic.net/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=uk-UA" type="text/javascript"></script>
	{{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>--}}
    <!-- end here -->

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
    {!!Html::script('js/robotaMolodiUtils.js')!!}
	{!!Html::script('js/formatDate.js')!!}
	{!!Html::script('js/initMap.js')!!}

    {{--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">--}}
    {{--<link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet">--}}


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>

    <!--<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />



    /////////////////////////////////////////////////////////////////////////////
		<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<div class="text-center">
                  <a href="{{ url('/') }}" class="afterChange">{!! Html::image('image/logo.png','Головна',['id'=>'logoImg']) !!} </a>
				</div>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div><!--class="navbar-header"-->

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav navbar-right">

					@include('staticHeaderPages.linksContainer')

						<!--

						<li>

							<input type="text" class="nav navbar-nav navbar-right" name="searching_field" placeholder="Введіть запит" />

						</li>
						<form method="POST" action="{{ url('searchResumes') }}"name="search_form"></form> -->
						<li>@if(Request::is('sresume')){!!Form::open(['route' => 'searchResume','method' => 'POST'])!!}
						@elseif(Request::is('searchResumes')){!!Form::open(['route' => 'searchResume','method' => 'POST'])!!}
						@elseif(Request::is('scompany')){!!Form::open(['route' => 'searchCompany','method' => 'POST'])!!}
						@elseif(Request::is('searchCompanies')){!!Form::open(['route' => 'searchCompany','method' => 'POST'])!!}
						@else{!!Form::open(['route' => 'searchVacancy','method' => 'POST'])!!}
						@endif</li>
						<li>
							<div class="nav navbar-nav navbar-right">{!! Form::text('search_field','',array( 'class' => 'form-control','placeholder' => 'Введіть запит' )) !!}</div>
						</li>




						<li>
							<button type="submit" Style="background-color:gray;color:white;" class="navbar-right btn btn-default afterChange"onclick="
							@if(Request::is('sresume')) window.location='{{ url('searchResumes') }}'
							@else window.location='{{ url('searchVacancies') }}'
							@endif">Пошук</button>

						</li>
						{!!Form::close()!!}
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}"><span>{!! Html::image('image/entry.png','Головна',['id'=>'entry']) !!}</span> Увійти</a></li>
						<li><a href="{{ url('/auth/register') }}"><span>{!! Html::image('image/registry.png','Головна',['id'=>'registry']) !!}</span> Зареєструватись</a></li>
					@else


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" @if(Auth::user()->role==1)style="color:red" @endif>{{ Auth::user()->name }} @if(Auth::user()->role==1)(Адміністратор) @endif<span class="caret"></span></a>

							<ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/cabinet') }}" class="afterChange">Особистий кабінет</a></li>
                                <li><a href="{{ url('/auth/logout') }}" class="afterChange"><span>{!! Html::image('image/exit.png','Головна',['id'=>'exit']) !!}</span> Вийти</a></li>
                            </ul>
                        </li>
					@endif
				</ul>
			</div>
		</div><!--class="container-fluid"-->
	</nav>

        <div class="row">
            <div class="col-md-10 col-md-offset-1" >
                <div class="col-md-10 col-md-offset-1" >
                    <div class="panel-heading" style="background-color: #ffffff;">
                        <div class="row">
                            <div>
                                @yield ('btn')
                            </div>
                            <div id="dropTitle">
                                @yield('title')
                            </div>

                            <div class="crResVac">
                                @yield('Create_res_vac')
                            </div>
                        </div>

                    </div>

                    <div id="geoDiv">
                    </div>

                    <div >
                        @yield('content')
                    </div>
                </div><!--class="col-md-10 col-md-offset-1"-->
            </div><!--class="col-md-10 col-md-offset-1"-->
        </div><!--class="row"-->
<div id="formContainer">

    </div>
    <!-- Scripts -->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<script src="http://yastatic.net/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=uk-UA" type="text/javascript"></script>
	{{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>--}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
		{{--{!!Html::script('js/select2.full.js')!!}--}}




<script type="text/javascript">
$(document).ready(function() {
  $(".js_drop_menu").select2()
	$("#position").select2({
	  tags: []
//		tokenSeparators: [",", " "]
  });
//	$("#e12").select2({tags:[]});

//  $(".js_drop_menu").on("change", function(e){
//	  console.dir(e);
//  })
});


</script>

    @yield('footer')

	</body>
</html>
