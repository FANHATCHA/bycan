@extends('ads.adFrame')
@section('banner')
  <div id="tg-innerbanner" class="tg-innerbanner tg-haslayout">
    <figure data-vide-bg="poster:../../ads/images/img-01.jpg" data-vide-options="position: 50% 50%">
      <figcaption>
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="tg-bannercontent">
              @include('ads.incSearch')
              </div>
            </div>
          </div>
        </div>
      </figcaption>
    </figure>
    <div class="tg-breadcrumbarea">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ol class="tg-breadcrumb">
              <li><a href="/">Home</a></li>
              <li class="tg-active">Featured Posts</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('container')
  <div class="container">
    <div class="row">
      <div id="tg-twocolumns" class="tg-twocolumns">
        @include('ads.incAside')
        <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
          <div id="tg-content" class="tg-content">
            <div class="tg-contenthead">
            <div class="tg-ads tg-adsvtwo tg-adslist">
              <div class="row">
                @if(count($featuredPosts) > 0)
                <div class="infinite-scroll">
                @foreach($featuredPosts as $ad)
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="tg-ad tg-verifiedad">
                    <figure>
                      <span class="tg-themetag tg-featuretag">featured</span>
                      <a href="/ad/{{$ad->ad_slug}}"><img src="/img/adImage/{{$ad->adImage }}" alt="{{$ad->adTitle}}" width="169" height="172"></a>
                      <span class="tg-photocount">See 18 Photos</span>
                    </figure>
                    <div class="tg-adcontent">
                      <ul class="tg-productcagegories">
                        <li><a href="/category/{{ $ad->typeOfAd }}">{{ $ad->typeOfAd }}</a></li>
                      </ul>
                      <div class="tg-adtitle">
                        <h3><a href="/ad/{{$ad->ad_slug}}">{{ $ad->adTitle }}</a></h3>
                      </div>
                      <time datetime="2017-06-06">Posted on: {{date('F d, Y', strtotime($ad->created_at))}}</time>
                      <div class="tg-adprice"><h4>0 comment</h4></div>
                        <address>{{str_limit($ad->address, 26)}}</address>
                      <div class="tg-phonelike">
                        <a class="tg-btnphone" href="javascript:void(0);">
                          <i class="icon-phone-handset"></i>
                            <span data-toggle="tooltip" data-placement="top" title="Show Phone No." data-last="{{$ad->phone}}"><em>Show Phone No.</em></span>
                        </a>
                        <span class="tg-like tg-liked"><i class="fa fa-heart"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              {{$featuredPosts->links()}}
              </div>
              </div>
                @else
                 <p>No featured post found !</p>
               @endif
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
