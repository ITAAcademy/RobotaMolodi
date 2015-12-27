<div class="col-sm-offset-2 col-sm-10 form" style="margin-top: 20px;" id="paste-file-form">

    {!!Form::open(['route' => 'vacancy.sendFile','enctype' => 'multipart/form-data', 'files' => true])!!}

    <h3 style="margin-top: 10px">Завантажити файл</h3>
    <div class="form-group {{$errors-> has('Load') ? 'has-error' : ''}}" style="margin-top: 30px">
        <div class="form-group" style="margin-top: 30px">
            <label for="sector" class="col-sm-2 control-label">Завантажити файл</label>
            <div class="col-sm-5">
                {!! Form::file('Load',array('class' => 'form-control','id'=>'File')) !!}
            </div>
            <div class=" col-sm-5">{!! $errors->first('Load', '<span class="help-block">:message</span>') !!}</div>
            </br>
        </div>

        {!! Form::hidden('id', $vacancy->id, array('class' => 'form-control')) !!}
        {!! Form::hidden('email', $user->email, array('class' => 'form-control')) !!}
        {!! Form::hidden('emailAddressee', $user->email, array('class' => 'form-control')) !!}
        <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px">
            <input type="submit" class="btn btn-default" onclick="PasteFile()" style="background: #f48952" value="Відправити файл">
        </div>
    </div>
</div>
{!!Form::token()!!}
{!!Form::close()!!}