<?php
  $naamVal = $merkVal = $prijsVal = $beschrijvingVal = "";
  $naamErr = $merkErr = $prijsErr = $beschrijvingErr = "";

  include_once './validatiebibliotheek.php';
  //We sturen de POST naar DEZE pagina, omdat we de gebruiker op deze pagina de kans willen geven om zijn ingevulde gegevens aan te passen wanneer deze niet gevalideerd kunnen worden

  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      //Dit wilt zeggen dat de gebruiker voor het eerst op deze pagina landt
      //=> we tonen het formulier en geven de gebruiker de kans om het formulier in te vullen
      //We kunnen eventueel een aantal default values voorzien voor de invulvelden
      include './insertformulier.php';
  } else {
      //De gebruiker heeft het formulier reeds ingevuld, en het formulier werd correct naar deze pagina gepost
      //We voeren de validatie van de velden uit
      $naamErr = errRequiredVeld("naam");
      $merkErr = errRequiredVeld("merk");
      $prijsErr = errVoegMeldingToe(errRequiredVeld("prijs"), errVeldIsGeheelGetalOfKommagetal("prijs"));
      $beschrijvingErr = errRequiredVeld("beschrijving");
      if (isFormulierValid()) {
          //Het formulier werd valid ingevuld
          //We kunnen de data opslaan in de database en terug doorlinken naar de home pagina
          
      
        include_once './db/dao/ProductDAO.php';    
         
          ProductDAO::insert(new Product(null,getVeldWaarde("naam"), getVeldWaarde("merk"), getVeldWaarde("prijs"), getVeldWaarde("beschrijving"),getFotopath("foto"), getVeldWaarde("categorie"))); //getFotopath("foto")
          header("location:productBeheer.php");
      } else {
          //Toon formulierpagina met eventuele feedbackvelden (err-velden)
          //Eventueel kan je ervoor zorgen dat foutief ingevulde waarden terug worden afgeprint in het formulier
          $naamVal = getVeldWaarde("naam");
          $merkVal = getVeldWaarde("merk");
          $prijsVal = getVeldWaarde("prijs");
          $beschrijvingVal = getVeldWaarde("beschrijving");
          $categorieVal = getVeldWaarde("categorie");
          include './insertformulier.php';
      }
  }

  function isFormulierValid() {
      global $naamErr, $merkErr, $prijsErr, $beschrijvingErr;
      $allErr = $naamErr . $merkErr . $prijsErr . $beschrijvingErr;
      if (empty($allErr)) {
          //Formulier is valid
          return true;
      } else {
          return false;
      }
  }


?>

