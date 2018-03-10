@extends('posts.postFrame')
@section('main')

  <button class="btn btn-primary" href="#demo" class="btn btn-info" data-toggle="collapse">Post Your Ad </button>
  <div id="demo" class="collapse">
  @include('posts.postForm')
  </div>
  <hr>
  <br>
@include('posts.postContent')

@endsection
