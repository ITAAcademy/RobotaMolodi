@extends('NewVacancy/layout')

@section('contents')
    {!!Form::open(['route' => 'vacancy.store'])!!}
    <h3>Створення вакансії</h3>
    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Позиція</label>
        <div class="col-sm-5">
            {!! Form::text('position', $vacancy->position, array('class' => 'form-control','onSubmit' =>'checkForm(this)')) !!}
        </div>

        <div > <span style="color: red">* <?php echo $errors->first('position','поле має містити не менше чотирьох символів'); ?></span> </div>



        </br>
    </div>
    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Виберіть галузь</label>
        <div class="col-sm-5">
            <select class="form-control" id="selectGaluz" name="branch" value = "{{$vacancy->branch}}">
                @foreach($industries as $industry)
                    {
                    <option value="{{$industry->id}}">{{$industry->name}}</option>
                    }
                @endforeach
            </select>
        </div></br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Виберіть організацію</label>
        <div class="col-sm-5">
            <select class="form-control" id="selectOrgan" name="Organisation">
                @foreach($companies as $comp)
                    <option value="{{$comp->id}}">{{$comp->company_name}}</option>
                @endforeach
            </select>
        </div></br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="level" class="col-sm-2 control-label">Введіть дату:</label>
        <div class="col-sm-5">
            <input type="date" class="form-control" name="Date">
        </div>

        </br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Зарплата</label>
        <div class="col-sm-5">
            {!! Form::text('Salary', null, array('class' => 'form-control' )) !!}
        </div>
        <div > <span style="color: red"  >* <?php echo $errors->first('salary','поле має містити тільки цифри'); ?></span> </div>
        </br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Email роботодавця</label>
        <div class="col-sm-5">
            {!! Form::text('user_email', $userEmail, array( 'class' => 'form-control','id' => 'exampleInputEmail1','placeholder' => $userEmail )) !!}
        </div>
        <div > <span style="color: red"  >* <?php echo $errors->first('salary','поле має містити не менше трьох символів'); ?></span> </div>
        </br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Виберіть місто</label>
        <div class="col-sm-5">
            <select class="form-control" name="City" >
                @foreach($cities as $city)
                    {
                    <option>{{$city->name}}</option>
                    }
                @endforeach
            </select>
        </div>
        </br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">{{ trans('main.description') }}</label>
        <div class="col-sm-5">
            {!! Form::textarea('Description', null, array('class' => 'form-control' )) !!}
        </div>
        <div > <span style="color: red"> * <?php echo $errors->first('Description','поле має містити не менше трьох символів'); ?></span> </div>
        </br>
    </div>
    </br>


    <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px">
        <input type="submit" class="btn btn-default" style="background: #a7eebe" value="Зареєструвати вакансію">
    </div>
    {!!Form::token()!!}
    {!!Form::close()!!}
@endsection

@stop
