<div class="test">
    <div class="scroll">
        @foreach($comments as $comment)
        <div>
            <span>Автор: {{$comment->user->name}}</span><span class="data">, дата: {{date('j.m.Y h:i:s', strtotime($comment->updated_at))}}</span>
            <p id="comment-{{$comment->id}}">{{$comment->comment}}</p>
            {!!Form::textarea('comment-edit', null, [
            'id' => 'comment-edit-'.$comment->id,
            'class' => 'form-control',
            'style' => 'height: 80px; width: 300px; display:none',
            'placeholder' => $comment->comment])
            !!}
            <button type='button' value="{{$comment->id}}" id="btn-edit-{{$comment->id}}" class="btn-edit btn btn-primary">edit</button>
        </div>
        <hr>
        @endforeach
    </div>
    <div id="load" style="position: relative;"></div>
    {!!   $comments->render() !!}
</div>
<div>
    {!!Form::open(['route' => ['company.response.store',$company->id]], ['id' => 'test']) !!}
    {!!Form::label('comment', 'Добавити відгук:',['class' => 'url-text-vac'] )!!}
    {!!Form::textarea('comment', null, ['class' => 'form-control', 'placeholder'=>'Відгук про компанію'])!!}
    <div align="right">
        {!!Form::submit('Відправити', ['class' => 'btn-commit btn', 'disabled'=>'disabled'])!!}
    </div>
    {!!Form::close()!!}
</div>

<script src="/js/jscroll-master/jquery.jscroll.min.js"></script>
{{--{!!Html::script('/js/jscroll-master/jquery.jscroll.min.js')!!}--}}

<script>
    $(document).ready(function () {
        $('button.btn-edit').on('click', function(){
            var comment_id = $(this).val();

            $('textarea#comment-edit-'+comment_id).toggle();
            var new_comment = $('textarea#comment-edit-'+comment_id).val();
            if (new_comment.length > 2){
                $.ajax({
                url: '/comments/'+comment_id+'/ajaxUpdate/'+new_comment,
                method: 'GET',
                success: function(result){
                    $("#comment-"+result.id).html( result.comment );
                }
            })}
        });
        function checkComment() {
            var commit = $('.form-control').val();

            if (commit.length != 3){
                $('.btn-commit').removeAttr('disabled');}
            else{
                $('.btn-commit').attr('disabled','disable');
            }
        }
        $('ul.pager:visible:first').hide();
        $('div.test').jscroll({
            loadingHtml: '<img src="/image/loading.gif" alt="Loading" /> Loading...',
            debug: true,
            autoTrigger: true,
            nextSelector: 'li a[rel="next"]',
            contentSelector: 'div.test',
            callback: function() {
                $('ul.pager:visible:first').hide();
            }
        });
        $(document).on('keyup', '#comment',function(e){
            checkComment();
        });

        $(document).on('submit', 'form', function (event) {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});
            //window.history.pushState("", "", url);
            var $form = $(this);

            var post_url = $(this).attr("action");
            $.ajax({
                url: post_url,
                method: 'POST',
                data: {comment: $('#comment').val()},
                success: function(data){
                    $form.remove();
                    $('.test').html(data);
                    $('div.test').jscroll({
                        loadingHtml: '<img src="/image/loading.gif" alt="Loading" /> Loading...',
                        debug: true,
                        autoTrigger: true,
                        nextSelector: 'li a[rel="next"]',
                        contentSelector: 'div.test',
                        callback: function() {
                            $('ul.pager:visible:first').hide();
                        }
                    });
                }
            });
            return false;
        })
    });


</script>
