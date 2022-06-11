<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
class PostController extends Controller
{
    public function index()
    {
        /* \Illuminate\Support\Facades\DB::listen(function ($query){
         logger($query->sql,$query->bindings);
     });*/
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(6),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
