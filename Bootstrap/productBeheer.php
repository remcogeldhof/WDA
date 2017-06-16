<?php   include_once 'loginSecurity.php'; ?>

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
                        <a href="../Bootstrap/productBeheer.php">Productbeheer</a> 
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
 
      <h1>Overzicht producten</h1>
    <table class="table">
      <tr>
        <td>Id</td>
        <td>Naam</td>
        <td>Merk</td>
        <td>Prijs</td>
       <td>Categorie</td>
        <td>Foto</td>

        <td></td>
      </tr>

      <?php
      include_once './db/dao/ProductDAO.php';
      foreach (ProductDAO::getAll() as $huidigProduct) {
          ?>
      <tr>
        <td><?php echo $huidigProduct->productId; ?></td>
        <td><?php echo $huidigProduct->naam; ?></td>
        <td><?php echo $huidigProduct->merk; ?></td>
        <td><?php echo $huidigProduct->prijs; ?></td>
       <td><?php  echo $huidigProduct->categorie; ?></td>
        <td><?php echo $huidigProduct->foto; ?></td>
   
        <td>
            <form method="post" action="delete.php">
                <input type="hidden" name="productId" value="<?php echo $huidigProduct->productId; ?>" />
                <input class="btn btn-danger" type="submit" value="Verwijderen" />
            </form>
        </td>
      </tr>
      <?php
      }
      ?>
    </table>

    <a href="insertVerwerking.php" class="btn btn-primary">Nieuw product invoeren</a>

        <hr>
    
     <h1>Overzicht Bestellingen</h1>
    <table class="table">
      <tr>
        <td>Id</td>
        <td>betaalmethode</td>
        <td>totaal</td>

      </tr>

      <?php
      include_once './db/dao/BestellingDAO.php';
      foreach (BestellingDAO::getAll() as $huidgeOrder) {
          ?>
      <tr>
        <td><?php echo $huidgeOrder->bestellingId; ?></td>
        <td><?php echo $huidgeOrder->betaalmethode; ?></td>
        <td><?php echo $huidgeOrder->totaal; ?></td>
    
      </tr>
      <?php
      }
      ?>
    </table>

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


