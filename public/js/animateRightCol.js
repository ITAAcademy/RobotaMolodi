$(document).ready(function(){
    if(!$('#right-content-column')){
        return;
    }
    targets = $('#right-content-column').children('div');
    targets = Array.prototype.slice.call(targets);

    $(targets).each(function(index){
        var item = this;
        setTimeout(function(){
            $(item).addClass('animated fadeInRight').removeClass('hidden');
        },200 * index);
    });
});