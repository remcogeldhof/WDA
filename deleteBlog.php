<?php

include_once 'validatiebibliotheek.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    include './overzicht.php';
} else {


    include_once './db/dao/BlogDAO.php';
    include_once './db/dao/CommentDAO.php';
    BlogDAO::deleteById($_GET["blogID"]);
    CommentDAO::deleteById($_GET["blogID"]);

    header("location:overzicht.php");

}
?>