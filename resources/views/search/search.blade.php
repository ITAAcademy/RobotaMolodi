<div class="col-md-12 col-search" >


    {{--<span class="paddlft">--}}
    {!!Form::text('search_field','',array( 'class' => 'form-control','placeholder' => 'Введіть запит' )) !!}
    {!!Form::close()!!}

    {{--</span>--}}
    {{--<span class="paddlft">--}}
    <input type="submit" class="btn btn-default btn-search navbar-default" onclick="
    @if(Request::is('sresume')) window.location='{{ url('searchResumes') }}'
    @else window.location='{{ url('searchVacancies') }}'
    @endif" value="Пошук">
    {{--</span>--}}
</div>
