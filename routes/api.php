<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(
    [ 'namespace' => 'App\Http\Controllers\Api' ,'middleware'=>'auth:sanctum'],function() {

        Route::controller(CustomerController::class)->group(function (){
            Route::get('customers','index');
            Route::post('customer/store','store');
            Route::get('customer/{id}','show');
            Route::put('customer/update/{id}','update');
            Route::delete('customer/destroy/{id}','destroy');
            Route::post('customer/export','export');

        });

        Route::controller(NotesController::class)->group(function (){
            Route::post('customer/notes/store','store');
            Route::get('customer/{customer_id}/note/{id}','show');
            Route::put('customer/update/{customer_id}/note/{id}','update');
            Route::delete('customer/destroy/{customer_id}/note/{id}','destroy');
            Route::get('customers/{id}/note','index');
        });

        Route::controller(ProjectController::class)->group(function (){
            Route::get('projects','index');
            Route::post('project/store','store');
            Route::get('project/{id}','show');
            Route::put('project/update/{id} ','update');
            Route::delete('project/destroy/{id}','destroy');
        });

});

Route::post('user/create','App\Http\Controllers\UserController@store');
