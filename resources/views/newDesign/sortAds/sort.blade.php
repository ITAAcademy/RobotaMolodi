<!-- sort -->
<link href="{{ asset('/css/sortAds/sortAds.css') }}" rel="stylesheet">
<link href="{{ asset('/css/sortAds/oneCompany.css') }}" rel="stylesheet">
<link href="{{ asset('/css/sortAds/calendarDatepicker.css') }}" rel="stylesheet">
<!-- EndSort -->
<div class='row sort-box'>

		<div class='col-xs-12 sort-box'>
			<div class='col-xs-3 sort-rating'>
				<span class='label-sort-box'>Сортувати по:</span>
				<span class ='opsion-sort-box rating'>рейтингу</span>
			</div>
			<div class='col-xs-3 sort-date'>
				<span class='label-sort-box'>по даті:</span>
				<span class='opsion-sort-box sort-by-date hidden'>спочатку нові</span>
				<span class='opsion-sort-box sort-by-date'>спочатку старі</span>
			</div>
			<div class='col-xs-6 input-sort-box'>
				<span class='label-sort-box'>по проміжку дат:</span>
				<div class="block-datepicker">
					<label for="startDate"><span class ='opsion-sort-box' id="datePicker-label1">від</span></label>
					<input class="datePicker" type="text" id="datepicker1" name="startDate"/>
				</div>
				<div class="block-datepicker">
					<label for="endDate"><span class ='opsion-sort-box' id="datePicker-label2">до</span></label>
					<input class="datePicker" type="text" id="datepicker2" name="endDate" />
				</div>
			</div>
		</div>

</div>

	<hr class='line-sort-box'>

