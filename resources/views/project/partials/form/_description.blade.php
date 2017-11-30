<div class="form-group">
    {!! Form::label('name', trans('project.name')) !!}
    {!! Form::text('name', $project->name, ['class' => 'form-control']) !!}
    {!! $errors->first('name','<span class="help-block">:message</span>') !!}

    {!! Form::label('logo', trans('project.logo')) !!}
    {!! Form::file('logo') !!}
    {!! $errors->first('logo','<span class="help-block">:message</span>') !!}

    {!! Form::label('company_desc', trans('project.companyDesc')) !!}
    {!! Form::text('company_desc', $project->description['company_desc'], ['class' => 'form-control']) !!}
    {!! $errors->first('company_desc','<span class="help-block">:message</span>') !!}

    {!! Form::label('company_about', trans('project.companyAbout')) !!}
    {!! Form::textarea('company_about', $project->description['company_about'], ['class' => 'form-control']) !!}
    {!! $errors->first('company_about','<span class="help-block">:message</span>') !!}

    {!! Form::label('project_about', trans('project.projectAbout')) !!}
    {!! Form::textarea('project_about', $project->description['project_about'], ['class' => 'form-control']) !!}
    {!! $errors->first('project_about','<span class="help-block">:message</span>') !!}

    {!! Form::label('project_term', trans('project.projectTerm')) !!}
    {!! Form::text('project_term', $project->description['project_term'], ['class' => 'form-control']) !!}
    {!! $errors->first('project_term','<span class="help-block">:message</span>') !!}

    {!! Form::label('brand', trans('project.brand')) !!}
    {!! Form::text('brand', $project->brand, ['class' => 'form-control']) !!}
    {!! $errors->first('brand','<span class="help-block">:message</span>') !!}

    {!! Form::label('location', trans('project.location')) !!}
    {!! Form::text('location', $project->location, ['class' => 'form-control']) !!}
    {!! $errors->first('location','<span class="help-block">:message</span>') !!}

    {!! Form::label('bounses', trans('project.bonuses')) !!}
    {!! Form::text('bounses', $project->bonus, ['class' => 'form-control']) !!}
    {!! $errors->first('bonuses','<span class="help-block">:message</span>') !!}

    {!! Form::label('breaf_desc', trans('project.breafDesc')) !!}
    {!! Form::textarea('breaf_desc', $project->description['breaf_desc'], ['class' => 'form-control']) !!}
    {!! $errors->first('breaf_desc','<span class="help-block">:message</span>') !!}

    {!! Form::label('full_desc', trans('project.fullDesc')) !!}
    {!! Form::textarea('full_desc', $project->description['full_desc'], ['class' => 'form-control']) !!}
    {!! $errors->first('full_desc','<span class="help-block">:message</span>') !!}
 </div>
