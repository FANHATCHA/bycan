
<!Doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index, follow" />
	<!-- CSRF Token -->
	<title>A marketplace for blockchain technologies - bycan.io</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="{{ asset('ads/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('ads/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('ads/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('ads/css/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('ads/css/transitions.css') }}">
	<link rel="stylesheet" href="{{ asset('ads/css/flags.css') }}">
	<link rel="stylesheet" href="{{ asset('ads/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('ads/css/prettyPhoto.css') }}">
	<link rel="stylesheet" href="{{ asset('ads/css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('ads/css/scrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('ads/css/chartist.css') }}">
	<link rel="stylesheet" href="{{ asset('ads/css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('ads/css/color.css') }}">
	<link rel="stylesheet" href="{{ asset('ads/css/responsive.css') }}">
	<link rel="shortcut icon" type="image/png" href="{{ asset('users/images/betashare_small_icon.png') }}"/>
	<script src="{{ asset('ads/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

</head>
<body class="tg-home tg-homeone">
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<header id="tg-header" class="tg-header tg-haslayout">

			    @guest
						@else
			<div class="tg-topbar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="tg-navcurrency">
								<li><a href="/my-ads">My Posts ({{$userPosts}})</a></li>
								<li><a href="/messages" data-toggle="modal" data-target="#tg-modalpriceconverter">Messages</a></li>
								<li><a href="/home">Dashboard</a></li>
							</ul>
							<div class="dropdown tg-themedropdown tg-userdropdown">
								<a href="/home" id="tg-adminnav" class="tg-btndropdown" data-toggle="dropdown">
									@if (count($profile ) > 0)
									<span class="tg-userdp"><img src="../img/logo/{{ $profile->logo }}" alt="{{ $profile->name }}" width="40px;"></span>
								@else
								<span class="tg-userdp"><img src="../img/logo/default-user.png" alt="{{ Auth::user()->name }}"></span>
								@endif
								@if (count($profile) > 0)
							<span class="tg-name">{{str_limit($profile->name, 26)}}</span>

								@else
							 <span class="tg-name">{{ Auth::user()->name }}</span>
								@endif

								</a>
								<ul class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-adminnav">
									<li>
										<a href="/home">
											<i class="icon-home"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li>
										<a href="edit-profile">
											<i class="icon-cog"></i>
											<span>Profile Settings</span>
										</a>
									</li>
									<li class="menu-item-has-children">
										<a href="javascript:void(0);">
											<i class="icon-layers"></i>
											<span>My Posts ({{$userPosts}})</span>
										</a>
										<ul>
											@if(count($postOfUsers) > 0)
											@foreach($postOfUsers as $postOfUser)
											<li><a href="/ad/{{$postOfUser->ad_slug}}">{{str_limit($postOfUser->adTitle, 15)}}</li>
										@endforeach
										@else
										<p>No Post found !</p>
										@endif
										</ul>
									</li>

									<li class="menu-item-has-children">
										<a href="Messages">
											<i class="icon-envelope"></i>
											<span>Messages</span>
										</a>
										<ul>
											<li><a href="dashboard-offermessages.html">Offer Received</a></li>
											<li><a href="dashboard-offermessages.html">Offer Sent</a></li>
											<li><a href="dashboard-offermessages.html">Trash</a></li>
										</ul>
									</li>

									<li>
										<a href="/password/reset">
											<i class="icon-star"></i>
											<span>Reset Password</span>
										</a>
									</li>
									<li>
										<a href="{{ route('logout') }}"
												onclick="event.preventDefault();
																 document.getElementById('logout-form').submit();">
																 <i class="icon-exit"></i>
				 												<span>Logout</span>

										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
										</form>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endguest

			<div class="tg-navigationarea">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<strong class="tg-logo"><a href="{{ url('/') }}"><img src="{{ asset('users/images/bycan_green_logo.png') }}" alt="Logo of bycan" width="135px;"></a></strong>
              @guest
                <a class="tg-btn" href="/login">
  								<i class="icon-bookmark"></i>
  								<span>Join &amp; Post For Free</span>
  							</a>
              @else
                <a class="tg-btn" href="{{ url('/my-ads') }}">
                  <i class="icon-bookmark"></i>
                  <span>View my posts</span>
                </a>
              @endguest

							<nav id="tg-nav" class="tg-nav">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
									<ul>
										<li class="menu-item-has-children">
											<a href="javascript:void(0);">Categories</a>
											<ul class="sub-menu">
                        @if(count($categories) > 0)
                        @foreach($categories as $categorie)
												<li><a href="/category/{{$categorie->category_slug}}">  {{$categorie->categoryTitle}}</a></li>
                      @endforeach
                      @else
                    <li><a href="#">No categories found !</a></li>
                      @endif
											</ul>
										</li>
										<li class="menu-item-has-children">
											<a href="javascript:void(0);">Post's Timeline</a>
											<ul class="sub-menu">
												<li><a href="/newest-to-oldest">Newest to Oldest</a></li>
												<li><a href="/oldest-to-newest">Oldest to Newest</a></li>
											</ul>
										</li>
										<li class="menu-item">
											<a href="/who-we-are">Who we are</a>
										</li>
                    <li class="menu-item">
											<a href="/users-guideline">Guideline</a>
										</li>
                    <li class="menu-item">
                      <a href="/get-in-touch">Get in touch</a>
                    </li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!--************************************
				Header End
		*************************************-->
