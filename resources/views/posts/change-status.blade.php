@extends('posts.postFrame')

@section('main')
@include('inc.messages')
@if(count($posts) > 0)
  <div class="infinite-scroll">
             <table class="table table-striped">
                 <tr>
                     <th>Image</th>
                     <th>Open</th>
                     <th>Edit</th>
                     <th>Change </th>
                 </tr>
                 @foreach($posts as $post)
                <tr>
                <td>
                  <div class="col-md-2 col-sm-2">
                  <a href="/{{$post->ad_slug}}/open">  <img src="/img/adImage/{{$post->adImage }}" alt="{{$post->adTitle}}" class="profile-photo-lg" />  </a>
                  @if ($post->status == 11)
                <b style="color:green;">Featured</b>
                 @elseif ($post->status == 12)
                    <b style="color:red;">Reset</b>
                  @endif
                  <hr>
                  @if ($post->verified == 'Yes')
                    <b style="color:blue;">Verified</b>
                  @endif
                  @if ($post->trending == 14)
                    <b style="color:pink;">Trending</b>
                  @endif
                </div>
              </td>
               <td><a href="editInfo/{{ Crypt::encrypt($profile->id)}}/edit"  class="btn btn-success"><span class="fa fa-edit"></span> Open</a></td>
              <td><a href="editInfo/{{ Crypt::encrypt($profile->id)}}/edit"  class="btn btn-primary"><span class="fa fa-edit"></span> Delete</a></td>
              <td>
                <div class="dropdown ">
             <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Mark as
             <span class="caret"></span></button>
             <ul class="dropdown-menu">
               <li>
                 {!! Form::open(['action' => ['PostYourAdCtrl@update',Crypt::encrypt($post->id)], 'method' => 'POST', 'class' => 'form-horizontal' ]) !!}
				          {{ csrf_field() }}
				          {{ method_field('PUT') }}
				         {{ Form::hidden('status', Crypt::encrypt('K')) }}
				         {{Form::submit('Featured Posts', ['class'=>'btn btn-succes'])}}
				          {!! Form::close() !!}
               </li>
               <li>
                 {!! Form::open(['action' => ['PostYourAdCtrl@update',Crypt::encrypt($post->id)], 'method' => 'POST', 'class' => 'form-horizontal' ]) !!}
				          {{ csrf_field() }}
				          {{ method_field('PUT') }}
				         {{ Form::hidden('status', Crypt::encrypt('N')) }}
				         {{Form::submit('Verified', ['class'=>'btn btn-succes'])}}
				          {!! Form::close() !!}
               </li>
               <li>
                 {!! Form::open(['action' => ['PostYourAdCtrl@update',Crypt::encrypt($post->id)], 'method' => 'POST', 'class' => 'form-horizontal' ]) !!}
                 {{ csrf_field() }}
                 {{ method_field('PUT') }}
                {{ Form::hidden('status', Crypt::encrypt('E')) }}
                {{Form::submit('trending', ['class'=>'btn btn-succes'])}}
                 {!! Form::close() !!}
               </li>
               <li><a href="newsfeed-people-nearby.html">Edit profile</a></li>
               <li>
                 {!! Form::open(['action' => ['PostYourAdCtrl@update',Crypt::encrypt($post->id)], 'method' => 'POST', 'class' => 'form-horizontal' ]) !!}
                 {{ csrf_field() }}
                 {{ method_field('PUT') }}
                {{ Form::hidden('status', Crypt::encrypt('O')) }}
                {{Form::submit('Reset Null', ['class'=>'btn btn-succes'])}}
                 {!! Form::close() !!}
               </li>
   								</ul>
              </div>
            </td>
              </tr>
          @endforeach
          </div>
        {{$posts->links()}}
        </div>

      </table>
         @else
       <p>No post found !</p>
        @endif
@endsection
@section('form')
    @include('posts.postForm')
@endsection
