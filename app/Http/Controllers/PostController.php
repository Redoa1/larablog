<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest('id', 'desc')
            ->filter(request(['search', 'category', 'author']))
            ->paginate(6)->withQueryString()
        ]);
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function create(){
        
        return view('posts.create');

    }
    public function store(Request $request){
        
        // $slug= Str::slug($request->get('title'));
        $attributes= $request->validate([
            'title'=>'required',
            'slug'=>['required', Rule::unique('posts','slug')],
            'image'=>'required|image',
            'excerpt'=>'required',
            'body'=>'required',
            'category_id'=>['required', Rule::exists('categories','id')],

        ]);
        // $attributes['slug']=$slug;
        $attributes['image']=$request->file('image')->store('image');
        $attributes['user_id']=auth()->id();
        Post::create($attributes);
        return redirect('/');
    }
}
