<div class="row bottom-line4row few" id="wrapp">
		<div class="col-xs-11 col-md-7 header-tabs">
		  <ul class="nav nav-tabs">
			<li class="active">
				<a data-toggle="tab" href="#vacancy-tab">
					<img src="image/allvacancies.png" alt="" class="">
					{{ trans('navtab.allvacancy')  }}
				</a>
			</li>
			<li>
				<a data-toggle="tab" href="#resume-tab">
					<img src="image/allresumes.png" alt="" class="">
					{{ trans('navtab.allresume')  }}
				</a>
			</li>
			<li>
				<a data-toggle="tab" href="#allcompanies-tab">
					<img src="image/allcompanies.png" alt="" class="">
					{{ trans('navtab.allcompany')  }}
				</a>
			</li>
			</ul>
		</div>
													<!-- Add new: -Vac -Comp -Res.  Line  -->
		<div class="col-md-5 hidden-xs hidden-sm add-list-group">
			<ul class="list-inline ">
				<li class="list-unstyled_plus">
					<span class="glyphicon glyphicon-plus"></span>
					<span class="add">{{ trans('navtab.add')  }}</span>
				</li>
				<li class="list-unstyled_vacansy">
					<a href="index_vacancy.html">{{ trans('navtab.vacancy')  }}</a>
				</li>
				<li class="list-unstyled_company">
					<a href="index_company.html">{{ trans('navtab.company')  }}</a>
				</li>
				<li class="list-unstyled_resume">
					<a href="">{{ trans('navtab.resume')  }}</a>
				</li>
			</ul>
		</div>
												<!-- Add new: -Vac -Comp -Res. +dropdown -->
		<div class="col-xs-1 hidden-md hidden-lg dropdown plus-dropdn">
		  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<span id="cross">+</span>
		  </button>
		  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuPlus">
			<li class="plus-dropdn-h">{{ trans('navtab.add')  }}</li>
			<li role="separator" class="divider"></li>
			<li><a href="index_vacancy.html">{{ trans('navtab.vacancy')  }}</a></li>
			<li><a href="#">{{ trans('navtab.company')  }}</a></li>
			<li><a href="#">{{ trans('navtab.resume')  }}</a></li>
		  </ul>
		</div>

</div>
