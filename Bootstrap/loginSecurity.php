<?php
  session_start();
  if (!isset($_SESSION["admin"]) && !isset($_SESSION["klant"])){
    header("location:login.php");
  }

?>
