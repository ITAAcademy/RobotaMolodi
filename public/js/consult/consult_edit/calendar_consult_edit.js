function calendar_consult_edit(selector) {
    var events = [];
    var curr_date = new Date;
    var loc = lan == "ua"? "uk":"en";
    var names =lan == "ua"? [ "Січень","Лютий","Березень","Квітень","Травень","Червень","Липень","Серпень","Вересень","Жовтень","Листопад","Грудень" ]:["January","February","March","April","May","June","July","August","September","October","November","December"];

    $(selector).fullCalendar({
        locale: loc,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaDay'
        },
        defaultDate: curr_date,
        validRange: function (nowDate) {
            return {
                start: nowDate,
                end: nowDate.clone().add(1, 'months')
            };
        },
        height: 550,

        firstDay: 1,
        monthNames: names,
        minTime:"09:00:00",
        maxTime:"19:00:00",
        timeFormat: 'h:mm',
        eventOrder: 'start',
        themeSystem: 'bootstrap3',
        displayEventEnd: true,
        eventBackgroundColor: '#3348ce',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectHelper: true,
        select: function (start, end) {
            $('#modalCal').modal('show');
        },

        events: function (start, end, timezone, callback) {
            $.ajax({
                url: '/consult/:ID/events'.replace(':ID', $('#calendar_edit').data('consult-id')),
                type: "GET",
                dataType: 'json',
                success: function (doc) {
                    let events = [];
                    if (Array.isArray(doc)) {
                        events = doc.map(function (item) {
                            return {
                                time_id: item.id,
                                start: item.time_start,
                                end: item.time_end,
                            }
                        })
                    } else {

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
        eventClick: function (event, element) {
            $('#modalCal').modal('show');
            $('.modal').find('#time_start').val(event.start);
            $('.modal').find('#time_end').val(event.end);
        },

        eventClick: function (event, doc) {
            event._id = event.time_id;

            if (confirm('Видалити консультацію?')) {
                $.ajax({
                    type: "POST",
                    url: "/public/consult/delete",
                    data: 'id=' + event._id,

                    success: function (response) {
                        $('#calendar_edit').fullCalendar('removeEvents', event._id);
                        displayMessage("Deleted Successfully");
                    }
                });
            }
        },
        editable: true,
        eventLimit: true,
        dayClick: function (date, jsEvent, view) {
            var clickDate = date.format();
            $('#date_cons').val(clickDate);
        },
    });
    $('#save-event').on('click', function () {
        var eventData = {
            start:$('#date_cons').val()+' '+$('#time_start').val(),
            end: $('#date_cons').val()+' '+$('#time_end').val(),
            date: $('#date_cons').val(),
        };
        events.push(eventData);
        $('#calendar_edit').fullCalendar('renderEvent', eventData, true);
        $('.modal').find('input').val('');
        $('#calendar_edit').fullCalendar('unselect');
        $('.modal').modal('hide');
    });

    $('#consultEdit').on("submit", (e) => {

        e.preventDefault();
        var allData = new FormData($('#consultEdit')[0]);
        allData.append('events', JSON.stringify(events));
        $.ajax({
            url: '/events/:ID'.replace(':ID', $('#calendar_edit').data('consult-id')), //
            method: 'post',
            dataType: 'json',
            data: allData,
            cache: false,
            processData: false,
            contentType: false,
            // success: function (data) {
            //     console.log(data);
            // },
            statusCode: {
                200: function () {
                    window.location = "/events";
                },
            },
        });
    });
}

function displayMessage(message) {
    $(".response").html("<div class='success'>" + message + "</div>");
    setInterval(function () {
        $(".success").fadeOut();
    }, 1000);
}