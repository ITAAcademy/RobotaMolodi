    <div class="row form-company-row">
        <label for="company_name" class="col-md-3 col-sm-3 label-text-company">{{ trans('form.namecompany') }}</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('company_name', $company->company_name, ['class' => 'form-control', 'id' => 'company_name']) !!}
        </div>
        <div class="err-info">
            <span class="red-star"> * </span>
            <span class="err-message">@if(isset($errors)){{$errors->first('company_name')}}@endif</span>
        </div>
    </div>

    <div class="row form-company-row">
        <label for="short_name" class="col-md-3 col-sm-3 label-text-company">{{ trans('form.shortnamecompany') }}</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('short_name', $company->short_name, ['class' => 'form-control', 'id' => 'short_name']) !!}
        </div>
        <div class="err-info">
            <span class="red-star"> * </span>
            <span class="err-message">@if(isset($errors)){{$errors->first('short_name')}}@endif</span>
        </div>
    </div>

    <div class="row form-company-row">
        <label for="link" class="col-md-3 col-sm-3 label-text-company">{{ trans('form.linkcompany') }}</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('link', $company->link, ['class' => 'form-control', 'id' => 'link']) !!}
        </div>
        <div class="err-info">
            <span class="err-message left">@if(isset($errors) && !empty($errors->first('link'))){{$errors->first('link')}}@endif</span>
        </div>
    </div>

    <div class="row form-company-row">
        <label for="industry_id" class="col-md-3 col-sm-3 label-text-company">{{ trans('form.branch') }}</label>
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

    <div class="row form-company-row">
        <label for="city_id" class="col-md-3 col-sm-3 label-text-company">{{ trans('form.city') }}</label>
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

    <div class="row form-company-row">
        <label for="phone" class="col-md-3 col-sm-3 label-text-company">{{ trans('main.phone') }}</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('phone', $company->phone, ['class' => 'form-control', 'id' => 'phone']) !!}
        </div>
        <div class="err-info">
            <span class="red-star"> * </span>
            <span class="err-message">@if(isset($errors)){{$errors->first('phone')}}@endif</span>
        </div>
    </div>

    <div class="row form-company-row">
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
        <label for="description" class="col-md-3 col-sm-3 label-text-company">{{ trans('main.description') }}</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::textarea('description', $company->description, ['class' => 'form-control','id' => 'description']) !!}
        </div>
        <div class="err-info">
            <span class="red-star"> * </span>
            <span class="err-message">@if(isset($errors)){{$errors->first('description')}}@endif</span>
        </div>
    </div>
    <div class="row">
            <input type="hidden" name="fcoords" class="coords" id="coords" value="" data-id="{{ $company->id or ""}}">
            <input type="hidden" name="fname" value="{{ csrf_token() }}">
            <div class="form-group {{$errors-> has('loadCompany') ? 'has-error' : ''}}">
                <div class="row">
                    <div class="col-sm-offset-3 col-md-9 col-sm-9">
                        {!! Form::file('loadCompany', array( 'id'=>'loadCompany', 'style'=>'display:none', 'accept'=>'.jpg, .jpeg, .gif, .png, .svg')) !!}
                        @if(File::exists(public_path('image/company/' . $company->users_id .'/'. $company->image)) and $company->image != '')
                            {!! Html::image('image/company/' . $company->users_id .'/'. $company->image, 'logo', ['id' => 'companyLogo', 'class' => 'img-responsive']) !!}
                        @else
                            {!! Html::image('image/company_tmp.png', 'logo', array('id' => 'companyLogo', 'class' => 'img-responsive')) !!}
                        @endif
                        <button type="button" onclick="document.getElementById('loadCompany').click()" onchange="">{{ trans('form.changefoto') }}</button>
                    </div>
                </div>

                <div class="col-sm-offset-3 col-md-9 col-sm-9">
                    <div class=" col-md-4 col-sm-4">{!! $errors->first('loadCompany', '<span class="help-block">:message</span>') !!}</div>
                </div>
            </div>

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
                        // show choosen image before to save it on server
                        var tmppath = URL.createObjectURL(event.target.files[0]);
                        $("#companyLogo").attr('src',tmppath);
                    });

                    if($('.coords').attr('data-id')) {
                        $('#imageBox').on('hidden.bs.modal', function () {
                            if($('#coords').val()){
                                var $input = $("#loadCompany");
                                var fd = new FormData();
                                fd.append('fileImg', $input.prop('files')[0]);
                                fd.append('coords', $('.coords').val());
                                fd.append('id', $('.coords').attr('data-id'));
                                $.ajax({
                                    url: '{{ route('upimgcom') }}',
                                    data: fd,
                                    processData: false,
                                    contentType: false,
                                    type: 'POST',
                                    success: function (data){
                                        $('#companyLogo').attr('src', window.location.origin + '/' + data);
                                    },
                                    error: function (e,b){
                                        console.log(e + " " + b);
                                    }
                                });
                            }
                        });
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('input[name="_token"]').val()
                            }
                        });
                    };
                })
            </script>

        <div class="col-sm-offset-3 col-md-9 col-sm-9 after-form-item">
            <span class="required_field">*</span> – Обов'язкові для заповнення
        </div>
        <div class="row">
            <div class="col-sm-offset-3 col-md-9 col-sm-9 after-form-item">
                {!!Form::submit(trans('form.regcomapany'),['class' => 'btn btn-primary'])!!}
            </div>
        </div>
    </div>

    {!!Form::token()!!}

    <script>$(document).ready(function(){CKEDITOR.replace( 'description' );});</script>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

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

    {!!Html::script('js/jquery.maskedinput.min.js')!!}
    <script type="text/javascript">
        $(document).ready(function () {
            $(".form-control").change(function () {
    //            $(window).bind('beforeunload', function () {
    //                return 'Збережіть будь ласка всі внесені нові дані!';
    //            });
                $('#form').submit(function () {
                    $(window).unbind('beforeunload');
                });
            });
            $("#phone").mask("+38(099) 999-99-99");
        });
    </script>
