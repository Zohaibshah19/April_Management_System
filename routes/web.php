<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});





Route::get('/home', 'HomeController@index')->name('home');
Route::get('/forget-password', 'Auth\ForgotPasswordController@getEmail');
Route::post('/forget-password', 'Auth\ForgotPasswordController@postEmail');

Route::get('/reset-password/{token}', 'Auth\ResetPasswordController@getPassword');
Route::post('/reset-password', 'Auth\ResetPasswordController@updatePassword');
Route::resource('categories','CategoryController');
Route::resource('locations','LocationsController');
Route::resource('severitys','SeveritysController');
Route::resource('tasks','TasksController');
Route::resource('designations','DesignationsController');
Route::resource('employees','EmployeesController');

Route::resource('incidents','IncidentsController');
Route::get('/dropdown','IncidentsController@index');
Route::get('/dropdown-data','IncidentsController@data');


//Route::get('/changeStatus',[LocationsController::class,'store',])->name('changeStatus');   

// Route::get('/forgot_password','ForgotPasswordController@forgot');
// Route::post('/forgot_password','ForgotPasswordController@password');

Auth::routes();



