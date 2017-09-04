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
                      <li><a href="index.php">Home</a></li>
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
					</li>
				  </ul>
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			
		<!-- //navigation -->
	</header>

	<div class="container">
		<div class="banner-btm-agile">
		<!-- //btm-wthree-left -->
			<div class="col-md-9 btm-wthree-left">

                <?php  include_once './db/dao/BlogDAO.php';
                include_once './db/dao/AuteurDAO.php';
                $id = $_GET['blogID'];
                $categorie =  BlogDAO::getById($id)->categorie;

                $path = "./images/";
                $path=$path.BlogDAO::getById($id)->foto ?>

				<div class="wthree-top" >
					<div class="w3agile-top">
						<div class="w3agile_special_deals_grid_left_grid">
							<img src="<?php echo $path ?>" class="img-responsive" alt="" />
						</div>
						<div class="w3agile-middle">
							<ul>
								<li> <i class="fa fa-calendar" aria-hidden="true"></i><?php echo BlogDAO::getById($id)->datum ?></li>
							</ul>
						</div>
					</div>

					<div class="w3agile-bottom">
						<div class="col-md-3 w3agile-left">
							<h5><?php echo $categorie ?></h5>
							<br>
							<h6 style="font-size: 16px;"><?php echo AuteurDAO::getById(BlogDAO::getById($id)->auteurID)->voornaam." ".AuteurDAO::getById(BlogDAO::getById($id)->auteurID)->naam; ?></h6>
						</div>
						<div class="col-md-9 w3agile-right">
							<h3><?php echo BlogDAO::getById($id)->titel ?></h3>
                        <p><?php echo BlogDAO::getById($id)->tekst ?></p>

						</div>
						<div class="clearfix"></div>
					</div>
				</div>




				<div class="wthree-top" >
						<h3>Comments</h3>

						<br>
					<div class="w3ls_portfolio_grids w3_agile_mail_grids">
						<form action="commentVer.php" method="post">
                            <input type="hidden" name="blogID" value="<?php echo $id ?>">
                            <div>
								<textarea rows="3" style="width: 100%;" name="message" placeholder="Your comment here..." required="yes"></textarea>
							</div>
							<div class="clearfix"> </div>
							<input type="submit" value="Send">
						</form>
					</div>
<?php
include_once './db/dao/CommentDAO.php';

foreach (CommentDAO::getAllByBlog($_GET['blogID']) as $comment) { ?>
					<div class="w3agile-bottom">
					<div class="col-md-3 w3agile-left">
						<h6 style="font-size: 16px;"><?php echo AuteurDAO::getById($comment->auteurID)->naam." ".AuteurDAO::getById($comment->auteurID)->voornaam; ?></h6>
					</div>
					<div class="col-md-9 w3agile-right">
						<p><?php echo $comment->comment ?>
						</p>
					</div>
					<div class="clearfix"></div>
					</div>
                <?php } ?>

				</div>

				<!-- wthree-top-1 -->
			</div>
			<!-- //btm-wthree-left -->
				<!-- btm-wthree-right -->
			<div class="col-md-3 w3agile_blog_left">

                <div class="w3l_categories">
                    <h3>Categories</h3>

                    <form action="blog.php" method="get">
                        <select name="categorie" required="required">
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="fashion" selected>Fashion</option>
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> <option value="lifestyle">Life Style</option>
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="photography">Photography</option>
                        </select>
                        <input type="submit" value="Filter">
                    </form>



                </div>
                <div class="w3l_categories">
                    <h3>Archive</h3>

                    <form action="blog.php" method="get">
                        <select name="maand" required="required">
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="1" selected>January</option>
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="2">February</option>
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="3">March</option>
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="4">April</option>
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="5">May</option>
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="6">June</option>
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="7">July</option>
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="8">August</option>
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="9">September</option>
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="10">October</option>
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="11">November</option>
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><option value="12">December</option>
                        </select>
                        <input type="submit" value="Filter">
                    </form>
                </div>


				<div class="w3ls_popular_posts">
					<h3>More <?php echo $categorie ?> Posts</h3>
                    <?php  include_once './db/dao/BlogDAO.php';

                    $path = "./images/";

                    foreach (BlogDAO::getByCategoryDetail($categorie,$id) as $item) {
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