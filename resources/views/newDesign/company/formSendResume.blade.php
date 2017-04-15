
<div id="send-resume-vacancy">
    <div>
        <h3 style="margin-top: 5px">Виберіть резюме</h3>
    </div>
    <div>
        {!!Form::open(['route' => ['company.response.sendResume',$company->id],'method'=>"POST"])!!}
        <div class="form-group {{$errors-> has('Load') ? 'has-error' : ''}}" >
            @if(!empty($resume))
                <select class="form-control" id="resume" name="resumeId" style="margin-top: 10px">
                    @foreach($resume as $res)
                        <option value="{{$res->id}}" selected>{{$res->position}}</option>
                    @endforeach
                </select>
        </div>

        {!! Form::hidden('id', $company->id, array('class' => 'form-control')) !!}
        @else
            <p>У вас немає резюме.Перейти до створення резюме</p>
            <p>{!!link_to_route('resume.create','Створення резюме','','style="color:#f68c06"')!!}</p>
        @endif
        <div>
            @if (!empty($resume))
                <div align="right">
                    {!!Form::submit('Відправити', ['class' => 'btn btn-warning btn-send'])!!}
                </div>
            @endif
        </div>
    </div>


    {!!Form::close()!!}
</div>