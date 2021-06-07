<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//Frontend
Route::get('/', [FrontendController::class, 'index'])->name('home');
//login
Route::match(['get', 'post'], '/login', [FrontendController::class, 'login'])->name('login');
//logout
Route::get('/logout', [FrontendController::class, 'logout'])->name('logout');

Route::get('/portfolio-details', function () {
    return view('Frontend.details');
})->name('details');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //user
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    //roles
    Route::resource('role', RoleController::class);
});
