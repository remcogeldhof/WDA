<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
--><?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Create Blog Page</title>
    <link rel="shortcut icon" href="">

    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" /><!-- fontawesome -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" /><!-- Bootstrap stylesheet -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
                        <li><a class="active" href="createblogpage.php">+ Create Blog Page</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <?php
                    }else if(isset($_SESSION["login"]) && $_SESSION["login"]=="1"){?>
                        <li><a class="active" href="createblogpage.php">+ Create Blog Page</a></li>
                        <li><a href="overzicht.php">Overview</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php }else{ ?>
                        <li><a href="login.php">Login</a></li>
                    <?php } ?>
				</ul>
				</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<!-- //navigation -->
</header>
	<!-- //header -->	<div class="agile-banner">
</div>
<!-- //banner -->
<!-- breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="createblogpage.php">Create Blog Page</a></li>
		</ol>
	</div>
</div>
<!-- //breadcrumbs -->

<!-- contact -->
<div class="container">
	<!-- mail -->
	<div class="banner-bottom">
		<div class="agileits_heading_section">
			<h3 class="wthree_head">Create Blog Page</h3>
		</div>

		<div class="w3ls_portfolio_grids w3_agile_mail_grids">
			<form action="createblogpageVer.php" method="post" enctype="multipart/form-data">
				<div class="col-md-6 w3_agile_mail_grid">
						<span class="input input--ichiro">
							<input class="input__field input__field--ichiro" name="titel" type="text" id="input-25" placeholder=" " required="required" />
							<label class="input__label input__label--ichiro" for="input-25">
								<span class="input__label-content input__label-content--ichiro">Title</span>
							</label>
						</span>
					<span class="input input--ichiro">
						<select class="input__field input__field--ichiro" name="categorie" id="input-26" required="required">
 							 <option value="fashion" selected>Fashion</option>
  							<option value="lifestyle">Life Style</option>
  							<option value="photography">Photography</option>
						</select>
							<label class="input__label input__label--ichiro" for="input-26">
								<span class="input__label-content input__label-content--ichiro">Category</span>
							</label>
						</span>
					<span class="input input--ichiro">
						Select image
							<input name="foto" type="file" id="image" placeholder="" required="required" />
						</span>
				</div>
				<div class="col-md-6 w3_agile_mail_grid">
					<textarea name="tekst" placeholder="Your text here..." required="required"></textarea>
				</div>
                <input type="submit" value="Submit">

                <div class="clearfix"> </div>
			</form>
		</div>

	</div>
	<!-- //mail -->

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