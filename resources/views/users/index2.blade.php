<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>Betashare | The First Blockchain social media </title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="users/css/bootstrap.min.css" />
		<link rel="stylesheet" href="users/css/style.css" />
		<link rel="stylesheet" href="users/css/ionicons.min.css" />
    <link rel="stylesheet" href="users/css/font-awesome.min.css" />

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <!--Favicon-->
      <link rel="shortcut icon" type="image/png" href="users/images/betashare_small_icon.png"/>
			<!-- CSRF Token -->
	    <meta name="csrf-token" content="{{ csrf_token() }}">


	</head>
	<body>

    <!-- Header
    ================================================= -->
		<header id="header-inverse">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

						<a class="navbar-brand" href="{{ url('/') }}"><img src="users/images/logo_of_betashare.png" alt="logo of betashare" width="135px;"/></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <span><img src="images/down-arrow.png" alt="" /></span></a>
                  <ul class="dropdown-menu newsfeed-home">
                    <li><a href="index.html">Landing Page 1</a></li>
                    <li><a href="index-register.html">Landing Page 2</a></li>
                  </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Newsfeed <span><img src="images/down-arrow.png" alt="" /></span></a>
                  <ul class="dropdown-menu newsfeed-home">
                    <li><a href="newsfeed.html">Newsfeed</a></li>
                    <li><a href="newsfeed-people-nearby.html">Poeple Nearly</a></li>
                    <li><a href="newsfeed-friends.html">My friends</a></li>
                    <li><a href="newsfeed-messages.html">Chatroom</a></li>
                    <li><a href="newsfeed-images.html">Images</a></li>
                    <li><a href="newsfeed-videos.html">Videos</a></li>
                  </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Timeline <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu login">
                  <li><a href="timeline.html">Timeline</a></li>
                  <li><a href="timeline-about.html">Timeline About</a></li>
                  <li><a href="timeline-album.html">Timeline Album</a></li>
                  <li><a href="timeline-friends.html">Timeline Friends</a></li>
                  <li><a href="edit-profile-basic.html">Edit: Basic Info</a></li>
                  <li><a href="edit-profile-work-edu.html">Edit: Work</a></li>
                  <li><a href="edit-profile-interests.html">Edit: Interests</a></li>
                  <li><a href="edit-profile-settings.html">Account Settings</a></li>
                  <li><a href="edit-profile-password.html">Change Password</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Pages <span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu page-list">
                  <li><a href="index.html">Landing Page 1</a></li>
                  <li><a href="index-register.html">Landing Page 2</a></li>
                  <li><a href="newsfeed.html">Newsfeed</a></li>
                  <li><a href="newsfeed-people-nearby.html">Poeple Nearly</a></li>
                  <li><a href="newsfeed-friends.html">My friends</a></li>
                  <li><a href="newsfeed-messages.html">Chatroom</a></li>
                  <li><a href="newsfeed-images.html">Images</a></li>
                  <li><a href="newsfeed-videos.html">Videos</a></li>
                  <li><a href="timeline.html">Timeline</a></li>
                  <li><a href="timeline-about.html">Timeline About</a></li>
                  <li><a href="timeline-album.html">Timeline Album</a></li>
                  <li><a href="timeline-friends.html">Timeline Friends</a></li>
                  <li><a href="edit-profile-basic.html">Edit Profile</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="contact.html">Contact</a></li>
            </ul>
            <form class="navbar-form navbar-right hidden-sm">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control" placeholder="Search friends, photos, videos">
              </div>
            </form>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->
				<style media="screen">
						/* Shared */
						.loginBtn {
						box-sizing: border-box;
						position: relative;
						/* width: 13em;  - apply for fixed size */
						margin: 0.2em;
						padding: 0 15px 0 46px;
						border: none;
						text-align: left;
						line-height: 34px;
						white-space: nowrap;
						border-radius: 0.2em;
						font-size: 16px;
						color: #FFF;
						}
						.loginBtn:before {
						content: "";
						box-sizing: border-box;
						position: absolute;
						top: 0;
						left: 0;
						width: 34px;
						height: 100%;
						}
						.loginBtn:focus {
						outline: none;
						}
						.loginBtn:active {
						box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
						}


						/* Facebook */
						.loginBtn--facebook {
						background-color: #4C69BA;
						background-image: linear-gradient(#4C69BA, #3B55A0);
						/*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
						text-shadow: 0 -1px 0 #354C8C;
						}
						.loginBtn--facebook:before {
						border-right: #364e92 1px solid;
						background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
						}
						.loginBtn--facebook:hover,
						.loginBtn--facebook:focus {
						background-color: #5B7BD5;
						background-image: linear-gradient(#5B7BD5, #4864B1);
						}


						/* Google */
						.loginBtn--google {
						/*font-family: "Roboto", Roboto, arial, sans-serif;*/
						background: #DD4B39;
						}
						.loginBtn--google:before {
						border-right: #BB3F30 1px solid;
						background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
						}
						.loginBtn--google:hover,
						.loginBtn--google:focus {
						background: #E74B37;
						}
				</style>
    <!-- Landing Page Contents
    ================================================= -->
    <div id="lp-register">
    	<div class="container wrapper">
        <div class="row">
        	<div class="col-sm-5">
            <div class="intro-texts">
            	<h1 class="text-white">Welcome to blockchain &amp; its infinite possibilities</h1>
            	<p>The first social media fully dedicated to the blockchain technologies</p>
              <button class="btn btn-primary">Learn More</button>
            </div>
          </div>
        	<div class="col-sm-6 col-sm-offset-1">
            <div class="reg-form-container">

              <!-- Register/Login Tabs-->
              <div class="reg-options">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#register" data-toggle="tab">Register</a></li>
                  <li><a href="/login" >Login</a></li>
                </ul><!--Tabs End-->
              </div>

              <!--Registration Form Contents-->
              <div class="tab-content">

                <div class="tab-pane active" id="register">
                  <h3>Join us now</h3>
                  <p class="text-muted">Get started, It's entirely free !</p>

                  <!--Register Form-->
									<form name="registration_form" id='registration_form'  class="form-inline" method="POST" action="{{ route('register') }}">
											{{ csrf_field() }}
                    <div class="row">
                      <div class="form-group col-xs-12{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="firstname" class="sr-only">Name</label>
                        <input  id="name" type="text" class="form-control input-group-lg" name="name" value="{{ old('name') }}" title="Enter your name" placeholder="Name" required autofocus />
												@if ($errors->has('name'))
														<span class="help-block">
																<strong>{{ $errors->first('name') }}</strong>
														</span>
												@endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" type="email" class="form-control input-group-lg" name="email" value="{{ old('email') }}" title="Enter Email" placeholder="Email" required />
												@if ($errors->has('email'))
												<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
												 </span>
												@endif
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="sr-only">Password</label>
                        <input  id="password" type="password" class="form-control input-group-lg" name="password" required title="Enter password" placeholder="Password"/>
							          @if ($errors->has('password'))
												<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
												</span>
												@endif
                      </div>
                    </div>
										<div class="row">
											<div class="form-group col-xs-12">
												<label for="password-confirm" class="sr-only">Confirm Password</label>
												<input id="password-confirm" type="password" class="form-control input-group-lg" name="password_confirmation" required title="Enter password" placeholder="Confirm Password"/>
											</div>
										</div>

                  <p><a href="/login">Already have an account?</a></p>

                  <button type="submit" class="btn btn-primary">Register Now</button>
									  </form><!--Register Now Form Ends-->
									<br><br>
									<center>
									<button class="loginBtn loginBtn--facebook">
									  Sign up with Facebook
									</button>

									<button class="loginBtn loginBtn--google">
									  Sign up with Google
									</button>
								</center>
                </div><!--Registration Form Contents Ends-->

                <!--Login-->
                <div class="tab-pane" id="login">
                  <h3>Login</h3>
                  <p class="text-muted">Log into your account</p>

                  <!--Login Form-->

										<form name="Login_form" id='Login_form' class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-email" class="sr-only">Email</label>
                        <input id="my-email" class="form-control input-group-lg" type="text" name="Email" title="Enter Email" placeholder="Your Email"/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password" class="sr-only">Password</label>
                        <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password"/>
                      </div>
                    </div>
										  <button type="submit" class="btn btn-primary">Login Now</button>
                  </form><!--Login Form Ends-->
                  <p><a href="{{ route('password.request') }}">Forgot Password?</a></p>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-6">

            <!--Social Icons-->
            <ul class="list-inline social-icons">
              <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
              <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
              <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>

    <script src="users/js/jquery-3.1.1.min.js"></script>
    <script src="users/js/bootstrap.min.js"></script>
    <script src="users/js/jquery.appear.min.js"></script>
		<script src="users/js/jquery.incremental-counter.js"></script>
    <script src="users/js/script.js"></script>

	</body>
