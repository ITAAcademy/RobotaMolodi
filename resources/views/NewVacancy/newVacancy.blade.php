@extends ('app')
@section('content')
    <h3 class="formTitle header-text-vacancy"><b>{{trans('content.addVacancy')}}</b></h3>
    {!!Form::open(['route' => 'vacancy.store','onsubmit' => 'return CheckForm()', 'id'=>'form_id'])!!}
    @include('vacancy._formVacancy')
    {!!Form::close()!!}
<script>$(document).ready(function(){CKEDITOR.replace( 'description' );});</script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
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
            $(window).bind('beforeunload', function () {
                return 'Збережіть будь ласка всі внесені нові дані!';
            });
            $('#form_id').submit(function () {
                $(window).unbind('beforeunload');
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".js-example-basic-multiple").select2();
        $("#selectCurrency").select2();
        $("#selectGaluz").select2();
        $("#selectOrgan").select2();
    });
</script>
<script>
	$(document).ready(function() {
        $('#phone').mask("+38(099) 999-99-99");
	});
</script>