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

Route::get('posts', function () {
    return view('posts');
});
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/manageCompany', function () {
    return view('manageCompany');
});
Route::resource('/viewCompany', CompanyController::class);
Route::post('/addCompany', [CompanyController::class, 'store']);
Route::get('/manageEmployee', function () {
    return view('manageEmployee');
});
Route::get('/viewEmployee', function () {
    return view('viewEmployee');
});

Route::get('posts/{post}', function ($slug) {
    $path = __DIR__ . "/../resources/views/posts/{$slug}.html";
    if (!file_exists($path)) {
        //ddd("file does't exist");
        abort(404);
    }
    $post = file_get_contents($path);
    return view('post', [
        'post' => $post
    ]);
});
