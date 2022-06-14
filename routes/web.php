<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use Illuminate\Contracts\Cache\Store;

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

Route::get('/admin', function () {
    return view('admin');
});
Route::get('/manageCompany', function () {
    return view('manageCompany');
});
// Route::resource('/viewCompany', CompanyController::class);
Route::resource('/companies', CompanyController::class);


Route::get('/manageEmployee', function () {
    return view('manageEmployee');
});
Route::get('/viewEmployee', function () {
    return view('viewEmployee');
});
