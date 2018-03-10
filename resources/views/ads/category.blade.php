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
              <li class="tg-active">{{ $selected->categoryTitle }}</li>
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
            <div class="tg-ads tg-adsvtwo tg-adslist">
              <div class="row">
                @if(count($allAds) > 0)
                <div class="infinite-scroll">
                @foreach($allAds as $ad)
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="tg-ad tg-verifiedad">
                    <figure>

                      <a href="/ad/{{$ad->ad_slug}}"><img src="/img/adImage/{{$ad->adImage }}" alt="{{$ad->adTitle}}" width="169" height="172"></a>
                      <span class="tg-photocount">{{ $ad->typeOfAd}}</span>
                    </figure>
                    <div class="tg-adcontent">
                      <ul class="tg-productcagegories">
                        <li>
                          <time datetime=" {{date('F d, Y', strtotime($ad->updated_at))}}">{{date('F d, Y', strtotime($ad->updated_at))}}</time>
                        </li>
                      </ul>
                      <div class="tg-adtitle">
                        <h3><a href="/ad/{{$ad->ad_slug}}">{{ $ad->adTitle }}</a></h3>
                      </div>


                        <p>
                          {!! str_limit(strip_tags($ad->about), 100 ) !!}
                        </p>

                      <address>
                      {{str_limit($ad->address, 24)}}
                      </address>

                      <div class="tg-phonelike">
                        <a class="tg-btnphone" href="javascript:void(0);">
                          <i class="icon-phone-handset"></i>
                         <span data-toggle="tooltip" data-placement="top" title="Show Phone No." data-last="{{ $ad->phone }}"><em>Show Phone No.</em></span>
                        </a>
                        <span class="tg-like tg-liked"><i class="fa fa-heart"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              {{$allAds->links()}}
              </div>
                </div>
                @else
                 <p>No ad found !</p>
               @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
