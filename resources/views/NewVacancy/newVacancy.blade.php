@extends ('NewVacancy/layout')

@section('contents')

    {!!Form::open(['route' => 'Vacancy.store'])!!}
    <div class="form-group" >
        <label for="sector" class="col-sm-2 control-label">Позиція</label>
        <div class="col-sm-5">
            {!! Form::text('vacancyPosition', null, array('class' => 'form-control' )) !!}
        </div>
        <div class="required_field"><span>*</span>  </div>
        </br>
    </div>
    <div class="form-group">
    <label for="sector" class="col-sm-2 control-label">Виберыть галузь</label>
    <div class="col-sm-5">
        <select class="form-control" id="selectGaluz">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div></br>
    </div>

    <div class="form-group" >
        <label for="level" class="col-sm-2 control-label">Електронна пошта компанії</label>
        <div class="col-sm-5">
            {!! Form::text('companyEmail', null, array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-sm-offset-2 col-sm-10" style="margin-top: 30px"  >
        <button type="submit" class="btn btn-default" style="background: #a7eebe">Зареєструвати вакансію</button>
    </div>
    {!!Form::token()!!}
    {!!Form::close()!!}

@endsection
