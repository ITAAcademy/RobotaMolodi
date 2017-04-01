/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function startTesting()
{
	$('#myform').validate({ 
        rules: {
            inputName: {
                required: true,
                minlength: 4,
                maxlength: 16,
            }, 
			one: {
			    required: true,
			},
        },
		messages: {
		    inputName: {
		        required: 'Поле "ім\'я" обов\'язкове',
		        minlength: "Ім\'я повинно бути не менше 4 символів",
                maxlength: "Ім\'я повинно бути не більше 16 символів",
		    }, 
		    one: {
		        required: "Оберіть стать"
		    }
		},
        errorElement : 'div',
  		errorLabelContainer: '.errorTxt',
        submitHandler: function(form) {
            route('greetings',compileNameAndSex(),showTest,errorAlert);
            return false;
        },
	    invalidHandler: function(form) {
            return false;
        }
    }); 

}

function changeContent(data)
{
	$("#content").html(data);
}

function compileNameAndSex()
{
	return function()
	{
		var data = {"name": $("#phName").val(),
					"sex" : $('input[name=one]:checked').val()
				};
		return data;
	};
}

function errorAlert(errorMessage)
{
	alert(errorMessage);
}

function showTest(data)
{
		$("#greeting").hide();
		$("#start_test").show();
		$("#header").html(data.content.chapter);
		$("#content_tests").html(data.content.description);
                $("#secretKey").html(data.token);
                $("#tests_title_tr").empty();
                $("#buttons_tr").empty();
        $.each(data.content.buttons, function(index, button)
							{
								var tdChoise =  $('<div/>',{
												text: this.title,
												class:'tit_b'
								});
								var buttonChoise =  $('<div/>').append($('<button/>', {
													text: button.value, 
													class:'buttonTest',
													click: function(){
													clickToAnswer(data.token, button.value, data.testid, true);
													}
												}
								));
										
								var res = $('<div class="col-md-1 col-xs-12 b"/>').append(tdChoise);
								res.append(buttonChoise);		
								$("#buttons_tr").append(res);
								if(data.rulesContent)
									$("#buttons_tr button").prop('disabled', true);
	    });
		
		$("#tip").html(data.content.tip);
		
		var test =  $('<button/>', {
				text: data.content.startButtonText, 
				click: function () { startTest(data.token) }, 
				class: "button"
		});
				 $("#start_button").html(test);
				 $("#start_button").click(function(){
				 	$("#start_button").css("display","none");
	             });		          
}

function clickToAnswer(key, value, testid, availableToAnswer)
{
	route('tests', prepareAnswerData(key, value, testid, availableToAnswer), showTest, errorAlert);
	
}

function prepareTestData(key)
{
    return function()
	{
            var data = {
               "code": key
                };
            return data;
	};
}

function prepareAnswerData(key, value, testid, availableToAnswer)
{
	
	return function()
	{
		var data = {
			"code": key,
			"answer": value,
			"testid": testid,
			"availableToAnswer":availableToAnswer
			};
		return data;
	};
}

function startTest(key)
{
    route('tests',prepareTestData(key),showTest,errorAlert);
}

$(document).ready(function(){
		$("#male").click(function(){
				if($("#sex1").attr("checked") != "checked"){
			 		$("#sex1").attr("checked","checked");
			 		$("#male").addClass("border");
			 		$("#sex2").attr("checked", false);
			 		$("#female").removeClass("border");
			 		$("#sexFieldset").removeClass("fieldset1");
			 		$("#leg").removeClass("legend");
				}
			});

			$("#female").click(function(){
				if($("#sex2").attr("checked") != "checked"){
			 		$("#sex2").attr("checked","checked");
			 		$("#female").addClass("border");
			 		$("#sex1").attr("checked", false);
			 		$("#male").removeClass("border");
			 		$("#sexFieldset").removeClass("fieldset1");
			 		$("#leg").removeClass("legend");
				}
			  });
			  
		$(".button,.btn").click(function(){
		if($("#sex1").attr("checked") != "checked" && $("#sex2").attr("checked") != "checked" ){
			$("#sexFieldset").addClass("fieldset1");
			$("#leg").addClass("legend");
		}
		else{
		     $("#sexFieldset").removeClass("fieldset1");
		     $("#leg").removeClass("legend");
			};
			
		var name = $('#phName');
		var str = name.val();
		var regul =/[A-Za-z0-9]/;
		var pattern = new RegExp(regul);
		var res = pattern.test(str);
		
		    if(!res){
			     alert('Ім\'я повинно складатись з латинських букв або цифр');
				$('.form-control').removeAttr("id");
				$('.form-control').attr("id","phName1");
			}
		else{
				$('.form-control').removeAttr("id");
				$('.form-control').attr("id","phName");   
			}
			
	    });
});