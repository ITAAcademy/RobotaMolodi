<div class="test">
    <div class="scroll">

    </div>
    <div id="load" style="position: relative;"></div>
    {!!   $comments->render() !!}
</div>
<div>
    {!!Form::open(['route' => ['company.response.store',$company->id]], ['id' => 'make']) !!}
    {!!Form::label('comment', 'Добавити відгук:',['class' => 'url-text-vac add-comment-lable'] )!!}
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
        $('ul.pager:visible:first').hide();
        $('div.test').jscroll({
            loadingHtml: '<img src="/image/loading.gif" alt="Loading" /> Loading...',
            debug: true,
            autoTrigger: true,
            nextSelector: 'li a[rel="next"]',
            contentSelector: 'div.test',
            callback: function () {
                $('ul.pager:visible:first').hide();
            }
        });

        $(document).on('keyup', '#comment', function (e) {
            checkComment();
        });

        // $(document).on('submit', 'form', function (event) {
        //         $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});
        //         //window.history.pushState("", "", url);
        //         var $form = $(this);
        //
        //         var url = $(this).attr("action");
        //         var input = $form.children('input');
        //         $.ajax({
        //             url: url,
        //             method: 'POST',
        //             data: {comment: $('#comment').val()},
        //             success: function (data) {
        //                 $form.hide();
        //                 $('div.test').jscroll({
        //                     loadingHtml: '<img src="/image/loading.gif" alt="Loading" /> Loading...',
        //                     debug: true,
        //                     autoTrigger: true,
        //                     nextSelector: 'li a[rel="next"]',
        //                     contentSelector: 'div.test',
        //                     callback: function () {
        //                         $('ul.pager:visible:first').hide();
        //                     }
        //                 });
        //             }
        //         });
        //         return true;
        // })
    });

    function checkComment() {
        var commit = $('.form-control').val();

        if (commit.length !== 3) {
            $('.btn-commit').removeAttr('disabled');
        }
        else {
            $('.btn-commit').attr('disabled', 'disable');
        }
    }

</script>