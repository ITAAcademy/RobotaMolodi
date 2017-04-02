@extends ('NewVacancy/users')

@section('contents')


    {!!Form::open(['route' => 'company.store', 'id'=>'form'])!!}
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
        <div class="col-sm-offset-2 col-md-2  col-sm-2 form-group" style="width: 400px">
        {!!Form::submit('Зареєструвати компанію',['class' => 'btn btn-primary'])!!}
        </div>
       {!!Form::token()!!}
    </div>
    </div>
    {!!Form::close()!!}

@endsection
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
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

