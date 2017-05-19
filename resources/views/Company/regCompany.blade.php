
<style>
    .rw-words{
        color:red;
    }

    .rw-words span{
        position: relative;
        color: white;
        animation-name: err;
        animation-duration: 5s;
    }
    /*
.transition3:not(:hover) {
  transition: 3s;
}
     */

    @keyframes err {
        0%   {color: white;}
        75%  {color: red; left:0px; top:0px;}
        100% {color: white; left:200px; top:0px;}
    }
</style>

<br/>
    <div class="row">
        <div class="form-group">
            <label for="sector" class="col-md-3 col-sm-3 control-label label-text-company">Назва компанії</label>
            <div class="col-md-6 col-sm-6">
              {!! Form::text('company_name', $company->company_name, array('class' => 'form-control')) !!}
            </div>
            <div class="rw-words">
                * <span>@if(isset($errors)){{$errors->first('company_name')}}@endif</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <p class="col-md-3 col-sm-3 control-label label-text-company">Коротка назва організації</p>
            <div class="col-md-6 col-sm-6">
                {!! Form::text('short_name', $company->short_name, array('class' => 'form-control')) !!}
            </div>
            <div class="rw-words">
                * <span>@if(isset($errors)){{$errors->first('short_name')}}@endif</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group" style="margin-top: 20px">
            <label for="level" class="col-md-3 col-sm-3 control-label label-text-company">Посилання на компанію</label>
            <div class="col-md-6 col-sm-6">
                {!! Form::text('link', $company->link, array('class' => 'form-control')) !!}
            </div>
            <div class="rw-words">
                 <span>@if(isset($errors) && !empty($errors->first('link')))* {{$errors->first('link')}}@endif</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <p class="col-md-3 col-sm-3 control-label label-text-company">Оберіть галузь</p>
            <div class="col-md-6 col-sm-6">
                <select class="inputPlace2" id="inputPlace2" name="industry_id">
                    @foreach($industries as $industry)
                        @if($industry->id == $company->industry_id )
                            <option selected value="{{$industry->id}}">{{$industry->name}}</option>
                        @else
                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <p class="col-md-3 col-sm-3 control-label label-text-company">Виберіть місто</p>
            <div class="col-md-6 col-sm-6">
                <select class="inputPlace2" id="inputPlace2" name="city_id">
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
    </div>

    <div class="row">
        <div class="form-group">
            <p class="col-md-3 col-sm-3 control-label label-text-company">Телефон</p>
                <div class="col-md-6 col-sm-6">
                    {!! Form::text('phone', $company->phone, array('class' => 'form-control')) !!}
                </div>
            <div class="rw-words">
                * <span>@if(isset($errors)){{$errors->first('phone')}}@endif</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <p class="col-md-3 col-sm-3 control-label label-text-company">E-mail</p>
            <div class="col-md-6 col-sm-6">
                {!! Form::text('company_email', $company->company_email, array('class' => 'form-control')) !!}
            </div>
            <div class="rw-words">
                * <span>@if(isset($errors)){{$errors->first('company_email')}}@endif</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <p class="col-md-3 col-sm-3 control-label label-text-company">Опис</p>
            <div class="col-md-6 col-sm-6">
                {!! Form::textarea('description', $company->description, ['class' => 'form-control','id' => 'description']) !!}
            </div>
            <div class="rw-words">
                * <span>@if(isset($errors)){{$errors->first('description')}}@endif</span>
            </div>
        </div>
    </div>

    <script>$(document).ready(function(){CKEDITOR.replace( 'description' );});</script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    </br>

    <div class="row">
        <div class="form-group {{$errors-> has('loadCompany') ? 'has-error' : ''}}">
            <div class="col-md-3 col-sm-3"></div>
            <div class="col-md-4 col-sm-4">
                <button type="button" onclick="document.getElementById('loadCompany').click()" onchange="">Виберіть файл</button>
                <div id="filename">Файл не вибрано</div>
                {!! Form::file('loadCompany', array( 'id'=>'loadCompany', 'style'=>'display:none', 'accept'=>'.jpg, .jpeg, .gif, .png, .svg', 'onchange'=>'javascript:document.getElementById(\'filename\').innerHTML = document.getElementById(\'loadCompany\').value;')) !!}
            </div>
            <div class=" col-md-4 col-sm-4">{!! $errors->first('loadCompany', '<span class="help-block">:message</span>') !!}</div>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col-sm-offset-3 col-md-3  col-sm-2 form-group" style="width: 400px">
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-12 col-md-12php artisan serve"><span class="required_field">*</span> – Обов'язкові для заповнення.</div>
                </div></div><br>
            {!!Form::submit('Зареєструвати компанію',['class' => 'btn btn-primary'])!!}
        </div>
       {!!Form::token()!!}
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

