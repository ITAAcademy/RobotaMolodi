<div class="form-group">
    {!! Form::label('name', trans('project/description.name'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
      {!! Form::text('name', $project['name'], ['class' => 'form-control', 'required' => '']) !!}
      @if($project->getError('name'))
        @each('errors.partial._validation', $project->getError('name'), 'error' )
      @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('industry_id', trans('project/description.industry'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::select('industry_id', $industries, null, ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('industry_id'))
          @each('errors.partial._validation', $project->getError('industry_id'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('company_id', trans('project/description.company'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::select('company_id', $companies, null, ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('company_id'))
          @each('errors.partial._validation', $project->getError('company_id'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('', trans('project/description.logo'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-3">
        {!! Form::file('logo', ['id' => 'logoProject', 'class' => 'inputImg', 'accept' => 'image/*']) !!}
    </div>
    <div class="col-sm-5">
        <img class="prevImg img-responsive img-rounded" src="{{ $project['logo'] or '#' }}" alt="Project Logo" />
    </div>
</div>

<div class="form-group">
    {!! Form::label('company_desc', trans('project/description.companyDesc'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('company_desc', $project['company_desc'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('company_desc'))
          @each('errors.partial._validation', $project->getError('company_desc'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('company_about', trans('project/description.companyAbout'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('company_about', $project['company_about'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('company_about'))
          @each('errors.partial._validation', $project->getError('company_about'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('project_about', trans('project/description.projectAbout'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::textarea('project_about', $project['project_about'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('project_about'))
          @each('errors.partial._validation', $project->getError('project_about'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('project_term', trans('project/description.projectTerm'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('project_term', $project['project_term'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('project_term'))
          @each('errors.partial._validation', $project->getError('project_term'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('brand', trans('project/description.brand'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('brand', $project['brand'], ['class' => 'form-control']) !!}
        @if($project->getError('brand'))
          @each('errors.partial._validation', $project->getError('brand'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('location', trans('project/description.location'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('location', $project['location'], ['class' => 'form-control', 'required' => '']) !!}
        @if($project->getError('location'))
          @each('errors.partial._validation', $project->getError('location'), 'error' )
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('bonuses', trans('project/description.bonuses'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('bonuses', $project['bonuses'], ['class' => 'form-control']) !!}
        @if($project->getError('bonuses'))
          @each('errors.partial._validation', $project->getError('bonuses'), 'error' )
        @endif
    </div>
</div>

