@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-md-10 col-sm-10 col-xs-10 contentAndmin">
    <div class="col-md-offset-3 col-md-9">
        @include('newDesign.sliders.underFooter')
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Add image:') !!}
        {!! Form::file('image',['class' => 'btn inputImg'])!!}
        <img class="prevImg img-responsive img-rounded" src="" alt="" style="max-height:250px"/>
    </div>
    <div class="form-group">
        {!! Form::label('url', 'Url:', ['class' => 'control-label']) !!}
        {!! Form::text('url', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category', 'Category:', ['class' => 'control-label']) !!}
        <select name="category_id" id="categorySelect" class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id}}">{{ $category->name}}</option>
            @endforeach
        </select>
    </div>

    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
<script>
    $('body').on('change', '.inputImg', function (e) {
        e.stopPropagation();
        var t = this;
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function imageIsLoaded(e) {
                var prevContainer = t.closest('.form-group');
                $('body').find('.prevImg').show().attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>