<!doctype html>
<html>
<head>
    <meta name="_token" content="{{ csrf_token() }}">
    @include('newDesign.layouts.includes.head')
    @yield('ckeditor')
</head>
<body>


    <header class="row">
        @include('newDesign.layouts.includes.header')
    </header>
    <div class="row">
        @include('newDesign.layouts.includes.columnLeft')
        <div class="col-md-10">
            <div id="main">
                <div class="contentAndmin">
                    <div class="wrapper">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--<footer>--}}
    {{--@include('newDesign.layouts.includes.footer')--}}
{{--</footer>--}}

    <div id="main" class="row">
        <div class="wrapper">
            @yield('content')
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    })
</script>
</body>
</html>