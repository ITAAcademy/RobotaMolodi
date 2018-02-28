var filters = {
    region: '#list-selected-region',
    indastry : '#list-selected-indastry',
    specialization : '#list-selected-specialization'
};
function initMultiselect(container)
{
	$(container).multiselect(
	{
		buttonWidth: '100%'
		,maxHeight: 200
		,enableFiltering: true
		,enableCaseInsensitiveFiltering: true
		,filterPlaceholder: 'Пошук...'
		//,nSelectedText: '-Три і більше'
		,includeSelectAllOption: true
		,enableFullValueFiltering: true
		,selectAllText: 'Вибрати все'
		,buttonText: function(options, select)
		{
            for (var key in filters) {
                var filter_btn = $(filters[key]).find('.multiselect-clear-filter');
                filter_btn.click(function() {
                	$('div.btn-group.open > ul > li.multiselect-item.multiselect-all > a > label > input').trigger('click');
                    $('div.btn-group.open > button > span.multiselect-selected-text').text('...');
                    $('div.btn-group.open > ul > li.active').removeClass();
                    $('div.btn-group.open > ul > li > a > label > input:checkbox').attr('checked',false);
                 });
            }

			if (options.length === 0)
			{
				return '...';
			}

			else if (options.length > 3)
			{
				return 'Вибрано більше трьох';
			}
			else
			{
				 var labels = [];
				 options.each(function() {
					 if ($(this).attr('label') !== undefined) {
						 labels.push($(this).attr('label'));
					 }
					 else {
						 labels.push($(this).html());
					 }
				 });

				var maxCountCharacters = 0;
				if($(select).attr('name') == 'selected-region'){
					maxCountCharacters = 18;
				}else {
					maxCountCharacters = 55;
				}


				 if(labels.length == 1){
					 var strLabel = labels.join(', ') + '';
					 return strLabel.length >= maxCountCharacters ? strLabel.slice(0, maxCountCharacters) + "."
												: strLabel;
				 }else if(labels.length == 2){
					 if((labels.join(', ') + '').length >= maxCountCharacters){
						  return labels[0].slice(0,maxCountCharacters / 2 - 1) + '., ' + labels[1].slice(0,maxCountCharacters / 2 - 1) + '.' ;
					 }else{
						 return labels.join(', ') + '';
					 }
				 }else{
					 if((labels.join(', ') + '').length >= 18){
						  return labels[0].slice(0,maxCountCharacters / 3 - 2) + '., ' + labels[1].slice(0,maxCountCharacters / 3 - 2) + '., ' +
								 labels[2].slice(0,maxCountCharacters / 3 - 2) + '.';
					 }else{
						 return labels.join(', ') + '';
					 }
				 }
			}
		}
    });

}
