<div class="row">
    <div class="form-group resume-row {{$errors->has('name_u') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label label-text-resume">
            {!! Form::label("name_u", trans('form.fullname'), ['class'=>'label-text-resume']) !!}
        </div>
        <div class=" col-md-6 col-sm-6 resume-form">
            <div class="resume-form-input">
                {!! Form::text('name_u', Input::old('name_u'), ['class'=>'form-control' ,'id' => 'name']) !!}
            </div>
            <span class="red-star">*</span>
        </div>
        <div class=" col-md-3 col-sm-3">
            {!! $errors->first('name_u', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<script type="text/javascript">
    $().ready(function(){
        $('#name').keypress(function(e){
            if(e.which ==48 ||e.which ==49 || e.which ==50 || e.which ==51|| e.which ==52|| e.which ==53|| e.which ==54|| e.which ==55|| e.which ==56|| e.which ==57){
                $('#name').val('');
                $('#name').css({"border": "1px dotted red"});
                return false;
            }
            else $('#name').css({"border": "inherit "});
        });
    });
</script>
<div class="row">
    <div class="form-group resume-row {{$errors->has('telephone') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label label-text-resume">
            {!! Form::label('telephone', trans('main.phone'), ['class'=>'label-text-resume']) !!}
        </div>
        <div class=" col-md-6 col-sm-6 resume-form">
            <div class="resume-form-input">
                {!! Form::text('telephone', Input::old('telephone'), ['class'=>'form-control input-medium bfh-phone', 'id' => 'telephone']) !!}
            </div>
            <span class="red-star"></span>
        </div>
        <div class=" col-md-3 col-sm-3">
            {!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
{!!Html::script('js/jquery.maskedinput.min.js')!!}
<script type="text/javascript">
    $(document).ready(function () {
        $("#telephone").mask("+38(099) 999-99-99");
    });
</script>
<div class="row">
    <div class="form-group resume-row{{$errors->has('email') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label label-text-resume">
            {!! Form::label('email', trans('form.email'), ['class'=>'label-text-resume']) !!}
        </div>
        <div class=" col-md-6 col-sm-6 resume-form">
            <div class="resume-form-input">
                {!! Form::text('email', $resume->email, array( 'class' => 'form-control','id' => 'exampleInputEmail1'  )) !!}
            </div>
            <span class="red-star">*</span>
        </div>
        <div class=" col-md-3 col-sm-3">
            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group resume-row {{$errors->has('city') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label label-text-resume">
            {!! Form::label('city', trans('main.city'), ['class'=>'label-text-resume']) !!}
        </div>
        <div class=" col-md-6 col-sm-6 resume-form">
            <div class="resume-form-input">
                <select name="city" style="width: 100%" class="form-control" id="selectCity">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}"> {{$city->name}} </option>
                    @endforeach
                    @if(Input::old('city')!= '')
                        @foreach($cities as $city)
                            @if($city->id == Input::old('city'))
                                <option value="{{$city->id}}" selected>{{$city->name}}</option>
                            @endif
                        @endforeach
                    @else
                        @if($resume->city_id)
                            <option value="{{$resume->city_id}}" selected>{{$resume->city->name}}</option>
                        @endif
                    @endif
                </select>
            </div>
            <span class="red-star">*</span>
        </div>
        <div class=" col-md-3 col-sm-3">
            {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group resume-row">
        <div class="col-md-2 col-sm-2 control-label label-text-resume">
            {!! Form::label('industry', trans('form.branch'), ['class'=>'label-text-resume']) !!}
        </div>
        <div class=" col-md-6 col-sm-6 resume-form">
            <div class="resume-form-input">
                <select name="industry" style="width: 100%" class="form-control" id="selectIndustry">
                    @foreach($industries as $industry)
                        @if($industry->main)
                            <option value="{{$industry->id}}" selected> {{$industry->name}} </option>
                        @else
                            <option value="{{$industry->id}}"> {{$industry->name}} </option>
                        @endif
                    @endforeach
                    @if(Input::old('industry')!= '')
                        <option value="{{Input::old('industry')}}"
                                selected>{{\App\Models\Industry::find(Input::old('industry'))->name}}
                            @endif
                        </option>
                </select>
            </div>
            <span class="red-star">*</span>
        </div>
        <div class=" col-md-3 col-sm-3">
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group resume-row">
        <div class="col-md-2 col-sm-2 control-label label-text-resume">
            {!! Form::label('position', trans('form.position'), ['class'=>'label-text-resume'] ) !!}
        </div>
        <div class=" col-md-6 col-sm-6 resume-form">
            <div class="resume-form-input">
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
            <span class="red-star">*</span>
        </div>
        <div class=" col-md-3 col-sm-3">
            {!! $errors->first('position', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group resume-row {{$errors-> has('salary') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label label-text-resume">
            {!! Form::label('salary', trans('form.salarymin'), ['class'=>'label-text-resume']) !!}
        </div>
        <div class=" col-md-6 col-sm-6 resume-form">
            <div class="resume-form-input">
                {!! Form::text('salary', Input::old('salary'), ['class'=>'form-control']) !!}
            </div>
            <span class="red-star">*</span>
        </div>
        <div class=" col-md-3 col-sm-3">
            {!! $errors->first('salary', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<script type="text/javascript">
    $().ready(function(){
        $('#salary').keypress(function(e){
            if(e.which ==48 ||e.which ==49 || e.which ==50 || e.which ==51|| e.which ==52|| e.which ==53|| e.which ==54|| e.which ==55|| e.which ==56|| e.which ==57){
                $('#salary').css({"border": "inherit "});
            }
            else {
                $('#salary').val('');
                $('#salary').css({"border": "1px dotted red"});
                return false;
            }
        });

        $('#salary_max').keypress(function(e){
            if(e.which ==48 ||e.which ==49 || e.which ==50 || e.which ==51|| e.which ==52|| e.which ==53|| e.which ==54|| e.which ==55|| e.which ==56|| e.which ==57){
                $('#salary_max').css({"border": "inherit "});
            }
            else {
                $('#salary_max').val('');
                $('#salary_max').css({"border": "1px dotted red"});
                return false;
            }
        });
    });
</script>

<div class="row">
    <div class="form-group resume-row {{$errors-> has('salary_max') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label label-text-resume">
            {!! Form::label('salary_max', trans('form.salarymax'), ['class'=>'label-text-resume']) !!}
        </div>
        <div class=" col-md-6 col-sm-6 resume-form">
            <div class="resume-form-input">
                {!! Form::text('salary_max', Input::old('salary_max'), ['class'=>'form-control']) !!}
            </div>
            <span class="red-star">*</span>
        </div>
        <div class=" col-md-3 col-sm-3">
            {!! $errors->first('salary_max', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group resume-row">
        <div class="col-md-2 col-sm-2 control-label label-text-resume">
            {!! Form::label('currency_id', trans('form.currency'), ['class'=>'label-text-resume']) !!}
        </div>
        <div class=" col-md-6 col-sm-6 resume-form">
            <div class="resume-form-input">
                <select class="form-control" id="selectCurrency" name="currency_id" style="">
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
            <span class="red-star"></span>
        </div>
        <div class=" col-md-3 col-sm-3">
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group resume-row {{$errors-> has('description') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label label-text-resume">
            {!! Form::label('description',trans('main.description'), ['class'=>'label-text-resume']) !!}
        </div>
        <div class=" col-md-6 col-sm-6 resume-form">
            <div class="resume-form-input">
                @if($resume->description)
                    {!! Form::textarea('description',$resume->description, ['class'=>'form-control', 'id'=>'desc']) !!}
                @else
                    {!! Form::textarea('description',$resume->description, ['class'=>'form-control', 'id'=>'description']) !!}
                @endif
            </div>
            <span class="red-star">*</span>
        </div>
        <div class=" col-md-3 col-sm-3">
            {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group resume-row" style="margin-top: 30px">
        <label class="col-sm-2 control-label label-text-resume">
            {{ trans('form.status') }}
        </label>
        <div class=" col-md-6 col-sm-6 resume-form">
            <div class="resume-form-input">
                <select class="form-control" id="published" name="published">
                    @if (Input::old('published')=='')
                        @for($i=0; $i<count($publishedOptions); $i++)
                            @if ($i==1)
                                <option selected value="{{$i}}">{{$publishedOptions[$i]}}</option>
                            @else
                                <option value="{{$i}}">{{$publishedOptions[$i]}}</option>
                            @endif
                        @endfor
                    @else
                        @for($i=0; $i<count($publishedOptions); $i++)
                            @if (Input::old('published')==$i)
                                <option selected value="{{$i}}">{{$publishedOptions[$i]}}</option>
                            @else
                                <option value="{{$i}}">{{$publishedOptions[$i]}}</option>
                            @endif
                        @endfor
                    @endif
                </select>
            </div>
            <span class="red-star"></span>
        </div>
        <div class=" col-md-3 col-sm-3">
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group resume-row {{$errors-> has('loadResume') ? 'has-error' : ''}}">
        <div class=" col-md-4 col-sm-4 resume-form resume-form-f">
            <div class="resume-form-input">
                <button id="but" type="button" onclick="document.getElementById('loadResume').click()" onchange="">
                    Виберіть фото
                </button>
                <div id="filename">
                    {{ trans('form.unselected') }}
                </div>
                {!! Form::file('loadResume', array( 'id'=>'loadResume', 'style'=>'display:none', 'accept'=>'.jpg, .jpeg, .gif, .png, .svg')) !!}
            </div>
        </div>
        <div class=" col-md-3 col-sm-3">
            {!! $errors->first('loadResume', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<input type="hidden" name="fcoords" class="coords" id="coords" value="">
<input type="hidden" name="fname" value="{{}}">
<div class="row">
    <div class="form-group">
        <div class="col-md-offset-3 col-sm-offset-3 resume-form-f">
            <span class="red-star">*</span> – Обов'язкові для заповнення.
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2  col-sm-2 form-group resume-form-f" style="width: 400px">
        {!!Form::submit(trans('form.regresume'),['class' => 'btn btn-primary registr'])!!}
    </div>
    {!!Form::token()!!}
</div>
<br>
<div class="change_description">
    <span><b>Контактна інформація:</b></span>
    <p>- регіон проживання:</p>
    <p>- тел: +38 (000)-000-00-00</p>
    <p>- E-mail: <em>example@mail.com</em></p>
    <p>- LinkedIn:</p>
    <p>- Skype:</p>
    <div><span><b>Бажана посада:</b></span></div>
    <div><span><b>Досвід роботи:</b></span></div>
    <div><span><b>Освіта:</b></span></div>
    <div><span><b>Додаткова освіта:</b></span></div>
    <div><span><b>Сертифікати:</b></span></div>
</div>
<script>$(document).ready(function () {
        CKEDITOR.replace('description');
    });</script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<div id="imageBox" class="modal fade">
    @include('newDesign.cropModal')
</div>
{!!Html::script('js/crop.js')!!}
<script>
    $(document).ready(function () {
        var cloneInputFile = $('#loadResume').clone();
        $('#loadResume').on('change', function (e) {
            if (document.getElementById('loadResume').value) {
                cloneInputFile = $('#loadResume').clone();
                $('#imageBox').modal({
                    show: true,
                    backdrop: 'static'
                });
                crop(e, 'img-src', '#crop', '#imageBox');
            } else {
                $('#loadResume').replaceWith(cloneInputFile);
            }
            document.getElementById('filename').innerHTML = document.getElementById('loadResume').value;
        });
        if (!$('#description').val()) {
            $('#description').text($('.change_description').html());
        }
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
        var wrapper = $(".col-sm-offset-2"),
            inp = wrapper.find("input"),
            btn = wrapper.find("button"),
            lbl = wrapper.find("div");
        btn.focus(function () {
            inp.focus()
        });
        // Crutches for the :focus style:
        inp.focus(function () {
            wrapper.addClass("focus");
        }).blur(function () {
            wrapper.removeClass("focus");
        });
        var file_api = (window.File && window.FileReader && window.FileList && window.Blob) ? true : false;
        inp.change(function () {
            var file_name;
            if (file_api && inp[0].files[0])
                file_name = inp[0].files[0].name;
            else
                file_name = inp.val().replace("C:\\fakepath\\", '');

            if (!file_name.length)
                return;

            if (lbl.is(":visible")) {
                lbl.text(file_name);
                btn.text("Вибрати");
            } else
                btn.text(file_name);
        }).change();
    </script>
@stop
