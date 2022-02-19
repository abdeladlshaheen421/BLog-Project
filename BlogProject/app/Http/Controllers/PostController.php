<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function getPosts()
    {
       
    }
    public function index()
    {
        $posts=
        [
            ["id"=>1,"title"=>"this is blog post 1","author"=>"ahmed","created_at"=>"7 Am 4,9,2021"],
            ["id"=>2,"title"=>"this is blog post 2","author"=>"hossam","created_at"=>"3 Am 13,7,1980"],
            ["id"=>3,"title"=>"this is blog post 3","author"=>"khaled","created_at"=>"12 Am 12,5,2005"],
            ["id"=>4,"title"=>"this is blog post 4","author"=>"seham","created_at"=>"8 Am 1,1,2006"]
    
        ];
        return view('index',['posts'=> $posts]);
    }
    public function create()
    {
        return view('create');
    }
    public function store()
    {
        return redirect('index');
    }
    public function show()
    {
        return view('show');
    }
    public function edit($post)
    {
        
        return view('edit',['post'=>$post]);
    }
    public function update()
    {
        return redirect('index');
    }
    public function destroy($post)
    {
        dd($post);
        return  $post;
        //return redirect('index');
    }
}