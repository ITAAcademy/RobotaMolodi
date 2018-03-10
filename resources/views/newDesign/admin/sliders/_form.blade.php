
<div class="col-md-10 col-sm-10 col-xs-10 contentAndmin">
    @if(count($errors) > 0 || Session::has('flash_message'))
        <div class="alert alert-danger" style="margin-top: 15px;">
            <ul>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                {{ Session::get('flash_message') }}
            </ul>
        </div>
    @endif
    <div class="form-group">
        {!! Form::label('image', 'Add image:') !!}
        {!! Form::file('image',['class' => 'btn inputImg'])!!}
        <img
            class="prevImg img-responsive img-rounded"
            src="{{isset($slider->image) ? $slider->image : ''}}"
            alt="" style="max-height:100px"/>
    </div>
    <div class="form-group">
        {!! Form::label('url', 'Url:', ['class' => 'control-label']) !!}
        {!! Form::text('url', Input::old('url'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category', 'Category:', ['class' => 'control-label']) !!}
        <select name="category_id" id="categorySelect" class="form-control">
            @foreach($categories as $category)
                @if(isset($slider) && $category->id != $slider->category_id)
                    <option value="{{ $category->id}}">{{ $category->name}}</option>
                @else
                    <option value="{{ $category->id}}" selected>{{ $category->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    @if(!isset($slider->pablished))
        <div class="form-group">
            {!! Form::label('published', 'Опублікувати:') !!}
            {!! Form::hidden('published', 0) !!}
            {!! Form::checkbox('published') !!}
            <br>
        </div>
    @endif
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