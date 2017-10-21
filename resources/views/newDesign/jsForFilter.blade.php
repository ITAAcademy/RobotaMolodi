<script>

$(document).ready(function () {

    applyFIlter();

    function getFilters() {
        return {
            regions: $('select[name="selected-region"]').val(),
            industries: $('select[name="selected-indastry"]').val(),
            specialisations: $('select[name="selected-specialization"]').val(),
            sortRatings: $('.sort-rating').hasClass('toggleFilter') ? 'drop' : $('.sort-rating').hasClass('active') ? 'desc' : 'asc',
            sortDate: $('.sort-date').hasClass('toggleFilter') ? 'drop' : $('.sort-date').hasClass('active') ? 'asc' : 'desc',
            startDate: $('#datepicker1').val(),
            endDate: $('#datepicker2').val()
        }
    }

    function applyFIlter(){
        $.ajax({
            url: '{{route($urlController)}}',
            data: getFilters(),
            success: function(data){
                $('.test').html(data);
            }
        });
    }

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

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        getVacancies(url);
        window.history.pushState("", "", url);
        $('.scrollup').click();
    });

    $('.getting-list-selected-box').on('change',function () {
        applyFIlter();
    });

    $('.sort-by-rating').unbind('click').click(function (e) {
        $('.sort-rating').toggleClass('active');
        $('.sort-by-rating').removeClass('hidden');
        $(this).addClass('hidden');
        $('.sort-rating').removeClass('toggleFilter');
        $('.sort-date').addClass('toggleFilter');
        $.ajax({
            url: '{{route($urlController)}}',
            data: getFilters(e),
            success: function(data){
                $('.test').html(data);
            }
        });
    });

    $('.sort-by-date').unbind('click').click(function (e) {
        $('.sort-date').toggleClass('active');
        $('.sort-by-date').removeClass('hidden');
        $(this).addClass('hidden');
        $('.sort-date').removeClass('toggleFilter');
        $('.sort-rating').addClass('toggleFilter');
        $.ajax({
            url: '{{route($urlController)}}',
            data: getFilters(e),
            success: function(data){
                $('.test').html(data);
            }
        });
    });

    $('.pag-block-by').click(function () {
        $('.active-pag-block').removeClass('active-pag-block');
        $(this).toggleClass('active-pag-block');
    });

    $( function() {
        $( "#datepicker1" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
        $( "#datepicker2" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
    });

    $('.datePicker').on('change',function () {
        $.ajax({
            url: '{{route($urlController)}}',
            data: getFilters(),
            success: function(data){
                $('.test').html(data);
            }
        });
    });

    $('#close-top-vac').on('click', function (e) {
        e.preventDefault();
        if($('#news').hasClass('hidden')){
            $('#topvac').addClass('hidden');
            $('#left-content-column').removeClass('col-xs-9');
            $('#right-content-column').removeClass('col-xs-3');
            $('#left-content-column').addClass('col-xs-12');
        }else{
            $('#topvac').addClass('hidden');
        }
    });

    $('#close-news').on('click', function (e) {
        e.preventDefault();
        if($('#topvac').hasClass('hidden')){
            $('#news').addClass('hidden');
            $('#left-content-column').removeClass('col-xs-9');
            $('#right-content-column').removeClass('col-xs-3');
            $('#left-content-column').addClass('col-xs-12');
        }else{
            $('#news').addClass('hidden');
        }
    });

})
</script>
@if(Session::has('regions') || Session::has('industries') || Session::has('specialisations'))
    <script>
        $(document).ready(function (){
            $('.getting-list-selected-box').change();
        });
    </script>
@endif
