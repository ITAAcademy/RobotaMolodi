<script>
    // when you ajax call, you need always call function getFilters
$(document).ready(function () {
    //paginate by N count

     $('.pag-block-by').click(function () {
         alert('6');
         $('.active-pag-block').removeClass('active-pag-block');
         $(this).toggleClass('active-pag-block');
     })

    //filter
    function getFilters() {
        alert('5');
        return {
            regions: $('select[name="selected-region"]').val(),
            industries: $('select[name="selected-indastry"]').val(),
            specialisations: $('select[name="selected-specialization"]').val(),
            sortDate: $('.opsion-sort-box').hasClass('active') ? 'asc' : 'desc'
        }
    }

    $('.getting-list-selected-box').on('change',function () {
        alert('4');
        $.ajax({
            url: '{{route($urlController)}}',
            data: getFilters(),
            success: function(data){
                $('.test').html(data);
            }
        });
    })

   //filter asc/desc
    $('.opsion-sort-box').click(function () {
        alert('10');
        $(this).toggleClass('active');
        alert('1');
        $.ajax({
            url: '{{route($urlController)}}',
            data: getFilters(),
            success: function(data){
                $('.test').html(data);
            }
        });
    })

    $(document).on('click', '.pagination a', function(e) {
        alert('2');
        e.preventDefault();
        var url = $(this).attr('href');
        getVacancies(url);
        window.history.pushState("", "", url);
    });

    function getVacancies(url) {
        alert('3');
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



