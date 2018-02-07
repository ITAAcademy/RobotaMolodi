<script>

$(document).ready(function () {

    var filter = new (function(){
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
        function applyFilter(){
            $.ajax({
                url: '{{ route(Route::currentRouteName()) }}',
                data: getFilters(),
                cache: false,
                success: function(data){
                    $('.test').html(data);
                }
            });
        }
        function sortByRating(context){
            $('.sort-rating').toggleClass('active');
            $('.sort-by-rating').removeClass('hidden');
            $(context).addClass('hidden');
            $('.sort-rating').removeClass('toggleFilter');
            $('.sort-date').addClass('toggleFilter');
            applyFilter();
        }
        function sortByDate(context){
            $('.sort-date').toggleClass('active');
            $('.sort-by-date').removeClass('hidden');
            $(context).addClass('hidden');
            $('.sort-date').removeClass('toggleFilter');
            $('.sort-rating').addClass('toggleFilter');
            applyFilter();
        }

        this.applyFilter = applyFilter;
        this.getFilters  = getFilters;

        $('.getting-list-selected-box').on('change',function () {
            applyFilter();
        });

        $('.sort-by-rating').unbind('click').click(function (e) {
            sortByRating(this);
        });

        $('.sort-by-date').unbind('click').click(function (e) {
            sortByDate(this);
        });

        $('.datePicker').on('change',function () {
            applyFilter();
        });

        $(document).on('click', '.pagination a' , function(event){
            event.preventDefault();
            var props = getFilters();
            var url = $(this).attr('href');
            var dest = $('.test');

            $.ajax({
                url: url,
                data: props,
                success: function(resp){
                    var result = $(resp).filter('.test').html();

                    $(dest).html(result).animate();
                    $("html, body").animate({ scrollTop: 0 }, 500);
                    $(dest).css('backgroundColor','hsla(40, 100%, 70%, 0.1)');
                    $(dest).animate({ backgroundColor: "white" }, "slow");

                }
            });
        });

    })();

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
