<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'newDesign.seoModule.index' , 'App\Http\Composers\SeoMetaTagsComposer'
        );

        View::composer(
            'Resume.show' , 'App\Http\Composers\Show\Resume'
        );

        View::composer(
            'vacancy.show' , 'App\Http\Composers\Show\Vacancy'
        );

        View::composer(
            'newDesign.company.show' , 'App\Http\Composers\Show\Company'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /*
     * Compose the SeoMetaTags for current page
     *
     */
//    private function composeSeoMetaTags(){
//        view()->composer('newDesign.seoModule.index' , 'App\Http\Composers\SeoMetaTagsComposer');
//    }
}
