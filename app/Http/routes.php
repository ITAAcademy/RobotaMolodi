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

Route::get('home', 'HomeController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('nata', function(){return 'Get well, Nataly!';});




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Vacancy Route
Route::post('vacancyAnswer','Vacancy\VacancyController@sendFile');
$router->resource('vacancy','Vacancy\VacancyController');

Route::get('vacancy/{vacancy}/response',['as'=>'vacancy.response', 'uses' => 'Vacancy\VacancyController@response']);

Route::post('vacancy/{vacancy}/link',[ 'as'=>'vacancy.link', 'uses'=>'Vacancy\VacancyController@link']);
Route::post('vacancy/{vacancy}/sendResume',[ 'as'=>'vacancy.sendResume', 'uses'=>'Vacancy\VacancyController@sendResume']);

Route::post('vacancy/sendFile',[ 'as'=>'vacancy.sendFile', 'uses'=>'Vacancy\VacancyController@sendFile']);

Route::model('vacancy/{vacancy}/edit','App\Models\Vacancy');

Route::model('vacancy/{vacancy}/destroy','App\Models\Vacancy');

Route::get('vacancy/{vacancy}/destroy','Vacancy\VacancyController@destroy');

Route::post('vacancy/{vacancy}/update','Vacancy\VacancyController@update');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Company Route
Route::get('showCompany','Company\CompanyController@showCompany');
Route::model('company/{company}/destroy','App\Models\Company');

$router->resource('company','Company\CompanyController');

Route::get('company/{company}/destroy','Company\CompanyController@destroy');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Resume Route
Route::get('resume/{resume}/destroy','ResumeController@destroy');

//Route::model('resume/{resume}/destroy','App\Models\Resume');
get('resumes', ['as'=>'resumes', 'uses'=>'ResumeController@index']);
$router->resource('resume', 'ResumeController'); //created oll routes of ResumeController(with create to destroy)

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