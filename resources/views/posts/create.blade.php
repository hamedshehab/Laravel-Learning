@extends('layouts.app')

@section('title') Create @endsection

@section('content')

<div class="mx-5">
    <FORM method="POST" action="{{route('posts.store')}}">
        @csrf 
        {{-- ! IT IS MANDATORY TO PUT CSRF TO PREVENT SECURITY VULNERABILITIES --}}
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" placeholder="Title">
        </div>
    
        <div class="form-group mb-3">
            <label for="exampleFormDescription">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlDescription" rows="3"></textarea>
        </div>
    
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Post Creator</label>

        <select name="post_creator" class="form-select" aria-label="Default select example">
            @foreach ($users as $user)
                <option  value="{{$user['id']}}">{{$user['name']}}</option>
            @endforeach
          </select>

        <button class="btn btn-success mt-4" type="submit">Submit form</button>
        
    </FORM>
</div>



@endsection