@if(count($resumes) === 0)
    <br>
    <?php echo "Немає рєзюме по Вашому пошуку"?>

@else
    @foreach ($resumes as $resume)

        <article>
            <a href="resume/{{$resume->id}}" class="link">
                <div class="list">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="list-group-item-heading panel-title">{{$resume->branch}} Позиція: <span class="text-info" >{{$resume->position}}</span>  &#183;
                                <span style="color: gray">{{$resume->salary}} - {{$resume->salary_max}} {{$resume->currency}}</span>
                                <span class="text-muted text-right pull-right"><h5 id="{{$resume->id}}" title="{{ date('j.m.Y,H:i:s', strtotime($resume->created_at))}}">
                                        <script>
                                            $('#'+'{{$resume->id}}').text(FormatDate({{strtotime($resume->created_at)}}));
                                        </script>
                                    </h5></span></h3>
                        </div>
                        <div class="panel-body">
                            <h4 class="list-group-item-heading">@if(!$resume->getAttribute('resumeAllUkraine')){{ $resume->City()->name}} @else {{'Уся Україна'}} @endif </h4>
                            <h4 class="list-group-item-heading">{{ $resume->Industry()->name}}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </article>

    @endforeach
    @include('/pagination/pagination', ['paginator' => $resumes])
    {{--{!!$resumes->appends(['city_id' => $city_id, 'industry_id' => $industry_id])->render()!!}--}}
@endif