<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
<aside id="tg-sidebar" class="tg-sidebar">
<div class="tg-widget tg-widgettrendingposts">
<div class="tg-sidebartitle"><h2>By Category</h2></div>
<div class="tg-widgetcontent">
  <?php
   use App\postYourAd;
   /*Company*/
   $Company = postYourAd::orderBy('created_at', 'desc')->where("typeOfAd", "=","Company")->get();
   /*Platform*/
   $Platform = postYourAd::orderBy('created_at', 'desc')->where("typeOfAd", "=","Platform")->get();
   /*Research*/
   $Research = postYourAd::orderBy('created_at', 'desc')->where("typeOfAd", "=","Research")->get();
   /*Innovation*/
   $Innovation = postYourAd::orderBy('created_at', 'desc')->where("typeOfAd", "=","Innovation")->get();
   /*news*/
   $News = postYourAd::orderBy('created_at', 'desc')->where("typeOfAd", "=","News")->get();
   /*Software*/
   $Software = postYourAd::orderBy('created_at', 'desc')->where("typeOfAd", "=","Software")->get();
   /*Service*/
   $Service = postYourAd::orderBy('created_at', 'desc')->where("typeOfAd", "=","Service")->get();
   /*Technology*/
   $Technology = postYourAd::orderBy('created_at', 'desc')->where("typeOfAd", "=","Technology")->get();
   /*Product*/
   $Product = postYourAd::orderBy('created_at', 'desc')->where("typeOfAd", "=","Product")->get();
   /*Other*/
   $Other = postYourAd::orderBy('created_at', 'desc')->where("typeOfAd", "=","Other")->get();
   /*ICO*/
   $ICO = postYourAd::orderBy('created_at', 'desc')->where("typeOfAd", "=","ICO")->get();
   /*Training*/
   $Training = postYourAd::orderBy('created_at', 'desc')->where("typeOfAd", "=","Training")->get();

   ?>
  <ul>
    <li>
      <a href="/category/ico">
        <span>ICO</span>
        <span>{{ count($ICO) }}</span>
      </a>
    </li>
    <li>
      <a href="/category/company">
        <span>Company</span>
        <span>{{ count($Company) }}</span>
      </a>
    </li>
    <li>
      <a href="/category/platform">
        <span>Platform</span>
        <span>{{ count($Platform) }}</span>
      </a>
    </li>
    <li>
      <a href="/category/research">
        <span>Research</span>
        <span>{{ count($Research) }}</span>
      </a>
    </li>
    <li>
      <a href="/category/innovation">
        <span>Innovation</span>
        <span>{{ count($Innovation) }}</span>
      </a>
    </li>
    <li>
      <a href="/category/news">
        <span>News</span>
        <span>{{ count($News) }}</span>
      </a>
    </li>
    <li>
      <a href="/category/software">
        <span>Software</span>
        <span>{{ count($Software) }}</span>
      </a>
    </li>
    <li>
      <a href="/category/service">
        <span>Service</span>
        <span>{{ count($Service) }}</span>
      </a>
    </li>
    <li>
      <a href="/category/training">
        <span>training</span>
        <span>{{ count($Training) }}</span>
      </a>
    </li>
    <li>
      <a href="/category/technology">
        <span>Technology</span>
        <span>{{ count($Technology) }}</span>
      </a>
    </li>
    <li>
      <a href="/category/product">
        <span>Product</span>
        <span>{{ count($Product) }}</span>
      </a>
    </li>
    <li>
      <a href="/category/other">
        <span>Other</span>
        <span>{{ count($Other) }}</span>
      </a>
    </li>
  </ul>
</div>
</div>
<div class="tg-widget tg-widgettrendingposts">
<div class="tg-sidebartitle"><h2>By Posts Type</h2></div>
<div class="tg-widgetcontent">
  <ul>
    <li>
      <a href="/featured">
        <span>Featured Posts</span>
        <span>{{ $countTrend }}</span>
      </a>
    </li>
  </ul>
</div>
</div>
<div class="tg-widget tg-widgettrendingposts">
<div class="tg-sidebartitle"><h2>Trending Posts</h2></div>
<div class="tg-widgetcontent">
  <div id="tg-trendingpostsslider" class="tg-trendingpostsslider owl-carousel">
    @if(count($trendings) > 0)
   @foreach($trendings as $trending)
    <div class="tg-post">
      <figure>
        <a href="/ad/{{$trending->ad_slug}}"><img src="../../img/adImage/{{ $trending->adImage }}" alt="{{ $trending->adTitle }}"></a>
      </figure>
      <div class="tg-postcontent">
        <ul class="tg-postcategories">
          <li><a href="/category/{{ $trending->typeOfAd }}">{{ $trending->typeOfAd }}</a></li>
          <li><a href="/ad/{{$trending->ad_slug}}">{{str_limit($trending->adTitle, 15)}}</a></li>
        </ul>
        <div class="tg-posttitle">
          <h3><a href="javascript:void(0);">Trending posts in 2018</a></h3>
        </div>
        <ul class="tg-postmetadata">
          <li>By: <a href="javascript:void(0);">{{str_limit($trending->name, 15)}}</a></li>
          <li><i class="icon-calendar"></i><a href="javascript:void(0);">{{date('F d, Y', strtotime($trending->updated_at))}}</a></li>
        </ul>
      </div>
    </div>
  @endforeach
 @else
<p>No Post found !</p>
@endif
  </div>
</div>
</div>
</aside>
</div>
