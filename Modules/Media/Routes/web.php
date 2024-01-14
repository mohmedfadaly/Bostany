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
use Modules\Media\Http\Controllers\GallaryController;
use Modules\Media\Http\Controllers\NewsController;

Route::group(['as'=>'news.','prefix'=>"admin/news",'group_sort'=>2],function () {
    Route::group(['controller'=> NewsController::class,"middleware"=>['roles','auth']],function(){

        Route::get('list',[
            'uses'       =>"index",
            'title'      =>' المقالات',
            'subTitle'   =>'قائمة المقالات',
            'icon'       =>'<i class="fa fa-newspaper-o"></i>',
            'subIcon'    =>'',
            'sort'    =>'4',
            'as'         =>'list',
            'q_a'        =>true,
            'child'      =>[
                'news.add',
                'news.edit',
                'news.update',
                'news.store',
                'news.delete',
            ],
        ]);

        Route::get('add',[
            'uses'       =>"add",
            'title'      =>'اضافة مقال',
            'as'         =>'add',
            'sort'    =>'4',
            'icon'       =>'<i class="fa fa-plus"></i>',
            'hasFather'  =>true,

        ]);
        Route::get('edit/{id}',[
            'uses'       =>"edit",
            'sort'    =>'4',
            'title'      =>'تعديل مقال',
            'as'         =>'edit',
        ]);

        Route::post('update/{id}',[
            'uses'       =>"update",
            'title'      =>'تحديث مقال',
            'sort'    =>'4',
            'as'         =>'update',
        ]);

        Route::post('store',[
            'uses'       =>"store",
            'title'      =>'حفظ مقال',
            'sort'    =>'4',
            'as'         =>'store',
        ]);


        Route::get('delete/{id}',[
            'uses'       =>"delete",
            'title'      =>'حذف مقال',
            'sort'    =>'4',
            'as'         =>'delete',
        ]);

    });
});


Route::group(['as'=>'gallary.','prefix'=>"admin/gallary",'group_sort'=>2],function () {
    Route::group(['controller'=> GallaryController::class,"middleware"=>['roles','auth']],function(){

        Route::get('list',[
            'uses'       =>"index",
            'title'      =>' معرض اعمالنا',
            'subTitle'   =>'قائمة الاعمال',
            'icon'       =>'<i class="fa fa-birthday-cake"></i>',
            'subIcon'    =>'',
            'sort'    =>'4',
            'as'         =>'list',
            'q_a'        =>true,
            'child'      =>[
                'gallary.update',
                'gallary.DeleteImage',
            ],
        ]);

        Route::post('update',[
            'uses'       =>"update",
            'title'      =>'تحديث اعمال',
            'sort'       =>'4',
            'as'         =>'update',
        ]);

        Route::post('DeleteImage',[
            'uses'       =>"DeleteImage",
            'title'      =>'حذف صورة عمل',
            'sort'       =>'4',
            'as'         =>'DeleteImage',
        ]);


    });
});


// Route::get('/search', 'MediaFrontController@search')->name('search');
// Route::get('/media-center', 'MediaFrontController@index')->name('media-center');
// Route::get('/show-news/{id}', 'MediaFrontController@details')->name('show-news');
