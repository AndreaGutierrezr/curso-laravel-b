<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Pos;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::get();
        $posts = Post::paginate(2);
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = Category::get(); //OBTENER TODAS LAS CATEGORIAS
        //dd($categories[0]->title);
        $categories = Category::pluck('id', 'title');
        //dd($categories);
        echo view('dashboard.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //CAMBIAMOS LA PARTE Request $request por StoreRequest

        //MOSTRAR CONTENIDO DE LOS CAMPOS
        //dd($request);
        //dd(request("title"));
        //echo request("title");
        //echo $request->input('slug');
        //dd($request->all());

        //Con la clase Request podemos validar de la siguiente manera
        //$validated = $request->validate(StoreRequest::myRules());
        //$validate = Validator::make($request->all(), StoreRequest::myRules());
        //dd($validate->failed());
        //dd($validate->errors());
        //$data = array_merge($request->all(),['image' => '']);
        //dd($data);
        //Post::create($request->all());
        $data = $request->validated();
       // $data['slug'] = Str::slug($data['title']);
        Post::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function show(Pos $pos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id','title');
        echo view ('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pos $pos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pos $pos)
    {
        //
    }
}
