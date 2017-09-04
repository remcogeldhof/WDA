<?php
//In deze klasse moet je in principe alleen de connectiegegevens voor jou mysql server aanpassen.
include_once 'db/connection/Database.php';

class DatabaseConnection {

    //Singleton
    private static $verbinding;

    public static function getDatabase() {

        if (self::$verbinding == null) {
            $mijnComputernaam = "localhost";
            $mijnGebruikersnaam = "WDA075";
            $mijnWachtwoord = "61425938";
            $mijnDatabase = "WDA075";
            self::$verbinding = new Database($mijnComputernaam, $mijnGebruikersnaam, $mijnWachtwoord, $mijnDatabase);
        }
        return self::$verbinding;
    }

}
?>


