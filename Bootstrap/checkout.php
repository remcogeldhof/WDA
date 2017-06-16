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
         <form action="checkoutVerwerking.php" method="POST">

      <h2>Factuuradres</h2>  
      <div class="form-group">
        <label for="naam">Straat:</label>
        <input class="form-control" type="text" name="straat"/>
      </div>
      <div class="form-group">
        <label for="Merk">Nummer: </label>
        <input class="form-control" type="text" name="nummer"/>
      </div>
     <div class="form-group">
        <label for="Merk">Stad: </label>
        <input class="form-control" type="text" name="stad"/>
      </div>
     <div class="form-group">
        <label for="Merk">Land: </label>
        <input class="form-control" type="text" name="land"/>
      </div>
    
        <hr>
            <h2>Leveradres</h2>  
            
        <label>Vink aan indien u hetzelfde adres wilt gebruiken: </label>
        <input type="checkbox" name="leveradresCheck" onclick="hide()">
        <div id="showHide">
      <div class="form-group">
        <label for="naam">Straat:</label>
        <input class="form-control" type="text" name="lStraat"/>
      </div>
      <div class="form-group">
        <label for="Merk">Nummer: </label>
        <input class="form-control" type="text" name="lNummer"/>
      </div>
     <div class="form-group">
        <label for="Merk">Stad: </label>
        <input class="form-control" type="text" name="lStad"/>
      </div>
     <div class="form-group">
        <label for="Merk">Land: </label>
        <input class="form-control" type="text" name="lLand"/>
      </div>
        
             </div>
             
            <hr>
            <h2>Betaalmethode</h2>  
             
            <?php  
$arr = array();
$arr = $_SESSION["cart"];
           
?>
      <div class="form-group">
        <select class="form-control" name="betaalmethode">
         <option value="visa">VISA</option>
         <option value="mastercard">MasterCard</option>
         <option value="paypal">PayPal</option>
        </select>
      </div>
             
             <hr>
             <h2>Algemene Voorwaarden</h2>  
                          <input type="checkbox" name="voorwaarden" value="ok">
             <label>Ik ga akkoord met de algemene voorwaarden</label>
            
 <?     
$postvalue=$_SESSION["cart"];
foreach($postvalue as $value)
{?>
             <input type="hidden" name="result[]" value="'. $value. '">
<? }     ?>        


             <input type="hidden" name="klant" value="<?php echo $_SESSION["klant"]; ?>">
             <input type="hidden" name="total" value="<?php echo $_SESSION["totaal"]; ?>">
             <br>
             <br>
        <input class="btn btn-primary" type="submit" value="Kopen">
          <a href="winkelwagen.php"  class="btn btn-default" >Terug naar mandje</a>
    </form>
      <script>
        function hide() {
    var x = document.getElementById('showHide');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
        
        </script>
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
