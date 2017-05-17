<div class="slider" data-category="{{ $category }}" data-view="{{ $viewName }}">

</div>
<script>
    function getSlider(viewName, category) {
        $slider = $('.slider[data-view=' + viewName+ ']');
        $.ajax({
            url: '{{route('slidersByCategory')}}',
            data: { category: category,
                slider: viewName},
            type: 'POST',
            async: false,
            success: function (data) {
                $slider.html(data);
            }
        });
    }

    $(document).ready(function(){
        $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
        $('.slider').each(function (index, item) {
           getSlider($(item).data('view'), $(item).data('category'))
        });
    })
</script>