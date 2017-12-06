@extends('app') <!-- Куди вставляється весь цей код Штмл -->

@section('title')
    <h2>Редагування резюме</h2>
    <div>
        {!! link_to_route('resumes', 'Мої резюме') !!} <!-- Створення силки -->
    </div>
@stop

@section('content')
    <script type="text/javascript">
        $(document).ready(function() {
            $( ".form-control" ).change(function() {
//            $(window).bind('beforeunload', function () {
//                return 'Збережіть будь ласка всі внесені нові дані!';
//            });
                $('#form_id').submit(function () {
                    $(window).unbind('beforeunload');
                });
            });
            $("#selectCity").select2();
            $("#selectIndustry").select2();
            $("#selectCurrency").select2();
        });
    </script>
    <div class="row header-resume">
        <h3 class="formTitle header-text-resume"><b>{{ trans('content.editResume') }}</b></h3>
    </div>
    {!!Form::model($resume,array('route' =>array('resume.update',$resume->id),'method' => 'put','enctype' => 'multipart/form-data', 'id'=>'form_id'))!!}
    @include('Resume._form')
    {!!Form::close()!!}

    {!!Html::script('js/jquery.maskedinput.min.js')!!}
    <script type="text/javascript">
        $(document).ready(function () {
            $("#telephone").mask("+38(099) 999-99-99");
        });
    </script>
@stop
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $( ".form-control" ).change(function() {
            $('#form_id').submit(function () {
                $(window).unbind('beforeunload');
            });
        });
    });
</script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
	$(document).ready(function() {
		CKEDITOR.replace( 'desc' );
	});
</script>
<script>
    $(document).ready(function () {
        var cloneInputFile = $('#loadResume').clone();
         $('#loadResume').on('change', function(e) {
             if(document.getElementById('loadResume').value) {
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

         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('input[name="_token"]').val()
             }
         });

        $('#description').text($('.change_description').html());
    })
</script>
<script type="text/javascript">
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