@extends ('cabinet/cabinet')

@section('contents')

    <div>
        <ul class="nav nav-tabs">
            <li role = "presentation">{!!link_to_route('company.create','Створити компанію')!!}</li>

        </ul>
    </div>


    @yield('contents')
    <?php echo $child ?>




@stop