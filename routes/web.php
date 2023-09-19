<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ThreadController;
use App\Models\Gallery;
use App\Models\Post;

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
    return view('welcome', ['images' => $images, 'slideIndex' => 1])
        ->with('galleries', Gallery::all())
        ->with('posts', Post::all());
});

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{id}', 'show')->where([
        'id' => '[0-9]+',
        'slug' => '[a-z0-9]+(-[a-z0-9]+)*'
    ])->name('show');
});

Route::prefix('/forum')->name('thread.')->controller(ThreadController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{id}', 'show')->where([
        'id' => '[0-9]+',
        'slug' => '[a-z0-9]+(-[a-z0-9]+)*'
    ])->name('show');
    Route::get('/creer', 'create')->name('create');
    Route::post('/creer', 'doCreate')->name('doCreate');
    Route::delete('/{slug}-{id}', 'destroy')->where([
        'id' => '[0-9]+',
        'slug' => '[a-z0-9]+(-[a-z0-9]+)*'
    ])->name('destroyPost');
});

Route::prefix('/dashboard')->name('dashboard.')->middleware('auth')->controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/creer', 'blogForm')->name('createBlog');
    Route::post('/blog/creer', 'createBlog')->name('createBlog');
    Route::post('/blog/modifier/{id}', 'updateBlog')->name('updateBlog');
    Route::delete('/blog/supprimer/{id}', 'destroyBlog')->name('destroyBlog');
    Route::get('/galerie', 'gallery')->name('gallery');
    Route::post('/galerie/creer', 'createGallery')->name('createGallery');
    Route::delete('/galerie/supprimer/{id}', 'destroyGallery')->name('destroyGallery');
    Route::get('/parametre', 'parameter')->name('parameter');
    Route::get('/categorie', 'category')->name('category');
    Route::post('/categorie/creer', 'createCategory')->name('createCategory');
    Route::delete('/categorie/supprimer/{id}', 'destroyCategory')->name('destroyCategory');
    Route::post('/categorie/modifier/{id}', 'updateCategory')->name('updateCategory');
    Route::get('/utilisateur', 'user')->name('user');
    Route::post('/utilisateur/creer', 'createUser')->name('createUser');
    Route::delete('/utilisateur/supprimer/{id}', 'destroyUser')->name('destroyUser');
    Route::post('/utilisateur/modifier/{id}', 'updateUser')->name('updateUser');
    Route::get('/forum', 'forum')->name('forum');
    Route::post('/forum/creer', 'createForum')->name('createForum');
    Route::delete('/forum/supprimer/{id}', 'destroyForum')->name('destroyForum');
    Route::post('/forum/modifier/{id}', 'updateForum')->name('updateForum');
    Route::get('/forum/categorie', 'forumCategory')->name('forumCategory');
    Route::get('/mot-interdit', 'bannedWord')->name('bannedWord');
    Route::post('/mot-interdit/creer', 'createBannedWord')->name('createBannedWord');
    Route::delete('/mot-interdit/supprimer/{id}', 'destroyBannedWord')->name('destroyBannedWord');

    Route::get('deconnexion', function () {
        Auth::logout();
        return redirect()->route('/');
    })->name('logout');
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

Route::get('/connexion', [AuthController::class, 'login'])->middleware('guest')->name('auth.login');
Route::post('/connexion', [AuthController::class, 'doLogin']);
Route::delete('/deconnexion', [AuthController::class, 'logout'])->name('auth.logout');
