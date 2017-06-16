<?php
session_start();
include_once './db/dao/ProductDAO.php';
include_once './db/dao/BestellingDAO.php';

      foreach($_SESSION["cart"] as $huidgeId){
          
  BestellingDAO::insert(new Bestelling(ProductDAO::getById($huidgeId)->productId, $_SESSION["klant"]));
    
      }
 
?>

