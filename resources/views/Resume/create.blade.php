@extends('app') <!-- Куди вставляється весь цей код Штмл -->

@section('title')
    <h2>Написати резюме</h2>
    <div>
        {!! link_to_route('resumes', 'Мої резюме') !!} <!-- Створення силки -->
    </div>
@stop

@section('content')
    {!! Form::open(['route' => 'resume.store','enctype' => 'multipart/form-data', 'id'=>'form_id']) !!}

        @include('Resume._form') <!-- Підключення коду Штмл(Форма вводу) -->
    {!!Form::close()!!}
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
        $(".js-example-basic-multiple").select2();

        $("#selectIndustry").select2();

        $("#selectCurrency").select2();

    });
</script>