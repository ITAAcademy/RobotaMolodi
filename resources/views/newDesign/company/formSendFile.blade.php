
<link href="{{ asset('/css/companies/formSendFile.css') }}" rel="stylesheet">

<div class="send-file-company">
    {!!Form::open(['route' => ['company.response.sendFile',$company->id],'method'=>"POST", 'enctype' => 'multipart/form-data', 'files' => true])!!}
    {!!Form::file('file',array('class' => 'open-file-comp', 'id'=>'File', 'name' => 'FileName')) !!}
    <div align="right">
        {!!Form::submit('Відправити', ['class' => 'btn btn-warning btn-send'])!!}
    </div>

    {!!Form::close()!!}
</div>


