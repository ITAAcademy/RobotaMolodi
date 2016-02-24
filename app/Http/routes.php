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


Route::get('/',['as' => 'head' ,'uses' => 'MainController@showVacancies']);
Route::get('sresume',['as' => 'main.resumes','uses' => 'MainController@showResumes']);
Route::get('sconsult',['as' => 'main.consult','uses' => 'MainController@showConsults']);
/////
Route::post('showVacancies',['as' => 'main.showVacancies', 'uses' => 'MainController@showVacancies'] );
Route::post('showResumes',['as' => 'main.showResumes', 'uses' => 'MainController@showResumes'] );
Route::post('showConsult',['as' => 'main.showConsults', 'uses' => 'MainController@showConsult'] );
/////
Route::get('sortVacancies',['as' => 'sortVacancies', 'uses' => 'Vacancy\VacancyController@sortVacancies']);
Route::get('sortResumes',['as' => 'sortResumes', 'uses' => 'ResumeController@sortResumes']);
/////
Route::get('vacancy/sortVacancies',['as' => 'vacancy.sortVacancies', 'uses' => 'Vacancy\VacancyController@sortVacancies']);

Route::get('home', 'HomeController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('nata', function(){return 'Get well, Nataly!';});

//////Search Route//////////////
Route::any('searchVacancies',['as' => 'searchV' ,'uses' => 'SearchController@showVacancies']);
Route::any('searchResumes',['as' => 'searchR' ,'uses' => 'SearchController@showResumes']);
//Route::get('searchVacancies',['as' => 'searchV' ,'uses' => 'SearchController@showVacancies']);
//Route::get('searchResumes',['as' => 'searchR' ,'uses' => 'SearchController@showResumes']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Vacancy Route
Route::post('vacancyAnswer','Vacancy\VacancyController@sendFile');
$router->resource('vacancy','Vacancy\VacancyController');

Route::get('vacancy/{vacancy}/response',['as'=>'vacancy.response', 'uses' => 'Vacancy\VacancyController@response']);

Route::post('vacancy/link',[ 'as'=>'vacancy.link', 'uses'=>'Vacancy\VacancyController@link']);
Route::post('vacancy/sendresume',[ 'as'=>'vacancy.sendresume', 'uses'=>'Vacancy\VacancyController@sendResume']);
Route::post('vacancy/sendfile',[ 'as'=>'vacancy.sendfile', 'uses'=>'Vacancy\VacancyController@sendFile']);

Route::model('vacancy/{vacancy}/edit','App\Models\Vacancy');

Route::model('vacancy/{vacancy}/destroy','App\Models\Vacancy');

Route::get('vacancy/{vacancy}/destroy','Vacancy\VacancyController@destroy');

Route::post('vacancy/{vacancy}/update','Vacancy\VacancyController@update');

//show form to response for a vacancy via AJAX
Route::get('vacancy/{vacancy}/pasteFile', "Vacancy\\VacancyController@showPasteFileForm");

Route::get('vacancy/{vacancy}/pasteLink', "Vacancy\\VacancyController@showPasteLinkForm");

Route::get('vacancy/{vacancy}/pasteResume', "Vacancy\\VacancyController@showPasteResumeForm");
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Company Route
Route::get('showCompany','Company\CompanyController@showCompany');
Route::model('company/{company}/destroy','App\Models\Company');

$router->resource('company','Company\CompanyController');

Route::get('company/{company}/destroy','Company\CompanyController@destroy');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Resume Route
Route::get('resume/{resume}/create','ResumeController@create');
Route::get('resume/{resume}/destroy','ResumeController@destroy');

//Route::model('resume/{resume}/destroy','App\Models\Resume');
get('resumes', ['as'=>'resumes', 'uses'=>'ResumeController@index']);
$router->resource('resume', 'ResumeController'); //created oll routes of ResumeController(with create to destroy)

Route::any('resume/{resume}/send_message', 'ResumeController@send_message');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Other Route
Route::get('/filter',['as' => 'filter' , 'uses' => 'MainController@filters']);

Route::post('filterVacancy',['as' => 'filter.vacancy' , 'uses' => 'MainController@filterVacancy']);

$router->resource('cabinet','cabinet\CabinetController');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ProfOrientation
Route::get('testValidate','ProfOrientationController@testValidate');
Route::get('proforient','ProfOrientationController@index');
Route::post('proforient/start',['as' => 'proforient.start','uses' => 'ProfOrientationController@StartTest']);
Route::post('proforient/start',['as' => 'proforient.start','uses' => 'ProfOrientationController@StartTest']);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//UploadFile
//Route::post('upfile', ['as'=>'upfile', 'uses'=>'UploadFile@upFile']);