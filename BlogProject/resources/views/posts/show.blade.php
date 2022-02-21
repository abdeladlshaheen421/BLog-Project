@extends('layouts.app')
@section('title')
    Show
@endsection
@section('content')
    <div class="card my-5">
        <div class="card-header text-center h2 text-light bg-dark">{{$post->title}}</div>
        <div class="card-body bg-secondary ">
            <table class="table table-hover table-light text-center table-striped fw-bold">
                <tr scope="row">
                    <td>ID</td>
                    <td class="text-danger">{{$post->id}}</td>
                </tr>
                <tr scope="row">
                    <td>Description</td>
                    <td class="text-danger">{{$post->description}}</td>
                </tr>
                <tr scope="row">
                    <td>Created By</td>
                    <td class="text-danger">{{$post->user ? $post->user->name : "Not Found"}}</td>
                </tr>
                <tr scope="row">
                    <td>Created At</td>
                    <td class="text-danger">{{$post->created_at}}</td>
                </tr>

            </table>
        </div>
        <div class="card-footer text-center "><a href="{{route('posts.index')}}" class="btn btn-danger fw-bold px-5">Back</a></div>
    </div>
@endsection