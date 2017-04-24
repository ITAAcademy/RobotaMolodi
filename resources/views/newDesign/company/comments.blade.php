<div class="test">
    @foreach($comments as $comment)
    <div>
        <span>Автор: {{$comment->user->name}}</span><span class="data">, дата: {{date('j.m.Y h:i:s', strtotime($comment->updated_at))}}</span>
        <p>{{$comment->comment}}</p>

    </div>
    <hr>
    @endforeach

</div>

<div>
    {!!Form::open(['route' => ['scompany.company_allComments',$company->id],'method'=>'POST']) !!}
    {!!Form::label('comment', 'Добавити відгук:',['class' => 'url-text-vac'] )!!}
    {!!Form::textarea('comment', null, ['class' => 'form-control', 'placeholder'=>'Відгук про компанію'])!!}
    <div align="right">
        {!!Form::submit('Відправити', ['class' => 'btn-commit btn-default btn-send'])!!}
    </div>
    {!!Form::close()!!}


</div>


<script>
    $(document).ready(function () {
        $('.btn-commit').on('click', function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
            $.ajax({
                url:'{{route('scompany.company')}}',
                //data: $('#com').val(),
                success: function(data){
                    $('.test').html(data);
                }
            })
        })
    })

</script>
