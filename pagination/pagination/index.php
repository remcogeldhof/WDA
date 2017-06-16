<?php
include_once("data/db.php");
//include_once("model/Product.php");
$products = Db::getAll();

// http://dtsl.ehb.be/~ruben.van.den.abeele/WDA/examen/pagination/
?>

<html>

<head>
    <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
    <script src="scripts/productList.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
</head>
    <body>
        
<div class="container">
    <table id="table" class="table table-striped">
        <tr>
            <th>Naam</th>
            <th>Prijs</th>
        </tr>

    </table>
    <table>
        <tr>
            <td id="back"><button type="button" class="btn btn-primary">back</button></td>
            <td ><span class="badge" id="currentPage">0</span></td>
            <td id="next"><button type="button" class="btn btn-primary">next</button></td>
        </tr>
    </table>
        </div>
    </body>
</html>