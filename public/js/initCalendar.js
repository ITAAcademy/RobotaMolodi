function initCalendar(selector) {
    var curr_date = new Date;
    $(selector).fullCalendar({

        defaultDate: curr_date,
        validRange: function(nowDate) {
            return {
                start: nowDate,
                end: nowDate.clone().add(1, 'months')
            };
        },

        eventClick: function(calEvent, jsEvent, view) {
           // console.log(calEvent);


            $('#centralModalWarning').modal('show')

            var starttime = new Date(calEvent.start);

            var endtime = new Date(calEvent.end);
            $('#spstart').text(starttime.getHours()+':'+starttime.getMinutes());
            $('#spend').text(endtime.getHours()+':'+endtime.getMinutes());
            //$('#starts-at').val(starttime);
            //$('#ends-at').val(endtime);
            $('#time_consultation_id').val(calEvent.time_id);

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
        }

    });



    $('#submitButton').on('click', function(e) {
        e.preventDefault()
        // var cons = $('#cons_id').val();
        // var begin = $('#starts-at').val();
        // var fin = $('#ends-at').val();
        var time_consultation_id = $('#time_consultation_id').val();

         //alert( time_consultation_id);

        $.ajax({
            url: '/consult',
            type: "POST",
             data:  {
                 'time_consultation_id': time_consultation_id,
             },
            dataType: 'json',
            success: function (respond) {
                //if(respond){
                    alert(respond );
               // }
            },
            // error: function(data){
            //     alert("Available only for authorized users! Please log in.");
            // }
            statusCode: {
                500: function () {

                   alert("Available only for authorized users! Please log in.");

                },
                422: function () {

                    alert("You have already registered for a consultation at this time.");
                }
            },

            });
        $('#centralModalWarning').modal('hide');
        });



}