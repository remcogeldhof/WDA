<?php
include_once 'validatiebibliotheek.php';
$ok = false;
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

include './login.php';
} else {
include_once './db/dao/AuteurDAO.php';

foreach(AuteurDAO::getAll() as $auteur){
if($auteur->gebruikersnaam == getVeldWaarde("gebruikersnaam") && $auteur->wachtwoord == getVeldWaarde("wachtwoord")){
//if (session_status() == PHP_SESSION_NONE) {
session_start();

$_SESSION["login"] = $auteur->auteurID;
$ok = true;
}
}

}
if($ok == true){
header("location:index.php");

}else{
header("location:login.php");

}

?>

