<div class="slider-block">
    <div class="slick-slider" style="padding-top: 60px">
        @foreach($sliders as $slider)
            <div>
                <a href="{{ $slider->url }}" target="_blank" >
                    <img src="{{ $slider->image }}" alt="" style="width:100%; height: auto">
                </a>
            </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.slick-slider').slick({
            autoplay: true,
            autoplaySpeed: 1000,
            infinite: false,
            speed: 1000
        });
        {{--$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});--}}
        {{--$.ajax({--}}
            {{--url: '{{route('setCategory')}}',--}}
            {{--data: { category: $('.category').val() },--}}
            {{--type: 'POST',--}}
            {{--success: function (data) {--}}
                {{--$('.slick-slider').html(data);--}}
            {{--}--}}
        {{--})--}}
    })
</script>