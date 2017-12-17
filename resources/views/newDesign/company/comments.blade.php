<div class="test">
    <div class="scroll">
        @foreach($comments as $comment)
        <div>
            <span>Автор: {{$comment->user->name}}</span><span class="data">, дата: {{date('j.m.Y h:ia', strtotime($comment->updated_at))}}</span>
            <p>{{$comment->comment}}</p>
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
