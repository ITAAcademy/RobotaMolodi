<div class="form-group row resume-row {{$errors->has('name_u') ? 'has-error' : ''}}">
    <div class="col-md-3 col-sm-3 control-label label-text-resume">
        <span class="pull-right">
            {!! Form::label("name_u" ,trans('form.fullname'), ['class'=>'label-text-resume']) !!}
        </span>
    </div>
    <div class="col-md-6 col-sm-6 resume-form">
        <div class="resume-form-input">
            {!! Form::text('name_u', $resume->name_u, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-1 resume-form-star">
            <span class="required_field">*</span>
        </div>
    </div>
    <div class=" col-md-3 col-sm-3">
        {!! $errors->first('name_u', '<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group row resume-row {{$errors->has('telephone') ? 'has-error' : ''}}">
    <div class="col-md-3 col-sm-3 control-label label-text-resume">
        <span class="pull-right">
        {!! Form::label('telephone', trans('main.phone'), ['class'=>'label-text-resume']) !!}
        </span>
    </div>
    <div class=" col-md-6 col-sm-6 resume-form">
        <div class="resume-form-input">
            {!! Form::text('telephone', $resume->telephone, [
            'class'=>'form-control input-medium bfh-phone',
             'id' => 'telephone'
             ]) !!}
        </div>
        <div class="col-xs-1 resume-form-star">
            <span class="required_field"></span>
        </div>
    </div>
    <div class=" col-md-3 col-sm-3">
        {!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group row resume-row {{$errors->has('email') ? 'has-error' : ''}}">
    <div class="col-md-3 col-sm-3 control-label label-text-resume">
        <span class="pull-right">
        {!! Form::label('email', trans('form.email'), ['class'=>'label-text-resume']) !!}
        </span>
    </div>
    <div class=" col-md-6 col-sm-6 resume-form">
        <div class="resume-form-input">
            {!! Form::text('email', $resume->email, array( 'class' => 'form-control','id' => 'exampleInputEmail1'  )) !!}
        </div>
        <div class="col-xs-1 resume-form-star">
            <span class="required_field">*</span>
        </div>
    </div>
    <div class=" col-md-3 col-sm-3">
        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group row resume-row {{$errors->has('city') ? 'has-error' : ''}}">
    <div class="col-md-3 col-sm-3 control-label label-text-resume">
        <span class="pull-right">
        {!! Form::label('city', trans('form.city'), ['class'=>'label-text-resume']) !!}
        </span>
    </div>
    <div class=" col-md-6 col-sm-6 resume-form">
        <div class="resume-form-input">
            <select name="city" style="width: 100%" class="form-control select-width js-example-basic-multiple "
                    multiple="multiple" id="selectCity">
                @foreach($cities as $city)
                    <option value="{{$city->id}}"> {{$city->name}} </option>
                @endforeach
                <option value="{{$resume->city_id}}" selected>
                    {{$resume->city_id ? $resume->city->name : ""}}
                </option>
            </select>
        </div>
        <div class="col-xs-1 resume-form-star">
            <span class="required_field">*</span>
        </div>
    </div>
    <div class=" col-md-3 col-sm-3">
        {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group row resume-row {{$errors->has('branch') ? 'has-error' : ''}}">
    <div class="col-md-3 col-sm-3 control-label label-text-resume">
        <span class="pull-right">
        {!! Form::label('industry', trans('form.branch'), ['class'=>'label-text-resume']) !!}
        </span>
    </div>
    <div class=" col-md-6 col-sm-6 resume-form">
        <div class="resume-form-input">
            <select name="industry" style="width: 100%" class="form-control" id="selectIndustry">
                @foreach($industries as $industry)
                    <option value="{{$industry->id}}">
                        {{$industry->name}}
                    </option>
                @endforeach
                <option value="{{$resume->industry->name}}" selected>
                    {{$resume->industry->name}}
                </option>
            </select>
        </div>
        <div class="col-xs-1 resume-form-star">
            <span class="required_field">*</span>
        </div>
    </div>
    <div class=" col-md-3 col-sm-3">
        {!! $errors->first('industry', '<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group row resume-row {{$errors->has('position') ? 'has-error' : ''}}">
    <div class="col-md-3 col-sm-3 control-label label-text-resume">
        <span class="pull-right">
        {!! Form::label('position', trans('form.position'), ['class'=>'label-text-resume'] ) !!}
        </span>
    </div>
    <div class=" col-md-6 col-sm-6 resume-form">
        <div class="resume-form-input">
            <select name="position" id="position" class="form-control">
                @foreach($positions as $position)
                    {!! $position == $resume->position ?
                     "<option value='$resume->position' selected>$resume->position</option>" :
                    "<option value='$position'>$position</option>" !!}
                @endforeach
            </select>
        </div>
        <div class="col-xs-1 resume-form-star">
            <span class="required_field">*</span>
        </div>
    </div>
    <div class=" col-md-3 col-sm-3">
        {!! $errors->first('position', '<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group row resume-row {{$errors-> has('salary') ? 'has-error' : ''}}">
    <div class="col-md-3 col-sm-3 control-label label-text-resume">
        <span class="pull-right">
        {!! Form::label('salary', trans('form.salarymin'), ['class'=>'label-text-resume']) !!}
        </span>
    </div>
    <div class=" col-md-6 col-sm-6 resume-form">
        <div class="resume-form-input">
            {!! Form::text('salary', $resume->salary, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-1 resume-form-star">
            <span class="required_field">*</span>
        </div>
    </div>
    <div class=" col-md-3 col-sm-3">
        {!! $errors->first('salary', '<span class="help-block">:message</span>') !!}
    </div>
</div>

<div class="form-group resume-row {{$errors-> has('salary_max') ? 'has-error' : ''}}">
    <div class="col-md-3 col-sm-3 control-label label-text-resume">
        <span class="pull-right">
        {!! Form::label('salary_max', trans('form.salarymax'), ['class'=>'label-text-resume']) !!}
        </span>
    </div>
    <div class=" col-md-6 col-sm-6 resume-form">
        <div class="resume-form-input">
            {!! Form::text('salary_max', $resume->salary_max, ['class'=>'form-control']) !!}
        </div>
        <div class="col-xs-1 resume-form-star">
            <span class="required_field">*</span>
        </div>
    </div>
    <div class=" col-md-3 col-sm-3">
        {!! $errors->first('salary_max', '<span class="help-block">:message</span>') !!}
    </div>
</div>