<div class="main">
    <div class="col-md-10 col-md-offset-2 menu">
        <span class="col-md-1 staticLinks"><a class="btn"  href="{{ url('/about/index.html') }}" class="afterChange" style="color: #333333; font-size: 14px">Про нас</a> </span>
        <span class="col-md-1 staticLinks"><a class="btn" href="{{ url('http://www.profitday.info')}}" class="afterChange" style="color: #333333">Дні кар'єри</a> </span>
        <span class="col-md-1 staticLinks"><a class="btn" href="{{ url('/contacts') }}" class="afterChange" style="color: #333333">Контакти</a> </span>
    </div>
    @if(Request::is('sresume')){!!Form::open(['route' => 'searchResume','method' => 'POST'])!!}
    @elseif(Request::is('searchResumes')){!!Form::open(['route' => 'searchResume','method' => 'POST'])!!}
    @elseif(Request::is('scompany')){!!Form::open(['route' => 'searchCompany','method' => 'POST'])!!}
    @elseif(Request::is('searchCompanies')){!!Form::open(['route' => 'searchCompany','method' => 'POST'])!!}
    @else{!!Form::open(['route' => 'searchVacancy','method' => 'POST','class' => 'span2'])!!}
    @endif


    <div class="col-search" >
        {!!Form::text('search_field','',array( 'class' => 'form-control','placeholder' => 'Введіть запит' )) !!}
        {!!Form::close()!!}
        <input type="submit" class="btn btn-default btn-search navbar-default" onclick="
        @if(Request::is('sresume')) window.location='{{ url('searchResumes') }}'
        @else window.location='{{ url('searchVacancies') }}'
        @endif" value="Пошук">
    </div>

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