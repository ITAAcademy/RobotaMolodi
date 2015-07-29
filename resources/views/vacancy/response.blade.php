@extends('cabinet\cabinet')
@section('contents')
<div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px">
    <button class="btn btn-default" style="background: #a7eebe" onclick="PasteLink()" >Вставити посилання на рєзюме</button>
    <button class="btn btn-default" style="background: #a7eebe; margin-left: 50px" onclick="PasteFile()" >Загрузити файл</button>

</div>
<div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px;display: none " id="linkDiv">



{!!Form::open(['route' => 'vacancy.store'])!!}

<h3 style="margin-top: 100px">Вставити посилання на резюме</h3>
<div class="form-group" style="margin-top: 30px">
    <label for="sector" class="col-sm-2 control-label">Позиція</label>
    <div class="col-sm-5">
        {!! Form::text('Link', null, array('class' => 'form-control')) !!}
    </div>



    </br>
</div>


<div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px">
    <input type="submit" class="btn btn-default" style="background: #a7eebe" value="Відправити посилання">
</div>
</div>
{!!Form::token()!!}
{!!Form::close()!!}



<div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px;display: none " id="inputDiv">

    {!!Form::open(['route' => 'vacancy.store'])!!}

    <h3 style="margin-top: 100px">Завантажити файл</h3>
    <div class="form-group" style="margin-top: 30px">
        <label for="sector" class="col-sm-2 control-label">Позиція</label>
        <div class="col-sm-5">
            {!! Form::file('Load', null, array('class' => 'form-control')) !!}
        </div>

        </br>
    </div>


    <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px">
        <input type="submit" class="btn btn-default" style="background: #a7eebe" value="Відправити посилання">
    </div>
</div>
{!!Form::token()!!}
{!!Form::close()!!}
<script>

    function PasteLink()
    {

        var linkDiv = document.getElementById('linkDiv');
        var display = linkDiv.style.display;
        var inputDisplay = document.getElementById('inputDiv').style.display;
        alert(display);
        alert(inputDisplay);
        if(display == "block" && inputDisplay == "none")
        {
            linkDiv.style.display="none";
        }
        else
        {
            linkDiv.style.display="block";
        }
    }

    function PasteFile()
    {
        var inputDiv = document.getElementById('inputDiv');
        var display = inputDiv.style.display;
        if(display == "block")
        {
            inputDiv.style.display="none";
        }
        else
        {
            inputDiv.style.display="block"
        }
    }

</script>

@stop