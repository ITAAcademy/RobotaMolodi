<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Redirect;
use JsonSchema\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Vacancy;

Route::get('language/{lang}', function($lang){

    if (in_array($lang, Config::get('app.locales'))) {
        $cookie = cookie()->forever('locale', $lang);
        return redirect()->back()->withCookie($cookie);
    }else{
        return redirect()->back();
    }

});
Route::get('/js/lang.js', function () {
    $strings = Cache::rememberForever('lang.js', function () {
        $lang = config('app.locale');

        $files   = glob(resource_path('lang/' . $lang . '/*.php'));
        $strings = [];

        foreach ($files as $file) {
            $name           = basename($file, '.php');
            $strings[$name] = require $file;
        }

        return $strings;
    });

    header('Content-Type: text/javascript');
    echo('window.i18n = ' . json_encode($strings) . ';');
    exit();
});

Route::post('auth/loginValidator', ['as' => 'auth.loginValidator', 'uses' => 'Auth\AuthController@postLoginValidator']);

//sso oAuth2.0 API

Route::any('auth/intita', 'oAuthApiController@intitaLogin');
Route::any('auth/intitaAuth', 'oAuthApiController@intitaAuth');
Route::post('auth/ajaxValidation', ['as' => 'auth.ajaxValidation', 'uses' => 'Auth\AuthController@ajaxValidation']);

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('login/{provider}','SocialAuthController@redirectToProvider');
Route::get('/handleProviderCallback', 'SocialAuthController@handleProviderCallback');

Route::any('/',['as' => 'head' ,'uses' => 'MainController@showVacancies']);
Route::any('sresume',['as' => 'main.resumes','uses' => 'MainController@showResumes']);
//Route::get('sconsult',['as' => 'main.consult','uses' => 'ConsultsController@showConsults']);
Route::get('consults', 'ConsultsController@index');
Route::get('scompany',['as' => 'main.companies', 'uses' => 'MainController@showCompanies']);
/////
Route::any('showVacancies',['as' => 'main.showVacancies', 'uses' => 'MainController@showVacancies'] );
Route::any('showResumes',['as' => 'main.showResumes', 'uses' => 'MainController@showResumes'] );
Route::post('showConsult',['as' => 'main.showConsults', 'uses' => 'ConsultsController@showConsult'] );
//Route::resource('/sconsult', 'ConsultsController'); //created all routes of ConsultController

Route::get('vacancy/sortVacancies',['as' => 'vacancy.sortVacancies', 'uses' => 'Vacancy\VacancyController@sortVacancies']);

Route::get('home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function (){

    Route::get('/',['as' => 'admin','uses' => 'Admin\AdminController@index']);

    Route::resource('/news', 'Admin\NewsController');
    Route::resource('/users', 'Admin\UsersController');
    Route::get('/users/{id}/changeRole',['as'=>'changeRole', 'uses'=>'Admin\UsersController@change'] );
    Route::get('/users/{id}/changeRole',['as'=>'changeRoleToAdwiser', 'uses'=>'Admin\UsersController@switchToAdwiser'] );
    Route::resource('/slider', 'Admin\SliderController');
    Route::resource('/industry', 'Admin\IndustryController');
    Route::resource('/companies', 'Admin\CompaniesController');
    Route::post('/companies/{id}/set_un_block', ['as' => 'setCompanyUnBlock', 'uses' => 'Admin\CompaniesController@setUnBlock']);
    Route::resource('/vacancies', 'Admin\VacanciesController');
    Route::post('/vacancies/{id}/set_un_block', ['as' => 'setVacancyUnBlock', 'uses' => 'Admin\VacanciesController@setUnBlock']);
    Route::resource('/resumes', 'Admin\ResumesController');
    Route::post('/resumes/{id}/set_un_block', ['as' => 'setResumeUnBlock', 'uses' => 'Admin\ResumesController@setUnBlock']);
    Route::post('/industry/set_main', ['as'=>'setMainIndustry', 'uses'=>'Admin\IndustryController@setMainIndustry']);
    Route::post('save/category', ['as' => 'saveCategory', 'uses' => 'Admin\SliderController@saveCategory']);
    Route::get('/news/updatePublished/{news_id}', 'Admin\NewsController@updatePublished');
    Route::get('/sliders/shiftPublished/{slider_id}', 'Admin\SliderController@shiftPublished');
    Route::post('/slider/{slider_id}/positionUp', ['as' => 'slider.position.up', 'uses' => 'Admin\SliderController@positionUp']);
    Route::post('/slider/{slider_id}/positionDown', ['as' => 'slider.position.down', 'uses' => 'Admin\SliderController@positionDown']);
    Route::get('/sliders/updatePublished/{slider_id}', 'Admin\SliderController@updatePublished');
    Route::resource('/seo-module', 'Admin\SeoModuleController');
    Route::resource('/projects', 'Admin\ProjectsController');
    Route::resource('/about-us','Admin\AboutUsesController');
    Route::post('upartimg', ['as'=>'upartimg', 'uses' => 'UploadFile@addArticleContent']);
});

Route::post('/slider/category', ['as' => 'slidersByCategory','uses' => 'SliderController@byCategory']);

//------------SHOW NEWS------------------------------------------------------
Route::resource('news', 'NewsController', ['only' => ['index', 'show']]);
Route::resource('news', 'NewsController', ['except' => ['create', 'store', 'update', 'destroy', 'edit']]);
//---------------------------------------------------------------------------

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


//////Search Route//////////////
Route::any('searchVacancies',['as' => 'searchVacancy' ,'uses' => 'SearchController@showVacancies']);
Route::any('searchResumes',['as' => 'searchResume' ,'uses' => 'SearchController@showResumes']);
Route::any('searchCompanies',['as' => 'searchCompany' ,'uses' => 'SearchController@showCompanies_search']);
//Route::get('searchVacancies',['as' => 'searchV' ,'uses' => 'SearchController@showVacancies']);
//Route::get('searchResumes',['as' => 'searchR' ,'uses' => 'SearchController@showResumes']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Vacancy Route
Route::post('vacancyAnswer','Vacancy\VacancyController@sendFile');
$router->resource('vacancy','Vacancy\VacancyController');

Route::get('vacancy/search/byIndustries',['as'=>'vacancy.search.byIndustries', 'uses' => 'Vacancy\SearchController@byIndustries']);

Route::get('vacancy/{vacancy}/response/link',['as'=>'vacancy.response.link', 'uses' => 'Vacancy\ResponseController@link', 'middleware'=>'auth']);
Route::post('vacancy/{vacancy}/response/sendFile',['as'=>'vacancy.response.sendFile', 'uses' => 'Vacancy\ResponseController@sendFile', 'middleware'=>'auth']);
Route::post('vacancy/{vacancy}/response/sendResume',['as'=>'vacancy.response.sendResume', 'uses' => 'Vacancy\ResponseController@sendResume', 'middleware'=>'auth']);
Route::post('company/{company}/response/sendFile',['as'=>'company.response.sendFile', 'uses' =>'Company\ResponseController@sendFile', 'middleware'=>'auth']);
Route::post('company/{company}/response/sendResume',['as'=>'company.response.sendResume', 'uses' =>'Company\ResponseController@sendResume', 'middleware'=>'auth']);
Route::post('vacancy/{id}/updateDate',['as' => 'updateVacancyDate', 'uses' => 'Vacancy\VacancyController@updatePablishDate']);
Route::post('resume/{id}/updateDate',['as' => 'updateResumeDate', 'uses' => 'ResumeController@updatePablishDate']);

//liker
Route::get('company/{id}/likeData',['as' => 'com.rate', 'uses' => 'Company\CompanyController@rateCompany', 'middleware'=>'auth']);
Route::get('vacancy/{id}/likeData',['as' => 'vac.rate', 'uses' => 'Vacancy\VacancyController@rateVacancy', 'middleware'=>'auth']);
Route::get('resume/{id}/likeData',['as' => 'res.rate', 'uses' => 'ResumeController@rateResume', 'middleware'=>'auth']);

Route::get('vacancy/{vacancy}/response',['as'=>'vacancy.response', 'uses' => 'Vacancy\VacancyController@response']);

Route::post('vacancy/link',[ 'as'=>'vacancy.link', 'uses'=>'Vacancy\VacancyController@link']);
Route::post('vacancy/sendresume',[ 'as'=>'vacancy.sendresume', 'uses'=>'Vacancy\VacancyController@sendResume']);
Route::post('vacancy/sendFile',[ 'as'=>'vacancy.sendFile', 'uses'=>'Vacancy\VacancyController@sendFile']);

Route::model('vacancy/{vacancy}/edit','App\Models\Vacancy');

Route::model('vacancy/{vacancy}/destroy','App\Models\Vacancy');

Route::get('vacancy/{vacancy}/destroy',['as' =>'vacancyDestroy', 'uses' => 'Vacancy\VacancyController@destroy']);

Route::any('vacancy/{vacancy}/update','Vacancy\VacancyController@update');

//show form to response for a vacancy via AJAX
Route::get('vacancy/{vacancy}/pasteFile', "Vacancy\\VacancyController@showPasteFileForm");

Route::get('vacancy/{vacancy}/pasteLink', "Vacancy\\VacancyController@showPasteLinkForm");

Route::get('vacancy/{vacancy}/pasteResume', "Vacancy\\VacancyController@showPasteResumeForm");
Route::post('vacancy/block','Vacancy\VacancyController@block');
Route::get('vacancy/filter/showVacancies', ['as' => 'vacancy.showVacancies', 'uses' => 'Vacancy\VacancyController@showVacancies']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Company Route
Route::get('showCompany','Company\CompanyController@showCompany');
Route::model('company/{company}/destroy','App\Models\Company');
Route::get('scompany/company_vac/{id}',['as' => 'scompany.company_vacancies' ,'uses' => 'Company\CompanyController@showCompanyVacancies']);
Route::get('company/{company}/formSendFileCompany', ['as'=>'scompany.company_formSendFile', 'uses' => 'Company\CompanyController@showFormSendFile']);
Route::get('company/{company}/formSendResumeCompany', ['as'=>'scompany.company_formSendResume', 'uses' => 'Company\CompanyController@showFormSendResume']);
//Route::get('company/{company}/showComment',['as'=>'scompany.company_comments', 'uses'=>'Company\CommentsController@showComments']);
//Route::post('company/{company}/showComment',['as'=>'scompany.company', 'uses'=>'Company\CommentsController@showComments']);
//Route::post('company/{company}/comments',['as'=>'scompany.company_allComments', 'uses'=>'Company\CommentsController@store']);
Route::resource('company.response','Company\CommentsController');
Route::get('comment/{id}', 'Company\CommentsController@getEditedComment');
//Route::get('scompany/company_vac/vacancy/{id}',['as'=>'vacancy.show', 'uses' => 'Vacancy\VacancyController@show']);

$router->resource('company','Company\CompanyController');

Route::get('company/{company}/destroy',['as'=>'companyDestroy', 'uses' => 'Company\CompanyController@destroy']);
Route::post('company/{company}/block', 'Company\CompanyController@block');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Resume Route
Route::get('resume/create','ResumeController@create');
Route::get('resume/{resume}/destroy',['as'=>'resumeDestroy','uses' => 'ResumeController@destroy']);
Route::post('resume/deletephoto','ResumeController@deletePhoto');
Route::post('resume/block','ResumeController@block');
Route::get('resume/filter/showResumes', ['as' => 'resume.showResumes', 'uses' => 'ResumeController@showResumes']);
//Route::model('resume/{resume}/destroy','App\Models\Resume');
Route::get('resumes', ['as'=>'resumes', 'uses'=>'ResumeController@index','middleware' => 'auth']);
$router->resource('resume', 'ResumeController'); //created all routes of ResumeController(with create to destroy)

Route::any('resume/{resume}/send_message', 'ResumeController@send_message');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Other Route
//Route::get('/filter',['as' => 'filter' , 'uses' => 'MainController@filters']);
//
Route::get('/consult/{id}/events', 'ConsultEventsController@show');
Route::get('/events', 'ConsultEventsController@index');
//Route::post('filterVacancy',['as' => 'filter.vacancy' , 'uses' => 'MainController@filterVacancy']);

Route::group(['middleware' => 'auth', 'after' => 'no-cache'], function()
{
    Route::get('myresumes/{id}',['as' => 'cabinet.my_resumes' ,'uses' => 'cabinet\CabinetController@showMyResumes']);
    Route::get('myvacancies/{id}',['as' => 'cabinet.my_vacancies' ,'uses' => 'cabinet\CabinetController@showMyVacancies']);
    Route::get('project/myaddvacancies',['as' => 'cabinet.my_addvacancies' ,'uses' => 'cabinet\CabinetController@showAddVacancies']);
    Route::get('project/myaddvacancy/{id}',['as' => 'cabinet.my_addvacancy' ,'uses' => 'Vacancy\VacancyController@getVacancy']);
    Route::get('mycompanies/{id}',['as' => 'cabinet.my_companies' ,'uses' => 'cabinet\CabinetController@showMyCompanies']);
    Route::get('myprojects/{id}',['as' => 'cabinet.my_projects' ,'uses' => 'cabinet\CabinetController@showMyProjects']);
    Route::post('myresumes/{id}/updateDate',['as' => 'updateCabinetResumeDate', 'uses' => 'ResumeController@updatePablishDate']);

    Route::get('project/{project}/destroy',['as'=>'projectDestroy','uses' => 'ProjectController@destroy']);

    Route::resource('cabinet','cabinet\CabinetController');
    Route::resource('user','UserController', ['only' => ['edit','update']]);
    Route::post('user/{id}/deleteAvatar',[
        'as' => 'deleteAvatar',
        'uses' => 'UserController@deleteAvatar']
    );
    Route::resource('/sconsult', 'ConsultsController');
});

Route::filter('no-cache',function($route, $request, $response){
    $response -> headers -> set('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');
    $response -> headers -> set('Pragma', 'no-cache');
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ProfOrientation
Route::get('testValidate','ProfOrientationController@testValidate');
Route::get('proforient','ProfOrientationController@index');
Route::post('proforient/start',['as' => 'proforient.start','uses' => 'ProfOrientationController@StartTest']);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//UploadFile
Route::post('upimg', ['as'=>'upimg', 'uses' => 'UploadFile@editResumeImg']);
Route::post('upimgcom', ['as'=>'upimgcom', 'uses' => 'UploadFile@editCompanyImg']);
Route::post('deleleimg', ['as'=>'deleteimg', 'uses' => 'UploadFile@deleteResumeImg']);

//staticHeaderPages
Route::get('about_us', function () {
    return view('staticHeaderPages.aboutUs');

});
Route::get('contacts', function () {
    return view('staticHeaderPages.contacts');
});
Route::get('policy', ['as' => 'policy', function () {
    return view('staticHeaderPages.politics_uses');
}]);

Route::get('companies/{company}', 'Company\CompanyController@showCompanyVacancies');

Route::resource('project', 'ProjectController');

Route::get('unavailable', 'ClosureController@unavailableService');