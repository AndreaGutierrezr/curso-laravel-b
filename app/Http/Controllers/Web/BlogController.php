<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where("posted", "yes")->paginate(2);
        return view("web.blog.index", compact("posts"));
    }
    
    public function show(Post $post)
    {
        return view("web.blog.show", compact("post"));
    }

}
