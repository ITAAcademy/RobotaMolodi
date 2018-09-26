@extends('app')
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">
<link rel='stylesheet' href='{{ asset('/css/fullcalendar/fullcalendar.css') }}'/>
<link href="{{ asset('/css/cabinet.css') }}" rel="stylesheet">
@section('content')
    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
         ['url'=> 'head','name'=>trans('content.main'),'showDisplay'=>'none'],
         ['name' => trans('content.personalcab'), 'url' => false]
         ]
     )
     )
    <div class="row cabinet-buttons">
        <div class="col-xs-11 col-md-11 header-tabs">
            <ul class="nav nav-tabs">
                @if(Auth()->user())
                    <li role="presentation">
                        <a class="link-resume" href={{route('cabinet.my_resumes', Auth()->user()->id)}}>
                            <span>{!! Html::image('image/allresumes.png','Res',['id'=>'allresumes']) !!}</span>
                            {{ trans('resume.myresume') }}
                        </a></li>
                    <li role="presentation">
                        <a class="link-vacancy" href={{route('cabinet.my_vacancies', Auth()->user()->id)}}>
                            <span>{!! Html::image('image/allvacancies.png','Vac',['id'=>'allvacancies']) !!}</span>
                            {{ trans('resume.myvacancy') }}
                        </a></li>
                    <li role="presentation">
                        <a class="link-company" href={{route('cabinet.my_companies', Auth()->user()->id)}}>
                            <span>{!! Html::image('image/allcompanies.png','Comp',['id'=>'allcompanies']) !!}</span>
                            {{ trans('resume.mycompanies') }}
                        </a></li>
                    <li role="presentation">
                        <a class="link-project" href={{route('cabinet.my_projects', Auth()->user()->id)}}>
                            <span>{!! Html::image('image/allcompanies.png','Proj',['id'=>'allprojects']) !!}</span>
                            {{ trans('resume.myprojects') }}
                        </a></li>
                    <li role="presentation">
                        <a class="link-project" href={{url('/events')}}>
                            <span>{!! Html::image('image/alladvisors.png') !!}</span>
                            {{ trans('consult.myconsults') }}
                        </a></li>
                @endif
            </ul>
        </div>

        <div class="col-xs-1 dropdown plus-dropdn">

            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                <span class="">+</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuPlus">
                <li class="plus-dropdn-h">{{ trans('navtab.add') }}</li>
                <li role="separator" class="divider"></li>
                <li><a href="{{route('vacancy.create')}}">{{ trans('navtab.vacancy') }}</a></li>
                <li><a href="{{route('company.create')}}">{{ trans('navtab.company') }}</a></li>
                <li><a href="{{route('resume.create')}}">{{ trans('navtab.resume') }}</a></li>
                <li><a href="{{route('project.create')}}">{{ trans('navtab.project') }}</a></li>
                <li><a href="{{route('sconsult.create')}}">{{ trans('navtab.advisor')  }}</a></li>
            </ul>
        </div>
    </div>

    <div class="content">
        <div class=" col-md-2 col-sm-3 col-xs-4 tbtxt">
            <a href="{{ url('events' ) }}" type="link" class="fa orange-button">Всі консультацій</a>
        </div>
        <div class=" col-md-2 col-sm-3 col-xs-4 tbtxt ">
            <a href="?conf=1" type="link" class="fa orange-button">Підтвердженні консультації</a>
        </div>
        <div class=" col-md-2 col-sm-3 col-xs-4 tbtxt ">
            <a href="?my=1" type="link" class="fa orange-button">Мої консультації</a>
        </div>
        <table class="table table-striped consult-table">
            <thead>
            <tr>
                <th scope="col">Початок консультації</th>
                <th scope="col">Кінець консультації</th>
                <th scope="col">Місто</th>
                <th scope="col">Галузь</th>
                <th scope="col">Посада</th>
                <th scope="col">Видалити</th>
            </tr>
            </thead>
            {{--            {{dd($consultations)}}--}}
            @foreach($consultations as $consultation)

                <tbody>
                <tr scope="row">
                    <td>
                        <div>{{$consultation->timeConsultation->time_start}}</div>
                    </td>
                    <td>
                        <div>{{$consultation->timeConsultation->time_end}}</div>
                    </td>
                    @foreach($consultants as $consult)
                        @if($consultation->timeConsultation->consults_id==$consult->id)
                            <td>
                                <div>{{$consult->city}}</div>
                            </td>
                            <td>
                                <div>{{$consult->area}}</div>
                            </td>
                            <td>
                                <div>{{$consult->position}}</div>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','action' => ['cabinet\ConsultsController@destroy', $consult->id], 'onsubmit' => 'return confirm("Ви дійсно хочете відмовитись від консультації?")']) !!}
                                {!! Form::submit('&#xf014; Видалити', [' class' => 'fa orange-button']) !!}
                                {!! Form::close() !!}
                            </td>
                        @endif
                    @endforeach
                </tr>
                </tbody>
            @endforeach
        </table>
        <div class="container"> {!! $consultations->render() !!}</div>
    </div>

@stop
