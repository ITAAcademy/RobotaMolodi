@extends ('NewVacancy/users')

@section('contents')

    {!!Form::open(['route' => 'vacancy.store'])!!}
    <h3>Створення вакансії</h3>
    <div class="form-group {{$errors-> has('Position') ? 'has-error' : ''}}" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Позиція</label>
        <div class="col-sm-5">
            {!! Form::text('Position', Input::old('Position'), array('class' => 'form-control','onSubmit' =>'checkForm(this)')) !!}
        </div>
        <div > <span style="color: red">* <?php echo $errors->first('Position','поле має містити не менше чотирьох символів'); ?></span> </div>



        </br>
    </div>
    <div class="form-group" style="margin-top: 30px">
    <label for="sector" class="col-sm-2 control-label">Виберіть галузь</label>
    <div class="col-sm-5">
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
    </div></br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Виберіть організацію</label>
        <div class="col-sm-5">
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
        </div></br>
    </div>

    <div class="form-group {{$errors-> has('Salary') ? 'has-error' : ''}}" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Зарплата</label>
        <div class="col-sm-5">
            {!! Form::text('Salary', Input::old('Salary'), array('class' => 'form-control' )) !!}
        </div>
        <div > <span style="color: red"  >* <?php echo $errors->first('Salary','поле має містити тільки цифри'); ?></span> </div>
        </br>
    </div>

    <div class="form-group {{$errors-> has('user_email') ? 'has-error' : ''}}" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Email роботодавця</label>
        <div class="col-sm-5">
            {!! Form::text('user_email', $userEmail, array( 'class' => 'form-control','id' => 'exampleInputEmail1','placeholder' => $userEmail )) !!}
        </div>
        <div > <span style="color: red"  >* <?php echo $errors->first('user_email','поле має містити не менше трьох символів'); ?></span> </div>
        </br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Виберіть місто</label>
        <div class="col-sm-5">
            <select class="form-control" class="js-example-basic-multiple" multiple="multiple" name="City[]" id="city">
                @foreach($cities as $city)
                {
                    <option value="{{$city->id}}">{{$city->name}}</option>
                }
                @endforeach
                    @if(Input::old('City[]')!= '')
                        <option selected>{{Input::old('City[]')}}
                    @endif
            </select>
        </div>
        <div > <span style="color: red"> * <?php echo $errors->first('City','поле має містити не менше одного міста'); ?></span> </div>

        </br>
    </div>

    <div class="form-group {{$errors-> has('Description') ? 'has-error' : ''}}" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Опис</label>
        <div class="col-sm-5">
            {!! Form::textarea('Description', Input::old('Description'), array('class' => 'form-control','onfocus' =>'validateDisc(this)' )) !!}
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

@section('footer')

    <script type="text/javascript">
        $('#city').select2();


    </script>
@stop