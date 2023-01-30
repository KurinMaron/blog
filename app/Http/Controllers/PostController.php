<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
        // withメソッド:controller内で取得した変数を渡す　変数名 => 値
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
}
