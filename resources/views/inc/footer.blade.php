<!-- Footer
================================================= -->
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="footer-wrapper">
        <div class="col-md-3 col-sm-3">
          <a href="#"><img src="images/logo-black.png" alt="" class="footer-logo" /></a>
          <ul class="list-inline social-icons">
            <li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
            <li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
            <li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
            <li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
            <li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-2">
          <h5>For individuals</h5>
          <ul class="footer-links">
            <li><a href="#">Signup</a></li>
            <li><a href="#">login</a></li>
            <li><a href="#">Explore</a></li>
            <li><a href="#">Finder app</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">Language settings</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-2">
          <h5>For businesses</h5>
          <ul class="footer-links">
            <li><a href="#">Business signup</a></li>
            <li><a href="#">Business login</a></li>
            <li><a href="#">Benefits</a></li>
            <li><a href="#">Resources</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Setup</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-2">
          <h5>About</h5>
          <ul class="footer-links">
            <li><a href="#">About us</a></li>
            <li><a href="#">Contact us</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-3">
          <h5>Contact Us</h5>
          <ul class="contact">
            <li><i class="icon ion-ios-telephone-outline"></i>+1 (234) 222 0754</li>
            <li><i class="icon ion-ios-email-outline"></i>info@thunder-team.com</li>
            <li><i class="icon ion-ios-location-outline"></i>228 Park Ave S NY, USA</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright">
    <p>Thunder Team © 2016. All rights reserved</p>
  </div>
</footer>
@include('posts.post')

<!-- Scripts
================================================= -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&amp;callback=initMap"></script>
<script src="{{ asset('users/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('users/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('users/js/jquery.sticky-kit.min.js') }}"></script>
<script src="{{ asset('users/js/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('users/js/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.3.7/jquery.jscroll.min.js"></script>
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            debug: true,
            loadingHtml: '<img class="center-block" src="{{ asset('/img/loader.gif') }}" alt="Loading..." />',
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
