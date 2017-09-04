<?php
session_start();
include_once 'validatiebibliotheek.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    include './createblogpage.php';
} else {

    include_once './db/dao/BlogDAO.php';
//check who is author!!!!

    BlogDAO::insert(new Blog(null,  $_SESSION["login"], getVeldWaarde("titel"), getVeldWaarde("categorie"),  date("Y-m-d H:i:s"), getFotopath("foto"), getVeldWaarde("tekst")));

    header("location:blog.php");

}
?>