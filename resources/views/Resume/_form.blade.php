<div class="row">
<div class="form-group {{$errors-> has('name_u') ? 'has-error' : ''}}">
   <div class="col-md-2 col-sm-2 control-label"> {!! Form::label("Прізвище та ім'я") !!} <span class="required_field">*</span></div>
    <div class=" col-md-6 col-sm-6">{!! Form::text('name_u', Input::old('name_u'), ['class'=>'form-control']) !!}</div>
    <div class=" col-md-4 col-sm-4">{!! $errors->first('name_u', '<span class="help-block">:message</span>') !!}</div>
</div></div><br>

<div class="row">
<div class="form-group {{$errors-> has('telephone') ? 'has-error' : ''}}">
    <div class="col-md-2 col-sm-2 control-label">  {!! Form::label('Телефон') !!}</div>
    <div class="col-md-6 col-sm-6">{!! Form::text('telephone', Input::old('telephone'), ['class'=>'form-control']) !!}</div>
    <div class=" col-md-4 col-sm-4">{!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}</div>
</div></div><br>

<div class="row">
<div class="form-group {{$errors-> has('email') ? 'has-error' : ''}}">
    <div class="col-md-2 col-sm-2 control-label"> {!! Form::label('Електронна пошта') !!} <span class="required_field">*</span></div>
    <div class="col-md-6 col-sm-6">{!! Form::text('email', $userEmail, array( 'class' => 'form-control','id' => 'exampleInputEmail1','placeholder' => $userEmail )) !!}</div>
    <div class=" col-md-4 col-sm-4">{!! $errors->first('email', '<span class="help-block">:message</span>') !!}</div>
</div></div><br>

<div class="row">
<div class="form-group">
    <div class="col-md-2 col-sm-2 control-label">  {!! Form::label('Місто') !!}<span class="required_field">*</span></div>
    <div class="col-md-6 col-sm-6"> <select name="city" style="width: 100%" class="form-control js-example-basic-multiple" multiple="multiple" id="selectCity">
        @foreach($cities as $city)
            <option value="{{$city->id}}"> {{$city->name}} </option>
        @endforeach
        @foreach($cities as $city)
            @if($city->id == Input::old('city'))
                <option value="{{$city->id}}" selected>{{$city->name}}</option>
            @endif
        @endforeach
    </select></div>
</div></div><br>

<div class="row">
<div class="form-group">
    <div class="col-md-2 col-sm-2 control-label"> {!! Form::label('Галузь') !!}<span class="required_field">*</span></div>
    <div class="col-md-6 col-sm-6"> <select name="industry" style="width: auto" class="form-control" id="selectIndustry">
            @foreach($industries as $industry)
                <option value="{{$industry->id}}"> {{$industry->name}} </option>
            @endforeach
            @if(Input::old('industry')!= '')
                <option value="{{Input::old('industry')}}" selected>{{\App\Models\Industry::find(Input::old('industry'))->name}}
            @endif
            </option>
        </select></div>
</div></div><br>

<div class="row">
<div class="form-group {{$errors-> has('position') ? 'has-error' : ''}}">
    <div class="col-md-2 col-sm-2 control-label"> {!! Form::label('position', 'Позиція') !!} <span class="required_field">*</span></div>
    <div class="col-md-6 col-sm-6">
        <select name="position" id="position" class="form-control">
        @if(Input::old('position')== '')
            @foreach($positions as $position)
                <option value="empty"></option>
                @if($position == Input::old('position'))
                    <option value="{{$position}}" selected>{{$position}}</option>
                @else
                    <option value="{{$position}}">{{$position}}</option>
                @endif
            @endforeach
        @else
            @foreach($positions as $position)
                @if($position == Input::old('position'))
                    <option value="{{$position}}" selected>{{$position}}</option>
                @else
                    <option value="{{$position}}">{{$position}}</option>
                @endif
            @endforeach
        @endif
        </select>
     </div>
    <div class=" col-md-4 col-sm-4">{!! $errors->first('position', '<span class="help-block">:message</span>') !!}</div>
 </div></div><br>

<div class="row">
<div class="form-group {{$errors-> has('salary') ? 'has-error' : ''}}">
    <div class="col-md-2 col-sm-2 control-label">  {!! Form::label("Зарплата (мiнiмальна)") !!} <span class="required_field">*</span></div>
    <div class="col-md-6 col-sm-6">  {!! Form::text('salary', Input::old('salary'), ['class'=>'form-control']) !!}</div>
    <div class=" col-md-4 col-sm-4">{!! $errors->first('salary', '<span class="help-block">:message</span>') !!}</div>
</div></div><br>

<div class="row">
    <div class="form-group {{$errors-> has('salary_max') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label">  {!! Form::label("Зарплата (максимальна)") !!} <span class="required_field">*</span></div>
        <div class="col-md-6 col-sm-6">  {!! Form::text('salary_max', Input::old('salary_max'), ['class'=>'form-control']) !!}</div>
        <div class=" col-md-4 col-sm-4">{!! $errors->first('salary_max', '<span class="help-block">:message</span>') !!}</div>
    </div></div><br>

<div class="row">
    <div class="form-group">
        <div class="col-md-2 col-sm-2 control-label"> {!! Form::label('Валюта') !!}<span class="required_field">*</span></div>
        <div class="col-md-6 col-sm-6">
            <select class="form-control" id="selectCurrency" name="currency_id" style="width: auto" >
                @if (Input::old('currency_id') ==''))
                    @foreach($currencies as $currency)
                        {
                        <option value="{{$currency->id}}">{{$currency->currency}}</option>
                        }
                    @endforeach
                @else
                    @foreach($currencies as $currency)
                        {
                        @if($currency->id !=  Input::old('currency_id'))
                            <option value="{{$currency->id}}">{{$currency->currency}}</option>
                        @else
                            <option selected value="{{$currency->id}}">{{$currency->currency}}</option>
                            }
                        @endif
                    @endforeach
                @endif
            </select>
        </div>
    </div></div><br>

<div class="row">
<div class="form-group {{$errors-> has('description') ? 'has-error' : ''}}">
    <div class="col-md-2 col-sm-2 control-label">  {!! Form::label('Опис') !!} <span class="required_field">*</span></div>
    <div class="col-md-6 col-sm-6">{!! Form::textarea('description',Input::old('description'), ['class'=>'form-control', 'id'=>'description']) !!}</div>
    <div class=" col-md-4 col-sm-4">{!! $errors->first('description', '<span class="help-block">:message</span>') !!}</div>
 </div></div><br>
<div class="row">
<div class="form-group" style="margin-top: 30px">
    <label class="col-sm-2 control-label">Статус публікації</label>
    <div class="col-sm-5">
        <select class="form-control" id="published" name="published" >
            @if (Input::old('published')=='')
                @for($i=0; $i<count($publishedOptions); $i++)
                    @if ($i==1)
                        <option selected value="{{$i}}">{{$publishedOptions[$i]}}</option>
                        &@else
                        <option value="{{$i}}">{{$publishedOptions[$i]}}</option>
                    @endif
                @endfor
            @else
                @for($i=0; $i<count($publishedOptions); $i++)
                    @if (Input::old('published')==$i)
                        <option selected value="{{$i}}" >{{$publishedOptions[$i]}}</option>
                    @else
                        <option value="{{$i}}">{{$publishedOptions[$i]}}</option>
                    @endif
                @endfor
            @endif
        </select>
    </div></br>
</div>
</div>
</br>
</br>
<div class="row">
<div class="form-group {{$errors-> has('loadResume') ? 'has-error' : ''}}">
    <div>
        <button type="button" onclick="document.getElementById('loadResume').click()" onchange="">Виберіть файл</button>
        <div id="filename">Файл не вибрано</div>
        {!! Form::file('loadResume', array( 'id'=>'loadResume', 'style'=>'display:none', 'onchange'=>'javascript:document.getElementById(\'filename\').innerHTML = document.getElementById(\'loadResume\').value;')) !!}
    </div>
    <div class=" col-md-4 col-sm-4">{!! $errors->first('loadResume', '<span class="help-block">:message</span>') !!}</div>
</div>
</div><br>

<input type="hidden" name="fname" value="{{}}">

<div class="row">
<div class="form-group">
    <div class="col-sm-offset-2 col-md-4  col-sm-2"><span class="required_field">*</span> – Обов'язкові для заповнення.</div>
</div></div><br>

<div class="row">
<div class="form-group">
    <div class="col-sm-offset-2 col-md-2  col-sm-2"> {!! Form::submit('Зберегти', ['class'=>'btn btn-primary']) !!}</div>
</div></div><br>

@section('footer')

    <script type="text/javascript">
        $('#city').select2();

//        $('loadResume').formValidation({
//            fields: {
//                fileInput: {
//                    validators: {
//                        file: {
//                            extension: 'doc,docx,odt,rtf,txt,pdf',
//                            type: 'file/doc,file/docx,file/odt,file/rtf,file/txt,file/pdf',
//                            message: 'Please choose a MP3 file'
//                        }
//                    }
//                }
//            }
//        });
		 var wrapper = $( ".col-sm-offset-2" ),
						inp = wrapper.find( "input" ),
						btn = wrapper.find( "button" ),
						lbl = wrapper.find( "div" );
				btn.focus(function(){
					inp.focus()
				});
				// Crutches for the :focus style:
				inp.focus(function(){
					wrapper.addClass( "focus" );
				}).blur(function(){
					wrapper.removeClass( "focus" );
				});

				var file_api = ( window.File && window.FileReader && window.FileList && window.Blob ) ? true : false;

				inp.change(function(){
					var file_name;
					if( file_api && inp[ 0 ].files[ 0 ] )
						file_name = inp[ 0 ].files[ 0 ].name;
					else
						file_name = inp.val().replace( "C:\\fakepath\\", '' );

					if( ! file_name.length )
						return;

					if( lbl.is( ":visible" ) ){
						lbl.text( file_name );
						btn.text( "Вибрати" );
					}else
						btn.text( file_name );
				}).change();

    </script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
	$(document).ready(function() {
		CKEDITOR.replace( 'description' );
	});
</script>

@stop
