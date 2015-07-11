@extends ('NewVacancy/users')

@section('contents')

    {!!Form::open(['route' => 'Vacancy.store'])!!}
    <h3>Створення вакансії</h3>
    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Позиція</label>
        <div class="col-sm-5">
            {!! Form::text('Position', null, array('class' => 'form-control','onSubmit' =>'checkForm(this)')) !!}
        </div>

        <div > <span style="color: red">* <?php echo $errors->first('Position','поле має містити не менше трьох символів'); ?></span> </div>

        <div class="required_field"><span>*</span>  </div>

        </br>
    </div>
    <div class="form-group" style="margin-top: 30px">
    <label for="sector" class="col-sm-2 control-label">Виберіть галузь</label>
    <div class="col-sm-5">
        <select class="form-control" id="selectGaluz" name="Galuz">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    </div></br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Виберіть організацію</label>
        <div class="col-sm-5">
            <select class="form-control" id="selectOrgan" name="Organisation">
                @foreach($companies as $comp)
                    <option>{{$comp->company_name}}</option>
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
        <div > <span style="color: red"  >* <?php echo $errors->first('Salary','поле має містити тільки цифри'); ?></span> </div>
        </br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Виберіть місто</label>
        <div class="col-sm-5">
            <select class="form-control" name="City" >
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        </br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Опис</label>
        <div class="col-sm-5">
            {!! Form::textarea('Description', null, array('class' => 'form-control' )) !!}
        </div>
        <div > <span style="color: red"> * <?php echo $errors->first('Description','поле має містити не менше трьох символів'); ?></span> </div>
        </br>
    </div>
    </br>

    <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px">
        <input type="submit" class="btn btn-default" style="background: #a7eebe" onclick="checkForm()" value="Зареєструвати вакансію">
    </div>
    {!!Form::token()!!}
    {!!Form::close()!!}
    <div id="Result"></div>
<script type=text/javascript>

    function checkForm(forms)
    {
        return false;

        var check = false;
        var elements = document.forms[0].elements[1].value;

        alert(elements);
        if(elements==""){

            document.getElementById('Result').innerHTML = "swdfsffsff";
            return false;
        }
        else
        {

            return true;
        }

    }
</script>
@endsection
