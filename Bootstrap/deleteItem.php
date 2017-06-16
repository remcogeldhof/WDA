<?php
session_start();
$count = $_POST['count'];
echo $count;
     if (isset($_POST['submit'])){
         $arr = array();
         $arr = $_SESSION["cart"];
        unset($arr[$count]);
         $indexNul = array_values($arr);
         $_SESSION["cart"] = $indexNul;
     }
header("location:winkelwagen.php");