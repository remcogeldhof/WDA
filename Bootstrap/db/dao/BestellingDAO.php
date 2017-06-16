<?php
//Kopieer deze template en pas deze aan naargelang de benodigde functionaliteit
include_once 'data/Bestelling.php';
include_once 'db/connection/DatabaseConnection.php';


class BestellingDAO{
    
     private static function getConnection() {
        return DatabaseConnection::getDatabase();
    }
 public static function getAll() {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM Bestelling");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }
    
public static function getLatestId() {
        return self::getConnection()->voerSqlQueryUit("SELECT bestellingId FROM Bestelling ORDER BY bestellingId DESC LIMIT 1");
    }
    
  
    public static function getKlant($id) {
        $result = self::getConnection()->voerSqlQueryUit("SELECT klant FROM Bestelling WHERE bestellingId=?", array($id));
        if ($result->num_rows == 1) {
            $databaseRij = $result->fetch_array();
            return self::converteerRijNaarObject($databaseRij);
        } else {
            return false;
        }
    }
   
    public static function insert($bestelling) {
        return self::getConnection()->voerSqlQueryUit("INSERT INTO Bestelling(bestellingId, factuuradresId, leveringsadresId, klantId, betaalmethode, totaal) VALUES ('?','?','?','?','?','?')", array(null, $bestelling->factuuradresId, $bestelling->leveringsadresId, $bestelling->klantId, $bestelling->betaalmethode, $bestelling->totaal));
    }

 protected static function converteerRijNaarObject($databaseRij) {
        return new bestelling($databaseRij['bestellingId'],$databaseRij['factuuradresId'], $databaseRij['leveringsadresId'], $databaseRij['klantId'], $databaseRij['betaalmethode'], $databaseRij['totaal']);
 }

}

?>