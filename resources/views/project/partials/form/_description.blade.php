<div class="form-group">
    {!! Form::label('name', trans('project.name'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
      {!! Form::text('name', $project['name'], ['class' => 'form-control', 'required' => '']) !!}
    </div>
    {!! $errors->first('name','<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    {!! Form::label('industry_id', trans('project.industry'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::select('industry_id', $industries, null, ['class' => 'form-control', 'required' => '']) !!}
    </div>
    {!! $errors->first('industry_id','<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    {!! Form::label('company_id', trans('project.company'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::select('company_id', $companies, null, ['class' => 'form-control', 'required' => '']) !!}
    </div>
    {!! $errors->first('company_id','<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    {!! Form::label('', trans('project.logo'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::file('logo', ['id' => 'logoProject', 'class' => 'hidden', 'accept' => 'image/*']) !!}
        <a class="btn btn-default btn-load-img" href="javascript:$('#logoProject').click()">З диску</a>
    </div>
    <div class="col-sm-5">
        <img id="prevLogo" src="{{ $project['logo'] or '#' }}" alt="Project Logo" />
    </div>
    {!! $errors->first('logoProject','<span class="help-block">:message</span>') !!}
</div>

<div class="form-group">
    {!! Form::label('company_desc', trans('project.companyDesc'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('company_desc', $project['company_desc'], ['class' => 'form-control', 'required' => '']) !!}
    </div>
    {!! $errors->first('company_desc','<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    {!! Form::label('company_about', trans('project.companyAbout'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('company_about', $project['company_about'], ['class' => 'form-control', 'required' => '']) !!}
    </div>
    {!! $errors->first('company_about','<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    {!! Form::label('project_about', trans('project.projectAbout'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('project_about', $project['project_about'], ['class' => 'form-control', 'required' => '']) !!}
    </div>
    {!! $errors->first('project_about','<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    {!! Form::label('project_term', trans('project.projectTerm'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('project_term', $project['project_term'], ['class' => 'form-control', 'required' => '']) !!}
    </div>
    {!! $errors->first('project_term','<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    {!! Form::label('brand', trans('project.brand'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('brand', $project['brand'], ['class' => 'form-control', 'required' => '']) !!}
    </div>
    {!! $errors->first('brand','<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    {!! Form::label('location', trans('project.location'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('location', $project['location'], ['class' => 'form-control', 'required' => '']) !!}
    </div>
    {!! $errors->first('location','<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    {!! Form::label('bonuses', trans('project.bonuses'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('bonuses', $project['bonuses'], ['class' => 'form-control', 'required' => '']) !!}
    </div>
    {!! $errors->first('bonuses','<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    {!! Form::label('breaf_desc', trans('project.breafDesc'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('breaf_desc', $project['breaf_desc'], ['class' => 'form-control', 'required' => '']) !!}
    </div>
    {!! $errors->first('breaf_desc','<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    {!! Form::label('full_desc', trans('project.fullDesc'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('full_desc', $project['full_desc'], ['class' => 'form-control', 'required' => '']) !!}
    </div>
    {!! $errors->first('full_desc','<span class="help-block">:message</span>') !!}
</div>
