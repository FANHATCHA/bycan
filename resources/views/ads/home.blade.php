@include('ads.incHeader')
		<!--************************************
				Home Slider Start
		*************************************-->
		<div id="tg-homebanner" class="tg-homebanner tg-haslayout">
			<figure class="item" data-vide-bg="poster:ads/images/img-01.jpg" data-vide-options="position: 50% 50%">
				<figcaption>
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-bannercontent">

									<h1>A marketplace for blockchain technologies </h1>
									<h2>Find here companies, developers, researchers, advertisers & passionates</h2>
                   @include('ads.incSearch')
								</div>
							</div>
						</div>
					</div>
				</figcaption>
			</figure>
		</div>
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					Categories Search Start
			*************************************-->
			<section class="tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-push-1 col-lg-10">
							<div class="tg-categoriessearch">
								<div class="tg-title">
									<h2><span>Boost your search with</span> Trending Categories</h2>
								</div>
								<div id="tg-categoriesslider" class="tg-categoriesslider tg-categories owl-carousel">
									@if(count($categories) > 0)
									@foreach($categories as $categorie)
									<a href="category/{{$categorie->category_slug }}">
										<div class="tg-category">
										<div class="tg-categoryholder">
											<figure><img src="/img/categoryImage/{{$categorie->categoryImage }}" alt="{{$categorie->categoryTitle}}"></figure>
											<h3>{{$categorie->categoryTitle}}</h3>
										</div>
									</div>
								</a>
								@endforeach
								@else
								<p>No Category found !</p>
								@endif

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Categories Search End
			*************************************-->
			<!--************************************
					Featured Ads Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<div class="tg-title">
									<h2>Recommended posts for you</h2>
								</div>
								<div class="tg-description">
									<p>Over {{ $countFeat }} Featured Posts</p>
								</div>
							</div>
						</div>
						<div class="tg-ads">
							@if(count($featuredPosts) > 0)
			       @foreach($featuredPosts as $post)
							<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
								<div class="tg-ad tg-verifiedad">
									<figure>
										<span class="tg-themetag tg-featuretag">featured</span>
										<a href="/ad/{{$post->ad_slug}}"><img src="img/adImage/{{ $post->adImage }}" alt="{{ $post->adTitle }}"></a>
										<span class="tg-photocount">{{ $post->typeOfAd }}</span>
									</figure>
									<div class="tg-adcontent">
										<ul class="tg-productcagegories">
											<li><a href="/ad/{{$post->ad_slug}}">{{ str_limit($post->name, 26) }}</a></li>
										</ul>
										<div class="tg-adtitle">
											<h3><a href="/ad/{{$post->ad_slug}}">{{str_limit($post->adTitle, 15)}}</a></h3>
										</div>
										<time datetime="{{date('F d, Y', strtotime($post->updated_at))}}">Last Updated: {{date('F d, Y', strtotime($post->updated_at))}}</time>
										<div class="tg-adprice">
											<h4>
											</h4>

									</div>
											<address>
                      <a href="{{str_limit($post->website)}}">{{str_limit($post->website, 24)}}</a>
											</address>

										<div class="tg-phonelike">
											<a class="tg-btnphone" href="javascript:void(0);">
												<i class="icon-phone-handset"></i>
												<span data-toggle="tooltip" data-placement="top" title="Show Phone No." data-last="{{ $post->phone }}"><em>Show Phone No.</em></span>
											</a>
											<span class="tg-like tg-liked"><i class="fa fa-heart"></i></span>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					 @else
					<p>No Featued Post found !</p>
					@endif

						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-btnbox">
								<a class="tg-btn" href="/featured">View All</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Featured Ads End
			*************************************-->
			<!--************************************
					Latest Posted Ads Start
			*************************************-->
			<section class="tg-sectionspace tg-bglight tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<div class="tg-title">
									<h2>Latest Posts</h2>
								</div>
								<div class="tg-description">
									<p>Over {{$lastCount}}  New ads</p>
								</div>
							</div>
						</div>
						<div class="tg-ads tg-adsvtwo">
							@if(count($lastestPosts) > 0)
						 @foreach($lastestPosts as $lastest)
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="tg-ad tg-verifiedad">
									<figure>
										<span class="tg-themetag tg-featuretag">featured</span>
										<a href="/ad/{{$lastest->ad_slug}}"><img src="img/adImage/{{ $lastest->adImage }}" alt="{{ $lastest->adTitle }}"></a>
										<span class="tg-photocount">See 29 Photos</span>
									</figure>
									<div class="tg-adcontent">
										<ul class="tg-productcagegories">
											<li><a href="/category/{{ $lastest->typeOfAd }}">{{ $lastest->typeOfAd }}</a></li>
										</ul>
										<div class="tg-adtitle">
										<h3><a href="/ad/{{$lastest->ad_slug}}">{{str_limit($lastest->adTitle, 15)}}</a></h3>
										</div>
										<time datetime=" {{date('F d, Y', strtotime($lastest->updated_at))}}">Last Updated: {{date('F d, Y', strtotime($lastest->updated_at))}}</time>
										<div class="tg-adprice"><h4>$200</h4></div>
										<address>
										{{str_limit($lastest->address, 24)}}
										</address>
										<div class="tg-phonelike">
											<a class="tg-btnphone" href="javascript:void(0);">
												<i class="icon-phone-handset"></i>
												<span data-toggle="tooltip" data-placement="top" title="Show Phone No." data-last="{{ $lastest->phone }}"><em>Show Phone No.</em></span>
											</a>
											<span class="tg-like tg-liked"><i class="fa fa-heart"></i></span>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					 @else
					<p>No Post found !</p>
					@endif
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-btnbox">
								<a class="tg-btn" href="/newest-to-oldest">View All</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Latest Posted Ads End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		@include('ads.incFooter')
