<?php
//Kopieer deze template en pas deze aan naargelang de benodigde functionaliteit
include_once 'data/Item.php';
include_once 'db/connection/DatabaseConnection.php';


class ItemDAO{
    
     private static function getConnection() {
        return DatabaseConnection::getDatabase();
    }
 public static function getAll() {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM BestellingItems");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }
    
   
    public static function insert($bestelling) {
        return self::getConnection()->voerSqlQueryUit("INSERT INTO bestellingitems(itemsId, bestellingId, productId) VALUES ('?','?','?')", array(null, $bestelling->bestellingId, $bestelling->productId));
    }

 protected static function converteerRijNaarObject($databaseRij) {
        return new Item($databaseRij['itemsId'],$databaseRij['bestellingId'], $databaseRij['productId']);
 }

}

?>