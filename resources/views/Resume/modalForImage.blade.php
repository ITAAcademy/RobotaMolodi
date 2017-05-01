<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Вибір розміру фото</h4>
        </div>

        <div class="modal-body">
            <img src="" alt="" id="img-src">
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="button" id="crop" class="btn btn-primary">Сохранить изменения</button>
        </div>
    </div>
</div>

<style  type="text/css">
    .jcrop-active, canvas{
        max-width: 565px !important;
        height: auto !important;
        margin: auto;
    }

</style>

<script>
    $(document).ready(function () {
//        var x1, y1, x2, y2;
//        var  jcrop_api;
//
//        function setApi(){
//            $('#img-src').Jcrop({
//                onChange: showCoords,
//                onSelect: showCoords
//            },function(){
//                jcrop_api = this;
//                jcrop_api.setOptions({ aspectRatio: 1/1 });
//                jcrop_api.setOptions({ minSize: [ 130, 130 ] });
//                $('#crop').show();
//            });
//
//            function showCoords(c){
//                x1 = c.x;
//                y1 = c.y;
//                x2 = c.x2;
//                y2 = c.y2;
//            }
//        }
//
//            setApi();

//            $('#crop').click(function() {
//                var wigth = $('.jcrop-active').width(); //ширина картинки на екрані
//                var natural_width = $('canvas').attr('width');  //натуральна ширина картинки
//                var mas = [x1,x2,y1,y2,wigth,natural_width];
//                $('#coords').attr('value', mas);
//                $('.jcrop-active').attr('width');
//
//                jcrop_api.destroy();
//                $('.imagePreviewLarge').removeAttr('style');
//
//                $('#imageBox').modal('hide');
//            });

    })
</script>