@if (\Illuminate\Support\Facades\Auth::check())
    <div id="sendLink" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="margin-top: 30px">Вставити посилання на резюме</h3>
            </div>
            <div class="modal-body">
                {!!Form::open(array('url' => 'vacancy/link'))!!}
                <div class="form-group {{$errors-> has('Link') ? 'has-error' : ''}}" style="margin-top: 30px">
                    <label for="sector" class="col-sm-2 control-label">Посилання</label>
                    <div class="col-sm-5">
                        {!! Form::text('Link', null, array('class' => 'form-control','autocomplete'=>"off",'required','id'=>'Link','onchange'=>'PasteLink()')) !!}
                    </div>
                    <div class=" col-sm-5" name="linkError">{!! $errors->first('Link', '<span class="help-block">:message</span>') !!}</div>
                    </br>
                </div>
                {!! Form::hidden('id', $vacancy->id, array('class' => 'form-control')) !!}
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-default" name="btn" onclick="PasteLink()" style="background: #f48952" value="Відправити посилання">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('main.close') }}</button>
            </div>
        </div>
        {!!Form::token()!!}
        {!!Form::close()!!}
    </div>
</div>

@endif
