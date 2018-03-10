@extends ('cabinet/cabinet')

@section('titles')
    <li role = "presentation"><a class="link-resume" href={{ route('resume.index') }}><span>{!! Html::image('image/allresumes.png','Res',['id'=>'allresumes']) !!}</span>{{ trans('resume.myresume') }}</a></li>
    <li role = "presentation"><a class="link-vacancy" href={{ route('vacancy.index') }}><span>{!! Html::image('image/allvacancies.png','Vac',['id'=>'allvacancies']) !!}</span>{{ trans('resume.myvacancy') }}</a></li>
    <li role = "presentation"><a class="link-company" href={{ route('company.index') }}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span>{{ trans('resume.mycompanies') }}</a></li>
    <li role = "presentation" class="active"><a class="link-project" href={{ route('project.index', Auth()->user()->id) }}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allprojects']) !!}</span>{{ trans('resume.myprojects') }}</a></li>
@stop

@section('contents')
    <h1>myProjects</h1>
    <ul>
        @forelse ($projects as $project)
            <li><a href="{{ route('project.show',['id' => $project->id]) }}" > {{ $project->name }}</a></li>
        @empty
            <li><a href="{{ route('project.create') }}" > {{ trans('project.addProject') }}</a></li>
        @endforelse
    </ul>
@stop