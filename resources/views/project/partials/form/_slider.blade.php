<div class="form-group">
    {!! Form::label('', 'Фото на слайдер', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input type="text" name="slides_url[]" class="form-control" value="{{old('slides_url.0')}}">
        <br>
        <input type="text" name="slides_url[]" class="form-control" value="{{old('slides_url.1')}}">
        <br>
        <input type="text" name="slides_url[]" class="form-control" value="{{old('slides_url.2')}}">
        <br>
        <input type="file" name="slides_disk[]" value="{{old('slides_disk.0')}}">
        <br>
        <input type="file" name="slides_disk[]" value="{{old('slides_disk.0')}}">
    </div>
</div>
