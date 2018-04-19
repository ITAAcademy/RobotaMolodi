$(document).ready(function(){
    if(!$('#right-content-column')){
        return;
    }
    var targets = $('#right-content-column').children('div');
    targets.push($("[data-view='underFooter']").get());
    $(targets).each(function(index){
        var item = this;
        setTimeout(function(){
            $(item).addClass('animated fadeInRight').removeClass('hidden');
        },200 * index);
    });
});