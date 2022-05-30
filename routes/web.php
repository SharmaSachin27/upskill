<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\photoController;

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

// Route::get('/{name}', function ($name = null) {
//     $data = compact('name');
//     return view('home')->with($data);
// });

// Route::get('/{name}/{id}', function ($name, $id) {
//     $data = compact('name', 'id');
//     print_r($data);
//     //return view('welcome');
// });
// Route::get('home', function () {
//     return view('homes');
// });
// Route::get('about', function () {
//     return view('about');
// });
//Route::get('/', [DemoController::class, 'index']);
//Route::get('/about', SingleActionController::class, 'about');
//Route::resource('/photo', photoController::class);
Route::get('posts', function () {
    return view('posts');
});
Route::get('/admin', function () {
    return view('admin');
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
