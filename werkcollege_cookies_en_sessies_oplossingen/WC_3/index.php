<?php
  session_start();
  include "keuzes/taalkeuze.php";
  include "keuzes/achtergrondkleurkeuze.php";
  include "keuzes/naamkeuze.php";
  include "keuzes/tijdszonekeuze.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo  $_SESSION["naam"]  ?> </title>
    </head>
    <body style="background-color: <?php echo $achtergrondkleur; ?>">
        <h1><?php echo $indextitel; ?></h1>
        <div>
            <?php echo $indextekst .  $_SESSION["naam"]; ?>
        </div>
        <div>
            <?php echo $tijd; ?>
        </div>
        <a href="instellingen.php"><?php echo $indexlink; ?></a>
    </body>
</html>
