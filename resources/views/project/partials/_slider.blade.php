<div class="slider-wrapper">
  <div class="slider-capacity">
    <img src="image/logointita.png" alt="intita">
    <p>Intita – украинская академия, основанная в 1812 году, работающая в сфере обучения программистов Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do  porro quisquam ests modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
  </div>
  <div class="slider">
    <div>
        <img class="slider-item" src="image/layer20.jpg" alt="slider1">
    </div>
    <div>
        <img class="slider-item" src="image/layer21.jpg" alt="slider2">
    </div>
    <div>
        <img class="slider-item" src="image/layer22.jpg" alt="slider3">
    </div>
  </div>
</div>
{!!Html::script('js/slick/slick.min.js')!!}
<script type="text/javascript">
  $(document).ready(function(){
    $('.slider').slick({
        dots: true,
        infinite: true,
        prevArrow: '<img src="image/arrl.png" class="slick-prev" alt="Prev">',
        nextArrow: '<img src="image/arrr.png" class="slick-next" alt="Next">'
    });
  });
</script>
