<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PhotoCommentController;

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
Route::get('/home', function () {
    return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain');
});

Route::get('/', function () {
    $a = 123;
    return view('welcome', ['test' => $a]);
});

Route::get('/map', function () {
    return view('map');
});


Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('/cache', function (Request $request) {
    dd($request->old('name'));
    return Cache::get('key');
});

Route::get('/greeting', function (Request $request) {
    // $value = $request->header('X-Header-Name');
    $request->input('name', 'Sally');
    $request->flash();
    return response()->caps('foo');
    // return redirect('/cache')->withInput();
});

Route::get('user', [UserController::class, 'index']);

require __DIR__.'/auth.php';



Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'User '.$id . $name;
})->whereNumber('id')->whereAlpha('name')->name('test');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/{id}/{name}', function () {
    });
});


Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
        return "admin/users";
    });
});

Route::resource('photos', PhotoController::class);

Route::resource('photos.comments', PhotoCommentController::class);

Route::apiResource('photos', PhotoController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
