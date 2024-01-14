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
use Modules\Setting\Http\Controllers\SettingController;

Route::group(['as'=>'setting.','prefix'=>"admin/setting",'group_sort'=>2],function () {
    Route::group(['controller'=> SettingController::class,"middleware"=>['roles','auth']],function(){

        Route::get('list',[
            'uses'       =>"index",
            'title'      =>' الإعدادات',
            'subTitle'   =>'الإعدادات',
            'icon'       =>'<i class="feather icon-settings"></i>',
            'subIcon'    =>'',
            'sort'    =>'5',
            'as'         =>'list',
            'q_a'        =>true,
            'child'      =>[
                'setting.update',

            ],
        ]);
        Route::post('update',[
            'uses'       =>"update",
            'title'      =>'تحديث الإعدادات',
            'sort'    =>'5',
            'as'         =>'update',
        ]);


    });
});
