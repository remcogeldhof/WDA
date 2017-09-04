<?php
//Kopieer deze template en pas deze aan naargelang de benodigde functionaliteit
include_once 'data/Auteur.php';
include_once 'db/connection/DatabaseConnection.php';


class AuteurDAO{
    
     private static function getConnection() {
        return DatabaseConnection::getDatabase();
    }


 public static function getAll() {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM auteur");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }

    public static function getById($id) {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM auteur WHERE auteurID=?", array($id));
        if ($result->num_rows == 1) {
            $databaseRij = $result->fetch_array();
            return self::converteerRijNaarObject($databaseRij);
        } else {
            return false;
        }
    }

    public static function insert($auteur) {
        return self::getConnection()->voerSqlQueryUit("INSERT INTO auteur(auteurID, naam, voornaam, mail, gebruikersnaam, wachtwoord) VALUES ('?', '?','?','?','?','?')", array(null, $auteur->naam, $auteur->voornaam, $auteur->mail, $auteur->gebruikersnaam, $auteur->wachtwoord));
    }


 protected static function converteerRijNaarObject($databaseRij) {
        return new auteur($databaseRij['auteurID'], $databaseRij['naam'], $databaseRij['voornaam'], $databaseRij['mail'], $databaseRij['gebruikersnaam'], $databaseRij['wachtwoord']);
 }

}

?>