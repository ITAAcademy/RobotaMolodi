function calendar_consult_create(selector) {
    var events = [];
    var curr_date = new Date;
    $(selector).fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultDate:curr_date,
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
        events.push(eventData);
        $('#calendar2').fullCalendar('renderEvent', eventData, true);
        $('.modal').find('input').val('');
        $('#calendar2').fullCalendar('unselect');
        $('.modal').modal('hide');
    });

    $('#consultCreate').on("submit", (e) => {
        e.preventDefault();
        var allData = new FormData($('#consultCreate')[0]);

        allData.append('events', JSON.stringify(events));
        for (var i = 0; i < events.length; i++) {
            ev=JSON.stringify(events);
            allData.append('ev',ev);
        }
         allData.append('events', events);
        $.ajax({
            url: '/cabinet/consult',
            method: 'POST',
            dataType: 'json',
            data: allData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
            },
            // statusCode: {
            //     200: function () {
            //         window.location = "/sconsult";
            //     },
            // },
        });
    });
}
