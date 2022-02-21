@extends('layouts.app')
{{-- @section('title')
    create
@endsection --}}
@section('content')
   
    <div class="card my-5">
        <div class="card-header text-center">New Post</div>
        <div class="card-body ">
            <form action="{{route('posts.store')}}" method="post">
                @csrf
                @method('post')
                <label for="title" class="form-label">Title</label>

                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <label for="description" class="form-label">Description</label>
                <textarea type="description" name="description" class="form-control">{{old('description')}}</textarea>
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <label for="authorName" class="form-label">author name</label>

                <select class="form-control" name="user_id" >
                    <option value="" disabled selected>Select User Name</option>
                    @foreach ($usersNames as $userName)
                        <option value="{{$userName->id}}">{{$userName->name}}</option>
                    @endforeach
                    
                </select>
                @error('user_id')
                <p class="text-danger">{{$message}}</p>
                @enderror
                
                <input type="submit" class="btn btn-success p-2 fs-0.5 my-2" value="Create">
            </form>
        </div>
    </div>
@endsection