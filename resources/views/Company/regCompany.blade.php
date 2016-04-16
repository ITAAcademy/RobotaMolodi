@extends ('NewVacancy/users')

@section('contents')


    {!!Form::open(['route' => 'company.store'])!!}
    <div class="row">
    <h3 class="formTitle">Створення компанії</h3>
        </br>
    <div class="form-group" >
        <label for="sector" class="col-md-2 col-sm-2 control-label">Назва компанії</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('company_name', null, array('class' => 'form-control' )) !!}
        </div>
        <div ><span style ="color:red">* <?php echo $errors->first('company_name','поле має містити не менше трьох символів'); ?>  </span> {{$company}}</div>
    </div>
        </div>
    </br>
    <div class="row">
    <div class="form-group" style="margin-top: 20px">
        <label for="level" class="col-md-2 col-sm-2 control-label">Посилання на компанію</label>
        <div class="col-md-6 col-sm-6">
            {!! Form::text('company_link', null, array('class' => 'form-control')) !!}

        </div>
        <div ><span style ="color:red"><?php echo $errors->first('company_link','поле має бути посиланням в форматі https://'); ?>  </span> {{$company}}</div>
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

