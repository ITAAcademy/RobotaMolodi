@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {!! Form::label('name', 'Title:', ['class' => 'focus']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<br>
@if(!isset($newsOne->pablished))
    <div class="form-group">
        {!! Form::label('published', 'Опублікувати:') !!}
        {!! Form::hidden('published', 0) !!}
        {!! Form::checkbox('published') !!}
        <br>
    </div>
@endif

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description',
        {
            extraPlugins : 'justify',
            filebrowserImageUploadUrl: '{{ route('upartimg',['_token' => csrf_token() ]) }}',
            height: 500
        }
    );
</script>
