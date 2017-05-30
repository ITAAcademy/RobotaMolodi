<!doctype html>
<html>
<head>
    <meta name="_token" content="{{ csrf_token() }}">
    @include('newDesign.layouts.includes.head')
    @yield('ckeditor')
</head>


    <header>
        @include('newDesign.layouts.includes.header')
    </header>
<div class="container-fluid">
    <div class="row">

        @include('newDesign.layouts.includes.columnLeft')
        <div class="wrapper " id="main">
            @yield('content')
        </div>
    </div>
</div>

{{--<footer>--}}
    {{--@include('newDesign.layouts.includes.footer')--}}
{{--</footer>--}}

<script>
    $(document).ready(function () {
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
    })
</script>
</body>
</html>