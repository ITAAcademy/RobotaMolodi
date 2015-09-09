@extends('app')


@section('content')

<div class="container" id="content">
<br/>
	<div id="logo"><a href="#">Career Oriented</a></div>
		<div class="row" id="main">
			<div id="start_test" class="conteiner hidedPanel panel panel-default col-md-12 col-xs-12 ">
				<div id="secretKey"></div>
				<div id="header"></div>
				<br/><br/><br/>
			    <div id="content_tests" class="col-md-10  col-md-offset-1"></div>
			    <div class="row" id="buttons">
				    <div id="buttons_table" class="col-md-12 col-sm-12">
					    <div id="buttons_tr" class="col"></div>
				    </div>
			    </div>
			    <div id="tip"></div>
			    <div id="start_button" class="buttonLocation"></div>
   			</div>
   				<div class="row" id="greeting">
					<div class="panel panel-default  col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
					   <div class="panel-heading">
					      <h3 class="panel-title">
					        <p id="text1">Ми пропонуємо Вам пройти шість тестів, які можуть полегшити обрання професії.</p>
					      </h3>
					   </div>
	<div class="panel-body">
        {!!Form::open(['route' => 'proforient.start'])!!}
			<div id="fieldset" >
				<div class="phNameLocation col-md-12">
					<p><input class="form-control" type="text" placeholder="Введіть ваше ім'я" id="phName" name="name" autocomplete="off"/></p>
				</div>
			<br/>
				<div id="text">
					<form>
						<fieldset id="sexFieldset">
							<legend id="leg">Оберіть стать</legend>
							<div class="textalign">
								<input type="radio" name="sex" id="sex1" value="1"><label class="radio-inline col-md-6 col-xs-6" for="sex1"><img id="male" src="image/m.jpg"/></label>
								<input type="radio" name="sex" id="sex2" value="2"><label class="radio-inline col-md-6 col-xs-6" for="sex2"><img id="female" src="image/f.jpg"/></label>
							</div>
						</fieldset>
					</form>
				</div>
					<div class="row">
						<div class="col-md-12">
							<br/>
							<p>“Шлях у тисячу миль починається з першого кроку, і для того щоб усвідомити куди йти, потрібно мати певний план дій, що допоможе досягти результатів...“</p>
							<br/>
						</div>
					</div>

											<div class="buttonLocation">
							                	<p><button type="submit" class="button btn" onclick="startTesting()">Розпочати тестування</button></p>
							                </div>
			</div>
        {!!Form::token()!!}
        {!!Form::close()!!}
	</div>
		</div>
    </div>
        </div>
    <div class="row" id="footer">
        <div id="menu_footer"></div>
        <div id="down_footer" class="col-md-4 col-md-offset-8 col-xs-8 col-xs-offset-4">&copy; Copyright 2015 <b>IT Academy</b></div>
    </div>
</div>

<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/router.js"></script>

@stop