@extends ('app')

@section('content')

    {!!Form::open(['route' => 'vacancy.store','onsubmit' => 'return CheckForm()', 'id'=>'form_id'])!!}

    <div class="row">
        <h3 class="formTitle header-text-vacancy"><b>додати вакансiю</b></h3>
        <div class="form-group {{$errors-> has('position') ? 'has-error' : ''}}" style="margin-top: 30px">
            <label for="sector" class="col-md-2 col-sm-2 control-label label-text-vacancy">Позиція</label>
            <div class="col-md-6 col-sm-6">
                <!-- {!! Form::text('position', Input::old('position'), array('class' => 'form-control','onSubmit' =>'checkForm(this)')) !!} -->
                <select name="position" id="position" class="form-control" onsubmit="checkForm(this)">
                    @if ((Input::old('position')!= ''))<option value="{{Input::old('position')}}"> {{Input::old('position')}} @else</option>  <option value="empty"></option>@endif
                    @foreach($positions as $spec)
                        <option value="{{$spec}}"> {{$spec}} </option>
                    @endforeach
                </select>
            </div>
            <div > <span style="color: red">* <?php echo $errors->first('position',':message'); ?></span> </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group" style="margin-top: 30px">
            <label for="sector" class="col-md-2 col-sm-2 control-label label-text-vacancy">Оберіть галузь</label>
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
        <div class="form-group {{$errors-> has('Organisation') ? 'has-error' : ''}}" style="margin-top: 30px">
            <label for="sector" class="col-md-2 col-sm-2 control-label label-text-vacancy">Оберіть організацію</label>
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
            <div > <span style="color: red"  >* <?php echo $errors->first('Organisation',':message'); ?></span> </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group {{$errors-> has('salary') ? 'has-error' : ''}}" style="margin-top: 30px">
            <label for="sector" class="col-md-2 col-sm-2 control-label label-text-vacancy">Зарплата (мiнiмальна)</label>
            <div class="col-md-6 col-sm-6">
                {!! Form::text('salary', Input::old('salary'), array('class' => 'form-control','id' => 'Salary' )) !!}
            </div>
            <div > <span style="color: red"  >* <?php echo $errors->first('salary',':message'); ?></span> </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group {{$errors-> has('salary_max') ? 'has-error' : ''}}" style="margin-top: 30px">
            <label for="sector" class="col-md-2 col-sm-2 control-label label-text-vacancy">Зарплата (максимальна)</label>
            <div class="col-md-6 col-sm-6">
                {!! Form::text('salary_max', Input::old('salary_max'), array('class' => 'form-control','id' => 'Salary_max' )) !!}
            </div>
            <div > <span style="color: red"  >* <?php echo $errors->first('salary_max',':message'); ?></span> </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group" style="margin-top: 30px">
            <label for="sector" class="col-md-2 col-sm-2 control-label label-text-vacancy">Валюта</label>
            <div class="col-md-6 col-sm-6">
                <select class="form-control" id="selectCurrency" name="currency_id">
                    @if (Input::old('currency_id')==''))
                        @foreach($currencies as $currency)
                            {
                            <option value="{{$currency->id}}">{{$currency->currency}}</option>
                            }
                        @endforeach
                    @else
                        @foreach($currencies as $currency)
                            {
                            @if($currency->id !=  Input::old('currency_id'))
                                <option value="{{$currency->id}}">{{$currency->currency}}</option>
                            @else
                                <option selected value="{{$currency->id}}">{{$currency->currency}}</option>
                                }
                            @endif
                        @endforeach
                    @endif
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
            <label for="sector" class="col-md-2  col-sm-2 control-label label-text-vacancy">Email роботодавця</label>
            <div class="col-md-6 col-sm-6">
                {!! Form::text('email', $userEmail, array( 'class' => 'form-control','id' => 'exampleInputEmail1','placeholder' => $userEmail )) !!}
            </div>
            <div>
                <span style="color: red"  >* <?php echo $errors->first('email',':message'); ?></span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group {{$errors-> has('city') ? 'has-error' : ''}}" style="margin-top: 30px">
            <label  for="sector" class="col-md-2 col-sm-2 control-label label-text-vacancy">Виберіть місто</label>
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
            <label for="sector" class="col-md-2 col-sm-2 control-label label-text-vacancy">Опис</label>
            <div class="col-md-6 col-sm-6">
                {!! Form::textarea('description', Input::old('description'), array('class' => 'form-control','id'=>'description','onfocus' =>'validateDisc(this)')) !!}
            </div>
            <div>
                <span style="color: red"> * <?php echo $errors->first('description',':message'); ?></span>
            </div>
        </div>
    </div>
    </br>

    <div class="form-group" style="margin-top: 30px">
        <label class="col-sm-2 control-label label-text-vacancy">Статус публікації</label>
        <div class="col-sm-5">
            <select class="form-control" id="published" name="published" >
                @if (Input::old('published')=='')
                    @for($i=0; $i<count($publishedOptions); $i++)
                        @if ($i==1)
                            <option selected value="{{$i}}">{{$publishedOptions[$i]}}</option>
                        &@else
                        <option value="{{$i}}">{{$publishedOptions[$i]}}</option>
                        @endif
                    @endfor
                @else
                    @for($i=0; $i<count($publishedOptions); $i++)
                        @if (Input::old('published')==$i)
                            <option selected value="{{$i}}" >{{$publishedOptions[$i]}}</option>
                        @else
                            <option value="{{$i}}">{{$publishedOptions[$i]}}</option>
                        @endif
                    @endfor
                @endif
            </select>
        </div></br>
    </div>

    <div class="row">
        <div class="form-group" style="margin-top: 20px;  text-align: center;">
            <div class="col-md-2 col-sm-2"></div>
            <div class="col-md-6 col-sm-6">
                <input type="submit" class="btn btn-primary" style="background: #f48952;" value="Зареєструвати вакансію">
            </div>
        </div>
    </div>

    {!!Form::token()!!}
    {!!Form::close()!!}

    <script>$(document).ready(function(){CKEDITOR.replace( 'description' );});</script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

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
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $( ".form-control" ).change(function() {
            $(window).bind('beforeunload', function () {
                return 'Збережіть будь ласка всі внесені нові дані!';
            });
            $('#form_id').submit(function () {
                $(window).unbind('beforeunload');
            });
        });

    });
</script>

<script>
    $(document).ready(function() {
        $(".js-example-basic-multiple").select2();
        $("#selectCurrency").select2();
        $("#selectGaluz").select2();
        $("#selectOrgan").select2();
    });
</script>
<script>
	$(document).ready(function() {
        $('#phone').mask("+38(099) 999-99-99");
	});
</script>

