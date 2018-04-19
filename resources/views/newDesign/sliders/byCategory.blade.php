<div class="slider hidden" data-category="{{ $category }}" data-view="{{ $viewName }}">

</div>
<script>
    function getSlider(viewName, category) {
        $slider = $('.slider[data-view=' + viewName + ']');
        $.ajax({
            url: '{{route('slidersByCategory')}}',
            data: {
                category: category,
                slider: viewName
            },
            type: 'POST',
            async: false,
            success: function (data) {
                $slider.html(data);
            }
        });
    }

    $(document).ready(function () {
        $.ajaxSetup({headers: {'x-csrf-token': $('meta[name="_token"]').attr('content')}});
        $('.slider').each(function (index, item) {
            getSlider($(item).data('view'), $(item).data('category'))
        });
        $('.slick-slider').slick({
            autoplay: true,
            autoplaySpeed: 6000,
            infinite: true,
            speed: 2000
        });
    })
</script>