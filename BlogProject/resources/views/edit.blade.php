@extends('layouts.layout')
@section('title')
    edit
@endsection
@section('body')
<div class="card my-5">
    <div class="card-header text-center">Update Post</div>
    <div class="card-body ">
        <form action="" method="post">
            
            <input type="hidden" value="{{$post}}">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
            <label for="title" class="form-label">Title</label>
            <textarea type="description" name="desscription" class="form-control"></textarea>
            <label for="authorName" class="form-label">author name</label>
            <input type="text" name="authorName" class="form-control">
            <a href="" class="btn btn-primary my-2">Update</a>
        </form>
    </div>
</div>
@endsection
