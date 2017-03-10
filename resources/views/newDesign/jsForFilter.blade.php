<script>
    // when you ajax call, you need always call function getFilters
$(document).ready(function () {
    //paginate by N count

     $('.pag-block-by').click(function () {
         $('.active-pag-block').removeClass('active-pag-block');
         $(this).toggleClass('active-pag-block');
     })

    //filter
    function getFilters() {
        return {
            regions: $('select[name="selected-region"]').val(),
            industries: $('select[name="selected-indastry"]').val(),
            specialisations: $('select[name="selected-specialization"]').val(),
            sortDate: $('.first-news').hasClass('active') ? 'asc' : 'desc'
        }
    }

    $('.getting-list-selected-box').on('change',function () {
        $.ajax({
            url: '{{route($urlController)}}',
            data: getFilters(),
            success: function(data){
                $('.test').html(data);
            }
        });
    })

   //filter asc/desc
    $('.first-news').unbind('click').click(function (e) {
        $(this).toggleClass('active');
        $.ajax({
            url: '{{route($urlController)}}',
            data: getFilters(e),
            success: function(data){
                $('.test').html(data);
            }
        });
    })

    //pagination
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        getVacancies(url);
        window.history.pushState("", "", url);
    });

    function getVacancies(url) {
        $.ajax({
            url : url,
            data : getFilters()
        }).done(function (data) {
            $('.test').html(data);
        }).fail(function () {
            alert('Could not be loaded.');
        });
    }
})
</script>



