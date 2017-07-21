<div class="col-md-3 col-sm-12 col-xs-12 box-block page-sidebar">
      <div class="box-heading"><span>Categories</span></div>
      <!-- Blog Categories -->
      <div class="box-content">
        <div class="panel-group" id="blogcategories">
          <?php
          $r = 1;
           $resr = $ezzzy->getallresult("postcat");
           while($rw = mysqli_fetch_array($resr)){
          ?>
          <div class="panel panel-default">
              <div class="panel-heading closed" data-parent="#blogcategories" data-target="#collapse<?php echo convert_number_to_words($r); ?>" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span class="fa fa-plus"></span> <?php echo $rw['title']; ?> </a> </h4>
            </div>
            <div class="panel-collapse collapse" id="collapse<?php echo convert_number_to_words($r); ?>">
              <div class="panel-body">
                <ul>
                    <?php                    
                     $resrt = $ezzzy->getallrow("catid",$rw['rec_id'],"scat");
                     while($rww = mysqli_fetch_array($resrt)){
                    ?>
                  <li class="item"> <a href="blog_.php?id=<?php echo $rww['rec_id']; ?>&amp;typ=cat"><?php echo $rww['title']; ?></a></li>
                  <?php
                     }
                  ?>
                </ul>
              </div>
            </div>
          </div>
            <?php
            $r++;
           }
            ?>        
        </div>
      </div>
      <!-- end: Blog Categories -->
      <div class="clearfix f-space30"></div>
      <div class="box-heading"><span>Ads</span></div>
      <!-- Best Sellers Products -->
      <div class="box-content">
        <div class="box-products slide carousel-fade" id="productc4">
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
        <div class="carousel-controls"> <a class="carousel-control left" data-slide="prev" href="#productc4"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="carousel-control right" data-slide="next" href="#productc4"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
        <div class="nav-bg"></div>
      </div>
      <!-- end: Best Sellers Products -->
      <div class="clearfix f-space30"></div>
      <!-- Recent/Popular/Comments -->
      <!-- Nav tabs -->
<!--      <ul class="nav nav-tabs blog-tabs nav-justified">
        <li class="active"><a href="#recent" data-toggle="tab">Recent</a></li>
        <li><a href="#popular" data-toggle="tab">Popular</a></li>
        <li> <a href="#comments" data-toggle="tab"> <i class="fa fa-comments"></i> </a> </li>
      </ul>-->
      <!-- Tab panes -->
<!--      <div class="tab-content">
        <div class="tab-pane active" id="recent">
          <ul class="recent-posts">
              <?php                    
                   $resrtt = $ezzzy->getallrow("ntype","BLOG","news","rec_id","D","","3");
                   while($rwww = mysqli_fetch_array($resrtt)){
               ?>
            <li class="post-summery-list"> <a class="small-post-image" href="blog-single.php?id=<?php echo $rwww['rec_id']; ?>" title="Blog Post One"> <img alt="post image" class="img" height="88" src="<?php echo "admin/".$rwww['picture']; ?>" title="title" width="88"></a>
              <div class="post-summery"> <a href="blog-single.php?id=<?php echo $rwww['rec_id']; ?>" title="Blog Post One"><span class="title"><?php echo $rwww['title']; ?></span></a>
                <p><?php echo substr($rwww['descp'],0,100); ?>...</p>
              </div>
            </li>
            <?php
                   }
            ?>
          </ul>
        </div>
        <div class="tab-pane" id="popular">
          <ul class="popular-posts">
              <?php                    
                   $resritt = $ezzzy->getallrow("ntype","BLOG","news","rec_id","A","","3");
                   while($rwww = mysqli_fetch_array($resritt)){
               ?>
            <li class="post-summery-list"> <a class="small-post-image" href="blog-single.php?id=<?php echo $rwww['rec_id']; ?>" title="Blog Post One"> <img alt="post image" class="img" height="88" src="<?php echo "admin/". $rwww['picture']; ?>" title="title" width="88"></a>
              <div class="post-summery"> <a href="blog-single.php?id=<?php echo $rwww['rec_id']; ?>" title="Blog Post One"><span class="title"><?php echo $rwww['title']; ?></span></a>
                <p><?php echo substr($rwww['descp'],0,100); ?>...</p>
              </div>
            </li>            
           <?php
                   }
           ?>
          </ul>
        </div>
        <div class="tab-pane" id="comments">
          <ul class="recent-comments">
            <li class="post-comments-list">
              <div class="post-comments">
               <a href="#a" title="Blog Post One">Link</a> <em>- Posted on April 22, 2015</em>
              </div>
            </li>
            <li class="post-comments-list">
              <div class="post-comments">
               <a href="#a" title="Blog Post One">Link</a> <em>- Posted on April 22, 2015</em>
              </div>
            </li>
            <li class="post-comments-list">
              <div class="post-comments">
               <a href="#a" title="Blog Post One">Link</a> <em>- Posted on April 22, 2015</em>
              </div>
            </li>
            <li class="post-comments-list">
              <div class="post-comments">
               <a href="#a" title="Blog Post One">Link</a> <em>- Posted on April 22, 2015</em>
              </div>
            </li>
          </ul>
        </div>
      </div>-->
      <!-- end: Tab panes -->
      <!-- end: Recent/Popular/Comments -->
    </div>