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
    
    <link href="css/ProductenOverview.css" rel="stylesheet">
    
        <link href="css/hover.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!--bron code in body: http://bootsnipp.com/snippets/featured/list-grid-view -->

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
                            if (!isset($_SESSION["klant"])){ ?>
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
    <div class="well well-sm">
        <strong>Weergave</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
        <strong  style="padding-left: 1%;" >Filter</strong>
        <div class="btn-group">
            <form action="" method="GET">
            <select class="form-control" name="categorie">
                <option value="beginner">Spiegelreflexcamera voor beginner</option>
                <option value="liefhebber">Spiegelreflexcamera voor liefhebbers</option>
                <option value="professional">Spiegelreflexcamera voor professionals</option>
            </select>
                <input type="submit" name="button" value="Selecteer">
            </form>
        </div>
    </div>
       
       <?php  include_once './db/dao/ProductDAO.php';
        //if(isset($_GET["button"])){
            
          //  $cat = $_GET["categorie"];
        //foreach (ProductDAO::getByCategorie($cat) as $huidigProduct)  { ?>
       
 
    
    <?php  foreach (ProductDAO::getAll() as $huidigProduct) { ?>
       
    <div id="products" class="row list-group">
         <?php $path = "http://localhost/Bootstrap/uploaded/";
                    $path=$path.$huidigProduct->foto;
                ?>
        <div class="item  col-xs-4 col-lg-4" id="parent">
            <div class="thumbnail">
                <img class="group list-group-image" src="<?php echo $path; ?>" alt="" />
                <div class="caption" >
                    <h4 class="group inner list-group-item-heading">
                         <?php echo $huidigProduct->naam; ?></h4>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                                € <?php echo $huidigProduct->prijs; ?></p>
                        </div>
                        <div class="col-xs-12 col-md-6" id="hover-content">
                            <form action="addItem.php" method="POST">
                            <input type="hidden" name="thisId" value="<?php echo $huidigProduct->productId; ?>">
                            <input type="hidden" name="pagina" value="ProductenOverview.php">
                            <input class="btn btn-success" type="submit" name="submit" value="Add to cart">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           <?php
      }
      ?>
        </div>

    </div>
    <div class="container">
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
    
    <script src="js/ProductenGrid.js"></script>

</body>

</html>