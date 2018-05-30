<!-- sort -->
<link href="{{ asset('/css/sortAds/sortAds.css') }}" rel="stylesheet">
<link href="{{ asset('/css/sortAds/calendarDatepicker.css') }}" rel="stylesheet">
<!-- EndSort -->
<div class='row row-centered sort-box'>
    <div class='col-xs-3 col-sm-2 col-md-3 col-lg-3 sort-rating toggleFilter' style="padding:0">
        <span class='label-sort-box'>{{ trans('content.sort_by') }}</span>
        <span class='opsion-sort-box sort-by-rating hidden'>{{ trans('content.rating_m') }}</span>
        <span class='opsion-sort-box sort-by-rating'>{{ trans('content.rating_p') }}</span>
    </div>
    <div class='col-xs-3 col-sm-2 col-md-3 col-lg-3 sort-date'>
        <span class='label-sort-box'>{{ trans('content.date') }}:</span>
        <span class='opsion-sort-box sort-by-date'>{{ trans('content.new_first') }}</span>
        <span class='opsion-sort-box sort-by-date hidden'>{{ trans('content.old_first') }}</span>
    </div>
    <div class='col-xs-4 col-sm-3 col-md-2 col-lg-4 input-sort-box'>
        <span class='label-sort-box'>{{ trans('content.gaps') }}</span>
        <div class="block-datepicker">
            <label for="startDate"><span class='opsion-sort-box'
                                         id="datePicker-label1">{{ trans('content.from') }}</span></label>
            <input class="datePicker" type="text" id="datepicker1" name="startDate"/>
        </div>
        <div class="block-datepicker">
            <label for="endDate"><span class='opsion-sort-box'
                                       id="datePicker-label2">{{ trans('content.to') }}</span></label>
            <input class="datePicker" type="text" id="datepicker2" name="endDate"/>
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-1 col-lg-2 sort-filter" >
        <a id="close-all-filters" type="reset" href="#" value="Reset">{{ trans('content.reset') }}</a>
    </div>
</div>
<hr class='line-sort-box'>
<script>
    //close filters:
    $('#close-all-filters').on('click', function (e) {
        location.reload(true);
    });
</script>

