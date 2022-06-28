<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeContoller;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Contracts\Cache\Store;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;


use function PHPUnit\Framework\fileExists;

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

Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin', [AdminDashboardController::class, 'dashboardData']);
    Route::resource('/companies', CompanyController::class);
    Route::resource('/employees', EmployeeContoller::class);
    // Route::get('/manageEmployee', function () {
    //     return view('manageEmployee');
    // });
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});
