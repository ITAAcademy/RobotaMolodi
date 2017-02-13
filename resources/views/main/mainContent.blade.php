@include('newDesign/aboutUs/show')

@include('newDesign/navTab/navTab')
@include('newDesign/search/show')

<div class="main">
    <div class="row">
        <div class="col-md-12" >
            <div class="row">
                <div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
