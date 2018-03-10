@extends('posts.postFrame')

@section('main')
@include('inc.messages')
<hr>
{!! Form::open(['action' => 'CategoryCtrl@store', 'name' => 'basic-info','id' => 'basic-info', 'class' => 'form-inline', 'method' => 'POST', 'enctype' => 'multipart/form-data',  'onsubmit'=> 'ShowLoading()']) !!}
{{ csrf_field()  }}

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
  <label for="file-upload" class="custom-file-upload"> <i class="fa fa-cloud-upload"></i> Upload Image  <span>(Category's image )</span></label>
    {{Form::file('categoryImage', ['id' => 'file-upload','name' => 'categoryImage','class' => 'hidden', 'required'])}}
</div>

<div class="form-group col-xs-12">
  <label for="adTitle" class="">Category Title</label>
    {{Form::text('categoryTitle','',['class' => 'form-control','id' => 'text','required'])}}
</div>

<br><br>
{{ Form::hidden('user_id', Crypt::encrypt(auth()->user()->id)) }}
{{ Form::hidden('email',Crypt::encrypt(auth()->user()->email)) }}

<center>{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}</center>
{!! Form::close() !!}
@endsection

<br>
@section('posts')
  <hr>
  @if(count($categories) > 0)
  @foreach($categories as $categorie)
  <div class="nearby-user">
    <div class="row">
      <div class="col-md-2 col-sm-2">
        <img src="/img/categoryImage/{{$categorie->categoryImage }}" alt="{{$categorie->categoryTitle}}" class="profile-photo-lg" />
      </div>
      <div class="col-md-7 col-sm-7">
        <h5>{{$categorie->categoryTitle}}</h5>
        <p class="text-muted">{{$categorie->created_at->diffForHumans()}}</p>
      </div>

      <div class="col-md-3 col-sm-3">

          <form action="/addCategory/{{$categorie->id}}" method="POST">
          {{ csrf_field()}}
          {{ method_field('DELETE')}}
          <button type="submit" value="delete" name="Delete" class="btn btn-danger"><span class="fa fa-remove"></span> Delete</button>
          </form>

      </div>
    </div>
  </div>
  <hr>
  @endforeach
  <center>{{$categories->links()}}</center>
  @else
  <p>No Category found !</p>
  @endif
@endsection
