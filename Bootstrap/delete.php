<?php
  include_once './db/dao/ProductDAO.php';
  ProductDAO::deleteById($_POST['productId']);
  header("location:productBeheer.php");
?>
