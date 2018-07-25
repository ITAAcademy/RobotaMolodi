function initCalendar(selector) {

    $(selector).fullCalendar({

        eventClick: function(calEvent, jsEvent, view) {
            console.log(calEvent);

            $('#dialog').dialog('open');

            var starttime = new Date(calEvent.start._i);
            var endtime = new Date(calEvent.end._i);
            $('#spstart').text(starttime.getHours()+':'+starttime.getMinutes());
            $('#spend').text(endtime.getHours()+':'+endtime.getMinutes());
            $('#ui-id-1').text('Детальніше');
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
                                //title: item.consults_id,
                                start: item.date,
                                end: item.time_end,
                            }
                        })
                }else{
                       // console.log("not array");
                        events.push(
                            {
                                //title: doc.consults_id,
                                start: doc.date,
                                end: doc.time_end,

                            }
                        )
                    }

                    callback(events);

                }
            });
        }


    });

    $('#dialog').dialog({
        autoOpen: false,
    show: {
        effect: 'drop',
        duration: 500
    },
    hide: {
        effect: 'clip',
        duration: 500
    }

    });

    $(".ui-dialog-titlebar-close").html("<span>X</span>");



}