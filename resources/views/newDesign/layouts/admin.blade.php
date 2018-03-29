<!doctype html>
<html>
<head>
    <title>Админка</title>
    <meta name="_token" content="{{ csrf_token() }}">
    @include('newDesign.layouts.includes.head')
    @yield('head')
    @yield('ckeditor')
</head>

<body>
    <header>
        @include('newDesign.layouts.includes.header')
    </header>
    <br>
    <div class="row">
        <div class="sidebar col s12 m3 l2 xl2">
            @include('newDesign.layouts.includes.columnLeft')
        </div>
        <div class="wrapper col s12 m9 l10 xl9" id="main">
            @yield('content')
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});

            $('.confirm').on('click',function(e){
                e.preventDefault();
                var target = $(e.target).parent('form');
                mbox.confirm('Are you sure ?', function(yes) {
                    if(yes){
                        target.submit();
                    }
                })
            });
        })
    </script>
</body>
</html>