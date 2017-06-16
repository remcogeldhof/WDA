<?php
//Kopieer deze template en pas deze aan naargelang de benodigde functionaliteit
include_once 'data/Product.php';
include_once 'db/connection/DatabaseConnection.php';


class ProductDAO{
    
     private static function getConnection() {
        return DatabaseConnection::getDatabase();
    }
 public static function getAll() {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM Product");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }
    
     public static function getFourNew() {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM Product ORDER BY productId DESC LIMIT 4");
        $resultArray = array();
        for ($index = 0; $index < $result->num_rows; $index++) {
            $databaseRij = $result->fetch_array();
            $nieuw = self::converteerRijNaarObject($databaseRij);
            $resultArray[$index] = $nieuw;
        }
        return $resultArray;
    }
    
    public static function getAllById(){
        $product_array = self::getConnection()->voerSqlQueryUit("SELECT * FROM Product ORDER BY id ASC");
        return $product_array;
    }
    
    public static function getByCategorie($cat) {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM Product WHERE categorie=?", array($cat));
        if ($result->num_rows == 1) {
            $databaseRij = $result->fetch_array();
            return self::converteerRijNaarObject($databaseRij);
        } else {
            return false;
        }
    }
    
    public static function getById($id) {
        $result = self::getConnection()->voerSqlQueryUit("SELECT * FROM Product WHERE productId=?", array($id));
        if ($result->num_rows == 1) {
            $databaseRij = $result->fetch_array();
            return self::converteerRijNaarObject($databaseRij);
        } else {
            return false;
        }
    }

    public static function insert($product) {
        return self::getConnection()->voerSqlQueryUit("INSERT INTO Product(productId, naam, merk, prijs, beschrijving, foto, categorie) VALUES ('?','?','?','?','?','?','?')", array(null, $product->naam, $product->merk, $product->prijs, $product->beschrijving, $product->foto, $product->categorie));
    }

    public static function deleteById($id) {
        return self::getConnection()->voerSqlQueryUit("DELETE FROM Product where productId='?'", array($id));
    }
    
    public static function delete($product) {
        return self::deleteById($product->productId);
    }

    public static function update($product) {
        return self::getConnection()->voerSqlQueryUit("UPDATE Product SET naam='?',merk='?',prijs='?',beschrijving='?',categorie='?',foto='?' WHERE productId=?", array($product->naam, $product->merk, $product->prijs, $product->beschrijving, $product->categorie, $product->foto));
    }
 protected static function converteerRijNaarObject($databaseRij) {
        return new Product($databaseRij['productId'], $databaseRij['naam'], $databaseRij['merk'], $databaseRij['prijs'], $databaseRij['beschrijving'], $databaseRij['foto'],$databaseRij['categorie']);
 }

  

}

?>