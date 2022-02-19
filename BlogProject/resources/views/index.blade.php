@extends('layouts.layout')
@section('title')
    index
@endsection
@section('body')
    <div class="text-center my-3 ">
        <a href="{{route('posts.create')}}" class="btn btn-success p-3 fw-bold">Create Post</a>
    </div>
    <table class="table table-hover table-striped text-center my-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            
                @foreach ($posts as $post)
                <tr scope="row">
                    <td>{{$post["id"]}}</td>
                    <td>{{$post["title"]}}</td>
                    <td>{{$post["author"]}}</td>
                    <td>{{$post["created_at"]}}</td>
                    <td class="d-flex justify-content-around"><a href="{{route('posts.show',$post["id"])}}" class="btn btn-info text-white">Show</a><a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a><form action="{{route('posts.destroy',$post['id'])}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger"></form></td>
                </tr>
                @endforeach
                
            
        </tbody>
    </table>
    <div>
        <nav aria-label="Page navigation example my-3">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
@endsection