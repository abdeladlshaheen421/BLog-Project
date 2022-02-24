@extends('layouts.app')

@section('content')
  <div class="container mx-auto">
    <div class="text-center my-1 ">
      {{-- /try button using component --}}
      <x-button type="button" data="Create Post" />
    </div>
      <div class="table-responsive">
          <table class="table table-hover table-striped text-center my-1 ">
              <thead>
                  <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">Posted By</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Action</th>
                  </tr>
              </thead>
              <tbody>
                  
                      @foreach ($posts as $post)
                      <tr scope="row">
                          <td>{{$post->id}}</td>
                          <td>{{$post->title}}</td>
                          <td>{{$post->description}}</td>
                          <td>{{$post->user ? $post->user->name : "Not Found" }}</td>
                          <td>{{$post->created_at}}</td>
                          <td class="d-flex justify-content-around py-3" >
                              <a href="{{route('posts.show',$post->id)}}" class="btn btn-info text-white">Show</a>
                              <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                              <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAlert">Delete</button>
                              <div class="modal" id="deleteAlert" tabindex="-1">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header text-center">
                                        <h1 class="modal-title text-center mx-auto"><span class="badge bg-warning">Alert</span></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body bg-secondary text-white">
                                        <p class="text-center h3 ">Do you want to delete This Post ? </p>
                                      </div>
                                      <div class="modal-footer ">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{route('posts.destroy',$post->id)}}" method="post">
                                          @csrf
                                          @method('delete')
                                          <input type="submit" value="Delete" class="btn btn-danger fw-bold">
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                          </td>
                      </tr>
                      @endforeach
                      
                  
              </tbody>
          </table>
      </div>
      
      <div>
      {{-- to display pagination bar --}}
      {{ $posts->links() }}
      
  </div>
  </div>
@endsection

