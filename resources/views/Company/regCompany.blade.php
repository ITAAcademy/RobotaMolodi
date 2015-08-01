@extends ('NewVacancy/users')

@section('contents')


    {!!Form::open(['route' => 'company.store'])!!}
    <h3>Створення компанії</h3>
    <div class="form-group" >
        <label for="sector" class="col-sm-2 control-label">Назва компаніїї</label>
        <div class="col-sm-5">
            {!! Form::text('company_name', null, array('class' => 'form-control' )) !!}
        </div>

        <div ><span style ="color:red">* <?php echo $errors->first('company_name','поле має містити не менше трьох символів'); ?>  </span> {{$company}}</div>

        </br>
    </div>

    <div class="form-group" style="margin-top: 20px">
        <label for="level" class="col-sm-2 control-label">Посилання на компанію</label>
        <div class="col-sm-5">
            {!! Form::text('company_link', null, array('class' => 'form-control')) !!}

        </div>
        <div ><span style ="color:red"><?php echo $errors->first('company_link','поле має бути посиланням в форматі https://'); ?>  </span> {{$company}}</div>
        </br>
        </br>
        <div class="form-group" style="margin-top: 20px; margin-left: 160px">
        {!!Form::submit('Зареєструвати компанію',['class' => 'btn btn-primary'])!!}
        </div>
       {!!Form::token()!!}
    </div>
    {!!Form::close()!!}

@endsection

