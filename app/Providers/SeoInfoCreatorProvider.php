<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Composers\Show\Company;
use App\Http\Composers\Show\Vacancy;
use App\Http\Composers\Show\Resume;
use App\Http\Composers\Show\SeoInfo\FromCompany;
use App\Http\Composers\Show\SeoInfo\FromResume;
use App\Http\Composers\Show\SeoInfo\FromVacancy;
use App\Http\Composers\Show\SeoInfo\CreatorContract;

class SeoInfoCreatorProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(Resume::class)
            ->needs(CreatorContract::class)
            ->give(function () {
                return new FromResume();
            });

        $this->app->when(Company::class)
            ->needs(CreatorContract::class)
            ->give(function () {
                return new FromCompany();
            });

        $this->app->when(Vacancy::class)
            ->needs(CreatorContract::class)
            ->give(function () {
                return new FromVacancy();
            });
    }
}
