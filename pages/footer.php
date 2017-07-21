<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-3 col-xs-12 shopinfo">
        <h4 class="title">SOFTWARELIBRARY.COM</h4>
        <p style="text-align: justify;">
            <?php
                                        $pag='about';
                                        include_once('admin/config.php');
                                        $resultss=mysqli_query($con,"SELECT * FROM siteinfo WHERE page='$pag'") or die(mysqli_error($con));
                                        $rowss=mysqli_fetch_array($resultss);

                                        echo substr(stripslashes($rowss['detail']),0,30);

                                  ?> ...
        </p>
      </div>
      <div class="col-sm-3 col-xs-12 footermenu">
        <h4 class="title">Information</h4>
        <ul>          
          <li class="item"> <a href="#a">FAQs</a></li>          
        </ul>
      </div>
      <div class="col-sm-3 col-xs-12 footermenu social-icons">
        <h4 class="title">Our Links</h4>       
          <ul>
            <li class="icon google-plus"><a href="#a"><i class="fa fa-google-plus fa-fw"></i></a></li>
            <li class="icon linkedin"><a href="#a"><i class="fa fa-linkedin fa-fw"></i></a></li>
            <li class="icon twitter"><a href="#a"><i class="fa fa-twitter fa-fw"></i></a></li>
            <li class="icon facebook"><a href="#a"><i class="fa fa-facebook fa-fw"></i></a></li>
          </ul>
      </div>
      <div class="col-sm-3 col-xs-12 getintouch">
        <h4 class="title">get in touch</h4>
        <ul>
<!--          <li>
            <div class="icon"><i class="fa fa-map-marker fa-fw"></i></div>
            <div class="c-info"> <span>OAU, OSUN STATE, NIGERIA<br>
              <a href="#a">Find us on map</a></span></div>
          </li>-->
          <li>
            <div class="icon"><i class="fa fa-envelope-o fa-fw"></i></div>
            <div class="c-info"> <span>Email Us At:<br>
              <a href="#a">info@softwarelibrary.com</a></span></div>
          </li>
<!--          <li>
            <div class="icon"><i class="fa fa-phone fa-fw"></i></div>
            <div class="c-info"> <span>24/7 Phone Support:<br>
              <a href="#a">+234 (80) ********</a></span></div>
          </li>
          <li>
            <div class="icon"> <i class="fa fa-skype fa-fw"></i></div>
            <div class="c-info"> <span>Talk to Us:<br>
              <a href="#a">skypeid</a></span></div>
          </li>-->
        </ul>
<!--        <div class="social-icons">
          <ul>
            <li class="icon google-plus"><a href="#a"><i class="fa fa-google-plus fa-fw"></i></a></li>
            <li class="icon linkedin"><a href="#a"><i class="fa fa-linkedin fa-fw"></i></a></li>
            <li class="icon twitter"><a href="#a"><i class="fa fa-twitter fa-fw"></i></a></li>
            <li class="icon facebook"><a href="#a"><i class="fa fa-facebook fa-fw"></i></a></li>
          </ul>
        </div>-->
      </div>
    </div>
  </div>
  <div class="copyrights">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8 col-xs-12"> <span class="copytxt">&copy; Copyright 2016 by <a href="about.php">Ekong Rebecca</a> -  All rights reserved</span> <span class="btmlinks"><a href="#"></a> <a href="policy.php">Privacy Policy</a> | <a href="terms.php">Terms of Use</a></span> </div>
<!--        <div class="col-lg-4 col-sm-4 col-xs-12 payment-icons"> <a href="#a"> <img src="images/icons/discover.png" alt="discover"> </a> <a href="#a"> <img src="images/icons/2co.png" alt="2co"> </a> <a href="#a"> <img src="images/icons/paypal.png" alt="paypal"> </a> <a href="#a"> <img src="images/icons/mastercard.png" alt="master card"> </a> <a href="#a"> <img src="images/icons/visa.png" alt="visa card"> </a> <a href="#a"> <img src="images/icons/moneybookers.png" alt="moneybookers"> </a> </div>-->
      </div>
    </div>
  </div>
</footer>
<!-- end: footer -->

<!-- Style Switcher JS -->
<script src="js/style-switch.js" type="text/javascript"></script>
<!--<section id="style-switch" class="bgcolor3">
  <h2>Change Theme <a href="#" class="btn color2"><i class="fa fa-cog "></i></a></h2>
  <div class="inner">
    <h3>Predefined Themes</h3>
    <ul class="colors list-unstyled" id="color1">
      <li><a href="#" class="blue-red" data-toggle="tooltip" title="Blue Red" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
      <li><a href="#" class="midnight-blue" data-toggle="tooltip" title="Midnight Blue" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
      <li><a href="#" class="mono-red" data-toggle="tooltip" title="Mono Red" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
      <li><a href="#" class="pinegreen-purple" data-toggle="tooltip" title="PineGreen Purple" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
      <li><a href="#" class="darkmagenta-rosybrown" data-toggle="tooltip" title="DarkMagenta RosyBrown" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
      <li><a href="#" class="darkorchid-seagreen" data-toggle="tooltip" title="DarkOrchid SeaGreen" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
      <li><a href="#" class="steel-blue" data-toggle="tooltip" title="Steel Blue" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
      <li><a href="#" class="cadetblue-violetred" data-toggle="tooltip" title="CadetBlue VioletRed" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
      <li><a href="#" class="mediumpurple-seagreen" data-toggle="tooltip" title="MediumPurple SeaGreen" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
      <li><a href="#" class="steelblue-leafgreen" data-toggle="tooltip" title="SteelBlue LeafGreen" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
      <li><a href="#" class="orange-steelblue" data-toggle="tooltip" title="Orange SteelBlue" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
      <li><a href="#" class="gray" data-toggle="tooltip" title="Gray" > <i class="fa fa-cog fa-stop one"></i><i class="fa fa-cog fa-stop two"></i></a></li>
    </ul>
  </div>
  <div id="reset" class="inner"><a href="#" class="btn normal color2 ">Reset</a></div>
</section>-->
<script>

(function(N) {
  "use strict";
 N('#menuMega').menu3d();
                N('#iview').iView({
                    pauseTime: 10000,
                    pauseOnHover: true,
                    directionNavHoverOpacity: 0.6,
                    timer: "360Bar",
                    timerBg: '#2da5da',
                    timerColor: '#fff',
                    timerOpacity: 0.9,
                    timerDiameter: 20,
                    timerPadding: 1,
					touchNav: true,
                    timerStroke: 2,
                    timerBarStrokeColor: '#fff'
                });

                N('.quickbox').carousel({
                    interval: 10000
                });
               N('#monthly-deals').carousel({
                    interval: 3000
                });
                N('#productc2').carousel({
                    interval: 4000
                });
                N('#tweets').carousel({
                    interval: 5000
                });
})(jQuery);



        </script>
</body>
</html>