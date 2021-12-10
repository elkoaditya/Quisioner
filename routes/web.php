<?php

use Illuminate\Support\Facades\Route;

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
//Create Admin
Route::get('/register/admin', [\App\Http\Controllers\UsersController::class, 'createAdmin']);
Route::get('/login', function (){
    return view('login.index');
});
Route::post('/login', [\App\Http\Controllers\UsersController::class, 'login']);



Route::get('/', function () {
    return view('login.index');
});

Route::post('/logout', [\App\Http\Controllers\UsersController::class, 'logout']);


Route::group(['middleware' => 'web'], function () {

    Route::group(['middleware' => ['AuthRole:admin']], function () {

        Route::get('/admin/home', [\App\Http\Controllers\AdminController::class, 'index']);
        Route::get('/admin/analisis', [\App\Http\Controllers\KuisionerController::class, 'analisis']);
        Route::get('/admin/kuisioner/add', [\App\Http\Controllers\KuisionerController::class, 'add']);
        Route::post('/admin/kuisioner/add', [\App\Http\Controllers\KuisionerController::class, 'save']);
        Route::get('/admin/kuesioner/update/{id}', [\App\Http\Controllers\KuisionerController::class, 'update']);
        Route::post('/admin/kuisioner/update', [\App\Http\Controllers\KuisionerController::class, 'saveupdate']);
        Route::get('/admin/kuesioner/delete/{id}', [\App\Http\Controllers\KuisionerController::class, 'delete']);
        Route::get('/admin/kuisioner/delete', [\App\Http\Controllers\KuisionerController::class, 'destory']);


        Route::get('/admin/analisis/detail/{id}', [\App\Http\Controllers\KuisionerController::class, 'detailAnalisis']);
        Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, 'users']);
        Route::get('/admin/kuesioner', [\App\Http\Controllers\KuisionerController::class, 'index']);
        Route::post('/admin/users/add', [\App\Http\Controllers\AdminController::class, 'addMhs']);
        Route::post('/admin/users/add/excel', [\App\Http\Controllers\AdminController::class, 'addMhsExcel']);
        Route::get('/admin/users/update/{id}', [\App\Http\Controllers\UsersController::class, 'updateUser']);
        Route::post('/admin/users/update', [\App\Http\Controllers\UsersController::class, 'saveUpdate']);

        Route::get('/admin/dwnlaporan', [\App\Http\Controllers\AdminController::class, 'dwlaporan']);

    });
    Route::group(['middleware' => ['AuthRole:mhs']], function () {

        Route::get('/mhs/home', [\App\Http\Controllers\MhsController::class, 'home']);
        Route::get('/mhs/profile', [\App\Http\Controllers\MhsController::class, 'profile']);
        Route::post('/mhs/profile', [\App\Http\Controllers\MhsController::class, 'saveProfile']);

        Route::get('/mhs/kuisioner', [\App\Http\Controllers\KuisionerController::class, 'submitKuis']);
        Route::post('/mhs/kuisioner', [\App\Http\Controllers\KuisionerController::class, 'saveKuis']);

    });
});

//Admin Route
