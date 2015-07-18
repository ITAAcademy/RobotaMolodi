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

Route::get('/', 'MainController@index');

Route::get('home', 'HomeController@index');

//Route::get('vacancy/{id}',"VacancyController@view");

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('nata', function(){return 'Get well, Nataly!';});

$router->resource('vacancy','Vacancy\VacancyController');

$router->resource('company','Company\CompanyController');

Route::post('company/create',function(){
    $rules = array("min:3");
    $validator = Validator::make(Input::post('company_name'),$rules);

    if($validator->fails()){
        return Redirect::to('company/create') -> withErrors($validator);
    }
});


//Route::post('Vacancy/create',function()
//{
//    $rules = array("min:3");
//    $validator = Validator::make(Input::post('Position'),$rules);
//
//
//    if($validator->fails())
//    {
//
//        return Redirect::to('Vacancy/create') -> withErrors($validator);
//    }
//});

get('resumes', ['as'=>'resumes', 'uses'=>'ResumeController@index']);
$router->resource('resume', 'ResumeController'); //created oll routes of ResumeController(with create to destroy)

/*
Route::get('/', function() {
    return View::make('main.index');
});*/
//$router->resource('/','Vacancy\MainController');
Route::post('/', [ 'as'=>'', 'uses'=>'MainController@filter']);
