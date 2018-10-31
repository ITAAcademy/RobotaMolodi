$(document).ready(function(){
    jVal = {
        'positionCon' : function() {
            $('body').append('<div id="positionInfo" class="info"></div>');
            var positionInfo = $('#positionInfo');
            var elem = $('#positionCon');
            var pos = elem.offset();
            positionInfo.css({
                top: pos.top-3,
                left: pos.left +elem.width()+15
            });
            var patt = /^([а-яё\s]+|[a-z\s]+)$/iu;
            if(elem.val().length > 255 || !patt.test($('#positionCon').val()) ) {
                error.positionCon = true;
                positionInfo.removeClass('correct').addClass('error').html('← Лише літери').show();
                elem.removeClass('normal').addClass('wrong');
            } else {
                error.positionCon = false;
                positionInfo.removeClass('error').addClass('correct');
                elem.removeClass('wrong').addClass('normal');
            }
        },
        'description' : function (){
            $('body').append('<div id="descriptionInfo" class="info"></div>');
            var descriptionInfo = $('#descriptionInfo');
            var elem = $('#description');
            var pos = elem.offset();
            descriptionInfo.css({
                top: pos.top-3,
                left: pos.left+elem.width()+15
            });
            if(elem.val().length > 255 ) {
                error.description = true;
                descriptionInfo.removeClass('correct').addClass('error').html('← Перевищено ліміт 255 символів').show();
                elem.removeClass('normal').addClass('wrong');
            } else {
                error.description = false;
                descriptionInfo.removeClass('error').addClass('correct');
                elem.removeClass('wrong').addClass('normal');
            }
        },

        'value' : function (){
            $('body').append('<div id="valueInfo" class="info"></div>');
            var valueInfo = $('#valueInfo');
            var elem = $('#value');
            var pos = elem.offset();
            valueInfo.css({
                top: pos.top-3,
                left: pos.left+elem.width()+15
            });
            var patt = /^\d+$/i;
            if(!patt.test($('#value').val()) ){
                error.value = true;
                valueInfo.removeClass('correct').addClass('error').html('← Лише цілі числа').show();
                elem.removeClass('normal').addClass('wrong');
            } else {
                error.value = false;
                valueInfo.removeClass('error').addClass('correct');
                elem.removeClass('wrong').addClass('normal');
            }
        },

        'telephone' : function (){
            $('body').append('<div id="telephoneInfo" class="info"></div>');
            var telephoneInfo = $('#telephoneInfo');
            var elem = $('#telephone');
            var pos = elem.offset();
            telephoneInfo.css({
                top: pos.top-3,
                left: pos.left+elem.width()+15
            });
            var patt = /^\(\d{3}\) \d{3}-\d{2}-\d{2}$/i;
            if(!patt.test($('#telephone').val()) ){
                error.telephone = true;
                telephoneInfo.removeClass('correct').addClass('error').html('← Формат номеру (067) 111-11-11').show();
                elem.removeClass('normal').addClass('wrong');
            } else {
                error.telephone = false;
                telephoneInfo.removeClass('error').addClass('correct');
                elem.removeClass('wrong').addClass('normal');
            }
        },

        'time_end' : function () {
            $('body').append('<div id="endValidInfo" class="info"></div>');
            var endValidInfo = $('#endValidInfo');
            var s = $("#time_start").data("DateTimePicker").date();
            var date_s = new Date(s);
            var ms = date_s.getMonth(), ds = date_s.getDate(), ys = date_s.getFullYear();
            var e = $("#time_end").data("DateTimePicker").date();
            var date_e = new Date(e);
            var me = date_e.getMonth(), de = date_e.getDate(), ye = date_e.getFullYear();
            var curr_date = new Date;
            var curr_pars = Date.parse(curr_date);

            var elem = $('#error_calendar');
            var pos = elem.offset();
            endValidInfo.css({
                top: pos.top - 3,
                left: pos.left + elem.width() + 5
            });

            if ( ms !== me || ds!==de || ys!== ye || Date.parse($('#time_start').val()) < curr_pars) {
                error.val = true;
                endValidInfo.removeClass('correct').addClass('error').html('← Тривалість консультації не може перевищувати 1 день').show();
                elem.removeClass('normal').addClass('wrong');
            } else {
                error.val = false;
                endValidInfo.removeClass('error').addClass('correct');
                elem.removeClass('wrong').addClass('normal');
            }
        },
    };

    var error = {
        positionCon: false,
        description: false,
        value: false,
        telephone: false,
        val: false
    };

    $( "#positionCon" ).click(function() {
        error.positionCon = true;
        $('#positionCon').change(jVal.positionCon);
    });
    $( "#description" ).click(function() {
        error.description = true;
        $('#description').change(jVal.description);
    });
    $( "#value" ).click(function() {
        error.value = true;
        $('#value').change(jVal.value);
    });
    $( "#telephone" ).click(function() {
        error.telephone = true;
        $('#telephone').change(jVal.telephone);
    });
    $( "#time_end" ).click(function() {
        error.val = true;
        $('#time_end').datetimepicker().on('dp.change', jVal.time_end);
    });


    function checkButton(){
        if(error.positionCon || error.description || error.telephone || error.value || error.val ){
            $(":submit").attr("disabled", true);
        }
        else{
            $(":submit").removeAttr("disabled");
        }
    }
    document.getElementById("positionCon").onblur = checkButton;
    document.getElementById("description").onblur = checkButton;
    document.getElementById("value").onblur = checkButton;
    document.getElementById("telephone").onblur = checkButton;
    document.getElementById("time_start").onblur = checkButton;
    document.getElementById("time_end").onblur = checkButton;
});

