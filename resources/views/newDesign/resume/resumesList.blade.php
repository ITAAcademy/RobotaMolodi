<link href="{{ asset('/css/resumes/resumesList.css') }}" rel="stylesheet">

@foreach ($resumes as $resume)
    <div>
        <div class="section-link">
            <a class="links-line" href="/resume/{{$resume->id}}">
                <h3>{{$resume->branch}}{{ $resume->position}}</h3>
            </a>
            <h4>
                <strong>{{$resume->salary}} - {{$resume->salary_max}} {{$resume->Currency()[0]['currency']}}</strong>
            </h4>
            <p class="text-left"> {{strip_tags($resume->description)}} </p>
        </div>

        <a class="links-line" href="/resume/{{$resume->id}}">
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