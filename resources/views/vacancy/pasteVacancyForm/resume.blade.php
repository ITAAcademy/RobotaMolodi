<div class="col-sm-offset-2 col-sm-10 form" id="paste-resume-form">

    {!!Form::open(['route' => 'vacancy.sendresume'])!!}
    <div class="form-group">
        <div class="col-sm-6">
            @if($resume == '' || empty($resume->all()))
                <p>У вас немає резюме.Перейти до створення резюме</p>
                <p>{!!link_to_route('resume.create','Створення резюме')!!}</p>
        </div>
    </div>

    @else
        <h3 style="margin-top: 10px">Завантажити резюме</h3>
        <div class="form-group {{$errors-> has('Load') ? 'has-error' : ''}}" >
            <div class="form-group" >
                <label for="sector" class="col-sm-3 control-label">Виберіть резюме</label>
                <div class="col-sm-5">
                    <select class="form-control" id="resume" name="resumeId">
                        @foreach($resume as $res)
                            <option value="{{$res->id}}" selected>{{$res->position}}</option>
                        @endforeach
                    </select>

                </div>
                </br>
            </div>
            {!! Form::hidden('id', $vacancy->id, array('class' => 'form-control')) !!}
            <div class="col-sm-offset-3 col-sm-10" style="margin-top: 20px">
                <input type="submit" class="btn btn-default" style="background: #f48952" value="Відправити резюме">
            </div>

        </div>
    @endif
</div>

{!!Form::token()!!}
{!!Form::close()!!}