function calendar_consult_edit(selector) {
    var events = [];
    var delTime = [];
    $(selector).fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: '2016-09-12',
        validRange: function(nowDate) {
            return {
                start: nowDate
                // end: nowDate.clone().add(1, 'months')
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

        events: function (start, end, timezone, callback) {
            $.ajax({
                url: '/consult/:ID/events'.replace(':ID', $('#calendar_edit').data('consult-id')),
                type: "GET",
                dataType: 'json',
                success: function (doc) {
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

        eventClick: function (event,doc) {
            event._id = event.time_id;

            if (confirm('Видалити консультацію?')) {
                $.ajax({
                    type: "POST",
                    url: "/public/consult/delete",
                    data: 'id=' + event._id,

                    success: function (response) {
                        $('#calendar_edit').fullCalendar('removeEvents',event._id);
                        displayMessage("Deleted Successfully");
                    }
                });
            }
        },
        editable: true,
        eventLimit: true,
    });

    $("#time_start, #time_end").datetimepicker();

    $('#save-event').on('click', function() {
        var eventData = {
            start: $('#time_start').val(),
            end: $('#time_end').val(),
        };
        events.push(eventData);
        $('#calendar-edit').fullCalendar('renderEvent', eventData, true);
        $('.modal').find('input').val('');
        $('.modal').modal('hide');
    });

    $( '#consultEdit' ).on( "submit", ( e)=> {

        e.preventDefault();
        var allData = {};

        $( '#consultEdit' ).serializeArray().forEach(function(item) {
            allData[item['name']] = item['value'];
        });
        allData.events = events;
        console.log(allData);
        $.ajax({
            url: '/events/:ID'.replace(':ID', $('#calendar_edit').data('consult-id')),
            method: 'PUT',
            dataType: 'json',
            data: {allData},
            statusCode: {
                200: function () {
                    window.location = "/events";
                },
            },
        });
    });
}
function displayMessage(message) {
    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}