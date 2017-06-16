<?php
//Kopieer deze template en pas deze aan naargelang de benodigde functionaliteit
include_once 'data/Adres.php';
include_once 'db/connection/DatabaseConnection.php';


class AdresDAO{
    
     private static function getConnection() {
        return DatabaseConnection::getDatabase();
    }
 public static function getAll() {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM Adres");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }
        
    public static function getByFact() {
        return self::getConnection()->voerSqlQueryUit("SELECT factuuradresId FROM Adres WHERE soort='factuuradres' ORDER BY factuuradresId DESC LIMIT 1");
    }
    
     public static function getByLev() {
        return self::getConnection()->voerSqlQueryUit("SELECT factuuradresId FROM Adres WHERE soort='Leveringsadres' ORDER BY factuuradresId DESC LIMIT 1");
    }

   
    public static function insert($adres) {
        return self::getConnection()->voerSqlQueryUit("INSERT INTO Adres(factuuradresId, straat, nummer, stad, land, soort) VALUES ('?','?','?','?','?','?')", array(null, $adres->straat, $adres->nummer, $adres->stad, $adres->land, $adres->soort));
    }

    
 protected static function converteerRijNaarObject($databaseRij) {
        return new Adres($databaseRij['factuuradresId'], $databaseRij['straat'], $databaseRij['nummer'], $databaseRij['stad'], $databaseRij['land'], $databaseRij['soort']);
 }

}

?>