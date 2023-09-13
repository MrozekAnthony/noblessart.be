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

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', ['tab' => 'dashboard']);
    }

    public function blog()
    {
        // dd(Post::all());
        // return view('dashboard.index', ['tab' => 'blog', 'posts' => Post::all()]);
        return view('dashboard.index', ['tab' => 'blog'])
            ->with('posts', Post::with('category')->get())
            ->with('categories', Category::all());
    }

    public function createBlog(Request $request)
    {
        $post = $request->all();

        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_replace(' ', '-', strtolower($request->title));
        $post->content = $request->content;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('blog'), $imageName);
            $post->image = 'blog/' . $imageName;
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
        $post->slug = str_replace(' ', '-', strtolower($request->title));
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
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
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
        if ($request->password)
            $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->route('dashboard.user');
    }

    public function destroyUser($id)
    {
        $user = User::find($id);
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
        $category->save();
        return redirect()->route('dashboard.category');
    }

    public function destroyCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('dashboard.category');
    }
}
