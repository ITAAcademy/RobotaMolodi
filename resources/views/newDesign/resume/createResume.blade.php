@extends('app');
@section('content')

<div class="container">
    <div class="row">
       <div class="col-md-9 col-md-offset-1">
           <h3>ДОДАТИ РЕЗЮМЕ</h3>
       </div>
    </div>
    <form class="form-horizontal" role="form" method="POST" action="http://localhost:8000/auth/login">
        <input type="hidden" name="_token" value="8XuUWMaShBTV7nFzk4itSh8FS8q9IAid83lnnqem">

        <div class="form-group">
            <label class="col-md-4 control-label">Прізвище та ім'я *</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Телефон</label>
            <div class="col-md-6">
                <input type="tel" class="form-control" name="telephone" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Електронна пошта *</label>
            <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Місто</label>
            <div class="col-md-6">
                <select name="hero" class="form-control">
                    <option disabled selected>Оберіть місто</option>
                    <option value="t1">Вінниця</option>
                    <option value="t2">Чернівці</option>
                    <option value="t3">Хмельницький</option>
                    <option value="t4">Якушинці</option>
                </select>
             </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Галузь</label>
            <div class="col-md-6">
                <select class="form-control" id="chkveg" multiple="multiple">
                    <option value="g1">Фронт-енд</option>
                    <option value="g2">Бек-енд</option>
                    <option value="g3">Адміністрування</option>
                    <option value="g4">Аналітика</option>
                    <option value="g5">Тестування</option>
                    <option value="g6">Начальніка</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Позиція *</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="text" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Зарплата *</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="text" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Опис *</label>
            <div class="col-md-6">
                <textarea class="form-control">Write fue words about yourself.</textarea>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">

    $(function() {

        $('#chkveg').multiselect({

            includeSelectAllOption: true
        });

    });

</script>
@endsection
