@extends ('app')

@section('content')

    {!!Form::open(['route' => 'vacancy.store','onsubmit' => 'return CheckForm()'])!!}

    <div class="row">
        <h3 class="formTitle"><b>Створення вакансії</b></h3>
        <div class="form-group {{$errors-> has('position') ? 'has-error' : ''}}" style="margin-top: 30px">
            <label for="sector" class="col-md-2 col-sm-2 control-label">Позиція</label>
            <div class="col-md-6 col-sm-6">
                {!! Form::text('position', Input::old('position'), array('class' => 'form-control','onSubmit' =>'checkForm(this)')) !!}
            </div>
            <div > <span style="color: red">* <?php echo $errors->first('position',':message'); ?></span> </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group" style="margin-top: 30px">
            <label for="sector" class="col-md-2 col-sm-2 control-label">Оберіть галузь</label>
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
            <label for="sector" class="col-md-2 col-sm-2 control-label">Оберіть організацію</label>
            <div class="col-md-6 col-sm-6">
                <select class="form-control" id="selectOrgan" name="Organisation">
                    @foreach($companies as $comp)
                        @if($comp->id != Input::old('Organisation'))
                            <option value="{{$comp->id}}">{{$comp->company_name}}</option>
                        @else($comp->id == Input::old('Organisation'))
                            <option value="{{$comp->id}}" selected>{{$comp->company_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group {{$errors-> has('salary') ? 'has-error' : ''}}" style="margin-top: 30px">
            <label for="sector" class="col-md-2 col-sm-2 control-label">Зарплата (мiнiмальна)</label>
            <div class="col-md-6 col-sm-6">
                {!! Form::text('salary', Input::old('salary'), array('class' => 'form-control','id' => 'Salary' )) !!}
            </div>
            <div > <span style="color: red"  >* <?php echo $errors->first('salary',':message'); ?></span> </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group {{$errors-> has('salary') ? 'has-error' : ''}}" style="margin-top: 30px">
            <label for="sector" class="col-md-2 col-sm-2 control-label">Зарплата (максимальна)</label>
            <div class="col-md-6 col-sm-6">
                {!! Form::text('salary_max', Input::old('salary_max'), array('class' => 'form-control','id' => 'Salary_max' )) !!}
            </div>
            <div > <span style="color: red"  >* <?php echo $errors->first('salary',':message'); ?></span> </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group" style="margin-top: 30px">
            <label for="sector" class="col-md-2 col-sm-2 control-label">Валюта</label>
            <div class="col-md-6 col-sm-6">
                <select class="form-control" id="selectCurrency" name="currency_id">
                    @foreach($currencies as $currency)
                        {
                        <option value="{{$currency->id}}">{{$currency->currency}}</option>
                        }
                    @endforeach
                </select>
            </div>
        </div>
    </div>
	
	
	 <!--<div class="row">
        <div class="form-group {{$errors-> has('telephone') ? 'has-error' : ''}}" style="margin-top: 30px">
            <label for="sector" class="col-md-2 col-sm-2 control-label">{!! Form::label('Телефон') !!}</label>
            <div class="col-md-6 col-sm-6">
                {!! Form::text('telephone', Input::old('telephone'), ['class'=>'form-control']) !!}
            </div>
			<div class=" col-md-4 col-sm-4">{!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}</div>
        </div>
    </div>-->
	
	
	
    <div class="row">
        <div class="form-group {{$errors-> has('email') ? 'has-error' : ''}}" style="margin-top: 30px">
            <label for="sector" class="col-md-2  col-sm-2 control-label">Email роботодавця</label>
            <div class="col-md-6 col-sm-6">
                {!! Form::text('email', $userEmail, array( 'class' => 'form-control','id' => 'exampleInputEmail1','placeholder' => $userEmail )) !!}
            </div>
            <div > <span style="color: red"  >* <?php echo $errors->first('email',':message'); ?></span> </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group {{$errors-> has('city') ? 'has-error' : ''}}" style="margin-top: 30px">
            <label  for="sector" class="col-md-2 col-sm-2 control-label">Виберіть місто</label>
            <div class="col-md-6 col-sm-6">
                <select class="form-control js-example-basic-multiple"  multiple="multiple"  name="city[]" id="city">
                    @foreach($cities as $city)
                        {
                        <option value="{{$city->id}}">{{$city->name}}</option>
                        }
                    @endforeach
                    @if(Input::old('city')!= '')
                        @foreach(Input::old('city') as $cityId)
                            {
                            <option selected value="{{$cityId}}">{{\App\Models\City::find($cityId)->name}}</option>
                            }
                        @endforeach
                    @endif
                </select>
            </div>
            <div> <span style="color: red"> * <?php echo $errors->first('city',':message'); ?></span> </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group {{$errors-> has('description') ? 'has-error' : ''}}" style="margin-top: 30px">
            <label for="sector" class="col-md-2 col-sm-2 control-label">Опис</label>
            <div class="col-md-6 col-sm-6">
                {!! Form::textarea('description', Input::old('description'), array('class' => 'form-control','onfocus' =>'validateDisc(this)')) !!}
            </div>
            <div > <span style="color: red"> * <?php echo $errors->first('description',':message'); ?></span> </div>
        </div>
    </div>
    </br>

    <div class="row">
        <div class="col-sm-offset-2 col-md-2  col-sm-2" style="margin-top: 20px">
            <input type="submit" class="btn btn-default" style="background: #f48952" value="Зареєструвати вакансію">
        </div>
    </div>

    {!!Form::token()!!}
    {!!Form::close()!!}

@endsection

@section('footer')

    <script type="text/javascript">

        $('#city').select2({
            "language": {
                "noResults": function(){
                    return "Нічого не знайдено по Вашому запиту";
                }
            }
        });


    </script>
@stop