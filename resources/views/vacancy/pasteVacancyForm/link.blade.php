<div class="col-sm-offset-2 col-sm-10 form" id="paste-link-form">


    {!!Form::open(['route' => 'vacancy.link'])!!}

    <h3 style="margin-top: 30px">Вставити посилання на резюме</h3>
    <div class="form-group {{$errors-> has('Link') ? 'has-error' : ''}}" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Посилання</label>
        <div class="col-sm-5">
            {!! Form::text('Link', null, array('class' => 'form-control','autocomplete'=>"off",'required','id'=>'Link','onchange'=>'PasteLink()')) !!}
        </div>
        <div class=" col-sm-5" name="linkError">{!! $errors->first('Link', '<span class="help-block">:message</span>') !!}</div>
        </br>
    </div>


    <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px">
        <input type="submit" class="btn btn-default" name="btn" onclick="PasteLink()" style="background: #f48952" value="Відправити посилання">
    </div>
</div>
{!! Form::hidden('id', $vacancy->id, array('class' => 'form-control')) !!}
{!! Form::hidden('email', $user->email, array('class' => 'form-control')) !!}
{!! Form::hidden('emailAddressee', $user->email, array('class' => 'form-control')) !!}
{!!Form::token()!!}
{!!Form::close()!!}