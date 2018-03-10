@include('inc.header')
    <div id="page-contents">
    	<div class="container">
    		<div class="row">

          <!-- Newsfeed Common Side Bar Left
          ================================================= -->
    			<div class="col-md-3 static">
            <div class="profile-card">
              @if (count($profile ) > 0)
             <img src="../../img/logo/{{ $profile->logo }}" alt="{{ $profile->name }}" class="profile-photo" />
              @else
              <img src="../../img/logo/default-user.png" alt="{{ Auth::user()->name }}" class="profile-photo" />
              @endif

            	<h5><a href="my-ads" class="text-white">
                @if (count($profile) > 0)
              {{ $profile->name }}
                @else
              {{ Auth::user()->name }}
                @endif
              </a></h5>
            	<a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>
            </div><!--profile card ends-->
            <ul class="nav-news-feed">
              <li class="active"><i class="icon ion-ios-information-outline"></i><a href="/edit-profile">Basic Information</a></li>
               <li><i class="icon ion-ios-briefcase-outline"></i><a href="/about">About</a></li>
               <li><i class="icon ion-ios-heart-outline"></i><a href="/services">Services</a></li>
               <li><i class="icon ion-ios-settings"></i><a href="/contact">Contact</a></li>
               <li><i class="icon ion-ios-locked-outline"></i><a href="edit-profile-password.html">Latest News</a></li>

            </ul><!--news-feed links ends-->
            <div id="chat-block">
               <a href="/">
              <div class="title"> Preview Profile</div>
              </a>

            </div><!--chat block ends-->
          </div>
    			<div class="col-md-7">
            <!-- Start Container================================================= -->
                  @yield('main')
                  @yield('posts')
            <!-- End Container================================================= -->
          </div>

          <!-- Newsfeed Common Side Bar Right
          ================================================= -->
    			<div class="col-md-2 static">
            <div class="suggestions" id="sticky-sidebar">
              <h4 class="grey">Who to Follow</h4>
              <div class="follow-user">
                <img src="images/users/user-11.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Diana Amber</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="images/users/user-12.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Cris Haris</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="images/users/user-13.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Brian Walton</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="images/users/user-14.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Olivia Steward</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="images/users/user-15.jpg" alt="" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="timeline.html">Sophia Page</a></h5>
                  <a href="#" class="text-green">Add friend</a>
                </div>
              </div>
            </div>
          </div>
    		</div>
    	</div>
    </div>
  @include('inc.footer')
