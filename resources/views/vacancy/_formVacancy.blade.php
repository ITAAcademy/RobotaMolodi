<div class="row">
    <div class="form-group {{$errors-> has('position') ? 'has-error' : ''}}" style="margin-top: 30px">
        <label for="sector" class="col-md-3 col-sm-3 control-label label-text-vacancy">
            {{ trans('form.position') }}
        </label>
        <div class="col-md-6 col-sm-6">
{{--        {!! Form::text('position', Input::old('position'), array('class' => 'form-control','onSubmit' =>'checkForm(this)')) !!}--}}
            <select name="position" id="position" class="form-control" onsubmit="checkForm(this)">
                @foreach($positions as $spec)
                    @if(isset($vacancy) && ($vacancy->position == $spec))
                        <option value="{{$spec}}" selected> {{$spec}} </option>
                    @else
                        <option value="{{$spec}}" > {{$spec}} </option>

                    @endif
                @endforeach
            </select>
        </div>
        <div>
            <span style="color: red">
                * <?php echo $errors->first('position',':message'); ?>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <label for="sector" class="col-md-3 col-sm-3 control-label label-text-vacancy">
            {{ trans('form.branch') }}
        </label>
        <div class="col-md-6 col-sm-6">
            <select class="form-control"  id="selectGaluz" name="branch">
                @foreach($industries as $industry)
                    {
                    <option value="{{$industry->id}}">
                        {{$industry->name}}
                    </option>
                    }
                @endforeach
                @if(Input::old('branch')!= '')
                    @foreach($industries as $industry)
                        @if($industry->id == Input::old('branch'))
                            <option value="{{$industry->id}}" selected>
                                {{$industry->name}}
                            </option>
                        @endif
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group {{$errors-> has('Organisation') ? 'has-error' : ''}}">
        <label for="sector" class="col-md-3 col-sm-3 control-label label-text-vacancy">
            {{ trans('form.organization') }}
        </label>
        <div class="col-md-6 col-sm-6">
            <select class="form-control" id="selectOrgan" name="Organisation">
                @foreach($companies as $comp)
                    @if($comp->id != Input::old('Organisation'))
                        <option value="{{$comp->id}}">
                            {{$comp->company_name}}
                        </option>
                    @else($comp->id == Input::old('Organisation'))
                        <option value="{{$comp->id}}" selected>
                            {{$comp->company_name}}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div>
            <span style="color: red"  >
                * <?php echo $errors->first('Organisation',':message'); ?>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group {{$errors-> has('salary') ? 'has-error' : ''}}">
        <label for="salary" class="col-md-3 col-sm-3 control-label label-text-vacancy">
            {{ trans('form.salarymin') }}
        </label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('salary', Input::old('salary'), array('class' => 'form-control','id' => 'Salary' )) !!}
        </div>
        <div>
            <span style="color: red"  >
                * <?php echo $errors->first('salary',':message'); ?>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group {{$errors-> has('salary_max') ? 'has-error' : ''}}">
        <label for="salary_max" class="col-md-3 col-sm-3 control-label label-text-vacancy">
            {{ trans('form.salarymax') }}
        </label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('salary_max', Input::old('salary_max'), array('class' => 'form-control','id' => 'Salary_max' )) !!}
        </div>
        <div>
            <span style="color: red"  >
                * <?php echo $errors->first('salary_max',':message'); ?>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <label for="sector" class="col-md-3 col-sm-3 control-label label-text-vacancy">
            {{ trans('form.currency') }}
        </label>
        <div class="col-md-6 col-sm-6">
            <select class="form-control" id="selectCurrency" name="currency_id">
                @if (Input::old('currency_id')==''))
                @foreach($currencies as $currency)
                    {
                    <option value="{{$currency->id}}">
                        {{$currency->currency}}
                    </option>
                    }
                @endforeach
                @else
                    @foreach($currencies as $currency)
                        {
                        @if($currency->id !=  Input::old('currency_id'))
                            <option value="{{$currency->id}}">
                                {{$currency->currency}}
                            </option>
                        @else
                            <option selected value="{{$currency->id}}">
                                {{$currency->currency}}
                            </option>
                            }
                        @endif
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group {{$errors-> has('email') ? 'has-error' : ''}}">
        <label for="sector" class="col-md-3  col-sm-3 control-label label-text-vacancy">
            {{ trans('form.email') }}
        </label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('email', $userEmail, array( 'class' => 'form-control','id' => 'exampleInputEmail1','placeholder' => $userEmail )) !!}
        </div>
        <div>
            <span style="color: red"  >
                * <?php echo $errors->first('email',':message'); ?>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group {{$errors-> has('city') ? 'has-error' : ''}}">
        <label  for="sector" class="col-md-3 col-sm-3 control-label label-text-vacancy">
            {{ trans('form.city') }}
        </label>
        <div class="col-md-6 col-sm-6">
            <select class="form-control js-example-basic-multiple"  multiple="multiple"  name="city[]" id="city">
                @foreach($cities as $city)
                     <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
                @if(isset($vacancy_City))
                    @foreach($vacancy_City as $city)
                        <option selected value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div>
            <span style="color: red">
                * <?php echo $errors->first('city',':message'); ?>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group {{$errors-> has('description') ? 'has-error' : ''}}">
        <label for="sector" class="col-md-3 col-sm-3 control-label label-text-vacancy">
            {{ trans('main.description') }}
        </label>
        <div class="col-md-6 col-sm-6">
            {!! Form::textarea('description', Input::old('description'), array('class' => 'form-control','id'=>'description','onfocus' =>'validateDisc(this)')) !!}
        </div>
        <div>
            <span style="color: red">
                * <?php echo $errors->first('description',':message'); ?>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <label class="col-sm-3 control-label label-text-vacancy">
            {{ trans('form.status') }}
        </label>
        <div class="col-sm-6" style="margin-top: 15px">
            <select class="form-control" id="published" name="published" >
                @if (Input::old('published')=='')
                    @for($i=0; $i<count($publishedOptions); $i++)
                        @if ($i==1)
                            <option selected value="{{$i}}">
                                {{$publishedOptions[$i]}}
                            </option>
                        @else
                            <option value="{{$i}}">
                                {{$publishedOptions[$i]}}
                            </option>
                        @endif
                    @endfor
                @else
                    @for($i=0; $i<count($publishedOptions); $i++)
                        @if (Input::old('published')==$i)
                            <option selected value="{{$i}}" >
                                {{$publishedOptions[$i]}}
                            </option>
                        @else
                            <option value="{{$i}}">
                                {{$publishedOptions[$i]}}
                            </option>
                        @endif
                    @endfor
                @endif
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group" style="margin-top: 15px;">
        <div class="col-md-3 col-sm-3"> </div>
        <div class="col-md-6 col-sm-6">
            <input type="submit" class="btn btn-primary" style="background: #f48952;" value={{ trans('form.regvacancy') }}>
        </div>
    </div>
</div>
