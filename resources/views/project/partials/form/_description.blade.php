<div class="form-group">
    {!! Form::label('name', trans('project.name'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
      {!! Form::text('name', $project['name'], ['class' => 'form-control', 'required' => '']) !!}
      @if($project->getError('name'))
        @each('errors.partial._validation', $project->getError('name'), 'error' )
      @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('industry_id', trans('project.industry'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::select('industry_id', $industries, null, ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('industry_id'))
          @each('errors.partial._validation', $project->getError('industry_id'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('company_id', trans('project.company'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::select('company_id', $companies, null, ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('company_id'))
          @each('errors.partial._validation', $project->getError('company_id'), 'error' )
        @endif
    </div>
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
</div>

<div class="form-group">
    {!! Form::label('company_desc', trans('project.companyDesc'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('company_desc', $project['company_desc'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('company_desc'))
          @each('errors.partial._validation', $project->getError('company_desc'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('company_about', trans('project.companyAbout'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('company_about', $project['company_about'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('company_about'))
          @each('errors.partial._validation', $project->getError('company_about'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('project_about', trans('project.projectAbout'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('project_about', $project['project_about'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('project_about'))
          @each('errors.partial._validation', $project->getError('project_about'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('project_term', trans('project.projectTerm'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('project_term', $project['project_term'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('project_term'))
          @each('errors.partial._validation', $project->getError('project_term'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('brand', trans('project.brand'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('brand', $project['brand'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('brand'))
          @each('errors.partial._validation', $project->getError('brand'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('location', trans('project.location'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('location', $project['location'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('location'))
          @each('errors.partial._validation', $project->getError('location'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('bonuses', trans('project.bonuses'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('bonuses', $project['bonuses'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('bonuses'))
          @each('errors.partial._validation', $project->getError('bonuses'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('breaf_desc', trans('project.breafDesc'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('breaf_desc', $project['breaf_desc'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('breaf_desc'))
          @each('errors.partial._validation', $project->getError('breaf_desc'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('full_desc', trans('project.fullDesc'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('full_desc', $project['full_desc'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('full_desc'))
          @each('errors.partial._validation', $project->getError('full_desc'), 'error' )
        @endif
    </div>
</div>
