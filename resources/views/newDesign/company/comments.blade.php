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

        $("button.btn-edit").on('click', function () {
            $(this).hide();
            id = $(this).val();
            $("#btn-edit-submit" + id).show();
            $("#comment" + id).show();
        });

        $(document).on('submit', 'form', function (event) {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});
            //window.history.pushState("", "", url);
            var $form = $(this);

            var url = $(this).attr("action");
            var input = $form.children('input');
            if (input.attr('name') === "_token") {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {comment: $('#comment').val()},
                    success: function (data) {
                        $form.remove();
                        $('.test').html(data);
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
                    }
                });
            } else {
                switch (input.val()) {
                    case 'PUT': {
                        id = $form.find("button").val();
                        $.ajax({
                            url: url,
                            method: input.val(),
                            data: {
                                id: id,
                                comment: $('#comment' + id).val()
                            },
                            success: function () {
                                $("#btn-edit-submit" + id).hide();
                                $("#comment" + id).hide();
                                $("button.btn-edit[value='" + id + "']").show();
                            }
                        });
                        $.ajax({
                            url: "/comment/" + id,
                            success: function (result) {
                                newDate = new Date(result.updated_at);
                                formatDate = newDate.getDate() + '.' + newDate.getMonth() + '.' + newDate.getFullYear();
                                newDate.setHours((newDate.getHours() < 12) ? newDate.getHours() : (newDate.getHours() - 12));
                                TT = (newDate.getHours() < 12) ? "pm" : "am";
                                formatTime = newDate.getHours() + ':' + newDate.getMinutes();
                                $("p#comment-" + id + "-description").html(result.comment);
                                $("span #date-" + id).html(formatDate + " " + formatTime + "" + TT);
                            }
                        });
                        break;
                    }
                    case 'DELETE': {
                        if (ConfirmDelete()) {
                            id = $form.find('input[type="submit"]').attr('id');
                            $("#comment-block-" + id).remove();
                            $.ajax({
                                url: url,
                                method: input.val(),
                                data: {id: id},
                                success: function () {
                                    $("#comment-block-" + id).remove();
                                }
                            });
                        }
                        break;
                    }
                }
            }
            return false;
        })
    });

    /**
     * @return {boolean}
     */
    function ConfirmDelete() {
        return confirm("Ви дійсно хочете видалити компанію?");
    }

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