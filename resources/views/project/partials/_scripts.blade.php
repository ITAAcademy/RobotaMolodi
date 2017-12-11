<script>

window.onload = function(){
    $(function () {
        $("#logoProject").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function imageIsLoaded(e) {
                    $('#prevLogo').attr('src', e.target.result)
                        .css('maxWidth', '100%');
                    };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
}


</script>
