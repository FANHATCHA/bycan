<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
		<title>bycan.io | Dashboard</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="{{ asset('users/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('users/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('users/css/ionicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('users/css/font-awesome.min.css') }}" />
    <link href="{{ asset('users/css/emoji.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('ui/processing.js') }}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({
       selector:'textarea',
       plugins:'link code',
       plugins: "lists",
       menubar:false,
   });</script>

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    <!--Favicon-->
      <link rel="shortcut icon" type="image/png" href="{{ asset('users/images/betashare_small_icon.png') }}"/>


	</head>
  <body>

    <!-- Header
    ================================================= -->
		<header id="header">
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
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('users/images/logo_bycan-io.png') }}" alt="logo of betashare" width="110px;"/></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              <li class="dropdown">
                <a href="/home"> Home </a>
              </li>
              <li class="dropdown">
                <a href="/about"> Notifications </a>
              </li>
              <li class="dropdown">
                <a href="/about"> Messages </a>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle pages" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">    @if (count($profile) > 0)
                  {{ str_limit($profile->name, 15) }}
                    @else
                  {{ Auth::user()->name }}
                    @endif <span><img src="{{ asset('users/images/down-arrow.png') }}" alt="" /></span></a>
                <ul class="dropdown-menu page-list">
                  <li><a href="/home">Home</a></li>
                  <li><a href="/get-in-touch">Get In touch</a></li>
                  <li><a href="/edit-profile">Edit profile</a></li>
                  <li><a href="/settings-privacy">Settings & Privacy</a></li>
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>

                </ul>
              </li>


              <li class="dropdown">


                <a href="edit-profile">
                    <button class="btn btn-primary pull-right">  <i class="icon ion-edit"></i> Edit Profile</button>

                </a>
              </li>
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
