<link href="{{ asset('/css/navTab.css') }}" rel="stylesheet">

<div class="row bottom-line4row-tab few">
		<div class="col-xs-11 col-md-7 header-nav-tabs">
		  <ul class="nav nav-tabs">
			<li class="{{Request::path() == '/' ? 'active' : ''}}">
				<a href="{{route('head')}}">
					<img src="{{asset('/image/allvacancies.png')}}" >
					{{ trans('navtab.allvacancy')  }}
				</a>
			</li>
			<li class="{{Request::path() == 'sresume' ? 'active' : ''}}">
				<a href="{{route('main.resumes')}}">
					<img src="{{asset('/image/allresumes.png')}}">
					{{ trans('navtab.allresume')  }}
				</a>
			</li>
			<li class="{{Request::path() == 'scompany' ? 'active' : ''}}">
				<a href="{{route('main.companies')}}">
					<img src="{{asset('/image/allcompanies.png')}}">
					{{ trans('navtab.allcompany')  }}
				</a>
			</ul>
		</div>
													<!-- Add new: -Vac -Comp -Res.  Line  -->
		<div class="col-md-5 hidden-xs hidden-sm add-list-group-nav-tab">
			<ul class="list-inline ">
				<li class="list-unstyled_plus">
					<span class="glyphicon glyphicon-plus"></span>
					<span class="add">{{ trans('navtab.add')  }}</span>
				</li>
				<li class="list-unstyled_vacansy">
					<a href="{{route('vacancy.create')}}">{{ trans('navtab.vacancy')  }}</a>
				</li>
				<li class="list-unstyled_company">
					<a href="{{route('company.create')}}">{{ trans('navtab.company')  }}</a>
				</li>
				<li class="list-unstyled_resume">
					<a href="{{route('resume.create')}}">{{ trans('navtab.resume')  }}</a>
				</li>
			</ul>
		</div>
												<!-- Add new: -Vac -Comp -Res. +dropdown -->
		<div class="col-xs-1 hidden-md hidden-lg dropdown plus-dropdn">
		  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<span class="">+</span>
		  </button>
		  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuPlus">
			  <li class="plus-dropdn-h">{{ trans('navtab.add')  }}</li>
			  <li role="separator" class="divider"></li>
			  <li><a href="{{route('vacancy.create')}}">{{ trans('navtab.vacancy')  }}</a></li>
			  <li><a href="{{route('company.create')}}">{{ trans('navtab.company')  }}</a></li>
			  <li><a href="{{route('resume.create')}}">{{ trans('navtab.resume')  }}</a></li>
		  </ul>
		</div>

</div>
