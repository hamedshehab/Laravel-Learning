@extends('layouts.app')

@section('title') Edit @endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mx-5">
    <FORM method="POST" action="{{route("posts.update", $post['id'])}}">
             @csrf 
             @method('PUT')
        {{-- ! IT IS MANDATORY TO PUT CSRF TO PREVENT SECURITY VULNERABILITIES --}}
        <div class="form-group mb-3">
            <label for="title" >Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="{{$post['title']}}">
        </div>
    
        <div class="form-group mb-3">
            <label for="exampleFormDescription">Description</label>
            <textarea  name="description" class="form-control" id="exampleFormControlDescription" rows="3">{{$post['description']}}</textarea>
        </div>
    
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Post Creator</label>
        <select name="post_creator" class="form-select" aria-label="Default select example">
            @foreach ($users as $user)
                <option  value="{{$user->id}}" @if ($user->id == $post->user_id) selected @endif >{{$user->name}}</option>
            @endforeach
        </select>

        <button class="btn btn-primary mt-4" type="submit">Update</button>
        
    </FORM>
</div>



@endsection