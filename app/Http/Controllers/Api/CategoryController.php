<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::get());
    }
    public function all(){
        return response()->json(Category::get());
    }
    public function store(StoreRequest $request)
    {
        //dd($request);
        return response()->json(Category::create($request->validated()));
    }
    public function show(Category $category)
    {
        return response()->json($category);
    }
    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json("ok");
    }
    public function posts(Category $category){

        // $posts = Post::join('categories', "categories.id", "=", "posts.category_id")
        // ->select("posts.*", "categories.title as category")
        // ->where("categories.id", $category->id)
        // ->get();

        $posts = Post::with("category")
        ->where("category_id", $category->id)
        ->get();
        return response()->json($posts);
    }
}
