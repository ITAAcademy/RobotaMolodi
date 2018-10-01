
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">
<link rel='stylesheet' href='{{ asset('/css/fullcalendar/fullcalendar.css') }}' />
<link href="{{ asset('/css/cabinet.css') }}" rel="stylesheet">
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
