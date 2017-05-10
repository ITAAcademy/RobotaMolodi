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
        <div class="wrapper">
            @yield('content')
        </div>
    </div>

</div>
</body>
</html>