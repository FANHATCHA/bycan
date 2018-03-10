@extends('editProfile.editFrame')

@section('main')
@include('inc.messages')
<div class="edit-profile-container">
  <div class="block-title">
    <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Edit about</h4>
    <div class="line"></div>
    <p>
      <div class="panel panel-default">
     <div class="panel-body">
       @if (count($banner ) > 0)
      <img src="img/banner/{{ $banner->banner }}" alt="{{ $banner->banner }}" width="150px;" />
        <a href="about/{{ Crypt::encrypt($banner->id)}}/edit"  class="btn btn-success"><span class="fa fa-edit"></span> Edit</a>
       @else
       <img src="img/banner/default-banner.jpg" alt="{{ Auth::user()->name }}" width="150px;" />
       @endif
       <hr>
       @if (count($banner ) > 0)
     {!! str_limit(strip_tags($banner->about,1000)) !!}
       @else
       <p>No record found</p>
       @endif
     </div>
     </div>

    </p>
    <div class="line"></div>
  </div>
  <div class="edit-block">
    {!! Form::open(['action' => 'AboutCtrl@store', 'name' => 'basic-info','id' => 'basic-info', 'class' => 'form-inline', 'method' => 'POST', 'enctype' => 'multipart/form-data',  'onsubmit'=> 'ShowLoading()']) !!}
    {{ csrf_field()  }}
    <div class="row">

      <script type="text/javascript">
      $('#file-upload').change(function() {
      var i = $(this).prev('label').clone();
      var file = $('#file-upload')[0].files[0].name;
      $(this).prev('label').text(file);
      });
      </script>
    <style media="screen">
    .custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    }
    </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <div class="form-group col-xs-12">
        <label for="logo" class="">Add a banner Image <b style="color:red;">*</b></label>
        <label for="file-upload" class="custom-file-upload"> <i class="fa fa-cloud-upload"></i> Upload Your Image <span>(This will be your profile's cover )</span></label>
          {{Form::file('banner', ['id' => 'file-upload','banner' => 'logo','class' => 'hidden', 'required'])}}
      </div>
      <div class="row">
        <div class="form-group col-xs-12">
          <label for="my-info">About <b style="color:red;">*</b></label>
          {{Form::textarea('about', '', [ 'rows' => '15' , 'cols' => '400','id' => 'my-info', 'class' => 'form-control', 'placeholder' => 'Brief description of your ad'])}}
            <small id="emailHelp" class="form-text text-muted">Click on <img src="users/images/wrap.png" alt="Betashare wrap"> to wrap the textarea</small>
        </div>
      </div>
    </div>

    <style media="screen">
      .hidden { display: none; visibility: hidden; }
    </style>
    {{ Form::hidden('user_id', Crypt::encrypt(auth()->user()->id)) }}
    {{ Form::hidden('email',Crypt::encrypt(auth()->user()->email)) }}
    {{Form::submit('Edit Profile', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
  </div>
</div>


@endsection
@section('form')
    @include('posts.postForm')
@endsection
