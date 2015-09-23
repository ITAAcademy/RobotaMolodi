@extends ('app')

@section('content')

    {!!Form::open(['route' => 'vacancy.store','onsubmit' => 'return CheckForm()'])!!}
    <div class="row">
<h3 class="formTitle">Створення вакансії</h3>
    <div class="form-group {{$errors-> has('Position') ? 'has-error' : ''}}" style="margin-top: 30px">
        <label for="sector" class="col-md-2 col-sm-2 control-label">Позиція</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('Position', Input::old('Position'), array('class' => 'form-control','onSubmit' =>'checkForm(this)')) !!}
        </div>
        <div > <span style="color: red">* <?php echo $errors->first('Position','поле має містити не менше чотирьох символів'); ?></span> </div>
</div>



    </div>
    <div class="row">
    <div class="form-group" style="margin-top: 30px">
    <label for="sector" class="col-md-2 col-sm-2 control-label">Виберіть галузь</label>
    <div class="col-md-6 col-sm-6">
        <select class="form-control"  id="selectGaluz" name="branch">
        @foreach($industries as $industry)
            {
                <option value="{{$industry->id}}">{{$industry->name}}</option>
            }
        @endforeach
            @if(Input::old('branch')!= '')
                @foreach($industries as $industry)
                    @if($industry->id == Input::old('branch'))
                <option value="{{$industry->id}}" selected>{{$industry->name}}</option>
                    @endif
                @endforeach
            @endif

        </select>
    </div>
        </div>
    </div>
    <div class="row">
    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-md-2 col-sm-2 control-label">Виберіть організацію</label>
        <div class="col-md-6 col-sm-6">
            <select class="form-control" id="selectOrgan" name="Organisation">
                @foreach($companies as $comp)
                    <option value="{{$comp->id}}">{{$comp->company_name}}</option>
                @endforeach
                    @if(Input::old('Organisation')!= '')
                        @foreach($industries as $industry)
                            @if($industry->id == Input::old('Organisation'))
                                <option value="{{$comp->id}}" selected>{{$comp->company_name}}</option>
                            @endif
                        @endforeach
                    @endif

            </select>
        </div>
        </div>
    </div>
    <div class="row">
    <div class="form-group {{$errors-> has('Salary') ? 'has-error' : ''}}" style="margin-top: 30px">
        <label for="sector" class="col-md-2 col-sm-2 control-label">Зарплата</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('Salary', Input::old('Salary'), array('class' => 'form-control','id' => 'Salary' )) !!}
        </div>
        <div > <span style="color: red"  >* <?php echo $errors->first('Salary','поле має містити тільки цифри'); ?></span> </div>
      </div>
    </div>
    <div class="row">
    <div class="form-group {{$errors-> has('user_email') ? 'has-error' : ''}}" style="margin-top: 30px">
        <label for="sector" class="col-md-2  col-sm-2 control-label">Email роботодавця</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('user_email', $userEmail, array( 'class' => 'form-control','id' => 'exampleInputEmail1','placeholder' => $userEmail )) !!}
        </div>
        <div > <span style="color: red"  >* <?php echo $errors->first('user_email','поле має містити не менше трьох символів'); ?></span> </div>
        </div>
    </div>
    <div class="row">
    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-md-2 col-sm-2 control-label">Виберіть місто</label>
        <div class="col-md-6 col-sm-6">
            <select class="form-control" class="js-example-basic-multiple" multiple="multiple" name="City[]" id="city">
                @foreach($cities as $city)
                {
                    <option value="{{$city->id}}">{{$city->name}}</option>
                }
                @endforeach
                    @if(Input::old('City')!= '')
                        @foreach(Input::old('City') as $cityId)
                        {
                            <option selected value="{{$cityId}}">{{\App\Models\City::find($cityId)->name}}</option>
                        }
                        @endforeach
                    @endif
            </select>
        </div>
        <div > <span style="color: red"> * <?php echo $errors->first('City','поле має містити не менше одного міста'); ?></span> </div>

        </div>
    </div>
    <div class="row">
    <div class="form-group {{$errors-> has('Description') ? 'has-error' : ''}}" style="margin-top: 30px">
        <label for="sector" class="col-md-2 col-sm-2 control-label">Опис</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::textarea('Description', Input::old('Description'), array('class' => 'form-control','onfocus' =>'validateDisc(this)')) !!}
        </div>

        <div > <span style="color: red"> * <?php echo $errors->first('Description','поле має бути заповнене'); ?></span> </div>
        </div>
    </div>
    </br>

    <div class="row">
    <div class="col-sm-offset-2 col-md-2  col-sm-2" style="margin-top: 20px">
        <input type="submit" class="btn btn-default" style="background: #a7eebe" value="Зареєструвати вакансію">
    </div>
        </div>

    {!!Form::token()!!}
    {!!Form::close()!!}


@endsection

@section('footer')

    <script type="text/javascript">
        $('#city').select2();






    </script>
@stop