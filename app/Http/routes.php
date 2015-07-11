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

$router->resource('Vacancy','Vacancy\VacancyController');

$router->resource('Company','Company\CompanyController');

Route::post('Company/create',function(){
    $rules = array("min:3");
    $validator = Validator::make(Input::post('companyName'),$rules);

    if($validator->fails()){
        return Redirect::to('Company/create') -> withErrors($validator);
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