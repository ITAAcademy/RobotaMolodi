<div class="test">
    <div class="scroll">
        @foreach($comments as $comment)
        <div>
            <span>Автор: {{$comment->user->name}}</span><span class="data">, дата: {{date('j.m.Y h:i:s', strtotime($comment->updated_at))}}</span>
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
        {!!Form::submit('Відправити', ['class' => 'btn-commit btn-default btn-send', 'disabled'=>'disabled'])!!}
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
        $('#comment').keyup(function(e){
            checkComment();
        });
        var url = $(this).attr('href');
        $('.btn-commit').on('click', function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});
            //window.history.pushState("", "", url);
            $.ajax(url)({
                url: url,
                //cache: false,
                method: 'POST',
                data: {comment: $('#comment').val()},
                success: function(data){
                    $('.test').html(data);
                }
            });
            return false;
        })
    });


</script>
