@extends('editProfile.editFrame')

@section('main')
@include('inc.messages')
<div class="edit-profile-container">
  <div class="block-title">
    <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Edit Info</h4>
    <div class="line"></div>
    <p>
        <img src="../../img/logo/{{ $profile->logo }}" alt="{{ $profile->name}}" width="150px;" />
      <hr>
      <div class="panel panel-default">
     <div class="panel-body">
       {!! Form::open(['action' => ['EditInfoCtrl@update', Crypt::encrypt($profile->id)], 'method' => 'POST', 'class' => 'form-inline', 'enctype' => 'multipart/form-data',  'onsubmit'=> 'ShowLoading()']) !!}
       {{ csrf_field() }}
 				{{ method_field('PUT') }}
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
           <label for="logo" class="">Change Your logo</label>
           <label for="file-upload" class="custom-file-upload"> <i class="fa fa-cloud-upload"></i> Upload Your Image </label>
             {{Form::file('logo', ['id' => 'file-upload','name' => 'logo','class' => 'hidden'])}}
         </div>

         <div class="form-group col-xs-12">
           <label for="name" class="">Name</label>
             {{Form::text('name',$profile->name,['class' => 'form-control','id' => 'text','required'])}}
         </div>

         <div class="form-group col-xs-12">
           <label for="tagline" class="">Tagline</label>
             {{Form::text('tagline',$profile->tagline,['class' => 'form-control','id' => 'text','required'])}}
         </div>

       </div>

       <style media="screen">
         .hidden { display: none; visibility: hidden; }
       </style>
       <hr>
       {{ Form::hidden('user_id', Crypt::encrypt(auth()->user()->id)) }}
       {{ Form::hidden('email',Crypt::encrypt(auth()->user()->email)) }}
       {{Form::submit('Save changes', ['class'=>'btn btn-primary'])}}
       {!! Form::close() !!}
     </div>
     </div>

    </p>
    <div class="line"></div>
  </div>
  <div class="edit-block">

  </div>
</div>


@endsection
@section('form')
    @include('posts.postForm')
@endsection
