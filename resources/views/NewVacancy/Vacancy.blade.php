@extends('NewVacancy/layout')

@section ('content');
 <html>
<head>
<title></title>
<meta charset="uts-8"/>
<meta http-equiv="X-UA-Compatible" />
<meta  name="viewport" content="width = device-width,initial-scale=1"/>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet"/>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.css.map" rel="stylesheet" />
</head>
<body>
<ul class="nav nav-tabs">
	<li role = "presentation"><a href="Cabinet">Нова вакансія</a></li>
	<li role = "presentation"><{{link_to_route('Company.create','Нова компанія')}}</li>
</ul>

</body>
</html>

@stop
<?php

?>