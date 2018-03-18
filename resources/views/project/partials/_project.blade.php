<section class="project" id="about_project__id">
    <div class="about-project">
        <h2 class="about-project__tittle">trans('project.addProject')</h2>
        <div class="about-project__text">
            {{ $project['project_about'] }}
        </div>
        <div class="about-project__info">
            <ul class="about-project__info-list">
                <li class="about-project__info-items">
                    <div class="info-items-img-wrapper">
                        <img src="/image/time.png" alt="time" class="project__info-items-img">
                    </div>
                    <h2 class="project__info-items-title">Time:</h2>
                    <div class="project__info-items-text">
                        {{ $project['project_term'] }}
                        
                    </div>
                </li>
                <li class="about-project__info-items">
                    <div class="info-items-img-wrapper">
                        <img src="/image/brand.png" alt="brand" class="project__info-items-img">
                    </div>
                    <h2 class="project__info-items-title">Brand:</h2>
                    <div class="project__info-items-text">
                        {{ $project['brand'] }}
                    </div>
                </li>
                <li class="about-project__info-items">
                    <div class="info-items-img-wrapper">
                        <img src="/image/bonuses.png" alt="bonuses" class="project__info-items-img">
                    </div>
                    <h2 class="project__info-items-title">Bonuses:</h2>
                    <div class="project__info-items-text">
                        {{ $project['bonuses'] }}
                    </div>
                </li>
                <li class="about-project__info-items">
                    <div class="info-items-img-wrapper">
                        <img src="/image/localisations.png" alt="localisations" class="project__info-items-img">
                    </div>
                    <h2 class="project__info-items-title">Localisations:</h2>
                    <div class="project__info-items-text">
                        {{ $project['location'] }}
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="team-project">
        <div class="team-project__tittle">
            Team:<span class="team-project__tittle-text">{{ $project->members->count() }} persons</span>
        </div>
        <ul class="team-project__list clearfix">
            @foreach($project->members as $m)
                <li class="team-project__persons col-md-2">
                    @if($m->avatar)
                        {!! Html::image(asset($m->avatar), $m->name, ['class' => 'team-project__persons-avatar']) !!}
                    @else
                        {!! Html::image(asset('/image/default100.jpg'), $m->name, ['class' => 'team-project__persons-avatar']) !!}
                    @endif
                    <div class="team-project__persons-name">{{ $m->name }}:</div>
                    <div class="team-project__persons-specialty">{{ $m->position }}</div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="team-project__curtail-expand clearfix">
        <a href="#" class="curtail-expand__link dropdown">
            <span class="caret"></span> розгорнути
        </a>
    </div>
    <div class="description">
        <div class="description__brief">
            <div class="description__brief-title">Breaf description:
                <span class="description__brief-text">
                    {{ $project['brief_desc'] }}
                </span>
            </div>
        </div>
        <div class="description__full">
            <div class="description__full-title">Full description:
                <span class="description__full-text">
                    {{ $project['full_desc'] }}
                </span>
            </div>
        </div>
    </div>
</section>
