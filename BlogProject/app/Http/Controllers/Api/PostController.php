<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }
    public function show($id)
    {
        return Post::find($id);
    }
    public function store(StorePostRequest $request)
    {
        $requestData=request()->all();
        $post=Post::create($requestData);
        return $post;
    }
}