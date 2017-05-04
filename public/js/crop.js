function crop(e) {
    $('#imageBox').modal('show');

    var x1, y1, x2, y2;
    var jcrop_api;

    function setApi() {
        $('#img-src').Jcrop({
            onChange: showCoords,
            onSelect: showCoords
        }, function () {
            jcrop_api = this;
            jcrop_api.setOptions({aspectRatio: 1 / 1});
            jcrop_api.setOptions({minSize: [130, 130]});
            jcrop_api.setOptions({setSelect: [0,0,130,130]});
        });

        function showCoords(c) {
            x1 = c.x;
            y1 = c.y;
            x2 = c.x2;
            y2 = c.y2;
            changeJcropSelectionTopBack();
        }
    }

    if (e.currentTarget.files[0]) {
        var file = e.currentTarget.files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
            $('.jcrop-active').replaceWith('');
            $('#img-src').replaceWith('<img id="img-src" src="' + reader.result + '"/>');
            setApi();
        }
        reader.readAsDataURL(file);
    } else {
        $('#img-src').attr('src', '');
    }

    function changeJcropSelectionTop(){
        $('.jcrop-selection').addClass('jcrop-selection-top');
    }
    function changeJcropSelectionTopBack(){
        $('.jcrop-selection').removeClass('jcrop-selection-top');
    }

    setApi();
    setTimeout(changeJcropSelectionTop, 100);

    $('#crop').click(function () {
        var wigth = $('.jcrop-active').width();         //width picture on screen
        var natural_width = $('canvas').attr('width');  //natural width picture
        var mas = [x1, x2, y1, y2, wigth, natural_width];
        $('.coords').attr('value', mas);
        jcrop_api.destroy();
        $('#img-src').removeAttr('style');
        $('#imageBox').modal('hide');
    });
}