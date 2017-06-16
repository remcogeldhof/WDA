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
  <?php
               $totaal = 0;

?>
    
  	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:60%">Product</th>
							<th style="width:30%">Price</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
   <?php    

      if(isset($_SESSION["cart"])){
                include_once './db/dao/ProductDAO.php';
           $count = 0;
      foreach($_SESSION["cart"] as $huidgeId){
        ?>
					<tbody>
						<tr>
							<td data -th="Product">
								<div class="row">
                                     <?php $path = "http://localhost/Bootstrap/uploaded/";
                    $path=$path.ProductDAO::getById($huidgeId)->foto;
                ?>
									<div class="col-sm-2 hidden-xs"><img src="<?php echo $path; ?>" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin"><?php echo ProductDAO::getById($huidgeId)->naam; ?></h4>
										<p> <?php echo ProductDAO::getById($huidgeId)->productId; ?> </p>
									</div>
								</div>
							</td>
							<td data-th="Price"><?php echo  ProductDAO::getById($huidgeId)->prijs; ?></td>
							
							<td class="actions" data-th="">
                                <form action="deleteItem.php" method="POST">
                                    <input type="hidden" name="count" value="<?php echo $count; ?>">
                                    <input class="btn btn-warning" type="submit" name="submit" value="delete">
                                </form>
							</td>
						</tr>
					</tbody>
         <?php
      $totaal+= ProductDAO::getById($huidgeId)->prijs;
      $count+=1;
      }
      } ?> 
      
					<tfoot>
						
						<tr >
							<td ><a href="ProductenOverview.php" class="btn btn-primary"><i class="fa fa-angle-left"></i>Verder winkelen</a></td>
							<td colspan="2" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><strong>Total <?php echo $totaal; ?></strong></td>
                            <?php $_SESSION["totaal"] = $totaal; ?>
							<td><a href="checkout.php" class="btn btn-success btn-block"> Kopen <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>

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

