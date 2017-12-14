<div class="test">
    <div class="scroll">
        @foreach($comments as $comment)
            <div id="block-{{$comment->id}}" class="col-xs-12">
                <span>Автор: {{$comment->user->name}}</span><span
                        class="data">, дата: {{date('j.m.Y h:i:s', strtotime($comment->updated_at))}}</span>
                <p id="comment-{{$comment->id}}">{{$comment->comment}}</p>
                {!!Form::model($comment,
                    ['route' => [
                        'company.response.update',
                        $company->id,
                        $comment->id
                        ],
                    'method'=>'PUT'])
                !!}
                {!!Form::textarea('comment', $comment->comment, ['id' => 'comment'.$comment->id, 'value' => $comment->id, 'class' => 'textarea-edit form-control', 'style' => 'height: 100px'])!!}
                {!!Form::button('Edit', ['value' => $comment->id, 'class' => 'btn-edit btn btn-primary pull-left'])!!}
                {!!Form::submit('Edit', ['id' => 'btn-edit-submit'.$comment->id, 'class' => 'btn-edit-submit btn btn-info pull-left'])!!}
                {!!Form::close()!!}

                {!!Form::model($comment,
                    ['route' => [
                        'company.response.destroy',
                        $company->id,
                        $comment->id,
                        ],
                    'method'=>'DELETE'])
                !!}
                {!!Form::submit('Delete', ['id' => $comment->id,'class' => 'btn-delete btn btn-danger pull-left '.$comment->id, 'onclick' => 'ConfirmDelete()'])!!}
                {!!Form::close()!!}

                <hr>
            </div>
        @endforeach
    </div>
    <div id="load" style="position: relative;"></div>
    {!!   $comments->render() !!}
</div>
<div id="make-comment">
    {!!Form::model($comments, ['route' => ['company.response.store',$company->id], 'method' => 'POST']) !!}
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
        $('textarea.textarea-edit').hide();
        $('.btn-edit-submit').hide();
        $('.btn-edit').on('click', function () {
            var id = $(this).attr("value");
            $('textarea#comment' + id).show();
            $('#btn-edit-submit' + id).show();
            $('.btn-edit[value=' + id + ']').hide();
        });

        function ConfirmDelete() {
            return confirm("{{trans('content.confirmDelete')}}");
        }

        $('button.btn-delete').on('click', function () {
            var comment_id = $(this).val();
            if (ConfirmDelete()) {
                $.ajax({
                    url: '/comments/' + comment_id + '/ajaxDelete',
                    method: 'GET',
                    success: function (result) {
                        $("#block-" + comment_id).text(result).attr('style', 'color:red');
                    }
                })
            }
        });

        function checkComment() {
            var commit = $('.form-control').val();

            if (commit.length != 3) {
                $('.btn-commit').removeAttr('disabled');
            }
            else {
                $('.btn-commit').attr('disabled', 'disable');
            }
        }

        $('ul.pager:visible:first').hide();
        $('div.test').jscroll({
            loadingHtml: '<img src="/image/loading.gif" alt="Loading" /> Loading...',
            debug: true,
            autoTrigger: true,
            nextSelector: 'a[rel="next"]',
            contentSelector: 'div.test',
            callback: function () {
                $('ul.pager:visible:first').hide();
            }
        });
        $(document).on('keyup', '#comment', function (e) {
            checkComment();
        });

        $('form').submit(function (event) {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});
            //window.history.pushState("", "", url);
            var $form = $(this);
            var post_url = $(this).attr("action");
            var method = $(this).find('input');
            if (method.attr('name') === "_token") {
                $.ajax({
                    url: post_url,
                    method: 'POST',
                    data: {comment: $('#comment').val()},
                    success: function (data) {
                        $form.remove();
                        $('.test').html(data);
                        $('div.test').jscroll({
                            loadingHtml: '<img src="/image/loading.gif" alt="Loading" /> Loading...',
                            debug: true,
                            autoTrigger: true,
                            nextSelector: 'a[rel="next"]',
                            contentSelector: 'div.test',
                            callback: function () {
                                $('ul.pager:visible:first').hide();
                            }
                        });
                    }
                });
            } else {
                switch (method.attr('value')) {
                    case "PUT": {
                        id = $(this).find('textarea').attr("value");
                        var newComment =  $(this).find('textarea').val();
                        $('textarea#comment' + id).hide();
                        $('#btn-edit-submit' + id).hide();
                        $('.btn-edit[value=' + id + ']').show();
                        $.ajax({
                            url: post_url,
                            data: {
                                comment: newComment
                            },
                            method: 'PUT'
                        });
                        $.ajax({
                            url: '/comments/' + id,
                            method: 'GET',
                            success: function (comment) {
                                $('p#comment-' + id).text(comment.comment);
                            }
                        });
                        break;
                    }
                    case "DELETE":
                        id = $(this).find('input[type="submit"]').attr('id');
                        $('div#block-'+id).hide();
                        $.ajax({
                            url: post_url,
                            data: {
                                id: id
                            },
                            method: 'DELETE'
                        });
                        break;
                }
            }
            return false;
        })
    });

</script>
