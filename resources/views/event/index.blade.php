
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">
<link rel='stylesheet' href='{{ asset('/css/fullcalendar/fullcalendar.css') }}' />
<link href="{{ asset('/css/cabinet.css') }}" rel="stylesheet">
    <div class="content">
            <div class=" col-md-2 col-sm-3 col-xs-4 tbtxt">
                <a href="{{ url('events' ) }}" type="link" class="fa orange-button" >Всі консультацій</a>
            </div>
            <div class=" col-md-2 col-sm-3 col-xs-4 tbtxt ">
                <a href="?conf=1" type="link" class="fa orange-button" >Підтвердженні консультації</a>
            </div>
            <div class=" col-md-2 col-sm-3 col-xs-4 tbtxt ">
                <a href="?my=1" type="link" class="fa orange-button" >Мої консультації</a>
            </div>
        <table class="table table-striped consult-table">
            <thead>
            <tr>
                <th scope="col">Початок консультації</th>
                <th scope="col">Кінець консультації</th>
                <th scope="col">Місто</th>
                <th scope="col">Галузь</th>
                {{--<th scope="col">Посада</th>--}}
                <th scope="col">Редагувати</th>
                <th scope="col">Видалити</th>
            </tr>
            </thead>

            {{--<div class="row">--}}
            {{--<div class=" col-md-2 col-sm-4 col-xs-12"><h5><b>Початок консультації</b></h5></div>--}}
            {{--<div class=" col-md-2 col-sm-4 col-xs-12 "><h5><b>Кінець консультації</b></h5></div>--}}
            {{--<div class=" col-md-2 col-sm-3 col-xs-4 "><h5><b>Місто </b></h5></div>--}}
            {{--<div class=" col-md-3 col-sm-6 col-xs-4"><h5><b>Галузь </b></h5></div>--}}
            {{--<div class=" col-md-1 col-sm-3 col-xs-4"><h5><b>Посада </b></h5></div>--}}
            {{--</div>--}}
            @foreach($consultant as $consult)
                <tbody>
                <tr scope="row">
                    <td>
                        @foreach($consult->timeConsult as $timeConsult)
                            <div>{{$timeConsult->time_start}}</div>
                    </td>
                    <td>
                            <div>{{$timeConsult->time_end}}</div>
                        @endforeach
                    </td>
                    <td>
                        <div>{{$consult->city}}</div>
                    </td>
                    <td>
                        <div>{{$consult->area}}</div>
                    </td>
                    {{--<td>--}}
                    {{--<div>{{$consult->position}}</div>--}}
                    {{--</td>--}}
                    <td>
                        <form action="{{ action('ConsultEventsController@edit' , $consult->id) }}">
                            <button type="submit" class=" fa orange-button">&#xf044;Редагувати</button>
                        </form>
                    </td>
                    <td>
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
