@extends('editProfile.editFrame')

@section('main')
@include('inc.messages')
<div class="edit-profile-container">
  <div class="block-title">
    <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Edit Services</h4>
    <div class="line"></div>
    <p>

       {!! Form::open(['action' => ['ServicesCtrl@update', Crypt::encrypt($services->id)], 'method' => 'POST', 'class' => 'form-inline', 'enctype' => 'multipart/form-data',  'onsubmit'=> 'ShowLoading()']) !!}
       {{ csrf_field() }}
 				{{ method_field('PUT') }}


         <div class="row">
           <div class="form-group col-xs-12">
             <label for="my-info">Services </label>
             {{Form::textarea('services', $services->services, [ 'rows' => '15' , 'cols' => '400','id' => 'my-info', 'class' => 'form-control', 'placeholder' => 'Brief description of your ad'])}}
               <small id="emailHelp" class="form-text text-muted">Click on <img src="../../users/images/wrap.png" alt="Betashare wrap"> to wrap the textarea</small>
           </div>


       <style media="screen">
         .hidden { display: none; visibility: hidden; }
       </style>
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
