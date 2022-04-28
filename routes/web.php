<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/cache', function () {
    return Cache::get('key');
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('user', [UserController::class, 'index']);

require __DIR__.'/auth.php';



Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'User '.$id . $name;
})->whereNumber('id')->whereAlpha('name')->name('test');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        //
    });

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
