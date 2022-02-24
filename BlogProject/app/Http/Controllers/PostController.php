<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        //THIS TO get all posts from table
       
        $posts=Post::paginate(5);
        return view('posts.index',['posts'=> $posts]);
    }
    public function create()
    {
        $usersNames=User::all('id','name');
        return view('posts.create',['usersNames'=>$usersNames]);
    }
    public function store(StorePostRequest $request)
    {  
        $requestData=request()->all();
        Post::create($requestData);
        return redirect()->route('posts.index');  
    }
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show',['post'=>$post]);
    }
    public function edit($id)
    {
    
        $post=Post::find($id);//to get specific data
        $users=User::all('id','name');// to get all names ,id
        return view('posts.edit',['users'=>$users,'post'=>$post]);
    }
    public function update(UpdatePostRequest $reqest , $post)
    {
        // $requestData=;
        Post::find($post)->update(request()->all());
        return redirect()->route('posts.index');
    }
    public function destroy($post)
    {
        Post::find($post)->delete();
        return redirect()->route('posts.index');
        //return redirect()->route(nameOfRoute)
    }
}