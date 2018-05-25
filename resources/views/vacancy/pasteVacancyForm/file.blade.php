@if (\Illuminate\Support\Facades\Auth::check())
    <div id="sendFile" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <br>
                    <div class="col-sm-offset-2 col-sm-10 form" style="margin-top: 20px;" id="paste-file-form">
                        {!!Form::open(['route' => 'vacancy.sendFile', 'enctype' => 'multipart/form-data', 'files' => true])!!}
                        <div class="form-group {{$errors-> has('Load') ? 'has-error' : ''}}" style="margin-top: 30px">
                            <div class="form-group">
                                <label for="sector" class="col-sm-2 control-label"><h4>Обрати файл</h4></label>
                                <div class="col-sm-5">
                                    {!! Form::file('Load',array('class' => 'form-control', 'id'=>'File', 'name' => 'FileName')) !!}
                                </div>
                                <div class=" col-sm-5">{!! $errors->first('Load', '<span class="help-block">:message</span>') !!}</div>
                                </br>
                            </div>
                            {!! Form::hidden('id', $vacancy->id, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px">
                    <span><input type="submit" class="btn btn-default" style="background: #f48952"
                                 value="Відправити файл">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ trans('main.close') }}</button></span>
                    </div>
                    {!!Form::token()!!}
                    {!!Form::close()!!}

                </div>
            </div>

        </div>
    </div>
@endif
