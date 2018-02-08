$(document).ready(function() {
    $('a[href$="unavailable"]').click(function(event){
        event.preventDefault();

        $.ajax({
            url: '/unavailable',
            success:
                function(response){
                    $('#modal-common .modal-content').html(response);
                    $('#modal-common').modal('show');
                }
        });
    });

    $('.unavailable').hide();
});