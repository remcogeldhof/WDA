<?php
session_start();
$id = $_POST['thisId'];
     if (isset($_POST['submit'])){
      if(isset($_SESSION["cart"])){
         array_push($_SESSION["cart"], $id);
      }else{
         $_SESSION["cart"] = array();
         array_push($_SESSION["cart"], $id);
      }
      }       
$pagina = $_POST['pagina'];
header("location:$pagina");
                            
/*  if(isset($idProduct)){
        if(sizeof($idProduct)>0){
        session_start();
        }
    }else{
        $idProduct = array("0");
    }
    if(isset($_POST["huidigeID"])){  
    array_push($idProduct, $_POST["huidigeID"]);
    $_SESSION["basket"]=$idProduct;
     include_once 'ProductenOverview.php';    
    }

    function getArray(){
        return $_SESSION["basket"];
    }*/
?>