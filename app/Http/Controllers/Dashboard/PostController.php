<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Pos;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Category::find(1)->posts());
        //$posts = Post::get();
        $posts = Post::get();
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
        $post = new Post();
        //dd($categories);
        return view('dashboard.post.create', compact('categories', 'post'));
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
        //$data = $request->validated();
       // $data['slug'] = Str::slug($data['title']);
       // Post::create($data);
    Post::create($request->validated());
    return to_route("post.index")->with('status',"Registro creado");
    ///return redirect()->route("post.index")->with('status',"Registro creado");
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard.post.show", compact('post'));
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
        return view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {

        $data = $request->validated();

        if(isset($data["image"])){
            
            //dd($request->image);
            
            //dd($request->validated()["image"]->hashName());

            //dd($request->validated()["image"]->getClientOriginalName());

            // dd($request->validated()["image"]->extension());

            $data["image"] = $filename = time().".".$data["image"]->extension();

            //dd($filename);

            $request->image->move(public_path("image/otro"), $filename);

        }

        $post->update($data);

        return to_route("post.index")->with('status', "Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        //return to_route("post.index")->with('status', "Registro eliminado");
        return redirect()->route("post.index")->with('status',"Registro creado");
    }
}
