function initCalendar(selector) {

    $(selector).fullCalendar({


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
        dayClick: function(date, jsEvent, view) {

            alert('Clicked on: ' + date.format());

            

        },

        events: function (start, end, timezone, callback) {
            $.ajax({
                url: '/consult/:ID/events'.replace(':ID', $('#calendar').data('consult-id')),
                type: "GET",
                dataType: 'json',
                success: function (doc) {
                    //console.log(doc);
                    var events = [];
                    if (Array.isArray(doc)){
                         events = doc.map(function (item) {
                            return {
                                title: item.consult_id,
                                start: item.created_at,
                            }
                        })
                }else{
                       // console.log("not array");
                        events.push(
                            {
                                title: doc.consult_id,
                                start: doc.created_at,
                            }
                        )
                    }

                    callback(events);

                }
            });
        }


    });
}