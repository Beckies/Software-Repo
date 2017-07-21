<script src="../js/js/jquery.easy-ticker.js"></script>
<script src="../js/js/transition.js"></script>
<script src="../js/jquery.stuck.js"></script>
	<script type="text/javascript">
$(document).ready(function(){
$(window).stuck();
//Slider for News
$('.vtickerr').easyTicker({
		direction: 'up',
		easing: 'swing',
		speed: 'slow',
		interval: 5000,
		height: 'auto',
		visible: 2
	});
//Slider for Events
$('.pticker').easyTicker({
		direction: 'left',
		easing: 'fadeIn',
		speed: 'slow',
		interval: 5000,
		height: 'auto',
		visible: 1
	});
//Slider for Adverts
$('.sticker').easyTicker({
		direction: 'top',
		easing: 'easeInOutBack',
		speed: 'slow',
		interval: 3000,
		height: 'auto',
		visible: 1
	});
});
  </script>
  <script>
function getNews() {
$.ajax({
url: "getn.php",
success: function(response) {
$("#ntst").html(response).hide().fadeIn("slow");
}
});
};
setInterval("getNews()", 10000);

function getEvents() {
$.ajax({
url: "gete.php",
success: function(response) {
$("#etst").html(response).hide().fadeIn("slow");
}
});
};
setInterval("getEvents()", 10000);
</script>
<div class="col-lg-4">
					
			<!-- Section for News  -->
								<section class="panel"> 
									<header class="panel-heading">News</header> 
									<section>
                                        <div class="carousel slide auto panel-body" id="c-slide">
										 <div class="carousel-inner">
											 <div class="item active"><p class="text-center"> <em class="h4 text-mute">Place your</em><br> <small class="text-muted">Adverts Here</small> </p> </div> 
											<?php
												//$result=$ezzzy->getallrow("ntype","NEWS","news","rec_id","D");
											$result = mysqli_query($con, "SELECT * FROM news where ntype='NEWS' order by rand() limit 5") or die("Cannot get the required notifications");
											while($row = mysqli_fetch_array($result))
											{
											?> 
										 <div class="item"> 
											 <p class="text-center"> <em class="h4 text-mute"><?php echo $row['title']; ?> </em><br> 
												<small class="text-muted"><a href="./?lnk=news_det&amp;id=<?php echo $row['rec_id']; ?>"><?php echo substr($row['descp'],0,10); ?></a></small>
											 </p> 
										 </div> 
										 <?php
												}
										 ?>
										 </div>
										<a class="left carousel-control" href="#c-slide" data-slide="prev"> <i class="icon-angle-left"></i> </a> 
                                        <a class="right carousel-control" href="#c-slide" data-slide="next"> <i class="icon-angle-right"></i></a> 										 
										 </div>
                                    </section>                                   
                                                                </section>
									<!-- /News -->																							
									<!-- Events -->							
																<section class="panel"> 
									<header class="panel-heading">Events</header> 
									<section>
                                        <div class="carousel slide auto panel-body" id="d-slide">
										 <div class="carousel-inner">
											 <div class="item active"><p class="text-center"> <em class="h4 text-mute">Place your</em><br> <small class="text-muted">Adverts Here</small> </p> </div> 
											<?php
												//$result=$ezzzy->getallrow("ntype","EVENTS","news","rec_id","D");
											$result = mysqli_query($con, "SELECT * FROM news where ntype='EVENTS' order by rand() limit 5") or die("Cannot get the required notifications");
											while($row = mysqli_fetch_array($result))
											{
											?> 
										 <div class="item"> 
											 <p class="text-center"> <em class="h4 text-mute"><?php echo $row['title']; ?> </em><br> 
												<small class="text-muted"><a href="./?lnk=news_det&amp;id=<?php echo $row['rec_id']; ?>"><?php echo substr($row['descp'],0,10); ?></a></small>
											 </p> 
										 </div> 
										 <?php
												}
										 ?>
										 </div>
										<a class="left carousel-control" href="#d-slide" data-slide="prev"> <i class="icon-angle-left"></i> </a> 
                                        <a class="right carousel-control" href="#d-slide" data-slide="next"> <i class="icon-angle-right"></i></a> 										 
										 </div>
                                    </section>                                   
                                                                </section>
                                
								   <!-- /Events -->
                                
                                    <section class="panel"> 
									<header class="panel-heading">Notification</header>
									<section>
                                                                        <div class="carousel slide auto panel-body" id="c-slide">
                                                                         <ol class="carousel-indicators out"> 
                                                                         <li data-target="#c-slide" data-slide-to="0" class="active"></li> 
                                                                         <li data-target="#c-slide" data-slide-to="1" class=""></li> 
                                                                         <li data-target="#c-slide" data-slide-to="2" class=""></li> 
                                                                         </ol> 
                                                                         <div class="carousel-inner"> 
                                                                         <div class="item active"> 
                                                                         <p class="text-center"> <em class="h4 text-mute">Save your time</em><br> <small class="text-muted">Many components</small> </p>
                                                                         </div> 
                                                                         <div class="item"> <p class="text-center"> <em class="h4 text-mute">Nice and easy to use</em><br> <small class="text-muted">Full documents</small> </p> 
                                                                         </div> 
                                                                         <div class="item"> <p class="text-center"> <em class="h4 text-mute">Mobile header first</em><br> <small class="text-muted">Mobile/Tablet/Desktop</small> </p> 
                                                                         </div> 
                                                                         </div> 
                                                                         <a class="left carousel-control" href="#c-slide" data-slide="prev"> <i class="icon-angle-left"></i> </a> 
                                                                         <a class="right carousel-control" href="#c-slide" data-slide="next"> <i class="icon-angle-right"></i></a> 
                                                                         </div> 
                                                                         </section> 
                                    </section> 
                               
                            </div>
                        </div> 
                    </section> 
                </section> 
                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body"></a> 
            </section> 
            <!-- /.vbox --> 
        </section>        
     <!-- Bootstrap -->
     <!-- Sparkline Chart -->
     <!-- App -->
	 <script type="text/javascript">
			$(document).ready(function(){
			$(".timeago").livequery(function() // LiveQuery 
			{
			$(this).timeago(); // Calling Timeago Funtion 
			});
			});
			</script> 
    </body>
</html>