

function getData(successFunction,request,errorFunction)
{
	url = "http://po.itatests.com/server/index.php";
       //url = "http://localhost/po/server/index.php";
       	$.ajax({
		url: url,
		cache: false,
		crossDomain: true,
		type: "POST",
		data:request,
		dataType: 'json',
		success: function(data){
				successFunction(data);
			},
		error: function (jqXHR, textStatus, errorThrown) {
				errorFunction(errorThrown);
			}
	});
}


function route(path,dataProviderFunction, successFunction, errorFunction)
{
	switch (path){

		case 'greetings':
		case 'tests':
			{
				getData(successFunction,dataProviderFunction(),errorFunction);
			}
		break;
	}
}