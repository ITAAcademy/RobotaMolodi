<link href="{{ asset('/css/cabinet/cabinetMyResVacCom.css') }}" rel="stylesheet">
<link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">

@extends ('cabinet/cabinet')

@section('titles')
    <li role = "presentation"><a class="link-resume" href={{ route('resume.index') }}><span>{!! Html::image('image/allresumes.png','Res',['id'=>'allresumes']) !!}</span>{{ trans('resume.myresume') }}</a></li>
    <li role = "presentation"><a class="link-vacancy" href={{ route('vacancy.index') }}><span>{!! Html::image('image/allvacancies.png','Vac',['id'=>'allvacancies']) !!}</span>{{ trans('resume.myvacancy') }}</a></li>
    <li role = "presentation"><a class="link-company" href={{ route('company.index') }}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span>{{ trans('resume.mycompanies') }}</a></li>
    <li role = "presentation" class="active"><a class="link-project" href={{ route('project.index', Auth()->user()->id) }}><span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allprojects']) !!}</span>{{ trans('resume.myprojects') }}</a></li>
@stop

@section('contents')
    @forelse ($projects as $project)
        <div class="one-for-cabinet">
            <div class="row">
                <div class="col-xs-12 col-md-2">
                    <div class="panel panel-orange" id="vimg">
                        <a href="{{route('project.show', $project->id)}}">
                            @if(File::exists(public_path('image/company/' . $project->id .'/'. $project->logo)) and $project->logo != '')
                                {!! Html::image('image/company/' . $project->id .'/'. $project->logo, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                            @else
                                {!! Html::image('image/company_tmp.png', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                            @endif
                        </a>
                    </div>
                    @include('newDesign.socialModule.share-btn-block' , ['url' => URL::asset('/project/'.$project->id)])
                </div>
                <div class="col-xs-12 col-md-10">
                    <div class="panel-heading-cabinet">
                        <p class="position-cabinet">
                            <a class="orangColor-cabinet-name" href="{{route('project.show', $project->id)}}">{{$project->name}}</a>
                            <br>
                        </p>
                        <p  class="description-cabinet projectAbout">{!! strip_tags($project->project_about) !!}</p>
                        {{--<p class="name-cabinet"> {{$company->Industry()->name}}</p>--}}
                        {{--TODO need to added company Industry--}}
                    </div>
                    <div>
                        <p class="cityTime-cabinet">
                            {{--TODO Refactor code to city in CompanyController--}}
                            {{--<span class="description-cabinet">@foreach($company->Cities()->get() as $city){{ $city->name}} @endforeach</span>--}}
                            <span id="yellowCircle-cabinet">&#183;</span>
                            <span class="updateDate-cabinet-vac">{{ date('j m Y', strtotime($project->updated_at))}}</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <div class="col-xs-12 col-md-3">
                        <a class="orangColor-cabinet" href="/project/{{$project->id}}/destroy" onclick="return ConfirmDelete();">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            <span>{{ trans('project/navbar.delete_project') }}</span>
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <a class="orangColor-cabinet" href="/project/{{$project->id}}/edit">
                            {!! Html::image('image/edit.png', 'del') !!}
                            <span>{{ trans('project/navbar.edit_project') }}</span>
                        </a>
                    </div>
                    <div class="col-xs-12 col-md-3">
                        <a class="orangColor-cabinet" href="#">
                            {!! Html::image('image/podiumOrenge.png', 'del') !!}
                            <span>{{ trans('project/navbar.publish_project') }}</span>
                        </a>
                    </div>
                    {{--<div class="col-xs-12 col-md-3">--}}
                    {{--TODO TODO: fix "place in tops"--}}
                    {{--<a class="orangColor-cabinet" href="#" onclick="javascript:document.location.reload();">--}}
                    {{--{!! Html::image('image/podiumOrenge.png', 'del') !!}--}}
                    {{--<span> {{ trans('main.placetop') }}</span>--}}
                    {{--</a>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
        <hr class="line-sort-box">
    @empty
        <li><a href="{{ route('project.create') }}" > {{ trans('project.addProject') }}</a></li>
    @endforelse
@stop