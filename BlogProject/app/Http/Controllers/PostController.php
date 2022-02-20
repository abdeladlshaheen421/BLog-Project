<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        //THIS TO get all posts from table
        $posts=Post::paginate();
        return view('index',['posts'=> $posts]);
    }
    public function create()
    {
        $usersNames=User::all('id','name');
        return view('create',['usersNames'=>$usersNames]);
    }
    public function store()
    {
        $requestData=request()->all();
        Post::create([
            'title'         =>  $requestData["title"],
            'description'   =>  $requestData["description"],
            'user_id'       =>  $requestData["user_id"],
        ]);
        
        return redirect('/posts');
    }
    public function show($id)
    {
        $post=Post::find($id);
        return view('show',['post'=>$post]);
    }
    public function edit($id)
    {
    
        $post=Post::find($id);//to get specific data
        $users=User::all('id','name');// to get all names ,id
        return view('edit',['users'=>$users,'post'=>$post]);
    }
    public function update($post)
    {
        $requestData=request()->all();
        Post::find($post)->update(
        [
            'title'         =>   $requestData["title"],
            'description'   =>   $requestData["description"],
            'user_id'       =>   $requestData["user_id"],
        ]);
        return redirect('/posts');
    }
    public function destroy($post)
    {
        Post::find($post)->delete();
        return redirect('/posts');
    }
}