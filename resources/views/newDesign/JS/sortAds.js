/**
 * Created by Бодя on 05.02.2017.
 */
$( function() {
    var dateFormat = "dd/mm/yy",
        from = $("#from")
            .datepicker({
                defaultDate: "-1m",
                changeMonth: true,
                numberOfMonths: 1
            })
            .on("change", function(){
                to.datepicker("option", "minDate", getDate(this));
            }),
        to = $("#to").datepicker({
            defaultDate: "-1w",
            changeMonth: true,
            numberOfMonths: 1
        })
            .on("change", function(){
                from.datepicker("option", "maxDate", getDate(this));
            });

    function getDate(element){
        var date;
        try{
            date = $.datepicker.parseDate(dateFormat, element.value);
        }catch(error){
            date = null;
        }

        return date;
    }
} );

/* Ukrainian (UTF-8) initialisation for the jQuery UI date picker plugin. */
(function(factory){
    if (typeof define === "function" && define.amd){
        // AMD. Register as an anonymous module.
        define(["../widgets/datepicker"], factory);
    }else{
        // Browser globals
        factory(jQuery.datepicker);
    }
}(function(datepicker){
    datepicker.regional.ua = {
        closeText: "Закрити",
        prevText: "&#x3C;Попер",
        nextText: "Наст&#x3E;",
        currentText: "Сегодня",
        monthNames: ["Січень","Лютий","Березень","Квітень","Травень","Червень",
            "Липень","Серпень","Вересень","Жовтень","Листопад","Грудень"],
        monthNamesShort: ["Січ","Лют","Бер","Квіт","Трав","Черв",
            "Лип","Серп","Вер","Жовт","Лист","Груд"],
        dayNames: ["неділя","понеділок","вівторок","середа","четвер","п'ятниця","субота"],
        dayNamesShort: ["нед","пнд","втр","срд","чтв","птн","сбт"],
        dayNamesMin: ["Нд","Пн","Вт","Ср","Чт","Пт","Сб"],
        weekHeader: "пнд",
        dateFormat: "dd.mm.yy",
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ""};
    datepicker.setDefaults(datepicker.regional.ua);

    return datepicker.regional.ua;
}));