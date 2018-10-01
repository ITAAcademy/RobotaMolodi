function calendar_consult_create(selector) {
    var events = [];
    $(selector).fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2016-09-12',
            validRange: function(nowDate) {
                return {
                    start: nowDate,
                    end: nowDate.clone().add(1, 'months')
                };
            },
            timeFormat: 'h:mm',
            eventOrder: 'start',
            themeSystem: 'bootstrap3',
            displayEventEnd: true,
            eventBackgroundColor: '#3348ce',
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                $('#modalCal').modal('show');
            },
            eventClick: function(event, element) {
                $('#modalCal').modal('show');
                $('.modal').find('#time_start').val(event.start);
                $('.modal').find('#time_end').val(event.end);
            },
            editable: true,
            eventLimit: true,
    });

        $("#time_start, #time_end").datetimepicker();

        $('#save-event').on('click', function() {
                var eventData = {
                    start: $('#time_start').val(),
                    end: $('#time_end').val()
                };
                // if()
        events.push(eventData);
        $('#calendar2').fullCalendar('renderEvent', eventData, true);
        $('.modal').find('input').val('');
        $('#calendar2').fullCalendar('unselect');
        $('.modal').modal('hide');
        });

    $( '#consultCreate' ).on( "submit", ( e)=> {

        e.preventDefault();
        var allData = {};

        $( '#consultCreate' ).serializeArray().forEach(function(item) {
            allData[item['name']] = item['value'];
        });
        allData.events = events;
        $.ajax({
            url: '/cabinet/consult',
            method: 'POST',
            dataType: 'json',
            data: {allData},
            statusCode: {
                200: function () {
                    window.location = "/sconsult";
                },
            },
        });
    });
}