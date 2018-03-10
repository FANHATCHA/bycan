@include('inc.header')
    <div id="page-contents">
    	<div class="container">
    		<div class="row">

          <!-- Newsfeed Common Side Bar Left
          ================================================= -->
    			<div class="col-md-3 static">
            <div class="profile-card">
              @if (count($profile ) > 0)
             <img src="img/logo/{{ $profile->logo }}" alt="{{ $profile->name }}" class="profile-photo" />
              @else
              <img src="img/logo/default-user.png" alt="{{ Auth::user()->name }}" class="profile-photo" />
              @endif
            	<h5><a href="my-ads" class="text-white">
                @if (count($profile) > 0)
              {{ $profile->name }}
                @else
              {{ Auth::user()->name }}
                @endif
              </h5>
            	<a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>
            </div><!--profile card ends-->
            <ul class="nav-news-feed">
              <li><i class="icon ion-ios-paper"></i><div><a href="home">Public posts</a></div></li>
              <li><i class="icon ion-ios-people"></i><div><a href="my-ads">Private posts</a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="add-category">Add Category</a></div></li>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="change-status">Change Status</a></div></li>
              <li><i class="icon ion-chatboxes"></i><div><a href="newsfeed-messages.html">Messages</a></div></li>
              <li><i class="icon ion-images"></i><div><a href="edit-profile">Request for reference</a></div></li>
              <li><i class="icon ion-ios-videocam"></i><div><a href="newsfeed-videos.html">Videos</a></div></li>
            </ul><!--news-feed links ends-->
            <div id="chat-block">
              <a href="edit-profile"><div class="title">Edit Profile</div></a>

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
              <h4 class="grey"> <img src="{{ asset('users/images/bycan_blue_logo.png') }}" alt="bycan_for_business" width="170px;"> </h4>
              <div class="follow-user">
                <img src="{{ asset('/users/images/blockchain_bycan.jpg') }}" alt="blockain Consulting" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="/get-in-touch">Blockchain Consulting</a></h5>
                    <a href="/get-in-touch" class="text-green">Send Request</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="{{ asset('/users/images/dashboard.png') }}" alt="bycan dashboard" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="/get-in-touch">Advanced Dashboard</a></h5>
                  <a href="/get-in-touch" class="text-green">Send Request</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="{{ asset('/users/images/analytics.png') }}" alt="bycan Analytics" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="/get-in-touch">Analytics</a></h5>
                  <a href="/get-in-touch" class="text-green">Send Request</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="{{ asset('/users/images/chat.png') }}" alt="bycan chat" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="/get-in-touch">Chat with users</a></h5>
                  <a href="/get-in-touch" class="text-green">Send Request</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="{{ asset('/users/images/email.png') }}" alt="bycan email" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="/get-in-touch">Unlimited Email</a></h5>
                    <a href="/get-in-touch" class="text-green">Send Request</a>
                </div>
              </div>
              <div class="follow-user">
                <img src="{{ asset('/users/images/report.png') }}" alt="bycan report" class="profile-photo-sm pull-left" />
                <div>
                  <h5><a href="/get-in-touch">Monthly report (with insights)</a></h5>
                    <a href="/get-in-touch" class="text-green">Send Request</a>
                </div>
              </div>
            </div>
          </div>
    		</div>
    	</div>
    </div>
  @include('inc.footer')
