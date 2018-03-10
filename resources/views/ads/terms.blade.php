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
              <li class="tg-active">Users Guide</li>
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
                <div class="tg-sectionhead tg-sectionheadvtwo">
                <div class="tg-title">
                  <h2> Users Guidelines</h2>
                </div>
                <div class="tg-description">
                  <p>Do You have some preoccupations ?  or Interested in becoming a partner? <br>Let's talk!</p>
                </div>
             </div>
7777777777777777777777777777777777777
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
