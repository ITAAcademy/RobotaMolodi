<br>
<div class="form-group">
    {!! Form::label('', 'Фото на слайдер', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <div class="conatiner">
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="slides_url[]" class="form-control">
                    <br>
                    <a href="#"><p>Ще фото+</p></a>
                </div>
                <div class="col-sm-6">
                    <input type="file" name="slides_disk[]">
                    <br>
                    <a href="#"><p>Ще фото+</p></a>
                </div>
            </div>
        </div>
    </div>
</div>
