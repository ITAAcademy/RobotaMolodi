{!! $resumes->render(new App\Presenters\BootstrapTwoPresenter($resumes)) !!}
    @foreach ($resumes as $resume)
        <article>
            <a href="{!!\Illuminate\Support\Facades\URL::to('resume',[$resume->id])!!}" class="link">
                <div class="list">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="list-group-item-heading panel-title">{{$resume->branch}} <span class="text-info" >{{$resume->position}}</span>  &#183; {{$resume->salary}} - {{$resume->salary_max}} {{$resume->Currency()[0]['currency']}}
                                <span class="text-muted text-right pull-right"><h5 id="{{$resume->id}}" title="{{ date('j.m.Y, H:i:s', strtotime($resume->updated_at))}}">
                                        <script>
                                            $('#'+'{{$resume->id}}').text(FormatDate({{strtotime($resume->updated_at)}}));
                                        </script>
                                    </h5></span></h3>
                        </div>
                        <div class="panel-body">
                            <h4 class="list-group-item-heading">{{ $resume->City()->name}}</h4>
                            <h4 class="list-group-item-heading">{{ $resume->Industry()->name}}</h4>
                        </div>
                    </div>
                </div>
            </a>
        </article>
    @endforeach
{!! $resumes->render(new App\Presenters\BootstrapTwoPresenter($resumes)) !!}
