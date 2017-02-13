@section('section')
@include('newDesign/aboutUs/show')

@include('newDesign/navTab/navTab')
@include('newDesign/search/show')
@endsection

<div class="main">
    <div class="row">
        <div class="col-md-12" >
            <div class="row">
                <div>
                    @yield('section')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
