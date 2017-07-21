<?php
$mytitle = " :: WELCOME";
include_once('pages/iheader.php');
//$oth = $ezzzy->getrow();
?>
        <!-- end: Quick Help -->

        <div class="clearfix"></div>
        <!-- Iview Slider -->
        <div class="slider">
          <div id="iview">
            <!-- Slide 1 -->
            <div data-iview:image="images/slide1.jpg" data-iview:pausetime="60000">
<!--              <div class="iview-caption metro-box1 orange" data-transition="wipeUp" data-x="95" data-y="209"> <a href="about.html">
                <div class="box-hover"></div>
                <i class="fa fa-comment-o fa-fw"></i> <span>LITERAL WORLD</span></a> </div>-->
<!--              <div class="iview-caption metro-box1 blue" data-transition="wipeUp" data-x="266" data-y="209"> <a href="#a">
                <div class="box-hover"></div>
                <i class="fa fa-bullhorn fa-fw"></i> <span>RANDOM HARTLET</span></a> </div>-->
              <div class="iview-caption metro-box2" data-transition="expandLeft" data-x="438" data-y="209">
                <div class="monthlydeals">
                  <div class="monthly-deals slide" id="monthly-deals">
                    <div class="carousel-inner">
                        <div class="item active"> <a href="#a"> <img alt="" src="images/soft/1.jpg"> </a> </div>
                      <div class="item"> <a href="#a"> <img alt="" src="images/soft/2.jpg"> </a> </div>
                      <div class="item"> <a href="#a"> <img alt="" src="images/soft/3.jpg"> </a> </div>
                      <div class="item"> <a href="#a"> <img alt="" src="images/soft/4.jpg"> </a> </div>
                      <div class="item"> <a href="#a"> <img alt="" src="images/soft/5.jpg"> </a> </div>
                      <div class="item"> <a href="#a"> <img alt="" src="images/soft/6.jpg"> </a> </div>
                      <div class="item"> <a href="#a"> <img alt="" src="images/soft/7.jpg"> </a> </div>
                      <div class="item"> <a href="#a"> <img alt="" src="images/soft/8.jpg"> </a> </div>
                      <div class="item"> <a href="#a"> <img alt="" src="images/soft/1.png"> </a> </div>
                    </div>
                  </div>
                  <a class="left carousel-control" data-slide="prev" href="#monthly-deals"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="right carousel-control" data-slide="next" href="#monthly-deals"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                <!--  <span>Deals of the month</span> -->
              </div>
<!--              <div class="iview-caption metro-box1 purple" data-transition="wipeDown" data-x="438" data-y="37"> <a href="#a">
                <div class="box-hover"></div>
                <i class="fa fa-female fa-fw"></i> <span>DK's POP CULTURE</span></a> </div>
              <div class="iview-caption metro-box1 dark-blue" data-transition="wipeDown" data-x="610" data-y="37"> <a href="#a">
                <div class="box-hover"></div>
                <i class="fa fa-male fa-fw"></i> <span>Clothing</span></a> </div>-->
              <div class="iview-caption metro-heading" data-transition="expandLeft" data-x="95" data-y="40">
                <h1>SOFTWARELIBRARY.COM</h1>
              </div>
              <div class="iview-caption metro-heading" data-transition="wipeLeft" data-x="95" data-y="100"> <span>Some description Here<br>
                <a href="#a">read more</a></span> </div>
            </div>
            <!-- Slide 1 -->
            <div data-iview:image="images/slide1.jpg">
              <div class="iview-caption caption1" data-transition="wipeUp" data-x="100" data-y="10">30%</div>
              <div class="iview-caption caption2" data-easing="easeInOutElastic" data-transition="wipeLeft" data-x="100" data-y="140">SPECIAL
                OFFER</div>
              <div class="iview-caption caption3" data-easing="easeInOutElastic" data-transition="wipeLeft" data-x="100" data-y="200">One<br>
                Two.</div>
              <div class="iview-caption btn-more" data-transition="fade" data-x="100" data-y="280"><a href="#a">Learn
                more</a></div>
            </div>
            <!-- Slide 2 -->
            <div data-iview:image="images/slide2.jpg">
              <div class="iview-caption caption3 btm-bar" data-height="107px" data-transition="expandRight" data-width="867px" data-x="0" data-y="300">
                <h1><b><!--Something--> </b> <!--The title!--></h1>
                <p><!--Some things Here--></p>
              </div>
            </div>
			
			
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- end: Header --> 
<!-- Products -->
<div class="row clearfix f-space30"></div>
<div class="container">
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 main-column box-block">
      <div class="box-heading"><span>Latest apps</span></div>
      <div class="box-content">
        <div class="box-products slide" id="productc1">
          <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc1"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc1"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
          <div class="carousel-inner"> 
            <!-- Items Row -->
            <div class="item active">
              <div class="row box-product">
                  <?php
                   $thesft = $ezzzy->getallrow("ntype","APP","news","rec_id","D","","3");
                   while($mysoft = mysqli_fetch_array($thesft)){
                  ?>
                <!-- Product -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="product-block">
                    <div class="image">
                      <div class="product-label product-sale"><span><?php if($mysoft['apath'] != ""){echo "NEW APP";} else {echo "BLOG"; } ?></span></div>
                      <a class="img" href="blog-single.php?id=<?php echo $mysoft['rec_id']; ?>"><img alt="Software info" src="<?php echo "admin/". $mysoft['picture']; ?>" title="Software title"></a> </div>
                    <div class="product-meta">
                      <div class="name"><a href="blog-single.php?id=<?php echo $mysoft['rec_id']; ?>"><?php echo $mysoft['title']; ?></a></div>
                      <div class="big-price"> <span class="price-new"><span class="sym">F</span>ree</span></div>
                      <div class="big-btns"> <a class="btn btn-default btn-view pull-left" href="#">View</a> </div>
                      <div class="small-price"> <span class="price-new"><span class="sym">F</span>ree</span></div>
                      <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <i class="fa fa-star-o"></i> </div>
<!--                      <div class="small-btns">
                        <button class="btn btn-default btn-compare pull-left" data-toggle="tooltip" title="Add to Compare"> <i class="fa fa-retweet fa-fw"></i> </button>
                        <button class="btn btn-default btn-wishlist pull-left" data-toggle="tooltip" title="Add to Wishlist"> <i class="fa fa-heart fa-fw"></i> </button>
                        <button class="btn btn-default btn-addtocart pull-left" data-toggle="tooltip" title="Add to Cart"> <i class="fa fa-shopping-cart fa-fw"></i> </button>
                      </div>-->
                    </div>
                    <div class="meta-back"></div>
                  </div>
                </div>
                <!-- end: Product --> 
                <?php
                   }//end of the while loop for the apps
                ?>                
              </div>
            </div>
            <!-- end: Items Row -->            
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box-block sidebar">
      <div class="box-heading"><span>Ads</span></div>
      <div class="box-content">
        <div class="box-products slide carousel-fade" id="productc2">
          <ol class="carousel-indicators">
              <?php
              $i = 0;
                    $resuultt=$ezzzy->getallrow("ntype","ADVERT","news","rec_id","D");
                    while($row = mysqli_fetch_array($resuultt))
                   {
                ?>
              <li class="<?php if($i == 0){ echo "active"; } ?>" data-slide-to="<?php echo $i; ?>" data-target="#productc4"></li>            
                   <?php $i++; } ?>
          </ol>
          <div class="carousel-inner">
                <?php
                $j = 0;
                    $resullt=$ezzzy->getallrow("ntype","ADVERT","news","rec_id","D");
                    while($row = mysqli_fetch_array($resullt))
                   {
                ?>
            <!-- item -->
            <div class="item <?php if($j == 0){ echo "active"; } ?>">
              <div class="product-block">
                <div class="image">
                  <div class="product-label product-hot"><span><!--HOT--></span></div>
                  <a class="img" href="#"><img alt="product info" src="<?php echo "admin/". $row['picture']; ?>" title="product title"></a> </div>
                <div class="meta-back"></div>
              </div>
            </div>
            <!-- end: item --> 
                   <?php $j++;  } ?>            
          </div>
        </div>
        <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc2"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc2"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
        <div class="nav-bg"></div>
      </div>
    </div>
  </div>
</div>
<div class="row clearfix f-space30"></div>

<!-- Rectangle Banners -->
<div class="row clearfix f-space30"></div>
<div class="container">
  <div class="row">
    <!--<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
      <div class="rec-banner blue">
        <div class="banner"> <i class="fa fa-thumbs-up"></i>
          <h3>Guarantee</h3>
          <p>100% Money Back Guarantee*</p>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
      <div class="rec-banner red">
        <div class="banner"> <i class="fa fa-tags"></i>
          <h3>Affordable</h3>
          <p>Convenient & affordable prices for you</p>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
      <div class="rec-banner orange">
        <div class="banner"> <i class="fa fa-headphones"></i>
          <h3>24/7 Support</h3>
          <p>We support everything we sell</p>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
      <div class="rec-banner lightblue">
        <div class="banner"> <i class="fa fa-female"></i>
          <h3>Summer Sale</h3>
          <p>Upto 50% off on all women wear</p>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
      <div class="rec-banner darkblue">
        <div class="banner"> <i class="fa fa-gift"></i>
          <h3>Surprise Gift</h3>
          <p>Value N50 on orders over N700</p>
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
      <div class="rec-banner black">
        <div class="banner"> <i class="fa fa-truck"></i>
          <h3>Free Shipping</h3>
          <p>All over in world over N100</p>
        </div>
      </div>
    </div>-->
  </div>
</div>
<!-- end: Rectangle Banners -->
<!-- Widgets -->
<div class="row clearfix f-space30"></div>
<div class="container">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box-block sidebar">
      <div class="box-heading"><span>ADs</span></div>
      <!-- Best Sellers Products -->
      <div class="box-content">
        <div class="box-products slide carousel-fade" id="productc4">
          <ol class="carousel-indicators">
              <?php
              $i = 0;
                    $resultt=$ezzzy->getallrow("ntype","ADVERT","news","rec_id","D");
                    while($row = mysqli_fetch_array($resultt))
                   {
                ?>
              <li class="<?php if($i == 0){ echo "active"; } ?>" data-slide-to="<?php echo $i; ?>" data-target="#productc4"></li>            
                   <?php $i++; } ?>
          </ol>
          <div class="carousel-inner">
                <?php
                $j = 0;
                    $result=$ezzzy->getallrow("ntype","ADVERT","news","rec_id","D");
                    while($row = mysqli_fetch_array($result))
                   {
                ?>
            <!-- item -->
            <div class="item <?php if($j == 0){ echo "active"; } ?>">
              <div class="product-block">
                <div class="image">
                  <div class="product-label product-hot"><span><!--HOT--></span></div>
                  <a class="img" href="#"><img alt="product info" src="<?php echo "admin/". $row['picture']; ?>" title="product title"></a> </div>
                <div class="meta-back"></div>
              </div>
            </div>
            <!-- end: item --> 
                   <?php $j++;  } ?>            
          </div>
        </div>
        <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc4"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc4"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
        <div class="nav-bg"></div>
      </div>
      <!-- end: Best Sellers Products -->
      <div class="row clearfix f-space10"></div>
      <!-- Get Updates Box -->
      <div class="box-content">
        <div class="subscribe">
          <div class="heading">
            <h3>Get updates</h3>
          </div>
          <div class="formbox">
            <form>
              <i class="fa fa-envelope fa-fw"></i>
              <input class="form-control" id="InputUserEmail" placeholder="Your e-mail..." type="text">
              <button class="btn color1 normal pull-right" type="submit">Sign
              up</button>
            </form>
          </div>
        </div>
      </div>
      <!-- end: Get Updates Box --> 
    </div>
    <!-- end: Sidebar -->
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
      <div class="row">
        <div class="col-md-8 blog-block"> 
          <!-- Blog widget Box -->
          <div class="box-content slide carousel-fade" id="blogslide">
            <div class="carousel-inner">
              <!-- Post -->
              <div class="blog-entry item">
                <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>
                  Blog entry</span> <img class="ani-image" src="images/blog-4.jpg" alt="image info"> </div>
                <div class="entry-row">
                  <div class="date col-xs-12"><span>11</span><span>Jan 2015</span></div>
                  <div class="blog-text"><span><!--Title...--></span> <span><!--Description....--></span> <span> <a href="#a"> <i class="fa fa-user fa-fw"></i><!--#ezzzy--></a> <a href="#a"> <i class="fa fa-comments fa-fw"></i><!--19 Comments--></a> </span> </div>
                </div>
              </div>
              <!--END Post -->
              <!-- Post -->
              <div class="blog-entry item">
                <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>
                  Blog entry</span> <img class="ani-image" src="images/blog-1.jpg" alt=""> </div>
                <div class="entry-row">
                  <div class="date col-xs-12"><span>11</span><span>Jan 2015</span></div>
                  <div class="blog-text"><span><!--Title...--></span> <span><!--Description....--></span> <span> <a href="#a"> <i class="fa fa-user fa-fw"></i><!--#ezzzy--></a> <a href="#a"> <i class="fa fa-comments fa-fw"></i><!--19 Comments--></a> </span> </div>
                </div>
              </div>
              <!--END Post -->
              <!-- Post -->
              <div class="blog-entry item active">
                <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>
                  Blog entry</span> <img class="ani-image" src="images/blog-2.jpg" alt=""> </div>
                <div class="entry-row">
                  <div class="date col-xs-12"><span>11</span><span>Jan 2016</span></div>
                  <div class="blog-text"><span><!--Title...--></span> <span><!--Description....--></span> <span> <a href="#a"> <i class="fa fa-user fa-fw"></i><!--#ezzzy--></a> <a href="#a"> <i class="fa fa-comments fa-fw"></i><!--19 Comments--></a> </span> </div>
                </div>
              </div>
              <!--END Post -->
              <!-- Post -->
              <div class="blog-entry item">
                <div class="image"> <span class="blogico"> <i class="fa fa-bullhorn fa-fw"></i><br>
                  Blog entry</span> <img class="ani-image" src="images/blog-3.jpg" alt=""> </div>
                <div class="entry-row">
                  <div class="date col-xs-12"><span>11</span><span>Jan 2016</span></div>
                  <div class="blog-text"><span><!--Title...--></span> <span><!--Description....--></span> <span> <a href="#a"> <i class="fa fa-user fa-fw"></i><!--#ezzzy--></a> <a href="#a"> <i class="fa fa-comments fa-fw"></i><!--19 Comments--></a> </span> </div>
                </div>
              </div>
              <!--END Post -->
            </div>
            <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#blogslide"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#blogslide"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
          </div>
          <!-- end: Blog widget Box -->
          <div class="f-space10"></div>
        </div>
        <div class="col-md-4 twitter-block">
          <!-- twitter widget box -->
          <div class="box-content">
            <div class="twitter-box"> <i class="fa fa-twitter fa-fw"></i>
              <div class="title">Latest Tweets</div>
              <div class="carousel-fade" id="tweets">
                <div class="carousel-inner">
                  <!-- tweet -->
<!--                  <div class="tweet item active"><span>RT: <em>@Tailors.com</em> Some Tweet on Tailors.com Here... <b> http://www.tailors.com </b>- <em>@Tailors.Com</em> <br>
                    <br>
                    about 8 hours ago</span></div>-->
                  <!-- end: tweet -->
                  <!-- tweet -->
<!--                  <div class="tweet item"><span>RT: <em>@TheMayor</em> The Mayor's tweet here. <b> http://www.tailors.com </b>- <em>@Tailors.Com</em> <br>
                    <br>
                    about 2 hours ago</span></div>-->
                  <!-- end: tweet -->
                </div>
              </div>
            </div>
          </div>
          <!-- end: twitter widget box -->
          <div class="f-space10"></div>
        </div>
      </div>
      <div class="row"> 
        <!-- Brands -->
<!--        <div class="col-md-12 main-column box-block brands-block">
          <div class="box-heading"><span>Ads</span></div>
          <div class="box-content">
            <div class="box-products box-brands slide" id="brands">
              <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#brands"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#brands"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
              <div class="carousel-inner">
                <div class="brands-row item active">
                  <div class="brand-logo"><a href="#a"><img src="images/brands/logo1.png" alt=""></a></div>
                  <div class="brand-logo"><a href="#a"><img src="images/brands/logo2.png" alt=""></a></div>
                  <div class="brand-logo"><a href="#a"><img src="images/brands/logo3.png" alt=""></a></div>
                  <div class="brand-logo"><a href="#a"><img src="images/brands/logo1.png" alt=""></a></div>
                </div>
                <div class="brands-row item">
                  <div class="brand-logo"><a href="#a"><img src="images/brands/logo3.png" alt=""></a></div>
                  <div class="brand-logo"><a href="#a"><img src="images/brands/logo2.png" alt=""></a></div>
                  <div class="brand-logo"><a href="#a"><img src="images/brands/logo1.png" alt=""></a></div>
                  <div class="brand-logo"><a href="#a"><img src="images/brands/logo3.png" alt=""></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>-->
      </div>
      <!-- end: Brands --> 
    </div>
  </div>
</div>
<!-- end: Widgets -->
<div class="row clearfix f-space30"></div>
<!-- footer -->
<?php include_once('pages/footer.php'); ?>