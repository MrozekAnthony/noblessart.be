<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DashboardController;
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

Route::prefix('/dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/posts', 'posts')->name('posts');
    Route::get('/posts/{id}', 'post')->where('id', '[0-9]+')->name('post');
    Route::get('/posts/create', 'createPost')->name('createPost');
    Route::post('/posts/create', 'storePost')->name('storePost');
    Route::get('/posts/{id}/edit', 'editPost')->where('id', '[0-9]+')->name('editPost');
    Route::post('/posts/{id}/edit', 'updatePost')->where('id', '[0-9]+')->name('updatePost');
    Route::post('/posts/{id}/delete', 'deletePost')->where('id', '[0-9]+')->name('deletePost');
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/profile', 'profile')->name('profile');
    Route::post('/profile', 'updateProfile')->name('updateProfile');
    Route::get('/gallery', 'gallery')->name('gallery');
    Route::post('/gallery', 'updateGallery')->name('updateGallery');
    Route::get('/gallery/{id}/delete', 'deleteImage')->where('id', '[0-9]+')->name('deleteImage');
    Route::get('/users', 'users')->name('users');
    Route::get('/users/{id}', 'user')->where('id', '[0-9]+')->name('user');
    Route::get('/users/{id}/edit', 'editUser')->where('id', '[0-9]+')->name('editUser');
    Route::get('/params', 'params')->name('params');
    Route::post('/params', 'updateParams')->name('updateParams');
    Route::get('/params/{id}/delete', 'deleteParam')->where('id', '[0-9]+')->name('deleteParam');
});

Route::prefix('/galerie')->name('gallery.')->controller(GalleryController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::get('/abonnement', function () {
    return view('subscription');
})->name('subscription');

Route::get('/mentions-legales', function () {
    return view('legal-notice');
})->name('legal-notice');

Route::get('/conditions-generales-de-vente', function () {
    return view('terms-of-sale');
})->name('terms-of-sale');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');
