<?php

use App\Http\Controllers\Admin\NotificationsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\HelpCenterController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FaqSectionsController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialsController;
use App\Http\Controllers\Admin\MalfunctionsController;
use App\Http\Controllers\Admin\MaintenanceCentersController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\CustomerCarsController;
use App\Http\Controllers\Admin\ContactController;

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

    return view('dashboard.home.404');
})->name('error.roles');



Route::group(['as' => 'admin.', 'controller' => HomeController::class, 'prefix' => "admin", "middleware" => ['roles', 'auth']], function () {

    Route::get('home', [
        'uses'       => "Index",
        'title'      => 'الرئيسية',
        'icon'       => '<i class="fa fa-home"></i>',
        'sort'    => '1',
        'as'         => 'home',
        'q_a'        => true,

    ]);
});



Route::group(['as' => 'roles.', 'prefix' => "admin/roles", 'controller' => RolesController::class, "middleware" => ['roles', 'auth']], function () {

    Route::get('/roles', [
        'uses'       => "Index",
        'title'      => 'الصلاحيات',
        'subTitle'   => 'الصلاحيات',
        'icon'       => '<i class="fa fa-expeditedssl"></i>',
        'subIcon'    => '',
        'sort'    => '5',

        'as'         => 'list',
        'q_a'        => false,
        'child'      => [
            'roles.add',
            'roles.store',
            'roles.edit',
            'roles.update',
            'roles.delete'
        ],
    ]);

    Route::get('/add-roles', [
        'uses'       => "Add",
        'title'      => 'إضافة صلاحية',
        'sort'    => '5',

        'icon'       => '<i class="fa fa-plus"></i>',
        'as'         => 'add',
        'hasFather'  => true,
    ]);

    # add role (ajax)
    Route::post('store-role', [
        'uses' => 'store',
        'sort'    => '5',

        'as'  => 'store',
        'title' => 'حفظ صلاحيه'
    ]);


    # edit role
    Route::get('edit-role/{id}', [
        'uses'  => 'EditRole',
        'as'    => 'edit',
        'sort'    => '5',

        'title' => 'تعديل صلاحيه'
    ]);

    # update role (ajax)
    Route::post('update-role', [
        'uses' => 'Update',
        'as'  => 'update',
        'sort'    => '5',

        'title' => 'تحديث صلاحيه'
    ]);

    # delete role
    Route::post('delete-role', [
        'uses' => 'Delete',
        'as'  => 'delete',
        'sort'    => '5',

        'title' => 'حذف صلاحيه'
    ]);
});

Route::group(['as' => 'users.', 'prefix' => "admin/users", 'group_sort' => 2], function () {
    Route::group(['controller' => UsersController::class, "middleware" => ['roles', 'auth']], function () {

        Route::get('list', [
            'uses'       => "index",
            'title'      => ' المديرين',
            'subTitle'   => 'قائمة المدرين',
            'icon'       => '<i class="fa fa-user"></i>',
            'subIcon'    => '',
            'sort'    => '5',

            'as'         => 'list',
            'q_a'        => true,
            'child'      => [
                'users.add',
                'users.edit',
                'users.update',
                'users.store',
                'users.delete',
            ],
        ]);

        Route::get('add', [
            'uses'       => "add",
            'title'      => 'اضافة مدير',
            'as'         => 'add',
            'sort'    => '5',

            'icon'       => '<i class="fa fa-plus"></i>',
            'hasFather'  => true,

        ]);
        Route::get('edit/{id}', [
            'uses'       => "edit",
            'sort'    => '5',

            'title'      => 'تعديل مدير',
            'as'         => 'edit',
        ]);

        Route::post('update/{id}', [
            'uses'       => "update",
            'sort'    => '5',


            'title'      => 'تحديث مدير',
            'as'         => 'update',
        ]);

        Route::post('store', [
            'uses'       => "store",
            'sort'    => '5',


            'title'      => 'حفظ مدير',
            'as'         => 'store',
        ]);


        Route::get('delete/{id}', [
            'uses'       => "delete",
            'sort'    => '5',

            'title'      => 'حذف مدير',
            'as'         => 'delete',
        ]);
    });
});


# AuthController
Route::group(['controller' => AuthController::class, 'prefix' => 'admin'], function () {


    Route::get('/login', [
        'uses'       => "Login",
        'as'         => 'login',
        "middleware" => ['guest']
    ]);

    Route::get('/', [
        'uses'       => "Login",
        'as'         => 'login',
        "middleware" => ['guest']
    ]);

    Route::post('/check-auth', [
        'uses'       => "ChechAuth",
        'as'         => 'check_auth',
        "middleware" => ['guest']
    ]);

    Route::get('/logout', [
        'uses'       => "Logout",
        'as'         => 'logout',
        "middleware" => ['auth']
    ]);
});







// use \App\Imports\CarsImport;
// use \Excel;
use Laravel\Socialite\Facades\Socialite;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

// Route::get('admin/login', [AuthController::class, 'Login'])->name('login');
Route::get('im', [CarsController::class, 'import']);

Route::get('dd', function () {
    // return SendMail('mohamed.hamada0103@gmail.com','7roads code','7roads code',' your code is 1111 ',$cc = null,$bcc = null);
    // return  url('/');
    // echo getcwd();
    Artisan::call('cache:clear');
    // Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:cache');
    Artisan::call('config:clear');
    // Artisan::call('storage:link');
    return 'done';
});
Route::get('auth/callback', function () {
    $user = Socialite::driver('facebook')->stateless()->user();
    dd($user);
    // return request()->all();
});
Route::get('/auth/redirect', function () {
    // $user =Socialite::driver('google')->stateless()->user();
    return Socialite::driver('facebook')->redirect();



    // return $user;
});
// Auth::routes();
// require __DIR__.'/Admin.php';
