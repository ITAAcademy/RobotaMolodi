 <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
     {!! Form::label('url','Url :') !!}
     {!! Form::url('url', old('url'), array('class' => 'form-control')) !!}
     <span class="text-danger">{{ $errors->first('url') }}</span>
 </div>
 <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
     {!! Form::label('title','Title :') !!}
     {!! Form::text('title', old('title'), array('class' => 'form-control')) !!}
     <span class="text-danger">{{ $errors->first('title') }}</span>
 </div>
 <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
     {!! Form::label('description','Description :') !!}
     {!! Form::textarea('description', old('description'), array('class' => 'form-control','style'=>'height:150px;resize:none;')) !!}
     <span class="text-danger">{{ $errors->first('description') }}</span>
 </div>
 <div class="btn-block">
     {!! Form::submit('Submit' , ['class' => 'btn btn-lg btn-success pull-right']); !!}
     <a class="btn btn-lg btn-primary" href="{{ route('admin.seo-module.index') }}"> Back</a>
 </div>
