<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">
<link rel='stylesheet' href='{{ asset('/css/fullcalendar/fullcalendar.css') }}'/>
<link href="{{ asset('/css/cabinet.css') }}" rel="stylesheet">

<div class="content">
    <div class=" col-md-2 col-sm-3 col-xs-4 tbtxt">
        <a href="{{ url('events' ) }}" type="link" class="fa orange-button active">Всі</a>
    </div>
    <div class=" col-md-2 col-sm-3 col-xs-4 tbtxt ">
        <a href="?conf=1" type="link" class="fa orange-button">Підтвердженні</a>
    </div>
    <div class=" col-md-2 col-sm-3 col-xs-4 tbtxt ">
        <a href="?my=1" type="link" class="fa orange-button">Заплановані</a>
    </div>
    <table class="table table-striped consult-table">
        <thead>

        <tr>
            <th scope="col">Початок консультації</th>
            <th scope="col">Кінець консультації</th>
            <th scope="col">Місто</th>
            <th scope="col">Галузь</th>
            <th scope="col">Опис</th>
            <th scope="col">Опції</th>
        </tr>
        </thead>
        @foreach($consultations as $consultation)
            <tbody>
            <tr scope="row">
                <td>
                    <div>{{$consultation->time_start}}</div>
                </td>
                <td>
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
                    <div class="col-md-4">
                        <a  href='/sconsult/{{$consultation->consults->id}}' target="_blank">
                            <button class=" fa orange-button btn-lg">&#xf05a;</button>
                        </a>
                    </div>
                        <div class="col-md-4">
                        <form action="{{ action('ConsultEventsController@edit' , $consultation->consults->id) }}">
                            <button type="submit" class=" fa orange-button btn-lg">&#xf044;</button>
                        </form>
                    </div>
                        <div class="col-md-4">
                    {!! Form::open(['method' => 'DELETE','action' => ['ConsultEventsController@destroy', $consultation->id], 'onsubmit' => 'return confirm("Ви дійсно хочете видалити радника?")']) !!}
                    {!! Form::submit('&#xf014;', [' class' => 'fa orange-button btn-lg']) !!}
                    {!! Form::close() !!}
                    </div>
                    </div>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
            <div class="container"> {!!  $consultations->render() !!}</div>
</div>