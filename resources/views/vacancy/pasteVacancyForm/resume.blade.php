@if (\Illuminate\Support\Facades\Auth::check())
<div id="sendRes" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="margin-top: 30px">Виберіть резюме</h3>
            </div>
            <div class="modal-body">
                {!!Form::open(['route' => 'vacancy.sendresume'])!!}
                <div class="form-group {{$errors-> has('Load') ? 'has-error' : ''}}" >
                @if (!empty($resume->all()))
                            <select class="form-control" id="resume" name="resumeId" style="margin-top: 10px">
                                @foreach($resume as $res)
                                    <option value="{{$res->id}}" selected>{{$res->position}}</option>
                                @endforeach
                            </select>

                </div>
                {!! Form::hidden('id', $vacancy->id, array('class' => 'form-control')) !!}

                @else
                    <p>У вас немає резюме.Перейти до створення резюме</p>
                    <p>{!!link_to_route('resume.create','Створення резюме')!!}</p>
                    @endif
            </div>
            <div class="modal-footer">
                @if (!empty($resume->all()))
                <input type="submit" class="btn btn-default" name="btn" onclick="PasteLink()" style="background: #f48952" value="Відправити резюме">
                @endif
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
            </div>
        </div>
        {!!Form::token()!!}
        {!!Form::close()!!}
    </div>
</div>
@endif