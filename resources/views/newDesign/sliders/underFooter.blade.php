<div class="slider-block">
    <div class="slick-slider slider-under-footer">
        @foreach($sliders as $slider)
            <div>
                <a href="{{ $slider->url }}" target="_blank" >
                    <img src="{{ $slider->image }}" alt="" style="padding-top: 30px; width:100%; height: auto">
                </a>
            </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.slider-under-footer').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: false,
            speed: 1000
        });
    })
</script>