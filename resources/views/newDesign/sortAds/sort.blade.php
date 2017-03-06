<!-- sort -->
<link href="{{ asset('/css/sortAds/sortAds.css') }}" rel="stylesheet">
<link href="{{ asset('/css/sortAds/oneCompany.css') }}" rel="stylesheet">
<link href="{{ asset('/css/sortAds/tcal.css') }}" rel="stylesheet">
<!-- EndSort -->
<div class='row sort-box'>

		<div class='col-xs-12 sort-box'>
			<div class='col-xs-3 sort-rating'>
				<span class='label-sort-box'>Сортувати по:</span>
				<span class ='opsion-sort-box'>рейтингу</span>
			</div>
			<div class='col-xs-3 sort-date'>
				<span class='label-sort-box'>по даті:</span>
				<span class='opsion-sort-box'>спочатку нові</span>
			</div>
			<div class='col-xs-6 input-sort-box'>
				{{--<span class='label-sort-box'>по проміжку дат:</span>--}}
				{{--<label for="startDate"><span class ='opsion-sort-box'>від</span></label>--}}
				{{--<input type="text" id="sDate" name="startDate" class="tcal" value="" />--}}

				{{--<label for="endDate"><span class ='opsion-sort-box'>до</span></label>--}}
				{{--<input type="text" id="eDate" name="endDate" class="tcal" value="" />--}}

				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
				<div class="container">
					<div class='col-md-5'>
						<div class="form-group">
							<div class='input-group date' id='datetimepicker6'>
								<input type='text' class="form-control" />
								<span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
							</div>
						</div>
					</div>
					<div class='col-md-5'>
						<div class="form-group">
							<div class='input-group date' id='datetimepicker7'>
								<input type='text' class="form-control" />
								<span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
							</div>
						</div>
					</div>
				</div>





			</div>
		</div>

</div>

	<hr class='line-sort-box'>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datepicker();
        $('#datetimepicker7').datepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>