
<div class="test">
    @foreach($comments as $comment)
        {{--{{dd($comment)}}--}}
    <div>
        <span>Автор: {{$comment->user->name}}</span><span class="data">, дата: {{date('j.m.Y h:i:s', strtotime($comment->updated_at))}}</span>
        <p>{{$comment->comment}}</p>

    </div>
    <hr>
    @endforeach
        <div>
            {!!Form::open(['route' => ['company.response.store',$company->id]], ['id' => 'test']) !!}
            {!!Form::label('comment', 'Добавити відгук:',['class' => 'url-text-vac'] )!!}
            {!!Form::textarea('comment', null, ['class' => 'form-control', 'placeholder'=>'Відгук про компанію'])!!}
            <div align="right">
                {!!Form::submit('Відправити', ['class' => 'btn-commit btn-default btn-send', 'disabled'=>'disabled'])!!}
            </div>
            {!!Form::close()!!}


        </div>

</div>



<script>
    $(document).ready(function () {
        function checkComment() {
            var commit = $('.form-control').val();

            if (commit.length != 3){
                $('.btn-commit').removeAttr('disabled');}
            else{
                $('.btn-commit').attr('disabled','disable');
            }
        }

        $('#comment').keyup(function(e){
            checkComment();
        });
        $('.btn-commit').on('click', function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});
            $.ajax({
                url:'http://localhost:8000/company/63/response',
                method: 'POST',
                data: {comment: $('#comment').val()},
                success: function(data){
                    $('.test').html(data);
                }
            });
            return false;
        })
    })

</script>
