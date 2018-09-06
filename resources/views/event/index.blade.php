
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
                    <a class="fa orange-button" href="{{action('ConsultEventsController@edit', $consult['id'])}}">
                        {{--{!! Html::image('image/edit.png', 'del') !!}--}}
                        <span>&#xf044;{{ trans('main.edit') }}</span>
                    </a>
                  </div>
                <div class=" col-md-1 col-sm-3 col-xs-4">
                    <a class="fa orange-button" href="{{action('ConsultEventsController@destroy', $consult['id'])}}" onclick="return ConfirmDelete();">
                        <span>&#xf014;{{ trans('main.delete') }}</span>
                    </a>
                </div>
            </div>
            {{--@endif--}}
        @endforeach
        <div>{!! $consultant->render() !!}</div>
    </div>

<script>
    function ConfirmDelete() {
        var conf = confirm("Ви дійсно хочете видалити радника?");

        if(conf){
            return true;
        } else{
            return false;
        }
    }
</script>

