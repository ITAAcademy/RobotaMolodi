<div class="modal-dialog">
    <div class="modal-content">
        <meta name="csrf_token" id="_token" content="{{ csrf_token() }}" />
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Вибір розміру фото</h4>
        </div>

        <div class="modal-body" style="text-align: center">
            <img src="" alt="" id="img-src">
        </div>

        <div>
            {{--<button id="release">Убрать выделение</button>--}}
            <button type="button" id="crop">Обрезать</button>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="button" class="btn btn-primary">Сохранить изменения</button>

        </div>
    </div>
</div>

<style  type="text/css">
    #crop{
        display:none;
    }
</style>

<script>
    $(document).ready(function () {
        var x1, y1, x2, y2, crop = 'image/resume/4245/';
        var  jcrop_api;
        jQuery(function($){
            $('#img-src').Jcrop({
                onChange: showCoords,
                onSelect: showCoords
            },function(){
                jcrop_api = this;
                jcrop_api.setOptions({ aspectRatio: 1/1 });
                jcrop_api.setOptions({ minSize: [ 130, 130 ] });
                $('#crop').show();
            });

            function showCoords(c){
                x1 = c.x;
                y1 = c.y;
                x2 = c.x2;
                y2 = c.y2;
            }
        });

        jQuery(function($){
            $('#crop').click(function() {
                var _token = $('#_token').attr('content');
                var img = $('#img-src').attr('src');
                $.post('action.php',  {'x1': x1, 'x2': x2, 'y1': y1, 'y2': y2, 'img': img, 'crop': crop, '_token': _token },  function(file) {
                    $('#img-src').append('<img  src="'+crop+file+'" class="mini">');
                });
            });
        });
    })
</script>