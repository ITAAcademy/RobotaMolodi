@extends('app')

@section('content')
    {!!Form::model($vacancy,array('route' =>array('vacancy.update',$vacancy->id),'method' => 'put', 'id'=>'form_id'))!!}
    <h3>Редагування вакансії</h3>
    <div > <span style="color: red"><h4><?php echo $errors->first('deleted',':message'); ?></h4></span> </div>
    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Позиція</label>
        <div class="col-sm-5">
            {!! Form::text('position', $vacancy->position, array('class' => 'form-control','onSubmit' =>'checkForm(this)')) !!}
        </div>

        <div > <span style="color: red">* <?php echo $errors->first('position',':message'); ?></span> </div>

        </br>
    </div>
    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Виберіть галузь</label>
        <div class="col-sm-5">
            <select class="form-control" id="selectGaluz" name="branch" >
                @if (Input::old('branch')==''))
                @foreach($industries as $industry)
                    {
                    <option value="{{$industry->id}}">{{$industry->name}}</option>
                    }
                @endforeach
                @else
                    @foreach($industries as $industry)
                        {
                        @if($industry->id !=  Input::old('branch'))
                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                        @else
                            <option selected value="{{$industry->id}}">{{$industry->name}}</option>
                            }
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
                    @if($comp->id != Input::old('Organisation'))
                        @if($comp->id != $vacancy->company_id)
                            <option value="{{$comp->id}}">{{$comp->company_name}}</option>
                        @else
                            <option value="{{$vacancy->company_id}}" selected>{{$vacancy->company->company_name}}</option>
                        @endif
                    @else($comp->id == Input::old('Organisation'))
                        <option value="{{$comp->id}}" selected>{{$comp->company_name}}</option>
                    @endif
                @endforeach
            </select>
        </div></br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Зарплата (мiнiмальна)</label>
        <div class="col-sm-5">
            {!! Form::text('salary', $vacancy->salary, array('class' => 'form-control' )) !!}
        </div>
        <div > <span style="color: red"  >* <?php echo $errors->first('salary',':message'); ?></span> </div>
        </br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Зарплата (максимальна)</label>
        <div class="col-sm-5">
            {!! Form::text('salary_max', $vacancy->salary_max, array('class' => 'form-control' )) !!}
        </div>
        <div > <span style="color: red"  >* <?php echo $errors->first('salary_max',':message'); ?></span> </div>
        </br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Валюта</label>
        <div class="col-sm-5">
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
        </div></br>
    </div>

    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Email роботодавця</label>
        <div class="col-sm-5">
            {!! Form::text('email', $userEmail, array( 'class' => 'form-control','id' => 'exampleInputEmail1','placeholder' => $userEmail )) !!}
        </div>
        <div > <span style="color: red"  >* <?php echo $errors->first('email',':message'); ?></span> </div>
        </br>
    </div>


        <!--<div class="form-group {{$errors-> has('telephone') ? 'has-error' : ''}}" ">
            <label for="sector" class="col-sm-2 control-label">{!! Form::label('Телефон') !!}</label>
            <div class="col-sm-5">
                {!! Form::text('telephone', Input::old('telephone'), ['class'=>'form-control']) !!}
            </div>
			<div class=" col-md-4 col-sm-4">{!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}</div>
        </div><br>-->



    <div class="form-group {{$errors-> has('city') ? 'has-error' : ''}}" style="margin-top: 30px">

        <label for="sector" class="col-sm-2 control-label">Виберіть місто</label>
        <div class="col-sm-5">
            <select class="form-control js-example-basic-multiple"  multiple="multiple"  name="city[]" id="city">
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
                @foreach($vacancy_City as $city)
                    <option selected value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>
        <div > <span style="color: red"> * <?php echo $errors->first('city',':message'); ?></span> </div>
        </br>
    </div>


    <div class="row">
    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Опис</label>
        <div class="col-sm-5">
            {!! Form::textarea('description', $vacancy->description, array('class' => 'form-control', 'id'=>'description' )) !!}
        </div>
        <div > <span style="color: red"> * <?php echo $errors->first('description',':message'); ?></span> </div>
        </br>
    </div>
    </div>
    <div class="row">
    <div class="form-group" style="margin-top: 30px">
        <label class="col-sm-2 control-label">Статус публікації</label>
        <div class="col-sm-5">
            <select class="form-control" id="published" name="published" >
                @if (Input::old('published')=='')
                    @for($i=0; $i<count($publishedOptions); $i++)
                        <option @if($i==$vacancy->published) selected="selected" @endif value="{{$i}}">{{$publishedOptions[$i]}}</option>
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
        </div>
    <div class="row">
    <div class="form-group" style="margin: 20px 0 0 185px;  text-align: left;">
        <input type="submit" class="btn btn-default" style="background:#f68c06" value="Зареєструвати вакансію">
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

@stop
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $( ".form-control" ).change(function() {
//            $(window).bind('beforeunload', function () {
//                return 'Збережіть будь ласка всі внесені нові дані!';
//            });
            $('#form_id').submit(function () {
                $(window).unbind('beforeunload');
            });
        });

    });
</script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
	$(document).ready(function() {
		CKEDITOR.replace( 'description' );
        $("#city").select2();
	});
</script>
