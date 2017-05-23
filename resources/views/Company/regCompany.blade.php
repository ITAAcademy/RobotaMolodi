<br/>
    <div class="row">
        <label for="company_name" class="col-md-3 col-sm-3 label-text-company">Назва компанії</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('company_name', $company->company_name, ['class' => 'form-control', 'id' => 'company_name']) !!}
        </div>
        <div class="err-info">
            <span class="red-star"> * </span>
            <span class="err-message">@if(isset($errors)){{$errors->first('company_name')}}@endif</span>
        </div>
    </div>

    <div class="row">
        <label for="short_name" class="col-md-3 col-sm-3 label-text-company">Коротка назва організації</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('short_name', $company->short_name, ['class' => 'form-control', 'id' => 'short_name']) !!}
        </div>
        <div class="err-info">
            <span class="red-star"> * </span>
            <span class="err-message">@if(isset($errors)){{$errors->first('short_name')}}@endif</span>
        </div>
    </div>

    <div class="row">
        <label for="link" class="col-md-3 col-sm-3 label-text-company">Посилання на компанію</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('link', $company->link, ['class' => 'form-control', 'id' => 'link']) !!}
        </div>
        <div class="err-info">
            <span class="err-message left">@if(isset($errors) && !empty($errors->first('link'))){{$errors->first('link')}}@endif</span>
        </div>
    </div>

    <div class="row">
        <label for="industry_id" class="col-md-3 col-sm-3 label-text-company">Оберіть галузь</label>
        <div class="col-md-6 col-sm-6">
            <select class="inputPlace2" id="industry_id" name="industry_id">
                @foreach($industries as $industry)
                    @if($industry->id == $company->industry_id )
                        <option selected value="{{$industry->id}}">{{$industry->name}}</option>
                    @elseif($industry->main)
                        <option selected value="{{$industry->id}}">{{$industry->name}}</option>
                    @else
                        <option value="{{$industry->id}}">{{$industry->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <label for="city_id" class="col-md-3 col-sm-3 label-text-company">Виберіть місто</label>
        <div class="col-md-6 col-sm-6">
            <select class="inputPlace2" id="city_id" name="city_id">
                @foreach($cities as $city)
                    @if($city->id == $company->city_id )
                        <option selected value="{{$city->id}}">{{$city->name}}</option>
                    @else
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <label for="phone" class="col-md-3 col-sm-3 label-text-company">Телефон</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('phone', $company->phone, ['class' => 'form-control', 'id' => 'phone']) !!}
        </div>
        <div class="err-info">
            <span class="red-star"> * </span>
            <span class="err-message">@if(isset($errors)){{$errors->first('phone')}}@endif</span>
        </div>
    </div>

    <div class="row">
        <label for="company_email" class="col-md-3 col-sm-3 label-text-company">E-mail</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('company_email', $company->company_email, ['class' => 'form-control', 'id' => 'company_email']) !!}
        </div>
        <div class="err-info">
            <span class="red-star"> * </span>
            <span class="err-message">@if(isset($errors)){{$errors->first('company_email')}}@endif</span>
        </div>
    </div>

    <div class="row">
        <label for="description" class="col-md-3 col-sm-3 label-text-company">Опис</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::textarea('description', $company->description, ['class' => 'form-control','id' => 'description']) !!}
        </div>
        <div class="err-info">
            <span class="red-star"> * </span>
            <span class="err-message">@if(isset($errors)){{$errors->first('description')}}@endif</span>
        </div>
    </div>

    <div class="row">
        <div class="form-group {{$errors-> has('loadCompany') ? 'has-error' : ''}}">
            <div class="col-sm-offset-3 col-md-9 col-sm-9 after-form-item">
                <button type="button" onclick="document.getElementById('loadCompany').click()" onchange="">Виберіть файл</button>
                <div id="filename">Файл не вибрано</div>
                {!! Form::file('loadCompany', array( 'id'=>'loadCompany', 'style'=>'display:none', 'accept'=>'.jpg, .jpeg, .gif, .png, .svg', 'onchange'=>'javascript:document.getElementById(\'filename\').innerHTML = document.getElementById(\'loadCompany\').value;')) !!}
            </div>
            <input type="hidden" name="fcoords" class="coords" id="coords" value="">
            <input type="hidden" name="fname" value="">

            <div class="col-sm-offset-3 col-md-9 col-sm-9">
                <div class=" col-md-4 col-sm-4">{!! $errors->first('loadCompany', '<span class="help-block">:message</span>') !!}</div>
            </div>

            <div class="col-sm-offset-3 col-md-9 col-sm-9 after-form-item">
                <span class="required_field">*</span> – Обов'язкові для заповнення
            </div>

            <div class="row">
                <div class="col-sm-offset-3 col-md-9 col-sm-9 after-form-item">
                    {!!Form::submit('Зареєструвати компанію',['class' => 'btn btn-primary'])!!}
                </div>
            </div>
        </div>
    </div>

    {!!Form::token()!!}
    <script>$(document).ready(function(){CKEDITOR.replace( 'description' );});</script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

    <div id="imageBox" class="modal fade">
        @include('newDesign.cropModal')
    </div>

    {!!Html::script('js/crop.js')!!}

    <script>
        $(document).ready(function () {
            $('#loadCompany').on('change', function(e) {
                $('#imageBox').modal({
                    show: true,
                    backdrop: 'static'
                });
                crop(e, 'img-src', '#crop', '#imageBox');
            });
        })
    </script>

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

<script type="text/javascript">
    $(document).ready(function () {
        $(".form-control").change(function () {
            $(window).bind('beforeunload', function () {
                return 'Збережіть будь ласка всі внесені нові дані!';
            });
            $('#form').submit(function () {
                $(window).unbind('beforeunload');
            });
        });

    });
</script>

