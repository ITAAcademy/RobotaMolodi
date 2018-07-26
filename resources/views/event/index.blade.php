
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">
<link rel='stylesheet' href='{{ asset('/css/fullcalendar/fullcalendar.css') }}' />
    <div class="content">
        Всі консультації
        <div id="calendar"></div>
    </div>
    <script src='{{ asset('/js/fullcalendar/fullcalendar.min.js') }}'></script>
    <script src='{{ asset('/js/initCalendar.js') }}'></script>
    <script>
        $(document).ready(function() {
            initCalendar('#calendar');
        });
    </script>