<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" /><!-- fontawesome -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" /><!-- Bootstrap stylesheet -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/hover.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<!-- stylesheet -->
<!-- meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //meta tags -->
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<!--//fonts-->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="js/main.js"></script>
<!-- Required-js -->
<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner --> 
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});


</script>

    <style>

        .demo-1 {
            color:pink;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        </style>
<!-- start-smoth-scrolling -->

<!-- scriptfor smooth drop down-nav -->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- //script for smooth drop down-nav -->
</head>
<body>
<!-- header -->
	<header>
		<div class="w3layouts-top-strip">
			<div class="container">
				<div class="logo">
					<h1><a href="index.php">Fashion Blog</a></h1>
					<p>lets make a Life style</p>
				</div>
			
			</div>
		</div>
		<!-- navigation -->
			<nav class="navbar navbar-default">
			  <div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
                      <li><a class="active" href="index.php">Home</a></li>
                      <li><a href="blog.php">Blog</a></li>
                      <?php
                      if (isset($_SESSION["login"]) && $_SESSION["login"]!="1"){
                      ?>
                          <li><a href="createblogpage.php">+ Create Blog Page</a></li>
                          <li><a href="logout.php">Logout</a></li>
                          <?php
                      }else if(isset($_SESSION["login"]) && $_SESSION["login"]=="1"){?>
                          <li><a href="createblogpage.php">+ Create Blog Page</a></li>
                          <li><a href="overzicht.php">Overview</a></li>
                          <li><a href="logout.php">Logout</a></li>
                      <?php }else{ ?>
                          <li><a href="login.php">Login</a></li>
                      <?php } ?>
                      <!--<li><a href="createblogpage.php">+ Create Blog Page</a></li>-->
				  </ul>
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			
		<!-- //navigation -->
	</header>
	<!-- //header -->
	<!-- top-header and slider -->
	<div class="w3-slider">	
	<!-- main-slider -->
		<ul id="demo1">
			<li>
				<img src="images/1.jpg" alt="" />
				<!--Slider Description example-->
				<div class="slide-desc">
					<h3>Fashion</h3>
				</div>
			</li>
			<li>
				<img src="images/2.jpg" alt="" />
				  <div class="slide-desc">
					<h3>Life Style </h3>
				</div>
			</li>
			<li>
				<img src="images/3.jpg" alt="" />
				<div class="slide-desc">
					<h3>Photography</h3>
				</div>
			</li>
			
		</ul>
	</div>
	<!-- //main-slider -->
	<!-- //top-header and slider -->
	<div class="container">
		<div class="banner-btm-agile">
		<!-- //btm-wthree-left -->
			<div class="col-md-9 btm-wthree-left">
                <?php  include_once './db/dao/BlogDAO.php';
                include_once './db/dao/AuteurDAO.php';
                include_once './db/dao/CommentDAO.php';

                foreach (BlogDAO::getMostComments() as $item) {
                    $path = "./images/";
                    $path=$path.$item->foto; ?>

				<div class="wthree-top" id="parent">
					<div class="w3agile-top">
						<div class="w3agile_special_deals_grid_left_grid">
                            <form method="get" action="detail.php">
                                <input type="hidden" name="blogID" value="<?php echo $item->blogID ?>">
                                <input class="img-responsive" type="image" alt="Submit" name=submit" src="<?php echo $path ?>"/>
                            </form>
						</div>
						<div class="w3agile-middle">
							<ul>
								<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $item->datum ?></li>
								<li id="hover-content"><i class="fa fa-comment" aria-hidden="true"></i><?php echo CommentDAO::getNumberOfComments($item->blogID)[0] ?> COMMENTS</li>
							</ul>
						</div>
					</div>

					<div class="w3agile-bottom">
						<div class="col-md-3 w3agile-left">
							<h5><?php echo $item->categorie ?></h5>
							<br>
							<h6><?php  echo AuteurDAO::getById($item->auteurID)->voornaam." ".AuteurDAO::getById($item->auteurID)->naam; ?></h6>
						</div>
						<div class="col-md-9 w3agile-right">
							<h3><?php echo $item->titel ?> </h3>
							<p class="demo-1"><?php echo $item->tekst ?></p>
                            <form method="get" action="detail.php">
                                <input type="hidden" name="blogID" value="<?php echo $item->blogID ?>">
                                <button class="agileits w3layouts" type="submit">Lees Meer <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></button>
                            </form>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
                <?php } ?>


				<!-- wthree-top-1 -->
			<!--	<div class="wthree-top-1">
					<div class="w3agile-top">
						<section class="slider">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="w3agile_special_deals_grid_left_grid">
									<a href="singlepage.html"><img src="images/2.jpg" class="img-responsive" alt="" /></a>
								</div>
							</li>
							<li>
								<div class="w3agile_special_deals_grid_left_grid">
									<a href="singlepage.html"><img src="images/3.jpg" class="img-responsive" alt="" /></a>
								</div>
							</li>
							<li>
								<div class="w3agile_special_deals_grid_left_grid">
									<a href="singlepage.html"><img src="images/3.jpg" class="img-responsive" alt="" /></a>
								</div>
							</li>
						</ul>
					</div>
				</section>
			<!-- flexSlider
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				</script>-->
			<!-- //flexSlider

						<div class="w3agile-middle">
						<ul>
							<li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</a></li>
							<li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>201 LIKES</a></li>
							<li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>15 COMMENTS</a></li>
							
						</ul>
					</div>
					</div>
					
					<div class="w3agile-bottom">
						<div class="col-md-3 w3agile-left">
							<h5>Sit amet consectetur</h5>
						</div>
						<div class="col-md-9 w3agile-right">
							<h3><a href="singlepage.html">Amet consectetur adipisicing </a></h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sedc dnmo eiusmod tempor incididunt ut labore et dolore magna aliqua uta enim ad minim ven iam quis nostrud exercitation ullamco labor nisi ut aliquip exea commodo consequat duis aute irudre dolor in elit sed uta labore dolore reprehender</p>
							<a class="agileits w3layouts" href="singlepage.html">Read More <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
						</div>
							<div class="clearfix"></div>
					</div>
				</div>
				<!-- //wthree-top-1 -->
				<!-- wthree-top-1 -->

				<!-- wthree-top-1 -->
			</div>
			<!-- //btm-wthree-left -->
				<!-- btm-wthree-right -->
			<div class="col-md-3 w3agile_blog_left">


				<div class="w3ls_popular_posts">
					<h3>This month</h3>

                    
                    <?php  include_once './db/dao/BlogDAO.php';

                    $path = "./images/";

                    foreach (BlogDAO::getThreeRandom() as $item) {
                        $path = "./images/";
                        $path=$path.$item->foto; ?>
                    <div class="agileits_popular_posts_grid">
						<div class="w3agile_special_deals_grid_left_grid">
                            <form method="get" action="detail.php">
                                <input type="hidden" name="blogID" value="<?php echo $item->blogID ?>">
                                <input class="img-responsive" type="image" alt="Submit" name=submit" src="<?php echo $path ?>"/>
                            </form>
						</div>
						<h4><?php echo $item->titel ?></h4>
						<h5><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $item->datum ?></h5>
					</div>

                        <br>
<?php } ?>

				</div>
				

			</div>
			<!-- //btm-wthree-right -->
			<div class="clearfix"></div>
		</div>
	</div>

	<!-- footer -->
	<!-- copyright -->
	<div class="copyright">
		<div class="container">

			<div class="agileinfo">
				<p>© 2017 Fashion Blog . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</div>
<!-- //copyright -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
</body>

</html>