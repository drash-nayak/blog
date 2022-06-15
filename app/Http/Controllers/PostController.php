<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
       // $this->authorize('admin');
        /* \Illuminate\Support\Facades\DB::listen(function ($query){
         logger($query->sql,$query->bindings);
     });*/
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))
                ->paginate(6)->withQueryString()
            //->simplePaginate(6),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
