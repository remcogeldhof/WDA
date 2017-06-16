<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      include './login.php';
}else{
      include_once './db/dao/KlantDAO.php';
      foreach (KlantDAO::getAll() as $huidigeKlant) {    
          if ($_POST["gebruikersnaam"] == $huidigeKlant->gebruikersnaam && $_POST["password"] == $huidigeKlant->wachtwoord) {
              session_start();
              $_SESSION["klant"] = $huidigeKlant->klantId;
          }
      }

    if(isset($_SESSION["klant"])){
        if($_SESSION["klant"]=="1"){
            header("location:productBeheer.php");
        }else{
         header("location:index.php");
        }
    }
    else{
        header("location:login.php");
    }
}


  /*
  
  
  
  
          echo $huidigeKlant->klantId;            
          echo $huidigeKlant->naam;
          echo $huidigeKlant->voornaam;            
          echo $huidigeKlant->email;            
          echo $huidigeKlant->gebruikersnaam;            
          echo $huidigeKlant->wachtwoord;   
 if ($_POST["username"] == "admin" && $_POST["password"] == "ehb") {
          session_start();
          $_SESSION["admin"] = "admin";
          header("location:productBeheer.php");
      }else{
*/?>