<!doctype html>
<html>
<head>
    <title>Админка</title>
    <meta name="_token" content="{{ csrf_token() }}">
    @include('newDesign.layouts.includes.head')
    @yield('head')
    @yield('ckeditor')
</head>


    <header>
        @include('newDesign.layouts.includes.header')
    </header>
<div class="container-fluid">
    <br>
    <div class="row">

        @include('newDesign.layouts.includes.columnLeft')

        <div class="wrapper " id="main">
            @yield('content')
        </div>
    </div>


</div>



<script>
    $(document).ready(function () {
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});

        $("th").attr('scope', 'col');
        $("th[scope='col']").addClass('text-center');
    })
</script>
</body>
</html>