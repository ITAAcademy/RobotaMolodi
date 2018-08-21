$(document).ready(function () {
    let arrayTimes = [];

    $("#addDateTime").click(function () {

        let timeStart = document.getElementById('time_start').value;
        let timeEnd = document.getElementById('time_end').value;

        arrayTimes.push({timeStart, timeEnd});

        console.log(arrayTimes);


        $("#timeElements").html(arrayTimes.reduce(function (result, current) {
            result += "<li>" + current.timeStart + " - " + current.timeEnd + "</li>";
            return result;
        }, ""));

        $("#hiddenInputs").html(arrayTimes.reduce(function (result, current) {
            let obj = {time_start: current.timeStart, time_end: current.timeEnd};
            result += `<input type="hidden" name="consultation_times[]" value='${JSON.stringify(obj)}'/>`;
            return result;
        }, ""));

    });

});




