<?php
  include_once './validatiebibliotheek.php';
$naamErr="";
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      include './checkout.php';
  } else {  
            

      if ($_POST['voorwaarden'] == 'ok'){         
          
        include_once './db/dao/AdresDAO.php';
        include_once './db/dao/BestellingDAO.php';  
        include_once './db/dao/ItemDAO.php';  
        include_once './db/dao/ProductDAO.php';  


      
      if(isset($_POST["leveradresCheck"])){
         AdresDAO::insert(new Adres(null, getVeldWaarde("straat"), getVeldWaarde("nummer"), getVeldWaarde("stad"),getVeldWaarde("land"), "factuuradres")); 
         AdresDAO::insert(new Adres(null, getVeldWaarde("straat"), getVeldWaarde("nummer"), getVeldWaarde("stad"),getVeldWaarde("land"), "Leveringsadres")); 
      }else{
         AdresDAO::insert(new Adres(null, getVeldWaarde("straat"), getVeldWaarde("nummer"), getVeldWaarde("stad"),getVeldWaarde("land"), "factuuradres")); 
         AdresDAO::insert(new Adres(null, getVeldWaarde("lStraat"), getVeldWaarde("lNummer"), getVeldWaarde("lStad"),getVeldWaarde("lLand"),"Leveringsadres")); 
      }
      
  foreach (AdresDAO::getByFact() as $huidig){
      $factuur = implode(" ",$huidig);
  }
  foreach (AdresDAO::getByLev() as $huidig){
      $levering = implode(" ",$huidig);
  }
          
      BestellingDAO::insert(new Bestelling(null, $factuur, $levering, getVeldWaarde("klant"), getVeldWaarde("betaalmethode"), getVeldWaarde("total")));     
      
          
          
          foreach (BestellingDAO::getLatestId() as $huidig){
      $bestellingId = implode(" ",$huidig);
  }   
          
   foreach($_POST['result'] as $huidigeId){
        ItemDAO::insert(new Item(null, $bestellingId, $huidigeId));      
    }
          
          header("location:checkoutAfgerond.php");
    }else{
          
                    header("location:checkout.php");

      }
  }


?>