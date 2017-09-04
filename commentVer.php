<?php
session_start();
include_once 'validatiebibliotheek.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header('Location: ' . $_SERVER['HTTP_REFERER']);

} else {
    include_once './db/dao/CommentDAO.php';


    if (isset($_SESSION["login"]) && $_SESSION["login"]!="") {
        CommentDAO::insert(new Comment(null, getVeldWaarde("message"), $_SESSION["login"], getVeldWaarde("blogID")));

    }else{
        include './login.php';
    }

}


?>
