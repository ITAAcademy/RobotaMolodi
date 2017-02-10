@include('newDesign/search/show')

<div class="main">
    @include('newDesign/aboutUs/show')

    @if(Request::is('sresume')){!!Form::open(['route' => 'searchResume','method' => 'POST'])!!}
    @elseif(Request::is('searchResumes')){!!Form::open(['route' => 'searchResume','method' => 'POST'])!!}
    @elseif(Request::is('scompany')){!!Form::open(['route' => 'searchCompany','method' => 'POST'])!!}
    @elseif(Request::is('searchCompanies')){!!Form::open(['route' => 'searchCompany','method' => 'POST'])!!}
    @else{!!Form::open(['route' => 'searchVacancy','method' => 'POST','class' => 'span2'])!!}
    @endif


    <div class="row">
        <div class="col-md-12" >
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
            <div>
                @yield('content')
            </div>
        </div>
    </div>
</div>
