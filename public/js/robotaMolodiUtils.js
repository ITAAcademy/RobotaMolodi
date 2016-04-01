/**
 * Created by Quicks on 17.09.2015.
 */
function  CheckForm()
{
    var salaryField = $('[name = salary]').val();
    var results = salaryField;
    

    if(salaryField.search(' ') > -1)
    {
        salaryField = salaryField.trim();
        salaryField = salaryField.split(' ');
        if(salaryField.length>1)
            results = salaryField[0] + salaryField[1];
    }

    document.getElementById('Salary').value = results;

    return true;
}

function fakeFilter(name, value, url)
{
    var options = document.getElementById(name).childNodes;

    for(var i = 0; i < options.length; i++)
        if(options[i].value == value)
        {
            document.getElementById(name).selectedIndex = (i - 1) / 2;
            break;
        }

    var city_id = $('[name=city]').val();
    var industry_id = $('[name=industry]').val();
    var specialisation = $('[name=spec]').val();

    $.ajax({
        url: url,
        type: "POST",
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        data: {'specialisation_': specialisation,'city_id': city_id, 'industry_id': industry_id,data:'{{$data}}'},
        success: function (json) {
            $('.posts').html(json);

        }
    });

}

function submit(filterName, filterValue)
{
    document.getElementById("filterName").value = filterName;
    document.getElementById("filterValue").value = filterValue;
    document.filthForm.submit();
}