@extends('app')
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">
<link rel='stylesheet' href='{{ asset('/css/fullcalendar/fullcalendar.css') }}' />
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
                <li><a href="javascript:alert( {{ trans('consult.attention') }} )">{{ trans('navtab.advisor')  }}</a></li>
            </ul>
        </div>
    </div>

    <div class="content">

        <table class="table table-striped consult-table">
            <thead>
            <tr>
                <th scope="col">Місто</th>
                <th scope="col">Галузь</th>
                <th scope="col">Посада</th>
                <th scope="col">Опис</th>
                <th scope="col">Опції</th>
            </tr>
            </thead>
        @foreach($consultant as $consult)
          <tbody>
            <tr scope="row">
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
                    <div>{{$consult->description}}</div>
                </td>
                <td>
                    <div>
                        <a  href='/sconsult/{{$consult->id}}' target="_blank">
                            <button class=" fa orange-button">&#xf05a;Детальніше</button>
                        </a>
                    </div><br>
                    <form action="{{ action('ConsultEventsController@edit' , $consult->id) }}">
                        <button type="submit" class=" fa orange-button">&#xf044;Редагувати</button>
                    </form>
                    {!! Form::open(['method' => 'DELETE','action' => ['ConsultEventsController@destroy', $consult->id], 'onsubmit' => 'return confirm("Ви дійсно хочете видалити радника?")']) !!}
                    {!! Form::submit('&#xf014; Видалити', [' class' => 'fa orange-button']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
          </tbody>
        @endforeach
        </table>
        <div class="container"> {!! $consultant->render() !!}</div>
    </div>

@stop
