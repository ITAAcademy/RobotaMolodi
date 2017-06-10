
"use strict";
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function liker(that, routeUri) {

    that.parentElement.parentElement.setAttribute('id', 'pointer');
        var current = that.nextElementSibling.id;
        var like = document.querySelector('#pointer .findLike');
        var dislike = document.querySelector('#pointer .findDislike');
        $.ajax({
            url: routeUri,
            type: 'GET',
            data: {'mark': current.split('_')[1]},
            success: function (data) {
                if (data.error != undefined) {
                    console.log("Помилка передачі даних: " + data.error);
                } else {
                    like.innerHTML = (data.countLike);
                    dislike.innerHTML = (data.countDisLike);
                }
            }
        });
        document.getElementById("pointer").removeAttribute("id");
}