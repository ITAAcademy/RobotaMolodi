var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        './public/css/aboutUs/featherlight.gallery.min.css',
        './public/css/aboutUs/featherlight.min.css',
        './public/css/aboutUs/aboutUs.css',
        './public/css/slick/slick.css',
        './public/css/slick/slick-theme.css',
        './public/css/paginator/paginator.css',
        './public/css/errors/base.css',
        './public/css/style.css',
        './public/css/select2.css',
        './public/css/aboutUsShow.css',
        './public/css/cabinet.css',
        './public/css/creating.css',
        './public/css/navTab.css',
        './public/css/header.css',
        './public/css/project/create_project.css'
    ], './public/rm-styles.css');
    //mix.stylesIn('./public', './public/rm-styles.css');

    mix.scripts([
        './public/js/lib/CLDRPluralRuleParser/CLDRPluralRuleParser.js',
        './public/js/lib/jquery_i18n/jquery.i18n.js',
        './public/js/lib/jquery_i18n/jquery.i18n.messagestore.js',
        './public/js/lib/jquery_i18n/jquery.i18n.fallbacks.js',
        './public/js/lib/jquery_i18n/jquery.i18n.language.js',
        './public/js/lib/jquery_i18n/jquery.i18n.parser.js',
        './public/js/lib/jquery_i18n/jquery.i18n.emitter.js',
        './public/js/lib/jquery_i18n/jquery.i18n.emitter.bidi.js',
        './public/js/robotaMolodiUtils.js',
        './public/js/formatDate.js',
        './public/js/initMap.js',
        './public/js/slick/slick.min.js',
        './public/js/select2.full.js',
        './public/js/liker.js',
        './public/js/animateRightCol.js',
    ],'./public/rm-scripts.js');

    //mix.scriptsIn('./public', './public/rm-scripts.js')
});