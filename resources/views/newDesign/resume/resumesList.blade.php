<link href="{{ asset('/css/resumes/resumesList.css') }}" rel="stylesheet">
<link href="{{ asset('/css/paginator/paginator.css') }}" rel="stylesheet">

<div class="test">
    @foreach ($resumes as $resume)
        <div>
            <div class="section-link">
                <a class="links-line" href="{{route('resume.show', $resume->id)}}">
                    <h3>{{$resume->branch}}{{ $resume->position}}</h3>
                </a>
                <h4>
                    <strong>{{$resume->salary}} - {{$resume->salary_max}} {{$resume->Currency()[0]['currency']}}</strong>
                </h4>
                <p class="text-left"> {{strip_tags($resume->description)}} </p>
            </div>

            <a class="links-line" href="{{route('resume.show', $resume->id)}}">
                <p class="read-next-link">Читати далі...</p>
            </a>

            <div class="below-section">
                <span>{{ $resume->Industry()->name}}</span>
            </div>

            <a class="links-line" href="#">
                <div class="line">
                    <span class="town">{{ $resume->City()->name}}</span>
                    <span class="drop">&bull;</span>
                    <span class="data">{{date('j m Y', strtotime($resume->updated_at))}}</span>
                </div>
            </a>

            <hr class="limit-line">
        </div>
    @endforeach

    @include('newDesign.paginator', ['paginator' => $resumes])
</div>

@include('newDesign.jsForFilter', ['urlController' => 'filter.resumes'])
{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$('.pag-block-by').click(function () {--}}
            {{--$('.active-pag-block').removeClass('active-pag-block');--}}
            {{--$(this).toggleClass('active-pag-block');--}}
        {{--})--}}
    {{--})--}}
{{--</script>--}}
{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--function getFilters() {--}}
            {{--return {--}}
                {{--regions: $('select[name="selected-region"]').val(),--}}
                {{--industries: $('select[name="selected-indastry"]').val(),--}}
                {{--specialisations: $('select[name="selected-specialization"]').val()--}}
            {{--}--}}
        {{--}--}}

        {{--$('.getting-list-selected-box').on('change',function () {--}}
            {{--$.ajax({--}}
                {{--url: '{{route('filter.resumes')}}',--}}
                {{--data: getFilters(),--}}
                {{--success: function(data){--}}
                    {{--$('.test').html(data);--}}
                {{--}--}}
            {{--});--}}
        {{--})--}}
    {{--})--}}


{{--</script>--}}