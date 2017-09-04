<?php

class Auteur {
    public $auteurID;
    public $naam;
    public $voornaam;
    public $mail;
    public $gebruikersnaam;
    public $wachtwoord;
    
    public function __construct($auteurID, $naam, $voornaam, $mail, $gebruikersnaam, $wachtwoord){
        $this->auteurID = $auteurID;
        $this->naam = $naam;
        $this->voornaam = $voornaam;
        $this->mail = $mail;
        $this->gebruikersnaam = $gebruikersnaam;
        $this->wachtwoord = $wachtwoord;
    }
}

