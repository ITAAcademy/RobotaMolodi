$(document).ready(function() {
    $('#add-vac-2-top>a').on('click',function(event){
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
});