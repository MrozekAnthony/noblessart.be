<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

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
    $images = [
        'https://picsum.photos/id/1/500/500',
        'https://picsum.photos/id/2/500/500',
        'https://picsum.photos/id/3/500/500',
        'https://picsum.photos/id/4/500/500',
        'https://picsum.photos/id/5/500/500',
        'https://picsum.photos/id/6/500/500',
        'https://picsum.photos/id/7/500/500',
        'https://picsum.photos/id/8/500/500',
        'https://picsum.photos/id/9/500/500',
        'https://picsum.photos/id/10/500/500',
        // ... other images
    ];
    return view('welcome', ['images' => $images, 'slideIndex' => 1]);
});

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{id}', 'show')->where([
        'id' => '[0-9]+',
        'slug' => '[a-z0-9]+(-[a-z0-9]+)*'
    ])->name('show');
});
