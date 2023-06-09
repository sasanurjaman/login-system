<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubMenuController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/role', RoleController::class)->except([
        'create',
        'edit',
        'show',
    ]);
    Route::resource('/permission', PermissionController::class)->except([
        'create',
        'edit',
        'show',
    ]);

    Route::resource('/menu', MenuController::class)->except([
        'create',
        'edit',
        'show',
    ]);
    Route::resource('/subMenu', SubMenuController::class)->except([
        'create',
        'edit',
        'show',
    ]);
    Route::resource('/profile', ProfileController::class)->only([
        'index',
        'create',
        'update',
    ]);
});
