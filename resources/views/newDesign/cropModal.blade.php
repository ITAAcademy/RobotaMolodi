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
            <button type="button" id="closeModalBtn" class="btn btn-default" data-dismiss="modal">{{ trans('main.close') }}</button>
            <button type="button" id="crop" class="btn btn-primary">{{ trans('main.save') }}</button>
        </div>
    </div>
</div>

<style  type="text/css">
    .jcrop-active, canvas{
        max-width: 565px !important;
        height: auto !important;
        margin: auto;
    }

    .jcrop-selection-top{
        top: 0 !important;
    }
</style>
