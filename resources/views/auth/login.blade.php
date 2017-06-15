@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Увійти</div>
				@include('auth.formLogin')
			</div>
		</div>
	</div>
</div>
@overwrite
