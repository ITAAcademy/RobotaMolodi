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


Route::get('/',['as' => 'head' ,'uses' => 'MainController@index']);


Route::get('home', 'HomeController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('nata', function(){return 'Get well, Nataly!';});




//Route::post('company/create',function(){
//    $rules = array("min:3");
//    $validator = Validator::make(Input::post('company_name'),$rules);
//
//    if($validator->fails()){
//        return Redirect::to('company/create') -> withErrors($validator);
//    }
//});
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Vacancy Route
$router->resource('vacancy','Vacancy\VacancyController');

Route::get('vacancy/{vacancy}/response',['as'=>'vacancy.response', 'uses' => 'Vacancy\VacancyController@response']);

Route::post('vacancy/{vacancy}/link',[ 'as'=>'vacancy.link', 'uses'=>'Vacancy\VacancyController@link']);

Route::post('vacancy/sendFile',[ 'as'=>'vacancy.sendFile', 'uses'=>'Vacancy\VacancyController@sendFile']);

Route::model('vacancy/{vacancy}/edit','App\Models\Vacancy');

Route::model('vacancy/{vacancy}/destroy','App\Models\Vacancy');

Route::get('vacancy/{vacancy}/destroy','Vacancy\VacancyController@destroy');

Route::post('vacancy/{vacancy}/update','Vacancy\VacancyController@update');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Company Route
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

$router->resource('cabinet','cabinet\CabinetController');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////



