
function FormatDate(dateCreate) {
    dateCreate *=1000;
    var diff = new Date() - dateCreate;
    if (diff < 1000) {
        return 'щойно';
    }
    var sec = Math.floor(diff / 1000);
    if (sec < 60) {
        return sec + ' сек. тому';
    }
    var min = Math.floor(diff / (60000));
    if (min < 60) {
        return min + ' хв. тому';
    }
    var hour = Math.floor(diff / (60* 1000* 60));
    if (hour < 24) {
        return hour + ' год. тому';
    }
    var day = Math.floor(diff / (60* 1000* 24 * 60));
    if (day < 4) {
        return day + ' дн. тому';
    }
    var d = new Date(dateCreate);
    d = [
        '0' + d.getDate(),
        '0' + (d.getMonth() + 1),
        '' + d.getFullYear(),
        '0' + d.getHours(),
        '0' + d.getMinutes()
    ];

    for (var i = 0; i < d.length; i++) {
        d[i] = d[i].slice(-2);
    }

    return d.slice(0, 3).join('.') + ' ' + d.slice(3).join(':');
}