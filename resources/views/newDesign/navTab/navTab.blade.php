<!--@section('css')
    <link rel="stylesheet" type="text/css" href="newDesign/css/navTab.css">
@endsection-->
<div class="row bottom-line4row few">
		<div class="col-xs-11 col-md-7 header-tabs">
		  <ul class="nav nav-tabs">
			<li class="active">
				<a data-toggle="tab" href="#vacancy-tab">
					<img src="image/allvacancies.png" alt="" class="">
					Всі вакансії
				</a>
			</li>
			<li>
				<a data-toggle="tab" href="#resume-tab">
					<img src="image/allresumes.png" alt="" class="">
					Всі резюме
				</a>
			</li>
			<li>
				<a data-toggle="tab" href="#allcompanies-tab">
					<img src="image/allcompanies.png" alt="" class="">
					Всі компанії
				</a>
			</li>
			</ul>
		</div>
													<!-- Add new: -Vac -Comp -Res.  Line  -->
		<div class="col-md-5 hidden-xs hidden-sm add-list-group">
			<ul class="list-inline ">
				<li class="list-unstyled_plus">
					<span class="glyphicon glyphicon-plus"></span>
					<span class="add">Додати:</span>
				</li>
				<li class="list-unstyled_vacansy">
					<a href="index_vacancy.html">Вакансію</a>
				</li>
				<li class="list-unstyled_company">
					<a href="index_company.html">Компанію</a>
				</li>
				<li class="list-unstyled_resume">
					<a href="">Резюме</a>
				</li>
			</ul>
		</div>
												<!-- Add new: -Vac -Comp -Res. +dropdown -->
		<div class="col-xs-1 hidden-md hidden-lg dropdown plus-dropdn">
		  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<span class="">+</span>
		  </button>
		  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuPlus">
			<li class="plus-dropdn-h">Додати:</li>
			<li role="separator" class="divider"></li>
			<li><a href="index_vacancy.html">Вакансію</a></li>
			<li><a href="#">Компанію</a></li>
			<li><a href="#">Резюме</a></li>
		  </ul>
		</div>
	
</div>