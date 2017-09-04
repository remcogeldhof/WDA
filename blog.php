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
<title>Blog</title>
<link href="../WDA_geldhof_remco/css/font-awesome.min.css" rel="stylesheet" type="text/css"  /><!-- fontawesome -->     
<link href="../WDA_geldhof_remco/css/bootstrap.min.css" rel="stylesheet" type="text/css" /><!-- Bootstrap stylesheet -->
<link href="../WDA_geldhof_remco/css/style.css" rel="stylesheet" type="text/css"  />
	<link href="../WDA_geldhof_remco/css/hover.css" rel="stylesheet" type="text/css"/>

	<!-- stylesheet -->
<!-- meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashion Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
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

    <style>

        .demo-1 {
            color:pink;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
        }
    </style>
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
					<li><a  class="active" href="blog.php">Blog</a></li>
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
	<!-- //header -->
	<!-- banner -->
	<div class="agile-banner">
	</div>
	<!-- //banner -->
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php">Blog</a></li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
	<div class="container">
		<div class="banner-btm-agile">
			
		<!-- //btm-wthree-left -->
			<div class="col-md-9 btm-wthree-left">
			<div class="agileits_heading_section">
				<h3 class="wthree_head">Blog</h3>
			</div>
				<div class="events w3">
                    <div class="events-main">

                    <?php  include_once './db/dao/BlogDAO.php';
                      include_once './db/dao/AuteurDAO.php';
                    include_once './db/dao/CommentDAO.php';

                    if(isset($_GET["categorie"])){
                          $categorie = $_GET['categorie'];
                          $arr = BlogDAO::getByCategory($categorie);
                      }else if(isset($_GET["maand"])){
                          $maand = $_GET['maand'];
                          $arr = BlogDAO::getByMonth($maand);
                      }
                      else{
                          $arr = BlogDAO::getAll();
                      }
                    $path = "./images/";

                    foreach ($arr as $item) {
                    $path = "./images/";
                    $path=$path.$item->foto; ?>

						<div class="events-top" id="parent">
							<div class="col-md-6  w3ls fea-left">
								<div class="w3agile_special_deals_grid_left_grid">

                                    <form method="get" action="detail.php">
                                        <input type="hidden" name="blogID" value="<?php echo $item->blogID ?>">
                                        <input class="img-responsive" type="image" alt="Submit" name=submit" src="<?php echo $path ?>"/>
                                    </form>
									<div class="w3agile-middle">
										<ul>
											<li id="hover-content"><i class="fa fa-comment" aria-hidden="true"></i><?php echo CommentDAO::getNumberOfComments($item->blogID)[0] ?>  COMMENTS</li>
											<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $item->datum ?></li>
											<li><i aria-hidden="true"></i><?php echo $item->categorie ?></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-6 wthree fea-right">
								<h3><?php echo $item->titel ?></h3>
								<h4 id="italic"><?php echo AuteurDAO::getById($item->auteurID)->voornaam." ".AuteurDAO::getById($item->auteurID)->naam; ?></h4>
								<p class="demo-1"><?php echo $item->tekst ?></p>
                                <form method="get" action="detail.php">
                                    <input type="hidden" name="blogID" value="<?php echo $item->blogID ?>">
                                    <button class="agileits w3layouts" type="submit">Lees Meer <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></button>
                                </form>
							<!--	<a class="agileits w3layouts" href="singlepage.html">Read More <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>-->
							</div>
							<div class="clearfix"> </div>
						</div>

                        <?php } ?>

                        <!--
						<div class="events-top">
							<div class="col-md-6  fea-left">
								<div class="w3agile_special_deals_grid_left_grid">
									<a href="singlepage.html"><img src="images/g7.jpg" class="img-responsive" alt="" /></a>
								</div>
							</div>
							<div class="col-md-6  fea-right">
								<h3>Lorem ipsum dolor amet</h3>
								<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form.</p>
								<a class="agileits w3layouts" href="singlepage.html">Read More <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="events-top">
							<div class="col-md-6  w3-agile fea-right">
								<h3>Sed ut perspiciatis unde</h3>
								<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" .</p>
								<a class="agileits w3layouts" href="singlepage.html">Read More <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
							</div>
							<div class="col-md-6  fea-left">
								<div class="w3agile_special_deals_grid_left_grid">
									<a href="singlepage.html"><img src="images/p1.jpg" class="img-responsive" alt="" /></a>
								</div>
							</div>
								<div class="clearfix"> </div>
						</div>
						<div class="events-top">
							<div class="col-md-6  fea-left">
								<div class="w3agile_special_deals_grid_left_grid">
									<a href="singlepage.html"><img src="images/p3.jpg" class="img-responsive" alt="" /></a>
								</div>
							</div>
							<div class="col-md-6  fea-right">
								<h3>Lorem ipsum dolor amet</h3>
								<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" .</p>
								<a class="agileits w3layouts" href="singlepage.html">Read More <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
							</div>
							<div class="clearfix"> </div>
						</div>--!>
					</div>

				</div>
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


                </div>
                <div class="w3ls_popular_posts">
                    <h3>Popular Posts</h3>
                    <?php  include_once './db/dao/BlogDAO.php';

                    $path = "./images/";

                    foreach (BlogDAO::getMostComments() as $item) {
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
	<!-- copyright -->	<div class="copyright">
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