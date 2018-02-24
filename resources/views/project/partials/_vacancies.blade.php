<section class="vacancies">
    <h1 class="vacancies__tittle">Вакансії на проект: {{ $project->name }}</h1>
    <div class="vacancies__text">{{ trans('form.branch') }}: {{ $project->industry->name }}</div>
    <div class="about-company" id="about_company__id">
        <h2 class="about-company__tittle" >Про компанію</h2>
        <div class="about-company__text">
            {{ $project['company_about'] }}
        </div>
    </div>
</section>
