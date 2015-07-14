@extends ('NewVacancy/users')

@section('contents')


    {!!Form::open(['route' => 'Company.store'])!!}
    <h3>Створення компанії</h3>
    <div class="form-group" >
        <label for="sector" class="col-sm-2 control-label">Назва компаніїї</label>
        <div class="col-sm-5">
            {!! Form::text('companyName', null, array('class' => 'form-control' )) !!}
        </div>

        <div ><span style ="color:red">* <?php echo $errors->first('companyName','поле має містити не менше трьох символів'); ?>  </span> {{$company}}</div>

        

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

