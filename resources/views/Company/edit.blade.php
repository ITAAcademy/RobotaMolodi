@extends('app')

@section('content')
    <div class="row">
      <h3><b>Редагувати компанію</b></h3>
    </div>
<br>
    <div class="row">
        <div class="form-group col-md-2 col-sm-2" >
             {!!Form::model($company,array('route' =>array('company.update',$company->id),'method' => 'put', 'id'=>'form'))!!}
            <label for="sector" class=" control-label">Назва компанії</label>
        </div>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('company_name', $company->company_name, array('class' => 'form-control' )) !!}
        </div>
        <span style ="color:red"> * <?php echo $errors->first('company_name','поле має містити не менше трьох символів'); ?>  </span>
    </div>


    <div class="row">
        <div class="form-group col-md-2 col-sm-2" >
            <label for="level" class=" control-label">Посилання на компанію</label>
        </div>
        <div class="col-md-6 col-sm-6">
                {!! Form::text('company_link', $company->company_email, array('class' => 'form-control')) !!}
        </div>
        <span style ="color:red"><?php echo $errors->first('company_link','поле має бути посиланням в форматі https://'); ?>  </span>
    </div>
<br>
        <div class="row">
            <div class="form-group col-md-offset-2 col-md-2" >
                {!!Form::submit('Редагувати компанію',['class' => 'btn btn-primary'])!!}
            </div>
                {!!Form::token()!!}
                {!!Form::close()!!}
        </div>
@endsection
@stop
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