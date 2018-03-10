@extends('editProfile.editFrame')

@section('main')
@include('inc.messages')
<div class="edit-profile-container">
  <div class="block-title">
    <center><h4 class="grey"><i class="icon ion-android-checkmark-circle"></i> Add Services</h4></center>
    <div class="line"></div>
    <p>
      <div class="panel panel-default">
     <div class="panel-body">
       @if (count($services ) > 0)
      <a href="service/{{ Crypt::encrypt($services->id)}}/edit"  class="btn btn-success"><span class="fa fa-edit"></span> Edit</a><hr>
       {!! str_limit(strip_tags($services->services,1000)) !!}
       @else
       <img src="img/banner/default-banner.jpg" alt="{{ Auth::user()->name }}" width="150px;" />
       @endif
       <hr>
       @if (count($services ) > 0)
       @else
       <p>No record found</p>
       @endif
     </div>
     </div>

    </p>
    <div class="line"></div>
  </div>
  <div class="edit-block">
    {!! Form::open(['action' => 'ServicesCtrl@store', 'name' => 'basic-info','id' => 'basic-info', 'class' => 'form-inline', 'method' => 'POST', 'enctype' => 'multipart/form-data',  'onsubmit'=> 'ShowLoading()']) !!}
    {{ csrf_field()  }}
    <div class="row">
      <div class="row">
        <div class="form-group col-xs-12">
          <label for="my-info">Add your services or products  <b style="color:red;">*</b></label>
          {{Form::textarea('services', '', [ 'rows' => '15' , 'cols' => '400','id' => 'my-info', 'class' => 'form-control', 'placeholder' => 'Brief description of your ad'])}}
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
