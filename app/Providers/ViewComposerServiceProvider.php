<?php

namespace App\Providers;

use App\Models\SeoInfo;
use Illuminate\Support\Facades\URL;
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
        $this->composeSeoMetaTags();
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
    private function composeSeoMetaTags(){
        view()->composer('newDesign.seoModule.index' , 'App\Http\Composers\SeoMetaTagsComposer');
    }
}
