<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Parameter;
use App\Models\Category;
use App\Models\ImageGallery;
use App\Models\Role;
use App\Models\Thread;
use App\Models\BannedWord;
use App\Models\SeverityLevel;

class DashboardController extends Controller
{

    function removeAccents($string) {
        $accents = array(
            'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï',
            'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á',
            'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò',
            'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ'
        );
    
        $replace = array(
            'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I',
            'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a',
            'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o',
            'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y'
        );
    
        return str_replace($accents, $replace, $string);
    }

    public function index()
    {
        return view('dashboard.index', ['tab' => 'dashboard']);
    }

    public function blog()
    {
        return view('dashboard.index', ['tab' => 'blog'])
            ->with('posts', Post::with('category')->get())
            ->with('categories', Category::all());
    }

    public function createBlog(Request $request)
    {
        $post = $request->all();

        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_replace(' ', '-', strtolower(removeAccents($request->title)));
        $searchPost = Post::where('slug', $post->slug)->first();
        if ($searchPost) {
            $post->slug = $post->slug . '-' . time();
        }

        $post->content = $request->content;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('article'), $imageName);
            $post->image = 'article/' . $imageName;
        }

        $post->is_published = $request->is_published || false;
        $post->category_id = $request->category_id;
        $post->created_by = Auth::id();
        $post->updated_by = Auth::id();
        $post->save();
        return redirect()->route('dashboard.blog');
    }

    public function updateBlog(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('dashboard.blog')->with('error', 'Galerie non trouvée');
        }
        $post->title = $request->title;
        $post->slug = str_replace(' ', '-', strtolower(removeAccents($request->title)));
        $searchPost = Post::where('slug', $post->slug)->first();
        if ($searchPost) {
            $post->slug = $post->slug . '-' . time();
        }

        $post->content = $request->content;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('blog'), $imageName);
            $post->image = 'blog/' . $imageName;
        }
        $post->is_published = $request->is_published || false;
        $post->category_id = $request->category_id;
        $post->updated_by = Auth::id();
        $post->save();
        return redirect()->route('dashboard.blog');
    }

    public function destroyBlog($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('dashboard.blog');
    }

    public function gallery()
    {
        return view('dashboard.index', ['tab' => 'gallery'])
            ->with('galleries', Gallery::all());
    }

    public function createGallery(Request $request)
    {
        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->slug = str_replace(' ', '-', strtolower($request->title));
        $searchGallery = Gallery::where('slug', $gallery->slug)->first();
        if ($searchGallery) {
            $gallery->slug = $gallery->slug . '-' . time();
        }
        $gallery->created_by = Auth::id();
        $gallery->updated_by = Auth::id();
        $gallery->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                //dd($image);
                $imageName = microtime(true) . '.' . $image->getClientOriginalName(); // use microtime() instead of time()
                //$imageName = str_replace('.', '', $imageName); // remove any periods from the microtime value to avoid issues
                $image->move(public_path('gallery'), $imageName);

                $gallery_images = new ImageGallery();
                $gallery_images->gallery_id = $gallery->id;
                $gallery_images->image = 'gallery/' . $imageName;
                $gallery_images->created_by = Auth::id();
                $gallery_images->updated_by = Auth::id();
                $gallery_images->save();
            }
        }

        return redirect()->route('dashboard.gallery');
    }

    public function destroyGallery($id)
    {
        $gallery = Gallery::find($id);
        $gallery->images()->delete();
        $gallery->delete();
        return redirect()->route('dashboard.gallery');
    }

    public function parameter()
    {
        return view('dashboard.index', ['tab' => 'parameter']);
        //->with('parameters', Parameter::all());
    }

    public function user()
    {
        return view('dashboard.index', ['tab' => 'user'])
            ->with('users', User::all())
            ->with('roles', Role::all());
    }

    public function createUser(Request $request)
    {
        //dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $searchUser = User::where('email', $user->email)->first();
        if ($searchUser) {
            return redirect()->route('dashboard.user')->with('error', 'Email déjà utilisé');
        }
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('user'), $imageName);
            $user->image = 'user/' . $imageName;
        }
        $user->save();
        return redirect()->route('dashboard.user');
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('dashboard.user')->with('error', 'Utilisateur non trouvé');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $searchUser = User::where('email', $user->email)->first();
        if ($searchUser and $searchUser->id != $user->id) {
            return redirect()->route('dashboard.user')->with('error', 'Email déjà utilisé');
        }
        if ($request->password)
            $user->password = bcrypt($request->password);
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('user'), $imageName);
            $user->image = 'user/' . $imageName;
        }
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->route('dashboard.user');
    }

    public function destroyUser($id)
    {
        $user = User::find($id);
        if (Auth::user()->role->priority < $user->role->priority) {
            return redirect()->route('dashboard.user')->with('error', 'Impossible de supprimer l\'administrateur');
        }
        $user->delete();
        return redirect()->route('dashboard.user');
    }

    public function category()
    {
        return view('dashboard.index', ['tab' => 'category'])
            ->with('categories', Category::all());
    }

    public function createCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_replace(' ', '-', strtolower($request->name));
        $category->image = $request->image;
        $category->created_by = Auth::id();
        $category->updated_by = Auth::id();
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('category'), $imageName);
            $category->image = 'category/' . $imageName;
        }
        $category->save();
        return redirect()->route('dashboard.category');
    }

    public function destroyCategory($id)
    {
        $category = Category::find($id);
        if ($category->posts->count() > 0) {
            return redirect()->route('dashboard.category')->with('error', 'Catégorie non vide');
        }
        $category->delete();
        return redirect()->route('dashboard.category');
    }

    public function forum()
    {
        return view('dashboard.index', ['tab' => 'forum'])->with('threads', Thread::where('quarantine', true)->get());
    }

    public function bannedWord()
    {
        return view('dashboard.index', ['tab' => 'banned_word'])
        ->with('bannedWords', BannedWord::with('severity')->get())
        ->with('severities', SeverityLevel::all());
    }

    public function createBannedWord(Request $request)
    {
        $bannedWord = new BannedWord();
        $bannedWord->word = $request->word;
        $bannedWord->severity_id = $request->severity_id;
        $bannedWord->save();

        return redirect()->route('dashboard.bannedWord');
    }

    public function destroyBannedWord($id){
        $bannedWord = BannedWord::find($id);
        $bannedWord->delete();
        return redirect()->route('dashboard.bannedWord');
    }

    public function createForum(Request $request)
    {
        $thread = new Thread();
        $thread->title = $request->title;
        $thread->slug = str_replace(' ', '-', strtolower($request->title));
        $searchThread = Thread::where('slug', $thread->slug)->first();
        if ($searchThread) {
            $thread->slug = $thread->slug . '-' . time();
        }
        $thread->content = $request->content;
        $thread->created_by = Auth::id();
        $thread->updated_by = Auth::id();
        $thread->save();
        return redirect()->route('dashboard.forum');
    }

    public function destroyForum($id)
    {
        $thread = Thread::find($id);
        $thread->delete();
        return redirect()->route('dashboard.forum');
    }
}
