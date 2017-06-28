
"use strict";
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$( document ).on( "click", ".likeDislike", function(e) {
    e.preventDefault();

    var routeUri = (this.nextElementSibling.getAttribute('id')).split('_')[0];

    this.parentElement.parentElement.setAttribute('id', 'pointer');
    var current = this.nextElementSibling.id;
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
});
/* authorization
 var log = Boolean({!! Auth::check() !!});
 if (log != 1) {
 $('.likeError').text("Увійдіть або зареєструйтесь!").css('color', 'red').animate({color: "white"}, "slow");
 return false;
 }
*/
