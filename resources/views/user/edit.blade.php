<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Ввведіть ім&#39;я користувача</h4>
</div>
<div class="modal-body">
    {!! Form::model($user, array('route' => array('user.update', $user->id),'method'  => 'PUT', 'id' => 'editusername')) !!}
        <div class="form-group">
            {!! Form::label('name', 'Ім\'я користувача') !!}
            {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Зберегти', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
</div>
