@include('inc.messages')
<!-- Post Content
          ================================================= -->
<script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            //your function call here
            document.test.submit();
        }
    }
</script>
          	@if(count($posts) > 0)
              <div class="infinite-scroll">
               @foreach($posts as $post)
          <div class="post-content">
            <a href="/ad/{{$post->ad_slug}}"><img src="/img/adImage/{{$post->adImage }}" alt="{{$post->adTitle}}" class="img-responsive post-image" style="width:60rem; height:40rem;"/></a>
            <div class="post-container">

              <a href="/ad/{{$post->ad_slug}}"><img src="img/logo/{{ $post->logo }}" alt="{{ $post->adTitle }}" class="profile-photo-md pull-left"></a>
              <div class="post-detail">
                <div class="user-info">
                  <h5><a href="/ad/{{$post->ad_slug}}" class="profile-link">{{$post->name }}</a> <span class="following">{{$post->typeOfAd}}</span></h5>
                  <p class="text-muted">Posted by {{$post->name }} on {{date('F d, Y', strtotime($post->updated_at))}}</p>
                </div>
                <div class="reaction">
                  <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                  <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                </div>
                <div class="line-divider"></div>
                <div class="post-text">
                  <p>
                  {!! str_limit(strip_tags($post->describeAd,1000)) !!}
                </p>
                </div>
                <div class="line-divider"></div>

                @if(count($comments) > 0)
                 @foreach($comments as $comment)
                @if ($post->ad_slug == $comment->slug )
                    <div class="post-comment">
                      <img img src="img/logo/{{ $comment->logo }}" alt="{{ $comment->name }}"  class="profile-photo-sm" />
                      <p><a href="timeline.html" class="profile-link">{{$comment->name }}</a>: {{$comment->feedback }} </p>
                    </div>

                  @endif
              @endforeach

                @else
                 <p>No feedback or comment found !</p>
               @endif
                {!! Form::open(['action' => 'CommentCtrl@store', 'name' => 'test','method' => 'POST', 'enctype' => 'multipart/form-data',  'onsubmit'=> 'ShowLoading()']) !!}
                {{ csrf_field()  }}
                <div class="post-comment">
                  @if (count($profile ) > 0)
                 <img src="img/logo/{{ $profile->logo }}" alt="{{ $profile->name }}" class="profile-photo-sm" />
                  @else
                  <img src="img/logo/default-user.png" alt="{{ Auth::user()->name }}" class="profile-photo-sm" />
                  @endif
                   {{Form::text('feedback','',['class' => 'form-control','id' => 'text','placeholder' => 'Leave a feedback or comment','required'])}}
                </div>
                @if (count($profile ) > 0)
                {{ Form::hidden('logo', Crypt::encrypt($profile->logo)) }}
                @else
                {{ Form::hidden('logo', Crypt::encrypt('default-user.png')) }}
                @endif
                @if (count($profile ) > 0)
                {{ Form::hidden('name', Crypt::encrypt($profile->name)) }}
                @else
                {{ Form::hidden('name', Crypt::encrypt(Auth::user()->name)) }}
                @endif
                {{ Form::hidden('post_id', Crypt::encrypt($post->id)) }}
                {{ Form::hidden('slug', Crypt::encrypt($post->ad_slug)) }}
                {{ Form::hidden('user_id', Crypt::encrypt(auth()->user()->id)) }}
                {!! Form::close() !!}
              </div>
            </div>
          </div>
     @endforeach
     {{$posts->links()}}
     </div>
       @else
        <p>No ad found !</p>
      @endif
