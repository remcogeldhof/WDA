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
                <a class="navbar-brand" href="../Bootstrap/index.html">PhotoStuff</a>
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
                            if (!isset($_SESSION["admin"]) && !isset($_SESSION["klant"])){ ?>
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
 <h1>Nieuw product</h1>
    <form action="insertVerwerking.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="naam">Naam:</label>
        <input class="form-control" type="text" name="naam" value="<?php echo $naamVal; ?>"/>
        <div><?php echo $naamErr; ?></div>
      </div>
      <div class="form-group">
        <label for="Merk">Merk</label>
        <input class="form-control" type="text" name="merk" value="<?php echo $merkVal; ?>"/>
        <div><?php echo $merkErr; ?></div>
      </div>
      <div class="form-group">
        <label for="categorie">Categorie:</label>
         <select class="form-control" name="categorie">
                <option value="beginner">Spiegelreflexcamera voor beginner</option>
                <option value="liefhebber">Spiegelreflexcamera voor liefhebbers</option>
                <option value="professional">Spiegelreflexcamera voor professionals</option>
            </select>
      </div>
      <div class="form-group">
        <label for="beschrijving">Beschrijving:</label>
          <textarea class="form-control" style="resize:vertical; max-height:400px;" rows="3" type="text" name="beschrijving" value="<?php echo $beschrijvingVal; ?>"></textarea>
        <div><?php echo $beschrijvingErr; ?></div>
      </div>
      <div class="form-group">
            <label for="foto">Selecteer de bijpassende foto:</label>
            <input class="form-control" value="<?php echo $fotoVal; ?>" type="file" name="foto" id="foto">
      </div>
      <div class="form-group">
        <label for="prijs">Prijs:</label>
        <input class="form-control" type="text" name="prijs" value="<?php echo $prijsVal; ?>"/>
        <div><?php echo $prijsErr; ?></div>
      </div>
        <?php 
        $id= uniqid();
        ?>
      <div class="form-group">
        <input class="btn btn-primary" type="submit" value="Aanmaken">
          <a href="productBeheer.php"  class="btn btn-default" >Terug naar overzicht</a>
      </div>
    </form>
    

    

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
    

</body>

</html>


<?php


?>