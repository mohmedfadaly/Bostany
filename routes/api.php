<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NotificationsController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerCarsController;
use App\Http\Controllers\Api\CarsController;
use App\Http\Controllers\Api\CustomerDiagnosisHistoryController;
use App\Http\Controllers\Api\HelpCenterController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\MalfunctionsController;
use App\Http\Controllers\Api\ConsumptionsController;
use App\Http\Controllers\Api\MaintenancesController;
use App\Http\Controllers\Api\MaintenanceCentersController;
use App\Http\Controllers\Api\ConfigrationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


# notifications group
Route::group(['prefix'=>"notifications"],function () {
    Route::get('list',[NotificationsController::class,'list']);
    Route::post('delete',[NotificationsController::class,'delete'])->middleware('customer');
});

# contact group
Route::group(['prefix'=>"contact"],function () {
    Route::post('store',[ContactController::class,'store']);
});

# customer cars group
Route::group(['prefix'=>"customer/cars",'middleware'=>'customer'],function () {
    Route::post('store',[CustomerCarsController::class,'store']);
    Route::get('list',[CustomerCarsController::class,'list']);
    Route::post('delete',[CustomerCarsController::class,'delete']);
});

# cars group
Route::group(['prefix'=>"cars"],function () {
    Route::get('makers',[CarsController::class,'makers']);
    Route::get('models',[CarsController::class,'models']);
    Route::get('all-models',[CarsController::class,'all_models']);
});

# diagnosis group
Route::group(['prefix'=>"diagnosis",'middleware'=>'customer'],function () {
    Route::post('store',[CustomerDiagnosisHistoryController::class,'store']);
    Route::get('list',[CustomerDiagnosisHistoryController::class,'list']);
});

# consumptions group
Route::group(['prefix'=>"consumptions",'middleware'=>'customer'],function () {
    Route::post('store',[ConsumptionsController::class,'store']);
    Route::get('list',[ConsumptionsController::class,'list']);
});

# Maintenances group
Route::group(['prefix'=>"maintenances",'middleware'=>'customer'],function () {
    Route::post('store',[MaintenancesController::class,'store']);
    Route::get('list',[MaintenancesController::class,'list']);
});

# malfunctions group
Route::group(['prefix'=>"malfunctions",'middleware'=>'customer'],function () {
    Route::post('list',[MalfunctionsController::class,'list']);
});

# help center group
Route::group(['prefix'=>"help/center"],function () {
    Route::get('list',[HelpCenterController::class,'list']);
});

# faqs group
Route::group(['prefix'=>"faqs"],function () {
    Route::get('sections',[FaqController::class,'sections']);
    Route::get('list',[FaqController::class,'list']);
    Route::get('faqs',[FaqController::class,'faqs']);
});

# profile group
Route::group(['prefix'=>"profile"],function () {
    Route::get('cities',[ProfileController::class,'cities']);
    Route::get('profile',[ProfileController::class,'profile'])->middleware('customer');
    Route::post('update-profile',[ProfileController::class,'update_profile'])->middleware('customer');
    Route::post('update-data',[ProfileController::class,'update_data'])->middleware('customer');
    Route::post('confirm-update-data',[ProfileController::class,'confirm_update_data'])->middleware('customer');
    Route::get('delete-account',[ProfileController::class,'delete_account'])->middleware('customer');
});

# help center group
Route::group(['prefix'=>"maintenance/centers"],function () {
    Route::get('list',[MaintenanceCentersController::class,'list']);
});

# configration group
Route::group(['prefix'=>"configration"],function () {
    Route::get('list',[ConfigrationController::class,'list']);
});

Route::post('auth',[AuthController::class,'Auth']);
Route::post('check-code',[AuthController::class,'check_code']);