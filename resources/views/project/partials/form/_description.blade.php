<div class="form-group">
    {!! Form::label('name', trans('project.name')) !!}
    {!! Form::text('name', $project->name, ['class' => 'form-control']) !!}
    {!! $errors->first('name','<span class="help-block">:message</span>') !!}

    {!! Form::label('logo', trans('project.logo')) !!}
    {!! Form::file('logo') !!}
    {!! $errors->first('logo','<span class="help-block">:message</span>') !!}

    {!! Form::label('desc_company', trans('project.descCompany')) !!}
    {!! Form::text('desc_company', $project->description['desc_company'], ['class' => 'form-control']) !!}
    {!! $errors->first('desc_company','<span class="help-block">:message</span>') !!}

    {!! Form::label('about_company', trans('project.aboutCompany')) !!}
    {!! Form::textarea('about_company', $project->description['about_company'], ['class' => 'form-control']) !!}
    {!! $errors->first('about_company','<span class="help-block">:message</span>') !!}

    {!! Form::label('about_project', trans('project.aboutCompany')) !!}
    {!! Form::textarea('about_project', $project->description['about_project'], ['class' => 'form-control']) !!}
    {!! $errors->first('about_project','<span class="help-block">:message</span>') !!}

    {!! Form::label('term_project', trans('project.aboutCompany')) !!}
    {!! Form::text('term_project', $project->description['term_project'], ['class' => 'form-control']) !!}
    {!! $errors->first('term_project','<span class="help-block">:message</span>') !!}

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
