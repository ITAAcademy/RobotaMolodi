@extends('app')


@section('content')

    <link href="{{ asset('/css/po_test/css') }}" rel="stylesheet">
    <link href="{{ asset('/css/po_test/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/po_test/style.css') }}" rel="stylesheet">


    <div class="container" id="content">
        <br>
        <div id="logo"><a href="http://po.itatests.com/#">Career Oriented</a></div>
        <div class="row" id="main">
            <div id="start_test" class="conteiner hidedPanel panel panel-default col-md-12 col-xs-12 " style="display: block;">
                <div id="secretKey">SIJsGCagv5t8r1bK7kPWTi4NjpQUfq6e</div>
                <div id="header">Акцентуації</div>
                <br><br><br>
                <div id="content_tests" class="col-md-10  col-md-offset-1">Тут буде відображене запитання. Ви повинні обрати один з п'яти варіантів Вашого ставлення: -2 (зовсім не правильно), -1 (не правильно), 0 (важко відповісти), +1 (правильно), +2 (цілком правильно).</div>
                <div class="row" id="buttons">
                    <div id="buttons_table" class="col-md-12 col-sm-12">
                        <div id="buttons_tr" class="col"><div class="col-md-1 col-xs-12 b"><div class="tit_b">Дуже не подобається</div><div><button class="buttonTest" disabled="">-2</button></div></div><div class="col-md-1 col-xs-12 b"><div class="tit_b">Не подобається</div><div><button class="buttonTest" disabled="">-1</button></div></div><div class="col-md-1 col-xs-12 b"><div class="tit_b">Нейтрально</div><div><button class="buttonTest" disabled="">0</button></div></div><div class="col-md-1 col-xs-12 b"><div class="tit_b">Подобається</div><div><button class="buttonTest" disabled="">+1</button></div></div><div class="col-md-1 col-xs-12 b"><div class="tit_b">Дуже подобається</div><div><button class="buttonTest" disabled="">+2</button></div></div></div>
                    </div>
                </div>
                <div id="tip">Намагайтесь уникати відповіді "0"</div>
                <div id="start_button" class="buttonLocation"><button class="button">Почати тест зараз</button></div>
            </div>
            <div class="row" id="greeting" style="display: none;">
                <div class="panel panel-default  col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <p id="text1">Ми пропонуємо Вам пройти шість тестів, які можуть полегшити обрання професії.</p>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form id="myform" novalidate="novalidate">
                            <div id="fieldset">
                                <div class="phNameLocation col-md-12">
                                    <p><input class="form-control valid" type="text" placeholder="Введіть ваше ім&#39;я" name="inputName" autocomplete="off" id="phName"></p>
                                </div>
                                <br>
                                <div id="text">

                                    <fieldset id="sexFieldset">
                                        <legend id="leg">Оберіть стать</legend>
                                        <div class="textalign">
                                            <input type="radio" name="one" id="sex1" value="1" checked="checked"><label class="radio-inline col-md-6 col-xs-6" for="sex1"><img id="male" src="./ProfOrientation_files/m.jpg" class="border"></label>
                                            <input type="radio" name="one" id="sex2" value="2"><label class="radio-inline col-md-6 col-xs-6" for="sex2"><img id="female" src="./ProfOrientation_files/f.jpg"></label>
                                        </div>
                                    </fieldset>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <p>“Шлях у тисячу миль починається з першого кроку, і для того щоб усвідомити куди йти, потрібно мати певний план дій, що допоможе досягти результатів...“</p>
                                        <br>
                                    </div>
                                </div>

                                <div class="buttonLocation">
                                    <p><button type="submit" class="button btn" onclick="startTesting()">Розпочати тестування</button></p>
                                </div>
                            </div></form>

                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="footer">
            <div id="menu_footer"></div>
            <div id="down_footer" class="col-md-4 col-md-offset-8 col-xs-8 col-xs-offset-4">© Copyright 2015 <b>IT Academy</b></div>
        </div>
    </div>
    <script src="/css/po_test/bootstrap.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script type="text/javascript" src="/css/po_test/main.js"></script>
    <script type="text/javascript" src="/css/po_test/router.js"></script>

    <script type="text/javascript">


    </script>
@stop

