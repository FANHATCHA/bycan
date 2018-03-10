@extends('editProfile.editFrame')

@section('main')
@include('inc.messages')
<div class="edit-profile-container">
  <div class="block-title">
    <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Edit basic information</h4>
    <div class="line"></div>
    <p>
      <div class="panel panel-default">
     <div class="panel-body">
       @if (count($profile ) > 0)
      <img src="../../img/logo/{{ $profile->logo }}" alt="{{ $profile->logo }}" width="150px;" />
        <a href="editInfo/{{ Crypt::encrypt($profile->id)}}/edit"  class="btn btn-success"><span class="fa fa-edit"></span> Edit</a>
       @else
       <img src="img/banner/default-banner.jpg" alt="{{ Auth::user()->name }}" width="150px;" />
       @endif
       <hr>
       @if (count($profile ) > 0)
     <b>Name </b>: {{str_limit($profile->name,500)}}<hr>
     <b>tagline</b> : {{str_limit($profile->tagline,500)}}
     <hr>
       @else
       <p>No record found</p>
       @endif
     </div>
     </div>
    </p>
    <div class="line"></div>
  </div>
  <div class="edit-block">
    {!! Form::open(['action' => 'EditInfoCtrl@store', 'name' => 'basic-info','id' => 'basic-info', 'class' => 'form-inline', 'method' => 'POST', 'enctype' => 'multipart/form-data',  'onsubmit'=> 'ShowLoading()']) !!}
    {{ csrf_field()  }}
    <div class="row">
      <div class="form-group col-xs-12">
        <label for="name" class="">Name <b style="color:red;">*</b></label>
          {{Form::text('name','',['class' => 'form-control','id' => 'text','required'])}}
      </div>

      <div class="form-group col-xs-12">
        <label for="tagline" class="">Tagline <b style="color:red;">*</b></label>
          {{Form::text('tagline','',['class' => 'form-control','id' => 'text','required'])}}
      </div>
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
        <label for="logo" class="">Add a logo <b style="color:red;">*</b> </label>
        <label for="file-upload" class="custom-file-upload"> <i class="fa fa-cloud-upload"></i> Upload Your Logo</label>
          {{Form::file('logo', ['id' => 'file-upload','name' => 'logo','class' => 'hidden'])}}
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
