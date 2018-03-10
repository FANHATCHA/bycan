<br>
                    <!-- Basic Information
                    ================================================= -->
                    <div class="edit-profile-container">
                      <div class="block-title">
                        <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i>Post an ad</h4>
                        <div class="line"></div>
                        <p>Your ad should be related to the blockchain technologies</p>
                        <div class="line"></div>
                      </div>
                      <div class="edit-block">
                          {!! Form::open(['action' => 'PostYourAdCtrl@store', 'name' => 'basic-info','id' => 'basic-info', 'class' => 'form-inline', 'method' => 'POST', 'enctype' => 'multipart/form-data',  'onsubmit'=> 'ShowLoading()']) !!}
                          {{ csrf_field()  }}
                          <div class="row">
                            <div class="form-group col-xs-6">
                              <label for="firstname">Type of ad</label>
                              <select class="form-control border-input" name="typeOfAd" id="typeOfAd" required>
                                     @if(count($categories) > 0)
                                   <option disabled="" selected="">Pick an ad Type</option>
                                   @foreach ($categories as $key => $categorie)
                                   <option value="{{$categorie->categoryTitle}}">{{$categorie->categoryTitle}}</option>
                              @endforeach

                              @else
                              <p><div class="alert alert-danger" role="alert">
                               <option value="No Category Title">No Category Title</option>
                              </div></p>
                              @endif
                                   </select>
                            </div>


                            <div class="form-group col-xs-12">
                              <label for="adTitle" class="">Ad Title</label>
                                {{Form::text('adTitle','',['class' => 'form-control','id' => 'text','required'])}}
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
                              <label for="file-upload" class="custom-file-upload"> <i class="fa fa-cloud-upload"></i> Upload Image  <span>(This will be your ad's cover )</span></label>
                                {{Form::file('adImage', ['id' => 'file-upload','name' => 'adImage','class' => 'hidden', 'required'])}}
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-xs-12">
                              <label for="my-info">Describe ad</label>
                              {{Form::textarea('describeAd', '', [ 'rows' => '15' , 'cols' => '400','id' => 'my-info', 'class' => 'form-control', 'placeholder' => 'Brief description of your ad'])}}
                                <small id="emailHelp" class="form-text text-muted">Click on <img src="users/images/wrap.png" alt="Betashare wrap"> to wrap the textarea</small>
                            </div>
                          </div>
                          <style media="screen">
                            .hidden { display: none; visibility: hidden; }
                          </style>
                          {{ Form::hidden('user_id', Crypt::encrypt(auth()->user()->id)) }}
                          {{ Form::hidden('email',Crypt::encrypt(auth()->user()->email)) }}
                          {{Form::submit('Post Your Ad', ['class'=>'btn btn-primary'])}}
                        {!! Form::close() !!}
                      </div>
                    </div>
