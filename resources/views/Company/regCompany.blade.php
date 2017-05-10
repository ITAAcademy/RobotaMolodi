@extends ('NewVacancy/users')

@section('contents')

    {!!Form::open(['route' => 'company.store', 'enctype' => 'multipart/form-data', 'id'=>'form'])!!}
    <div class="row">
        <h3 class="formTitle header-text-company">додати компанію</h3>
        </br>
        <div class="form-group">
            <label for="sector" class="col-md-2 col-sm-2 control-label label-text-company">Назва компанії</label>
            <div class="col-md-6 col-sm-6">
              {!! Form::text('company_name', null, array('class' => 'form-control')) !!}
            </div>
            <div><span style ="color:red">* <?php echo $errors->first('company_name','поле має містити не менше трьох символів'); ?>  </span> {{$company}}</div>
        </div>
    </div>

    </br>

    <div class="row">
        <div class="form-group">
            <p class="col-md-2 col-sm-2 control-label label-text-company">Коротка назва організації</p>
            <div class="col-md-6 col-sm-6">
                <input type="text" class="inputPlace">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group" style="margin-top: 20px">
            <label for="level" class="col-md-2 col-sm-2 control-label label-text-company">Посилання на компанію</label>
            <div class="col-md-6 col-sm-6">
                {!! Form::text('company_link', null, array('class' => 'form-control')) !!}
            </div>
            <div>
                <span style ="color:red"><?php echo $errors->first('company_link','поле має бути посиланням в форматі https://'); ?> </span> {{$company}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <p class="col-md-2 col-sm-2 control-label label-text-company">Оберіть галузь</p>
            <div class="col-md-6 col-sm-6">
                <select class="inputPlace2" id="inputPlace2">
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <p class="col-md-2 col-sm-2 control-label label-text-company">Виберіть місто</p>
            <div class="col-md-6 col-sm-6">
                <select class="inputPlace2">
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <p class="col-md-2 col-sm-2 control-label label-text-company">Телефон</p>
                <div class="col-md-6 col-sm-6">
                     <input type="text" class="inputPlace">
                </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <p class="col-md-2 col-sm-2 control-label label-text-company">E-mail</p>
            <div class="col-md-6 col-sm-6">
                <input type="text" class="inputPlace" id="inputPlace4">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <p class="col-md-2 col-sm-2 control-label label-text-company">Опис</p>
            <div class="col-md-6 col-sm-6">
                <textarea type="text" class="inputPlace inputPlace-description"></textarea>
            </div>
        </div>
    </div>

    </br>

    <div class="row">
        <div class="form-group {{$errors-> has('loadCompany') ? 'has-error' : ''}}">
            <div class="col-md-2 col-sm-2"></div>
            <div class="col-md-4 col-sm-4">
                <button type="button" onclick="document.getElementById('loadCompany').click()" onchange="">Виберіть файл</button>
                <div id="filename">Файл не вибрано</div>
                {!! Form::file('loadCompany', array( 'id'=>'loadCompany', 'style'=>'display:none', 'accept'=>'.jpg, .jpeg, .gif, .png, .svg', 'onchange'=>'javascript:document.getElementById(\'filename\').innerHTML = document.getElementById(\'loadCompany\').value;')) !!}
            </div>
            <div class=" col-md-4 col-sm-4">{!! $errors->first('loadCompany', '<span class="help-block">:message</span>') !!}</div>
        </div>
    </div>

    <input type="hidden" name="fcoords" class="coords" value="">

    </br>

    <div class="row">
        <div class="col-sm-offset-2 col-md-2  col-sm-2 form-group" style="width: 400px">
            {!!Form::submit('Зареєструвати компанію',['class' => 'btn btn-primary'])!!}
        </div>
       {!!Form::token()!!}
    </div>

    {!!Form::close()!!}

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

@endsection

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

