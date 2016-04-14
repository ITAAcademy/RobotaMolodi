@extends('app') <!-- Куди вставляється весь цей код Штмл -->

@section('title')
    <h2>Написати резюме</h2>
    <div>
        {!! link_to_route('resumes', 'Мої резюме') !!} <!-- Створення силки -->
    </div>
@stop

@section('content')
    {!! Form::open(['route' => 'resume.store','enctype' => 'multipart/form-data']) !!}

        @include('Resume._form') <!-- Підключення коду Штмл(Форма вводу) -->
    {!!Form::close()!!}
@stop
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $( ".form-control" ).change(function() {
            $('.afterChange').click(function(){
                if (confirm("Дані не збережені!! Bи впевнені, що хочете залишити цю сторінку?"))
                    return true;
                else return false;
            });
            window.onbeforeunload = function (evt) {
                var message = "Дані не збережені!! Bи впевнені, що хочете залишити цю сторінку?";
                if (typeof evt == "undefined") {
                    evt = window.event;
                }
                if (evt) {
                    evt.returnValue = message;
                }
                return message;
            }
        });

    });
</script>