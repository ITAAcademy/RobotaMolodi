<!doctype html>
<html>
<head>
    @include('newDesign.layouts.includes.head')
    @yield('ckeditor')
</head>
<body>
<div class="container">

    <header class="row">
        @include('newDesign.layouts.includes.header')
    </header>

    <div id="main" class="row">
    <h1 class="text-center">News</h1>

        @yield('content')

    </div>


</div>
</body>
</html>