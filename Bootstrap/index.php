<!DOCTYPE html>
<html lang="nl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PhotoStuff</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
    
    <link href="../Bootstrap/css/photoCarousel.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../Bootstrap/index.php">PhotoStuff</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../Bootstrap/ProductenOverview.php">Producten Overview</a>
                    </li>
                    <li>
                        <a href="../Bootstrap/ProductenDetail.php">Producten Detail</a>
                    </li>
                    <li>
                        <a href="../Bootstrap/contact.php">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                     <li>
                           <?php
                            session_start();
                            if (isset($_SESSION["klant"]) && $_SESSION["klant"]=="1"){ ?>
                        <a href="../Bootstrap/productBeheer.php">Productbeheer</a> 
                        <?php }?>
                    </li>
                    <li>
                        <a href="../Bootstrap/winkelwagen.php">Winkelwagen</a> 
                    </li>
                     <li>
                         <?php
                            if (!isset($_SESSION["klant"]) && !isset($_SESSION["admin"])){ ?>
                        <a href="../Bootstrap/login.php">Login</a> 
                         <?php }else{ ?>
                        <a href="../Bootstrap/logout.php">Log out</a> 
                         <?php } ?>   
                         
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header> <!--class="jumbotron hero-spacer"-->
             <h3>Uitgelicht</h3>
            <div class="molen">
                <a class="buttonLeft" style="color: black;" onclick="plusDivs(-1)">&#10094;</a>
                <a class="buttonRight" style="color: black;" onclick="plusDivs(+1)">&#10095;</a>
                <?php 
                 include_once './db/dao/ProductDAO.php';
                foreach (ProductDAO::getFourNew() as $huidigProduct) { ?>
                 <?php $path = "http://localhost/Bootstrap/uploaded/";
                    $path=$path.$huidigProduct->foto;
                ?>
                <img class="mySlides" style="margin-left: auto; margin-right:auto;" src="<?php echo $path; ?>" >
                 <?php }?>
            </div>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Nieuwste camera's</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
           <?php  include_once './db/dao/ProductDAO.php';
      foreach (ProductDAO::getFourNew() as $huidigProduct) { ?>
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                     <?php $path = "http://localhost/Bootstrap/uploaded/";
                    $path=$path.$huidigProduct->foto;
                ?>
                    <img src="<?php echo $path; ?>" alt=""> <!-- http://placehold.it/800x500 -->
                    <div class="caption">
                        <h3><?php echo $huidigProduct->naam; ?></h3>
                        <p> <?php echo $huidigProduct->beschrijving; ?> </p>
                        <p>
                            
                            <form action="addItem.php" method="POST">
                            <input type="hidden" name="thisId" value="<?php echo $huidigProduct->productId; ?>">
                            <input type="hidden" name="pagina" value="winkelwagen.php">
                            <input class="btn btn-success" type="submit" name="submit" value="Add to cart">
                            </form>
                        
                        </p>
                    </div>
                </div>
            </div>
            
            <?php }?>
        
        

        
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; PhotoStuff 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="../Bootstrap/js/carousel.js"></script>


</body>

</html>
