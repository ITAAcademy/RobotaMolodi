<p class="text-center">Команда проекту</p>
<div class="form-group">
    {!! Form::label('', 'Фото', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="file"
            name="members[0][avatar]"
            value="{{old('members.0.avatar')}}">
    </div>
</div>
<div class="form-group">
    {!! Form::label('', 'Імя та прізвище', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="members[0][name]"
            class="form-control"
            value="{{old('members.0.name')}}">
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', 'Позиція', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="members[0][position]"
            class="form-control"
            value="{{old('members.0.position')}}">
    </div>
</div>

<br>
<hr>
<br>
<div class="form-group">
    {!! Form::label('', 'Фото', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="file"
            name="members[1][avatar]"
            value="{{old('members.1.avatar')}}">
    </div>
</div>
<div class="form-group">
    {!! Form::label('', 'Імя та прізвище', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="members[1][name]"
            class="form-control"
            value="{{old('members.1.name')}}">
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', 'Позиція', ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        <input
            type="text"
            name="members[1][position]"
            class="form-control"
            value="{{old('members.1.position')}}">
    </div>
</div>

<br><br>
