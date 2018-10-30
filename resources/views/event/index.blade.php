<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">
<link rel='stylesheet' href='{{ asset('/css/fullcalendar/fullcalendar.css') }}'/>
<link href="{{ asset('/css/cabinet.css') }}" rel="stylesheet">

<div class="content">
    <div class=" col-md-2 col-sm-3 col-xs-4 but">
        <a href="{{ url('events' ) }}" type="link" class="fa orange-button act">{{ trans('consult.all') }}</a>
    </div>
    <div class=" col-md-2 col-sm-3 col-xs-4 ">
        <a href="?conf=1" type="link" class="fa orange-button">{{ trans('consult.conf') }}</a>
    </div>
    <div class=" col-md-2 col-sm-3 col-xs-4 ">
        <a href="?my=1" type="link" class="fa orange-button">{{ trans('consult.my') }}</a>
    </div>
    <div class="col-md-8 but">
        {{ trans('consult.alltxt') }}
    </div>
    <div class="row">
        <table class="consult-table">
            <thead>

            <tr>
                <th scope="col">{{ trans('consult.date') }}</th>
                <th scope="col">{{ trans('consult.city') }}</th>
                <th scope="col">{{ trans('consult.area') }}</th>
                <th scope="col">{{ trans('consult.descr') }}</th>
                <th scope="col">{{ trans('consult.options') }}</th>
            </tr>
            </thead>
            @foreach($consultations as $consultation)
                <?php
                $result = $consultation->consults->user_id != Auth::User()->id ? "whitesmoke" : "white";
                ?>
                <tbody>
                <tr scope="row" style="background: {{$result}}">
                    <td>
                        <div>{{$consultation->time_start}}</div>
                        <div>{{$consultation->time_end}}</div>
                    </td>
                    <td>
                        <div>{{$consultation->consults->city}}</div>
                    </td>
                    <td>
                        <div>{{$consultation->consults->area}}</div>
                    </td>
                    <td>
                        <div>{{$consultation->consults->description}}</div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-md-2">
                                <a href='/sconsult/{{$consultation->consults->id}}'>
                                    <button class=" fa orange-button btn-lg">&#xf05a;</button>
                                </a>
                            </div>
                            @if($consultation->consults->user_id!=Auth::User()->id)
                                <div class="col-md-2">
                                    {!! Form::open(['method' => 'DELETE','action' => ['cabinet\ConsultsController@destroy', $consultation->id], 'onsubmit' => 'return confirm("Ви дійсно хочете відмовитись від консультації?")']) !!}
                                    {!! Form::submit('&#xf014;', [' class' => 'fa orange-button btn-lg']) !!}
                                    {!! Form::close() !!}
                                </div>
                            @else
                                <div class="col-md-2">
                                    <form action="{{ action('ConsultEventsController@edit' , $consultation->consults->id) }}">
                                        <button type="submit" class=" fa orange-button btn-lg">&#xf044;</button>
                                    </form>
                                </div>
                                <div class="col-md-2">
                                    {!! Form::open(['method' => 'DELETE','action' => ['ConsultEventsController@destroy', $consultation->id], 'onsubmit' => 'return confirm("Ви дійсно хочете видалити радника?")']) !!}
                                    {!! Form::submit('&#xf014;', [' class' => 'fa orange-button btn-lg']) !!}
                                    {!! Form::close() !!}
                                </div>

                            @endif
                        </div>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>

    <br><div class="container"> {!!  $consultations->render() !!}</div>
</div>