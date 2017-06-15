<?php
  if(isset($_GET["name"]) && isset($_GET["leeftijd"])){
      if(!empty($_GET["name"]) && !empty($_GET["leeftijd"])){
        $data["succes"] = "Welkom " . $_GET["leeftijd"] ."-jarige" . $_GET["name"];
      }
      else {
        $data["error"] = "Geen naam verstuurd via GET";
      }
  }
  else {
    $data["error"] = "Geen naam verstuurd via GET";
  }

  echo json_encode($data);
?>