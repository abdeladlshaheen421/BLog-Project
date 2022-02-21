@extends('layouts.app')
@section('title')
    edit
@endsection
@section('content')
<div class="card my-5">
    <div class="card-header text-center">Update Post</div>
    <div class="card-body ">
        <form action="{{route('posts.update',$post)}}" method="post">
            @csrf
            @method('PUT')
            <label for="title" class="form-label mt-3">Title</label>
            <input type="text" class="form-control" value="{{$post->title}}" name="title">
            @error('title')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <label for="title" class="form-label mt-3" >Description</label>
            <textarea type="description" name="description" class="form-control">{{$post->description}}</textarea>
            @error('description')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <label for="user_id" class="form-label mt-3" >Author Name</label>
            <select class="form-control" name="user_id" >
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach    
            </select>
            @error('user_id')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <input type="submit" value="Update" class="btn btn-primary my-2">
        </form>
    </div>
</div>
@endsection
