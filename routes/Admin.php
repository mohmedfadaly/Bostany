<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDoctorsController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminRolesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NursesController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('error-roles', function () {

    return view('admin.home.404');
})->name('error.roles');

Route::group(['as'=>'_admin.','prefix'=>"admin",'group_sort'=>1],function () {

    # HomeController
    Route::group(['controller'=> AdminHomeController::class,"middleware"=>['admin']],function(){

        Route::get('/home',[
            'uses'       =>"Index",
            'title'      =>'الرئيسية',
            'icon'       =>'<i class="fa fa-home"></i>',
            'as'         =>'home',
            'admin'         =>true,
            'q_a'        =>true,

        ]);
    });


    # AdminDoctorsController
    Route::group(['controller'=> AdminDoctorsController::class,"middleware"=>['admin']],function(){

        Route::get('/doctors',[
            'uses'       =>"Index",
            'title'      =>'الاطباء',
            'subTitle'   =>'الاطباء',
            'icon'       =>'<i class="fa fa-user"></i>',
            'subIcon'    =>'',
            'as'         =>'doctors',
            'admin'         =>true,
            'q_a'        =>true,
            'child'      =>[
                'admin.add_doctor',
                'admin.storedoctor',
                'admin.editdoctor',
                'admin.updatedoctor',
                'admin.deletedoctor'
            ],
        ]);

        Route::get('/add-doctors',[
            'uses'       =>"Add",
            'title'      =>'إضافة طبيب',
            'icon'       =>'<i class="fa fa-plus"></i>',
            'as'         =>'add_doctor',
            'admin'         =>true,
            'q_a'        =>true,
            'hasFather'  =>true,
        ]);
        # add doctor
        Route::post('store-doctor',[
            'uses'=>'store',
            'as'  =>'storedoctor',
            'admin'         =>true,
            'title'=>'حفظ طبيب'
        ]);


        # edit doctor
        Route::get('edit-doctor/{id}',[
            'uses'  =>'Edit',
            'as'    =>'editdoctor',
            'admin'         =>true,
            'title' =>'تعديل طبيب'
        ]);

        # update doctor
        Route::post('update-doctor',[
            'uses'=>'Update',
            'as'  =>'updatedoctor',
            'admin'         =>true,
            'title'=>'تحديث طبيب'
        ]);

        # delete role
        Route::post('delete-doctor',[
            'uses'=>'Delete',
            'as'  =>'deletedoctor',
            'admin'         =>true,
            'title'=>'حذف طبيب'
        ]);
    });

    # PackageController
    Route::group(['controller'=> PackageController::class,"middleware"=>['admin']],function(){

        Route::get('/packages',[
            'uses'       =>"Index",
            'title'      =>'الباقات',
            'subTitle'   =>'الباقات',
            'icon'       =>'<i class="fa fa-cube"></i>',
            'subIcon'    =>'',
            'as'         =>'packages',
            'admin'         =>true,
            'q_a'        =>true,
            'child'      =>[
                'admin.add_packages',
                'admin.storepackages',
                'admin.editpackages',
                'admin.updatepackages',
                'admin.deletepackages'
            ],
        ]);

        Route::get('/add-packages',[
            'uses'       =>"Add",
            'title'      =>'إضافة باقة',
            'icon'       =>'<i class="fa fa-plus"></i>',
            'as'         =>'add_packages',
            'admin'         =>true,
            'q_a'        =>true,
            'hasFather'  =>true,
        ]);
        # add doctor
        Route::post('store-packages',[
            'uses'=>'store',
            'as'  =>'storepackages',
            'admin'         =>true,
            'title'=>'حفظ باقة'
        ]);


        # edit doctor
        Route::get('edit-packages/{id}',[
            'uses'  =>'Edit',
            'as'    =>'editpackages',
            'admin'         =>true,
            'title' =>'تعديل باقة'
        ]);

        # update doctor
        Route::post('update-packages',[
            'uses'=>'Update',
            'as'  =>'updatepackages',
            'admin'         =>true,
            'title'=>'تحديث باقة'
        ]);

        # delete role
        Route::post('delete-packages',[
            'uses'=>'Delete',
            'as'  =>'deletepackages',
            'admin'         =>true,
            'title'=>'حذف باقة'
        ]);
    });



      # UsersController
      Route::group(['controller'=> AdminDoctorsController::class,"middleware"=>['admin']],function(){

        Route::get('/setting',[
            'uses'       =>"setting",
            'title'      =>'الإعدادات',
            'subTitle'   =>'الإعدادات',
            'icon'       =>'<i class="feather icon-settings"></i>',
            'subIcon'    =>'',
            'as'         =>'setting',
            'admin'         =>true,
            'q_a'        =>true,
            'child'      =>[
                'admin.updatesetting',
                'admin.UpdatePassword',


            ],
        ]);

        # update doctor
        Route::post('update-setting',[
            'uses'=>'Updatesetting',
            'as'  =>'updatesetting',
            'admin'         =>true,
            'title'=>'تحديث الإعدادات'
        ]);


        # update doctor
        Route::post('update-password',[
            'uses'=>'UpdatePassword',
            'as'  =>'UpdatePassword',
            'admin'         =>true,
            'title'=>'تحديث كلمة المرور'
        ]);

    });




    # AuthController
    Route::group(['controller'=> AdminAuthController::class],function(){


        Route::get('/',[
            'uses'       =>"Login",
            'as'         =>'login.admin',
            "middleware"=>['admin_guest']
        ]);

        Route::post('/check-auth',[
            'uses'       =>"ChechAuth",
            'as'         =>'check_auth.admin',
            "middleware"=>['admin_guest']
        ]);

        Route::get('/logout',[
            'uses'       =>"Logout",
            'as'         =>'logout.admin',
            "middleware"=>['admin']
        ]);
    });

});




