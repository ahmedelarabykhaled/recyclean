<?php
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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('readfile', 'ReadFileController@readfile');


Route::post('savefile','FileSystemController@savefile');

Route::get('logout', '\App\Http\Controllers\Auth\LogoutController@logout');

Route::group(["prefix" => "admin" , "middleware" => "auth"], function () {
    Route::get('/','Admin\DashboardController@index')->name('admin');
    Route::resources([
        'regions' => 'Admin\RegionsController',
        'oilClients' => 'Admin\OilClientsController',
        'trashClients' => 'Admin\TrashClientsController'
    ]);
    Route::get('oilGramToPoint','Admin\OilController@oilGramToPointView');
    Route::post('oilGramToPoint','Admin\OilController@oilGramToPointSave');

    Route::get('trashSubscription','Admin\TrashController@trashSubscriptionView');
    Route::post('trashSubscription','Admin\TrashController@trashSubscriptionSave');

    Route::get('paySubscription/{id}','Admin\TrashClientsController@paySubscriptionForm')->name('paySubscription');
    Route::post('paySubscription/{id}','Admin\TrashClientsController@paySubscriptionSave')->name('paySubscription');

});
