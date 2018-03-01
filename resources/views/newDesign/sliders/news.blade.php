<div class="slider-block">
    <div class="slick-slider slider-right-news">
        @foreach($sliders as $slider)
            <div>
                <a href="{{ $slider->url }}" target="_blank">
                    <img src="{{ $slider->image }}" alt="" style="width:100%; height: auto">
                </a>
            </div>
        @endforeach
    </div>
</div>