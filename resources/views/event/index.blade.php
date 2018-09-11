
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">
<link rel='stylesheet' href='{{ asset('/css/fullcalendar/fullcalendar.css') }}' />
<link href="{{ asset('/css/cabinet.css') }}" rel="stylesheet">
    <div class="content">
        <div class="row">
            <!-- header -->
            <div class=" col-md-2 col-sm-4 col-xs-12"><h5><b>Початок консультації</b></h5></div>
            <div class=" col-md-2 col-sm-4 col-xs-12 "><h5><b>Кінець консультації</b></h5></div>
            <div class=" col-md-2 col-sm-3 col-xs-4 "><h5><b>Місто </b></h5></div>
            <div class=" col-md-3 col-sm-6 col-xs-4"><h5><b>Галузь </b></h5></div>
            <div class=" col-md-1 col-sm-3 col-xs-4"><h5><b>Посада </b></h5></div>
            {{--<div class=" col-md-1 col-sm-2 col-xs-3"></div>--}}
            {{--<div class=" col-md-1 col-sm-2 col-xs-3"></div>--}}
            {{--<div class=" col-md-1 col-sm-2 col-xs-3"></div>--}}
            {{--<div class=" col-md-1 col-sm-2 col-xs-3"></div>--}}
        </div>
        @foreach($consultant as $consult)
            {{--@if(!is_array($consult))--}}
            <div class="row">
                <div class=" col-md-2 col-sm-2 col-xs-12">
                    @foreach($consult->timeConsult as $timeConsult)
                        <div>{{$timeConsult->time_start}}</div>
                    @endforeach

                </div>
                <div class=" col-md-2 col-sm-4 col-xs-12">
                    @foreach($consult->timeConsult as $timeConsult)
                        <div>{{$timeConsult->time_end}}</div>
                    @endforeach
                </div>
                <div class=" col-md-2 col-sm-3 col-xs-4">
                    <div>{{$consult->city}}</div>
                </div>
                <div class=" col-md-3 col-sm-6 col-xs-4">
                    <div>{{$consult->area}}</div>
                </div>
                <div class=" col-md-1 col-sm-3 col-xs-4">
                    <div>{{$consult->position}}</div>
                </div>
                <div class=" col-md-1 col-sm-3 col-xs-4">
                    <form action="{{ action('ConsultEventsController@edit' , $consult->id) }}">
                        <button type="submit" class=" fa orange-button">&#xf044;Редагувати</button>
                    </form>
                </div>
                <div class=" col-md-1 col-sm-3 col-xs-4">
                    {!! Form::open(['method' => 'DELETE','action' => ['ConsultEventsController@destroy', $consult->id], 'onsubmit' => 'return confirm("Ви дійсно хочете видалити радника?")']) !!}
                    {!! Form::submit('&#xf014; Видалити', [' class' => 'fa orange-button']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            {{--@endif--}}
        @endforeach
        <div>{!! $consultant->render() !!}</div>
    </div>

{{--<script>--}}
    {{--function ConfirmDelete() {--}}
        {{--var conf = confirm("Ви дійсно хочете видалити радника?");--}}

        {{--if(conf){--}}
            {{--return true;--}}
        {{--} else{--}}
            {{--return false;--}}
        {{--}--}}
    {{--}--}}
{{--</script>--}}

