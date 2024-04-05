@extends('layouts.app')

@section('title')Index @endsection

@section('content')
      <div class="text-center">
        <a class="btn btn-success" href="{{route('posts.create')}}">Create Post</a>
      </div>
{{-- @dd($posts)  //prints the content of the variable and stops execution --}}
      <table class="table m-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          <tr>
            <th scope="row">{{$post['id']}}</th>
            <td>{{$post['title']}}</td>
            <td>{{$post['posted_by']}}</td>
            <td>{{$post['created_at']}}</td>
            <td>
              <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info" href="show">View</a>
              <a class="btn btn-primary">Edit</a>
              <a class="btn btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
          
          
        </tbody>
      </table>
@endsection
