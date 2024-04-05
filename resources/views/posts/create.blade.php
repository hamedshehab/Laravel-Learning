@extends('layouts.app')

@section('title') Create @endsection

@section('content')

<div class="mx-5">
    <FORM method="POST" action="{{route('posts.store')}}">
        @csrf 
        {{-- ! IT IS MANDATORY TO PUT CSRF TO PREVENT SECURITY VULNERABILITIES --}}
        <div class="form-group mb-3">
            <label for="formGroupTitle">Title</label>
            <input type="text" class="form-control" id="formGroupTitle" placeholder="Title">
        </div>
    
        <div class="form-group mb-3">
            <label for="exampleFormDescription">Description</label>
            <textarea class="form-control" id="exampleFormControlDescription" rows="3"></textarea>
        </div>
    
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Post Creator</label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Hamed</option>
            <option value="1">Anas</option>
            <option value="2">Hussein</option>
            <option value="3">Omar</option>
          </select>

        <button class="btn btn-primary mt-4" type="submit">Submit form</button>
        
    </FORM>
</div>



@endsection