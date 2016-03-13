@extends ('NewVacancy/users')

@section('contents')


    {!!Form::open(['route' => 'company.store'])!!}
    <div class="row">
    <h3 class="formTitle">Створення компанії</h3>
        </br>
    <div class="form-group" >
        <label for="sector" class="col-md-2 col-sm-2 control-label">Назва компанії</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('company_name', null, array('class' => 'form-control' )) !!}
        </div>
        <div ><span style ="color:red">* <?php echo $errors->first('company_name','поле має містити не менше трьох символів'); ?>  </span> {{$company}}</div>
    </div>
        </div>
    </br>
    <div class="row">
    <div class="form-group" style="margin-top: 20px">
        <label for="level" class="col-md-2 col-sm-2 control-label">Посилання на компанію</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('company_link', null, array('class' => 'form-control')) !!}

        </div>
        <div ><span style ="color:red"><?php echo $errors->first('company_link','поле має бути посиланням в форматі https://'); ?>  </span> {{$company}}</div>
     </div>
        </div>
    </br>
    <div class="row">
    <div class="form-group" style="margin-top: 20px">
        <label for="level" class="col-md-2 col-sm-2 control-label">Електронна пошта</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('email', null, array('class' => 'form-control')) !!}
        </div>
        <div ><span style ="color:red">* <?php echo $errors->first('email','Введене значення не є коректною e-mail адресою'); ?>  </span> {{$company}}</div>
    </div>
    </div>
    </br>
    <div class="row">
        <div class="col-sm-offset-2 col-md-2  col-sm-2 form-group" style="...">
        {!!Form::submit('Зареєструвати компанію',['class' => 'btn btn-primary'])!!}
        </div>
       {!!Form::token()!!}
    </div>
    </div>
    {!!Form::close()!!}

@endsection

