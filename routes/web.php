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
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
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
    Route::post('/commentaire/ajouter', 'addComment')->middleware('auth')->name('addComment');
    Route::delete('/commentaire/supprimer/{id}', 'destroyComment')->middleware('checkUserRole')->name('destroyComment');
});

Route::prefix('/forum')->name('thread.')->controller(ThreadController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{id}', 'show')->where([
        'slug' => '[a-z0-9]+(-[a-z0-9]+)*',
        'id' => '[0-9]+'
    ])->name('show');
    Route::get('/creer', 'create')->middleware('checkUserRole')->name('create');
    Route::post('/creer', 'doCreate')->middleware('checkUserRole')->name('doCreate');
    Route::delete('/{slug}-{id}', 'destroy')->middleware('checkUserRole')->where([
        'slug' => '[a-z0-9]+(-[a-z0-9]+)*',
        'id' => '[0-9]+'
    ])->name('destroyPost');
    Route::post('/commentaire/ajouter', 'addComment')->middleware('auth')->name('addComment');
    Route::delete('/commentaire/supprimer/{id}', 'destroyComment')->middleware('checkUserRole')->name('destroyComment');
    Route::post('/commentaire/stopquarantaine/{id}', 'stopQuarantineComment')->middleware('checkUserRole')->name('stopQuarantineComment');
});

Route::prefix('/dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/blog', 'blog')->middleware('checkUserRole')->name('blog');
    Route::get('/blog/creer', 'blogForm')->middleware('checkUserRole')->name('createBlog');
    Route::post('/blog/creer', 'createBlog')->middleware('checkUserRole')->name('createBlog');
    Route::post('/blog/modifier/{id}', 'updateBlog')->middleware('checkUserRole')->name('updateBlog');
    Route::delete('/blog/supprimer/{id}', 'destroyBlog')->middleware('checkUserRole')->name('destroyBlog');
    Route::get('/galerie', 'gallery')->middleware('checkUserRole')->name('gallery');
    Route::post('/galerie/creer', 'createGallery')->middleware('checkUserRole')->name('createGallery');
    Route::delete('/galerie/supprimer/{id}', 'destroyGallery')->middleware('checkUserRole')->name('destroyGallery');
    Route::get('/parametre', 'parameter')->name('parameter');
    Route::get('/categorie', 'category')->middleware('checkUserRole')->name('category');
    Route::post('/categorie/creer', 'createCategory')->middleware('checkUserRole')->name('createCategory');
    Route::delete('/categorie/supprimer/{id}', 'destroyCategory')->middleware('checkUserRole')->name('destroyCategory');
    Route::post('/categorie/modifier/{id}', 'updateCategory')->middleware('checkUserRole')->name('updateCategory');
    Route::get('/utilisateur', 'user')->middleware('checkUserRole')->name('user');
    Route::post('/utilisateur/creer', 'createUser')->middleware('checkUserRole')->name('createUser');
    Route::delete('/utilisateur/supprimer/{id}', 'destroyUser')->middleware('checkUserRole')->name('destroyUser');
    Route::post('/utilisateur/modifier/{id}', 'updateUser')->middleware('checkUserRole')->name('updateUser');
    Route::get('/forum', 'forum')->middleware('checkUserRole')->name('forum');
    Route::post('/forum/creer', 'createForum')->middleware('checkUserRole')->name('createForum');
    Route::delete('/forum/supprimer/{id}', 'destroyForum')->middleware('checkUserRole')->name('destroyForum');
    Route::post('/forum/modifier/{id}', 'updateForum')->middleware('checkUserRole')->name('updateForum');
    Route::get('/forum/categorie', 'forumCategory')->middleware('checkUserRole')->name('forumCategory');
    Route::get('/mot-interdit', 'bannedWord')->middleware('checkUserRole')->name('bannedWord');
    Route::post('/mot-interdit/creer', 'createBannedWord')->middleware('checkUserRole')->name('createBannedWord');
    Route::delete('/mot-interdit/supprimer/{id}', 'destroyBannedWord')->middleware('checkUserRole')->name('destroyBannedWord');

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
Route::post('/connexion', [AuthController::class, 'doLogin'])->middleware('guest')->name('auth.doLogin');
Route::delete('/deconnexion', [AuthController::class, 'logout'])->middleware('auth')->name('auth.logout');

Route::get('/creer-un-compte', [AuthController::class, 'register'])->middleware('guest')->name('auth.register');
Route::post('/creer-un-compte', [AuthController::class, 'doRegister'])->middleware('guest')->name('auth.doRegister');

Route::get('/mot-de-passe-oublie', [AuthController::class, 'forgotPassword'])->middleware('guest')->name('auth.forgotPassword');
Route::post('/mot-de-passe-oublie', [AuthController::class, 'doForgotPassword'])->middleware('guest')->name('auth.doForgotPassword');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', function () {

    $data = request()->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
    ]);

    //dd($data);

    Mail::to("contact@noblessart.be")->cc($data['email'])->send(new ContactMail($data));

    return view('contact')->with('message', 'Votre message a bien été envoyé');
})->name('contact');