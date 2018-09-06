function initCalendar(selector) {

    $(selector).fullCalendar({

        eventClick: function(calEvent, jsEvent, view) {
            console.log(calEvent);

            $('#dialog').dialog('open');

            var starttime = new Date(calEvent.start._i);

            var endtime = new Date(calEvent.end._i);
            $('#spstart').text(starttime.getHours()+':'+starttime.getMinutes()+'0');
            $('#spend').text(endtime.getHours()+':'+endtime.getMinutes()+'0');
            $('#starts-at').val(starttime);
            $('#ends-at').val(endtime);

        },
        eventMouseover: function( event, jsEvent, view ) {
            $(this).css('background-color', '#4196f2');
        },
        eventMouseout: function( event, jsEvent, view ) {
            $(this).css('background-color', '#3348ce');
        },

        firstDay: 1,
        dayNames: ["Неділя", "Понеділок", "Вівторок", "Середа", "Четвер", "П'ятниця", "Субота"],
        dayNamesShort: ["НД", "ПН", "ВТ", "СР", "ЧТ", "ПТ", "СБ"],
        monthNames: ['Січень', 'Лютий', 'Березень', 'Квітень', 'Травень', 'Червень', 'Липень', 'Серпень', 'Вересень', 'Жовтень', 'Листопад', 'Грудень'],
        // monthNamesShort: ['Янв.','Фев.','Март','Апр.','Май','Июнь','Июль','Авг.','Сент.','Окт.','Ноя.','Дек.'],

        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },

        buttonText: {
            prev: "попер",
            next: "наст",
            today: "Сьогодні",
            month: "Місяць",
            week: "Тиждень",
            day: "День"
        },
        timeFormat: 'h:mm',
        eventOrder: 'start',
        themeSystem: 'bootstrap3',
        displayEventEnd: true,
        eventBackgroundColor: '#3348ce',



        events: function (start, end, timezone, callback) {
            $.ajax({
                url: '/consult/:ID/events'.replace(':ID', $('#calendar').data('consult-id')),
                type: "GET",
                dataType: 'json',
                success: function (doc) {
                    console.log(doc);
                    var events = [];
                    if (Array.isArray(doc)){
                         events = doc.map(function (item) {
                            return {
                                name: item.consults_id,
                                start: item.time_start,
                                end: item.time_end,
                            }
                        })
                }else{

                        events.push(
                            {
                                name: item.consults_id,
                                start: doc.time_start,
                                end: doc.time_end,

                            }
                        )
                    }

                    callback(events);
                }
            });
        }

    });

    $(".ui-dialog-titlebar-close").html("<span>X</span>");

    $('#submitButton').on('click', function(e) {
        e.preventDefault()
        var cons = $('#cons_id').val();
        var begin = $('#starts-at').val();
        var fin = $('#ends-at').val();
        //alert(begin);

        $.ajax({
            url: '/submitsconsult',
            type: "POST",
            data: {



            },



            });
        });



}