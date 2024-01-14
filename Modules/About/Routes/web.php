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
use Modules\About\Http\Controllers\AboutController;
use Modules\About\Http\Controllers\FileController;
use Modules\About\Http\Controllers\FuqController;
use Modules\About\Http\Controllers\OtherServiceController;
use Modules\About\Http\Controllers\OurFeatureController;
use Modules\About\Http\Controllers\OurJourneyController;
use Modules\About\Http\Controllers\OurServiceController;
use Modules\About\Http\Controllers\TeamController;

Route::group(['as'=>'about_us.','prefix'=>"admin/about_us",'group_sort'=>1,'controller'=> AboutController::class,"middleware"=>['roles','auth']],function(){

    Route::get('/section-about_us',[
        'uses'       =>"about_us",
        'title'      =>'محتوي عن الشركة',
        'subTitle'      =>'محتوي عن الشركة',
        'icon'       =>'<i class="fa fa-list"></i>',
        'subIcon'    =>'<i class="fa fa-list"></i>',
        'sort'    =>'3',
        'as'         =>'list',
        'q_a'        =>false,
        'child'      =>[

            'about_us.section_update',

        ],
    ]);


    Route::post('section-update/{id}',[
        'uses'       =>"section_update",
        'title'      =>' تعديل عن الشركة',
        'sort'    =>'3',
        'as'         =>'section_update',

    ]);

});



Route::group(['as'=>'services.','prefix'=>"admin/services",'group_sort'=>2],function () {
    Route::group(['controller'=> OurServiceController::class,"middleware"=>['roles','auth']],function(){

        Route::get('list',[
            'uses'       =>"index",
            'title'      =>' خدمتنا',
            'subTitle'   =>'قائمة خدمتنا',
            'icon'       =>'<i class="fa fa-plane"></i>',
            'subIcon'    =>'',
            'sort'    =>'3',
            'as'         =>'list',
            'q_a'        =>true,
            'child'      =>[
                'services.update',
            ],
        ]);


        Route::post('update/{id}',[
            'uses'       =>"update",
            'title'      =>'تحديث خدمة',
            'sort'    =>'3',
            'as'         =>'update',
        ]);

    });
});

Route::group(['as'=>'features.','prefix'=>"admin/features",'group_sort'=>2],function () {
    Route::group(['controller'=> OurFeatureController::class,"middleware"=>['roles','auth']],function(){

        Route::get('list',[
            'uses'       =>"index",
            'title'      =>' مميزاتنا',
            'subTitle'   =>'قائمة مميزاتنا',
            'icon'       =>'<i class="fa fa-star"></i>',
            'subIcon'    =>'',
            'as'         =>'list',
            'sort'    =>'3',
            'q_a'        =>true,
            'child'      =>[
                'features.update',
            ],
        ]);


        Route::post('update/{id}',[
            'uses'       =>"update",
            'title'      =>'تحديث ميزة',
            'sort'    =>'3',
            'as'         =>'update',
        ]);

    });
});

Route::group(['as'=>'fuq.','prefix'=>"admin/fuq",'group_sort'=>2],function () {
    Route::group(['controller'=> FuqController::class,"middleware"=>['roles','auth']],function(){

        Route::get('list',[
            'uses'       =>"index",
            'title'      =>' الاسئلة',
            'subTitle'   =>'قائمة الاسئلة',
            'icon'       =>'<i class="fa fa-file"></i>',
            'subIcon'    =>'',
            'sort'    =>'3',
            'as'         =>'list',
            // 'q_a'        =>true,
            'child'      =>[
                'fuq.update',
                'fuq.store',
                'fuq.delete',
            ],
        ]);


        Route::post('update/{id}',[
            'uses'       =>"update",
            'title'      =>'تحديث سؤال',
            'sort'    =>'3',
            'as'         =>'update',
        ]);

        Route::post('store',[
            'uses'       =>"store",
            'title'      =>'حفظ سؤال',
            'sort'    =>'3',
            'as'         =>'store',
        ]);


        Route::get('delete/{id}',[
            'uses'       =>"delete",
            'title'      =>'حذف سؤال',
            'sort'    =>'3',
            'as'         =>'delete',
        ]);

    });
});
Route::group(['as'=>'other_services.','prefix'=>"admin/other_services",'group_sort'=>2],function () {
    Route::group(['controller'=> OtherServiceController::class,"middleware"=>['roles','auth']],function(){

        Route::get('list',[
            'uses'       =>"index",
            'title'      =>' خدمات اخري',
            'subTitle'   =>'قائمة الخدمات',
            'icon'       =>'<i class="fa fa-list"></i>',
            'subIcon'    =>'',
            'as'         =>'list',
            'sort'    =>'3',
            'q_a'        =>true,
            'child'      =>[
                'other_services.update',
                'other_services.store',
                'other_services.delete',
            ],
        ]);


        Route::post('update/{id}',[
            'uses'       =>"update",
            'title'      =>'تحديث خدمة',
            'sort'    =>'3',
            'as'         =>'update',
        ]);

        Route::post('store',[
            'uses'       =>"store",
            'title'      =>'حفظ خدمة',
            'sort'    =>'3',
            'as'         =>'store',
        ]);


        Route::get('delete/{id}',[
            'uses'       =>"delete",
            'title'      =>'حذف خدمة',
            'sort'    =>'3',
            'as'         =>'delete',
        ]);

    });
});

// Route::get('/about-us', 'AboutFrontController@index')->name('about-us');
// Route::get('/all-team', 'AboutFrontController@team')->name('all-team');

