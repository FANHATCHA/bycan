<footer id="tg-footer" class="tg-footer tg-haslayout">
  <div class="clearfix"></div>
  <div class="container">
    <div class="row">
      <div class="tg-footerinfo">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 pull-right">
          <div class="tg-widget tg-widgetsearchbylocations">
            <div class="tg-widgettitle">
              <h3>Categories:</h3>
            </div>
            <div class="tg-widgetcontent">
              <ul>
                @if(count($categories) > 0)
                @foreach($categories as $categorie)
                <li><a href="/category/{{$categorie->category_slug}}">  {{$categorie->categoryTitle}}</a></li>
              @endforeach
              @else
             <li><a href="/">No categories found !</a></li>
              @endif
              </ul>
              <ul>
                <li>
                  <a href="/for-business">bycan.io for business</a>
                </li>
                <li>
                  <a href="/featured"> Featured Products</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
          <div class="tg-widget tg-widgettext">
            <div class="tg-widgetcontent">
              <strong class="tg-logo"><a href="javascript:void(0);"><img src="images/logof.png" alt="image description"></a></strong>
              <div class="tg-description">

                  <p>bycan is an online platform which gathers all the blockchain technologies actors;
                  from the cryptocurrencies firms &amp; exchange platforms to the blockchain researchers.</p>
                  <p>bycan is where you can find all about the blockchain technologies. We are the first blockchain technologies online marketplace and social networking platform.</p>

              </div>
              <div class="tg-followus">
                <strong>Follow Us:</strong>
                <ul class="tg-socialicons">
                  <li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                  <li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                  <li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                  <li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
                  <li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
                </ul>
                <ul class="tg-appsnav">
                  <li><a href="/for-business"><img src="{{ asset("ads/images/apps-01.png") }}" alt="bycan.io app coming soon"></a></li>
                  <li><a href="/for-business"><img src="{{ asset("ads/images/apps-02.png") }}" alt="bycan.io app coming soon"></a></li>
                </ul>
              </div>
              <nav class="tg-footernav">
                <ul>
                  <li><a href="{{ url('/') }}">Home</a></li>
                  <li><a href="{{ url('/terms-of-use') }}">Terms of Use</a></li>
                  <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                  <li><a href="{{ url('/users-guideline') }}">Users Guideline</a></li>
                  <li><a href="{{ url('/get-in-touch') }}">Contact Us</a></li>

                </ul>
              </nav>
              <span class="tg-copyright">2018 All Rights Reserved &copy; bycan.io</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--************************************
    Footer End
*************************************-->
</div>
<!--************************************
  Wrapper End
*************************************-->
<!--************************************
  Theme Modal Box Start
*************************************-->
<div id="tg-modalselectcurrency" class="modal fade tg-thememodal tg-modalselectcurrency" tabindex="-1" role="dialog">
<div class="modal-dialog tg-thememodaldialog" role="document">
  <button type="button" class="tg-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
  <div class="modal-content tg-thememodalcontent">
    <div class="tg-title">
      <strong>Change Currency</strong>
    </div>
    <form class="tg-formtheme tg-formselectcurency">
      <fieldset>
        <div class="form-group">
          <div id="tg-flagstrapone" class="tg-flagstrap" data-input-name="country"></div>
        </div>
        <div class="form-group">
          <button class="tg-btn" type="button">Change Now</button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
</div>
<div id="tg-modalpriceconverter" class="modal fade tg-thememodal tg-modalpriceconverter" tabindex="-1" role="dialog">
<div class="modal-dialog tg-thememodaldialog" role="document">
  <button type="button" class="tg-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
  <div class="modal-content tg-thememodalcontent">
    <div class="tg-title">
      <strong>Currency Converter</strong>
    </div>
    <form class="tg-formtheme tg-formcurencyconverter">
      <fieldset>
        <div class="form-group">
          <div id="tg-flagstraptwo" class="tg-flagstrap" data-input-name="country"></div>
          <div class="tg-curencyrateetc">
            <span>120<sup>$</sup></span>
            <p>1 USD = 0.784769 GBP</p>
          </div>
        </div>
        <div class="form-group">
          <span class="tg-iconseprator"><i><img src="images/icons/img-36.png" alt="image description"></i></span>
        </div>
        <div class="form-group">
          <div id="tg-flagstrapthree" class="tg-flagstrap" data-input-name="country"></div>
          <div class="tg-curencyrateetc">
            <span>94.1723<sup>£</sup></span>
            <p>1 GBP = 1.27426 USD</p>
          </div>
        </div>
        <div class="form-group">
          <span class="tg-lastupdate">Last update on <time datetime="2017-08-08">2017-06-12 12:35 local time</time></span>
        </div>
        <div class="form-group">
          <button class="tg-btn" type="button">Convert Now</button>
        </div>
      </fieldset>
    </form>
  </div>
</div>
</div>
<!--************************************
  Theme Modal Box End
*************************************-->
<script src="{{ asset("ads/js/vendor/jquery-library.js") }}"></script>
<script src="{{ asset("ads/js/vendor/bootstrap.min.js") }}"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
<script src="{{ asset("ads/js/tinymce/tinymce.min4bb5.js?apiKey=4cuu2crphif3fuls3yb1pe4qrun9pkq99vltezv2lv6sogci") }}"></script>
<script src="{{ asset("ads/JS/responsivethumbnailgallery.html") }}"></script>
<script src="{{ asset("ads/js/jquery.flagstrap.min.js") }}"></script>
<script src="{{ asset("ads/js/backgroundstretch.js") }}"></script>
<script src="{{ asset("ads/js/owl.carousel.min.js") }}"></script>
<script src="{{ asset("ads/js/jquery.vide.min.js") }}"></script>
<script src="{{ asset("ads/js/jquery.collapse.js") }}"></script>
<script src="{{ asset("ads/js/scrollbar.min.js") }}"></script>
<script src="{{ asset("ads/JS/chartist.min.html") }}"></script>
<script src="{{ asset("ads/js/prettyPhoto.js") }}"></script>
<script src="{{ asset("ads/js/jquery-ui.js") }}"></script>
<script src="{{ asset("ads/js/countTo.js") }}"></script>
<script src="{{ asset("ads/js/appear.js") }}"></script>
<script src="{{ asset("ads/js/gmap3.js") }}"></script>
<script src="{{ asset("ads/js/main.js") }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.min.js"></script>
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            debug: true,
            loadingHtml: '<img class="center-block" src="{{ asset('../../img/loading_ajax.gif') }}" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: '.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>
</body>
</html>
