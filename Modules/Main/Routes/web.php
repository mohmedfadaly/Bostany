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
use Modules\Main\Http\Controllers\ChangeLocalizationController;
use Modules\Main\Http\Controllers\SectionController;

Route::group(['as'=>'sections.','prefix'=>"admin/sections",'group_sort'=>1,'controller'=> SectionController::class,"middleware"=>['roles','auth']],function(){

    Route::get('/section-header',[
        'uses'       =>"section_header",
        'title'      =>'محتوي الرئيسية',
        'subTitle'   =>'القسم الاول في الرئيسية',
        'icon'       =>'<i class="fa fa-list"></i>',
        'subIcon'    =>'',
        'sort'    =>'2',
        'as'         =>'list',
        'q_a'        =>false,
        'child'      =>[
            'sections.section_services',
            'sections.section_features',
            'sections.section_gallary',
            'sections.section_fuq',
            'sections.section_article',
            'sections.section_contact',
            'sections.section_footer',
            'sections.section_update',

        ],
    ]);

    Route::get('section-services',[
        'uses'       =>"section_services",
        'title'      =>' مقدمة خدمتنا',
        'as'         =>'section_services',
        'icon'       =>'<i class="fa fa-list"></i>',
        'sort'    =>'2',
        'hasFather'  =>true,

    ]);

    Route::get('section-features',[
        'uses'       =>"section_features",
        'title'      =>' مقدمة مميزتنا',
        'as'         =>'section_features',
        'icon'       =>'<i class="fa fa-list"></i>',
        'sort'    =>'2',
        'hasFather'  =>true,

    ]);

    Route::get('section-gallary',[
        'uses'       =>"section_gallary",
        'title'      =>' مقدمة المعرض',
        'as'         =>'section_gallary',
        'icon'       =>'<i class="fa fa-list"></i>',
        'sort'    =>'2',
        'hasFather'  =>true,

    ]);

    Route::get('section-fuq',[
        'uses'       =>"section_fuq",
        'title'      =>' مقدمة الاسئلة',
        'as'         =>'section_fuq',
        'sort'    =>'2',
        'icon'       =>'<i class="fa fa-list"></i>',
        'hasFather'  =>true,

    ]);

    Route::get('section-article',[
        'uses'       =>"section_article",
        'title'      =>' مقدمة المقالات',
        'as'         =>'section_article',
        'sort'    =>'2',
        'icon'       =>'<i class="fa fa-list"></i>',
        'hasFather'  =>true,

    ]);

    Route::get('section-contact',[
        'uses'       =>"section_contact",
        'title'      =>' مقدمة تواصل معنا',
        'as'         =>'section_contact',
        'sort'    =>'2',
        'icon'       =>'<i class="fa fa-list"></i>',
        'hasFather'  =>true,

    ]);

    Route::get('section-footer',[
        'uses'       =>"section_footer",
        'title'      =>'نهاية الرئيسية',
        'as'         =>'section_footer',
        'sort'    =>'2',
        'icon'       =>'<i class="fa fa-list"></i>',
        'hasFather'  =>true,

    ]);

    Route::post('section-update/{id}',[
        'uses'       =>"section_update",
        'sort'    =>'2',
        'title'      =>' تعديل اقسام الرئيسية',
        'as'         =>'section_update',

    ]);

});


Route::get('/', 'HomeFrontController@Index')->name('home.front');
Route::get('/about', 'HomeFrontController@about')->name('about.front');
Route::get('/articles', 'HomeFrontController@articles')->name('articles.front');
Route::get('/fuq', 'HomeFrontController@fuq')->name('fuq.front');
Route::get('/works', 'HomeFrontController@works')->name('works.front');
Route::get('/contact', 'HomeFrontController@contact')->name('contact.front');
Route::get('/article/{id}', 'HomeFrontController@article')->name('article.front');



// Route::get('change-language/{locale}', [ChangeLocalizationController::class, '__invoke'])
// ->name('change-language');
// Route::get('/', 'MainFrontController@index')->name('home');
// Route::post('/email', 'MainFrontController@email')->name('home-email');

