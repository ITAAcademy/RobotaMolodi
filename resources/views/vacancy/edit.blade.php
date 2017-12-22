@extends('app')
@section('content')
    <h3 class="header-text-vacancy"><b>{{trans('content.editVacancy')}}</b></h3>
    {!!Form::model($vacancy, array('route' =>array('vacancy.update',$vacancy->id),'method' => 'put', 'id'=>'form_id'))!!}
            @include('vacancy._formVacancy')
    {!!Form::token()!!}
    {!!Form::close()!!}
@endsection
@section('footer')
    <script type="text/javascript">
        $('#city').select2({
            "language": {
                "noResults": function(){
                    return "Нічого не знайдено по Вашому запиту";
                }
            }
        });
    </script>
@stop
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
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
    });
</script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
	$(document).ready(function() {
		CKEDITOR.replace( 'description' );
        $("#city").select2();
	});
</script>