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
			if (options.length === 0) 
			{
				return 'Не вибрано...';
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













