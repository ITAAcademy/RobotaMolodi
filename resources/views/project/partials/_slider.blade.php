<div class="slider-wrapper">
  <div class="slider-capacity">
    {!! Html::image(asset($project->logo), $project->name, ['style' => 'width:230px; height:75px']) !!}
    <p>{{ $project['company_desc'] }}</p>
  </div>
  <div class="slider">
        @if($project->slides)
          @foreach($project->slides as $slide)
              <div>
                  {!! Html::image($slide, $project->name, ['class' => 'slider-item']) !!}
              </div>
          @endforeach
        @endif
  </div>
</div>
{!!Html::script('js/slick/slick.min.js')!!}
<script type="text/javascript">
  $(document).ready(function(){
    $('.slider').slick({
        dots: true,
        infinite: true,
        prevArrow: '<img src="/image/arrl.png" class="slick-prev" alt="Prev">',
        nextArrow: '<img src="/image/arrr.png" class="slick-next" alt="Next">'
    });
  });
</script>
