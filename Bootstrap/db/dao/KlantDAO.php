<?php
//Kopieer deze template en pas deze aan naargelang de benodigde functionaliteit
include_once 'data/Klant.php';
include_once 'db/connection/DatabaseConnection.php';


class KlantDAO{
    
     private static function getConnection() {
        return DatabaseConnection::getDatabase();
    }
 public static function getAll() {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM klant");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }

    public static function getById($id) {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM klant WHERE klantId=?", array($id));
        if ($result->num_rows == 1) {
            $databaseRij = $result->fetch_array();
            return self::converteerRijNaarObject($databaseRij);
        } else {
            return false;
        }
    }

    public static function insert($klant) {
        return self::getConnection()->voerSqlQueryUit("INSERT INTO klant(klantId, naam, voornaam, email, gebruikersnaam, wachtwoord) VALUES ('?', ?','?','?','?','?')", array(null, $klant->naam, $klant->voornaam, $klant->email, $klant->gebruikersnaam, $klant->wachtwoord));
    }

    public static function deleteById($id) {
        return self::getConnection()->voerSqlQueryUit("DELETE FROM Product where klantId='?'", array($id));
    }
    
    public static function delete($klant) {
        return self::deleteById($product->productId);
    }

    public static function update($klant) {
        return self::getConnection()->voerSqlQueryUit("UPDATE Product SET naam='?',merk='?',prijs='?',beschrijving='?',categorie='?',foto='?' WHERE productId=?", array($product->naam, $product->merk, $product->prijs, $product->beschrijving, $product->categorie, $product->foto));
    }
 protected static function converteerRijNaarObject($databaseRij) {
        return new klant($databaseRij['klantId'], $databaseRij['naam'], $databaseRij['voornaam'], $databaseRij['email'], $databaseRij['gebruikersnaam'], $databaseRij['wachtwoord']);
 }

  

}

?>