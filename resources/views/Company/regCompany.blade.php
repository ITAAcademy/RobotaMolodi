@extends ('NewVacancy/layout')

@section('contents')

    {!!Form::open(['route' => 'Company.store'])!!}
    <div class="form-group" >
        <label for="sector" class="col-sm-2 control-label">Назва компаніїї</label>
        <div class="col-sm-5">
            {!! Form::text('companyName', null, array('class' => 'form-control' )) !!}
        </div>
        <div class="required_field"><span>*</span><?php echo $errors->first('companyName'); ?>  </div>
        </br>
    </div>

    <div class="form-group" style="margin-top: 20px">
        <label for="level" class="col-sm-2 control-label">Електронна пошта компанії</label>
        <div class="col-sm-5">
            {!! Form::text('companyEmail', null, array('class' => 'form-control')) !!}
            {!!Form::submit('Зареєструвати компанію',['class' => 'btn btn-primary'])!!}
        </div>
        </br>
       {!!Form::token()!!}
    </div>
    {!!Form::close()!!}

@endsection

