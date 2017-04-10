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

//use Symfony\Component\HttpFoundation\Response;


Route::any('/',['as' => 'head' ,'uses' => 'MainController@showVacancies']);
Route::any('sresume',['as' => 'main.resumes','uses' => 'MainController@showResumes']);
Route::get('sconsult',['as' => 'main.consult','uses' => 'MainController@showConsults']);
Route::get('scompany',['as' => 'main.companies', 'uses' => 'MainController@showCompanies']);
/////
Route::any('showVacancies',['as' => 'main.showVacancies', 'uses' => 'MainController@showVacancies'] );
Route::any('showResumes',['as' => 'main.showResumes', 'uses' => 'MainController@showResumes'] );
Route::post('showConsult',['as' => 'main.showConsults', 'uses' => 'MainController@showConsult'] );


Route::get('vacancy/sortVacancies',['as' => 'vacancy.sortVacancies', 'uses' => 'Vacancy\VacancyController@sortVacancies']);

Route::get('home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
    Route::get('/',['as' => 'admin','uses' => 'Admin\AdminController@index']);
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('nata', function(){return 'Get well, Nataly!';});

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

Route::get('vacancy/{vacancy}/response/link',['as'=>'vacancy.response.link', 'uses' => 'Vacancy\ResponseController@link', 'middleware'=>'auth']);
Route::post('vacancy/{vacancy}/response/sendFile',['as'=>'vacancy.response.sendFile', 'uses' => 'Vacancy\ResponseController@sendFile', 'middleware'=>'auth']);
Route::post('vacancy/{vacancy}/response/sendResume',['as'=>'vacancy.response.sendResume', 'uses' => 'Vacancy\ResponseController@sendResume', 'middleware'=>'auth']);


Route::get('vacancy/{vacancy}/response',['as'=>'vacancy.response', 'uses' => 'Vacancy\VacancyController@response']);

Route::post('vacancy/link',[ 'as'=>'vacancy.link', 'uses'=>'Vacancy\VacancyController@link']);
Route::post('vacancy/sendresume',[ 'as'=>'vacancy.sendresume', 'uses'=>'Vacancy\VacancyController@sendResume']);
Route::post('vacancy/sendfile',[ 'as'=>'vacancy.sendfile', 'uses'=>'Vacancy\VacancyController@sendFile']);

Route::model('vacancy/{vacancy}/edit','App\Models\Vacancy');

Route::model('vacancy/{vacancy}/destroy','App\Models\Vacancy');

Route::get('vacancy/{vacancy}/destroy','Vacancy\VacancyController@destroy');

Route::any('vacancy/{vacancy}/update','Vacancy\VacancyController@update');

//show form to response for a vacancy via AJAX
Route::get('vacancy/{vacancy}/pasteFile', "Vacancy\\VacancyController@showPasteFileForm");

Route::get('vacancy/{vacancy}/pasteLink', "Vacancy\\VacancyController@showPasteLinkForm");

Route::get('vacancy/{vacancy}/pasteResume', "Vacancy\\VacancyController@showPasteResumeForm");
Route::post('vacancy/block','Vacancy\\VacancyController@block');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Company Route
Route::get('showCompany','Company\CompanyController@showCompany');
Route::model('company/{company}/destroy','App\Models\Company');
Route::get('scompany/company_vac/{id}',['as' => 'scompany.company_vacancies' ,'uses' => 'Company\CompanyController@showCompanyVacancies']);
//Route::get('scompany/company_vac/vacancy/{id}',['as'=>'vacancy.show', 'uses' => 'Vacancy\VacancyController@show']);

$router->resource('company','Company\CompanyController');

Route::get('company/{company}/destroy','Company\CompanyController@destroy');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Resume Route
Route::get('resume/create','ResumeController@create');
Route::get('resume/{resume}/destroy','ResumeController@destroy');
Route::post('resume/deletephoto','ResumeController@deletePhoto');
Route::post('resume/block','ResumeController@block');

//Route::model('resume/{resume}/destroy','App\Models\Resume');
get('resumes', ['as'=>'resumes', 'uses'=>'ResumeController@index']);
$router->resource('resume', 'ResumeController'); //created oll routes of ResumeController(with create to destroy)

Route::any('resume/{resume}/send_message', 'ResumeController@send_message');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Other Route
//Route::get('/filter',['as' => 'filter' , 'uses' => 'MainController@filters']);
//
//Route::post('filterVacancy',['as' => 'filter.vacancy' , 'uses' => 'MainController@filterVacancy']);

$router->resource('cabinet','cabinet\CabinetController');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ProfOrientation
Route::get('testValidate','ProfOrientationController@testValidate');
Route::get('proforient','ProfOrientationController@index');
Route::post('proforient/start',['as' => 'proforient.start','uses' => 'ProfOrientationController@StartTest']);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//UploadFile
Route::post('upfile', ['as'=>'upfile', 'uses' => 'UploadFile@upFile']);
Route::post('upimg', ['as'=>'upimg', 'uses' => 'UploadFile@editImg']);

//staticHeaderPages
Route::get('aboutus', function () {
    return view('staticHeaderPages.aboutUs');
});
Route::get('contacts', function () {
    return view('staticHeaderPages.contacts');
});

Route::get('filter_vacancies',['as'=>'filter.vacancies','uses'=>'FilterController@vacancies']);
Route::get('filter_resumes',['as'=>'filter.resumes','uses'=>'FilterController@resumes']);
Route::get('filter_companies',['as'=>'filter.companies','uses'=>'FilterController@companies']);
Route::resource('/news','NewsController');
Route::get('companies/{company}', 'Company\CompanyController@showCompanyVacancies');