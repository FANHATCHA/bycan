@extends('posts.postFrame')

@section('main')
@include('inc.messages')
        @if(count($posts) > 0)
       @foreach($posts as $post)
        <div class="nearby-user">
          <div class="row">
            <div class="col-md-2 col-sm-2">
            <a href="/{{$post->ad_slug}}/open">  <img src="/img/adImage/{{$post->adImage }}" alt="{{$post->adTitle}}" class="profile-photo-lg" />  </a>
            </div>
            <div class="col-md-7 col-sm-7">
              <h5><a href="/{{$post->ad_slug}}/open" class="profile-link">{{$post->adTitle}}</a></h5>
              <p>{{$post->typeOfAd}}</p>
              <p class="text-muted">{{$post->created_at->diffForHumans()}}</p>
            </div>

            <div class="col-md-3 col-sm-3">

                <form action="/PostYourAd/{{$post->id}}" method="POST">
                {{ csrf_field()}}
                {{ method_field('DELETE')}}
                <button type="submit" value="delete" name="Delete" class="btn btn-danger"><span class="fa fa-remove"></span> Delete</button>
                </form>

            </div>
          </div>
        </div>
        <hr>
      @endforeach
    <center>{{$posts->links()}}</center>
     @else
    <p>No Ad found !</p>
    @endif


@endsection
@section('form')
    @include('posts.postForm')
@endsection
