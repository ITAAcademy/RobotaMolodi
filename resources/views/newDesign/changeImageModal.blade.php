<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Зміна зображення резюме</h4>
        </div>

        <div class="row">
            <div class="form-group {{$errors-> has('changeResumeImg') ? 'has-error' : ''}}">
                <div>
                    <div class="col-sm-3">
                        <button id="but" type="button" onclick="document.getElementById('changeResumeImg').click()" onchange="">Виберіть файл</button>
                    </div>
                    <div class="col-sm-4" id="newfilename">Файл не вибрано</div>
                    {!! Form::file('changeResumeImg', array( 'id'=>'changeResumeImg', 'style'=>'display:none')) !!}
                </div>
                <div class=" col-md-4 col-sm-4">{!! $errors->first('changeResumeImg', '<span class="help-block">:message</span>') !!}</div>
            </div>

            <input type="hidden" name="fcoords" class="coords" value="">
        </div>

        <div class="modal-body">
            <img src="" alt="" id="img-src-resume">
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('main.close') }}</button>
            <button type="button" id="cropBtn" class="btn btn-primary">{{ trans('main.save') }}</button>
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
