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
				<span class='label-sort-box'>по проміжку дат:</span>
				<label for="startDate"><span class ='opsion-sort-box'>від</span></label>
				<input type="text" id="sDate" name="startDate" class="tcal" value="" />

				<label for="endDate"><span class ='opsion-sort-box'>до</span></label>
				<input type="text" id="eDate" name="endDate" class="tcal" value="" />
			</div>
		</div>

</div>

	<hr class='line-sort-box'>
