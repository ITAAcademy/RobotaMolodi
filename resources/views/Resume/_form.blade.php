<div class="row header-resume">
    <h3 class="formTitle header-text-resume"><b>додати резюме</b></h3>
</div>
<div class="row">
    <div class="form-group {{$errors-> has('name_u') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label label-text-resume"> {!! Form::label("name_u" ,"Прізвище та ім'я", ['class'=>'label-text-resume']) !!}</div>
        <div class=" col-md-6 col-sm-6">{!! Form::text('name_u', Input::old('name_u'), ['class'=>'form-control']) !!}</div>
        <span class="required_field">*</span>
        <div class=" col-md-4 col-sm-4">{!! $errors->first('name_u', '<span class="help-block">:message</span>') !!}</div>
    </div>
</div><br>

<div class="row">
<div class="form-group {{$errors-> has('telephone') ? 'has-error' : ''}}">
    <div class="col-md-2 col-sm-2 control-label label-text-resume">  {!! Form::label('telephone', 'Телефон', ['class'=>'label-text-resume']) !!}</div>
    <div class="col-md-6 col-sm-6">{!! Form::text('telephone', Input::old('telephone'), ['class'=>'form-control']) !!}</div>
    <div class=" col-md-4 col-sm-4">{!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}</div>
</div></div><br>

<div class="row">
    <div class="form-group {{$errors-> has('email') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label label-text-resume"> {!! Form::label('email', 'Електронна пошта', ['class'=>'label-text-resume']) !!}</div>
        <div class="col-md-6 col-sm-6">{!! Form::text('email', $userEmail, array( 'class' => 'form-control','id' => 'exampleInputEmail1','placeholder' => $userEmail )) !!}</div>
        <span class="required_field">*</span>
        <div class=" col-md-4 col-sm-4">{!! $errors->first('email', '<span class="help-block">:message</span>') !!}</div>
    </div>
</div>
<br>

<div class="row">
    <div class="form-group">
        <div class="col-md-2 col-sm-2 control-label label-text-resume">  {!! Form::label('city','Місто', ['class'=>'label-text-resume']) !!}</div>
            <div class="col-md-6 col-sm-6">
                <select name="city" style="width: 100%" class="form-control js-example-basic-multiple" multiple="multiple" id="selectCity">
            @foreach($cities as $city)
                <option value="{{$city->id}}"> {{$city->name}} </option>
            @endforeach
            @foreach($cities as $city)
                @if($city->id == Input::old('city'))
                    <option value="{{$city->id}}" selected>{{$city->name}}</option>
                @endif
            @endforeach
                </select>
            </div>
        <span class="required_field">*</span>
    </div>
</div>
<br>

<div class="row">
    <div class="form-group">
        <div class="col-md-2 col-sm-2 control-label label-text-resume"> {!! Form::label('industry', 'Галузь', ['class'=>'label-text-resume']) !!}</div>
            <div class="col-md-6 col-sm-6">
                <select name="industry" style="width: 100%" class="form-control" id="selectIndustry">
                    @foreach($industries as $industry)
                        <option value="{{$industry->id}}"> {{$industry->name}} </option>
                    @endforeach
                    @if(Input::old('industry')!= '')
                    <option value="{{Input::old('industry')}}" selected>{{\App\Models\Industry::find(Input::old('industry'))->name}}
                    @endif
                    </option>
                </select>
            </div>
        <span class="required_field">*</span>
    </div>
</div>
<br>

<div class="row">
    <div class="form-group {{$errors-> has('position') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label label-text-resume"> {!! Form::label('position', 'Позиція', ['class'=>'label-text-resume'] ) !!}</div>
            <div class="col-md-6 col-sm-6">
                <select name="position" id="position" class="form-control">
                @if(Input::old('position')== '')
                    @foreach($positions as $position)
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
        <span class="required_field">*</span>
    </div>
</div>
<br>

<div class="row">
    <div class="form-group {{$errors-> has('salary') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label label-text-resume">  {!! Form::label('salary', "Зарплата (мiнiмальна)", ['class'=>'label-text-resume']) !!}</div>
        <div class="col-md-6 col-sm-6">  {!! Form::text('salary', Input::old('salary'), ['class'=>'form-control']) !!}</div>
        <div class=" col-md-4 col-sm-4">{!! $errors->first('salary', '<span class="help-block">:message</span>') !!}</div>
        <span class="required_field">*</span>
    </div>
</div>
<br>

<div class="row">
    <div class="form-group {{$errors-> has('salary_max') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label label-text-resume">  {!! Form::label('salary_max', "Зарплата (максимальна)", ['class'=>'label-text-resume']) !!}</div>
        <div class="col-md-6 col-sm-6">  {!! Form::text('salary_max', Input::old('salary_max'), ['class'=>'form-control']) !!}</div>
        <div class=" col-md-4 col-sm-4">{!! $errors->first('salary_max', '<span class="help-block">:message</span>') !!}</div>
        <span class="required_field">*</span>
    </div>
</div>
<br>

<div class="row">
    <div class="form-group">
        <div class="col-md-2 col-sm-2 control-label label-text-resume"> {!! Form::label('currency_id', 'Валюта', ['class'=>'label-text-resume']) !!}</div>
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
        <div class="col-md-2 col-sm-2 control-label label-text-resume">  {!! Form::label('description', 'Опис', ['class'=>'label-text-resume']) !!}</div>
        <div class="col-md-6 col-sm-6">{!! Form::textarea('description',Input::old('description'), ['class'=>'form-control', 'id'=>'description']) !!}</div>
        <div class=" col-md-4 col-sm-4">{!! $errors->first('description', '<span class="help-block">:message</span>') !!}</div>
        <span class="required_field">*</span>
    </div>
</div>
<br>
<div class="row">
<div class="form-group" style="margin-top: 30px">
    <label class="col-sm-2 control-label label-text-resume">Статус публікації</label>
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
    <div class="col-md-2 col-sm-2">
    </div>
    <div class="col-md-4 col-sm-4">
        <button id="but" type="button" onclick="document.getElementById('loadResume').click()" onchange="">Виберіть файл</button>
        <div id="filename">Файл не вибрано</div>
        {!! Form::file('loadResume', array( 'id'=>'loadResume', 'style'=>'display:none', 'onchange'=>'javascript:document.getElementById(\'filename\').innerHTML = document.getElementById(\'loadResume\').value;')) !!}

    </div>
    <div class=" col-md-4 col-sm-4">{!! $errors->first('loadResume', '<span class="help-block">:message</span>') !!}</div>
</div>
</div>

<br>
<input type="hidden" name="fcoords" id="coords" value="">
<input type="hidden" name="fname" value="{{}}">

<div class="row">
<div class="form-group">
    <div class="col-sm-offset-2 col-md-4  col-sm-2"><span class="required_field">*</span> – Обов'язкові для заповнення.</div>
</div></div><br>

<div class="row">
    <div class="col-sm-offset-2 col-md-2  col-sm-2 form-group" style="width: 400px">
        {!!Form::submit('Зареєструвати резюме',['class' => 'btn btn-primary'])!!}
    </div>
    {!!Form::token()!!}
</div>
<br>

<div id="imageBox" class="modal fade">
    @include('Resume.modalForImage')
</div>

<script>
    $(document).ready(function () {
        $('#loadResume').on('change', function(e) {
            $('#imageBox').modal('show');

            var x1, y1, x2, y2;
            var  jcrop_api;

            function setApi(){
                $('#img-src').Jcrop({
                    onChange: showCoords,
                    onSelect: showCoords
                },function(){
                    jcrop_api = this;
                    jcrop_api.setOptions({ aspectRatio: 1/1 });
                    jcrop_api.setOptions({ minSize: [ 130, 130 ] });
                    $('#crop').show();
                });

                function showCoords(c){
                    x1 = c.x;
                    y1 = c.y;
                    x2 = c.x2;
                    y2 = c.y2;
                }
            }

            if (e.currentTarget.files[0]) {
                var file = e.currentTarget.files[0];
                var reader = new FileReader();
                reader.onloadend = function () {
                    $('.jcrop-active').replaceWith('');
                    $('#img-src').replaceWith('<img id="img-src" src="' + reader.result + '"/>');
                    setApi();
                }
                reader.readAsDataURL(file);
            } else {
                $('#img-src').attr('src', '');
            }

            setApi();

            $('#crop').click(function() {
                var wigth = $('.jcrop-active').width(); //ширина картинки на екрані
                var natural_width = $('canvas').attr('width');  //натуральна ширина картинки
                var mas = [x1,x2,y1,y2,wigth,natural_width];
                $('#coords').attr('value', mas);
                jcrop_api.destroy();
                $('#img-src').removeAttr('style');
                $('#imageBox').modal('hide');
            });
        });
    })
</script>

@section('footer')

    <script type="text/javascript">
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
