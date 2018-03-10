@extends('editProfile.editFrame')

@section('main')
@include('inc.messages')
<div class="edit-profile-container">
  <div class="block-title">
    <center><h4 class="grey"><i class="icon ion-android-checkmark-circle"></i> Add Contact</h4></center>
    <div class="line"></div>
    <div class="panel panel-default">
   <div class="panel-body">
     @if (count($contacts ) > 0)

     <b>Phone:</b> {{$contacts->phone}}<hr>
     <b>Email:</b> {{$contacts->email}}<hr>
     <b>Website:</b> <a href="{{$contacts->website}}">{{$contacts->website}}</a><hr>
     <b>Address:</b> {{$contacts->address}}

     @else
     <img src="img/banner/default-banner.jpg" alt="{{ Auth::user()->name }}" width="150px;" />
     @endif
     <hr>
     @if (count($contacts ) > 0)
     @else
     <p>No contact record found</p>
     @endif
   </div>
   </div>
    <div class="panel panel-default">
     <div class="panel-heading"> <b>Contact</b> </div>
     These fields can be used to create &amp; update contact
      <div class="panel-body">
        {!! Form::open(['action' => 'SocialMediaCtrl@store', 'name' => 'basic-info','id' => 'basic-info', 'class' => 'form-inline', 'method' => 'POST', 'enctype' => 'multipart/form-data',  'onsubmit'=> 'ShowLoading()']) !!}
        {{ csrf_field()  }}
        <form name="basic-info" id="basic-info" class="form-inline">
                        <div class="row">
                          <div class="form-group col-xs-6">
                            <label for="phone">Phone</label>
                                {{Form::text('phone','',['class' => 'form-control input-group-lg','id' => 'text','required'])}}

                              </div>
                              <div class="form-group col-xs-6">
                                <label for="email" class="">Email</label>
                                {{Form::text('contactEmail','',['class' => 'form-control input-group-lg','id' => 'text','required'])}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-xs-12">
                                <label for="website">Website (url)</label>
                                {{Form::text('website','',['class' => 'form-control input-group-lg','id' => 'text','required'])}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-xs-12">
                                <label for="address">Address</label>
                                {{Form::text('address','',['class' => 'form-control input-group-lg','id' => 'text','required'])}}
                              </div>
                            </div><br>
        {{ Form::hidden('n', Crypt::encrypt(1)) }}
        {{ Form::hidden('user_id', Crypt::encrypt(auth()->user()->id)) }}
        {{ Form::hidden('email',Crypt::encrypt(auth()->user()->email)) }}
          <center>
        {{Form::submit('Add Contact', ['class'=>'btn btn-primary'])}}
      </center>
          </div>
        {!! Form::close() !!}
      </div>
   </div>
   <div class="panel panel-default">
  <div class="panel-body">
    @if (count($contacts ) > 0)

   @if (count($socialMedia ) > 0)
    @foreach ($socialMedia as $key => $media)
    <b>{{$media->socialMedia}}:</b> {{$media->url}}<hr>
    @endforeach
    @else
    <p>No social media record found</p>
  @endif
    @else
    <img src="img/banner/default-banner.jpg" alt="{{ Auth::user()->name }}" width="150px;" />
    @endif
    <hr>
    @if (count($contacts ) > 0)
    @else
    <p>No record found</p>
    @endif
  </div>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading"> <b>Social Media</b> </div>
    <span>These fields can be used to create &amp; update Social Media links </span>
     <div class="panel-body">
       {!! Form::open(['action' => 'SocialMediaCtrl@store', 'name' => 'basic-info','id' => 'basic-info', 'class' => 'form-inline', 'method' => 'POST', 'enctype' => 'multipart/form-data',  'onsubmit'=> 'ShowLoading()']) !!}
       {{ csrf_field()  }}
       <form name="basic-info" id="basic-info" class="form-inline">

                           <div class="row">
                           <div class="form-group col-xs-6">
                                <label for="country">Social Media</label>
                                {{Form::select('socialMedia', [
                                     'Facebook' => 'Facebook',
                                     'Twitter' => 'Twitter',
                                     'Instagram' => 'Instagram',
                                     'Google+' => 'Google+',
                                     'Linkedin' => 'Linkedin',
                                ],
                                 null, [
                                 'placeholder' => 'Pick a social media',
                                 'class' => 'form-control border-input',
                                  'required',
                                           ])
                                       }}
                               </div>
                             </div>

                                 <div class="row">
                                   <div class="form-group col-xs-12">
                                     <label for="url">Add Social URL</label>
                                     {{Form::text('url','',['class' => 'form-control input-group-lg','id' => 'text','required'])}}
                                   </div>
                                 </div><br>
       {{ Form::hidden('n', Crypt::encrypt(2)) }}
       {{ Form::hidden('user_id', Crypt::encrypt(auth()->user()->id)) }}
       {{ Form::hidden('email',Crypt::encrypt(auth()->user()->email)) }}
       <center>
       {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
     </center>
        {!! Form::close() !!}
     </div>
  </div>

    <div class="line"></div>
  </div>

</div>


@endsection
@section('form')
    @include('posts.postForm')
@endsection
