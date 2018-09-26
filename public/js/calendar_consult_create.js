function calendar_consult_create(selector) {
    var events = [];
    $(selector).fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2016-09-12',
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

        events: function (start, end, timezone, callback) {
            $.ajax({
                url: '/cabinet/consult/showEvents',
                type: "GET",
                dataType: 'json',
                success: function (doc) {
                    console.log(doc);
                    let events = [];
                    if (Array.isArray(doc)){
                        events = doc.map(function (item) {
                            return {
                                time_id: item.id,
                                start: item.time_start,
                                end: item.time_end,
                            }
                        })
                    }else{

                        events.push(
                            {
                                time_id: item.id,
                                start: doc.time_start,
                                end: doc.time_end,

                            }
                        )
                    }

                    callback(events);
                }
            });
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
        $('.modal').modal('hide');
        });

    $( '#consultCreate' ).on( "submit", ( e)=> {

        e.preventDefault();
        var t = {};

        $( '#consultCreate' ).serializeArray().forEach(function(item) {
            t[item['name']] = item['value'];
        });
        t.events = events;
        $.ajax({
            url: '/cabinet/consult',
            method: 'POST',
            dataType: 'json',
            data: {t},
            statusCode: {
                200: function () {
                    // window.location = "http://localhost:8000/sconsult";
                    console.log(t);
                },
            },
        });
    });
}