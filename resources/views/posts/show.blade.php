@extends("layouts.app")

@section('title')Show @endsection

@section("content")


    <div class="d-flex justify-content-center col-sm-12">
        <div class="card border-dark mb-3 mt-4 col-sm-8">
        <div class="card-header">Post Info</div>
        <div class="card-body text-dark">
          <h5 class="card-title">{{$post['title']}}</h5>
          <p class="card-text">Description: PHP is trash ngl.</p>
        </div>
      </div>
    </div>
    

    <div class="d-flex justify-content-center col-sm-12">
      <div class="card border-dark mb-3 mt-4 col-sm-8">
      <div class="card-header">Post Creator Info</div>
      <div class="card-body text-dark">
        <h5 class="card-title">Name: {{$post['posted_by']}}</h5>
        <p class="card-text">Email: hamedshehab2001@gmail.com</p>
        <p class="card-text">Created At: {{$post['created_at']}}</p>
      </div>
    </div>
  </div>
 @endsection
