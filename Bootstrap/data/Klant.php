<?php

class Klant {
    public $klantId;
    public $naam;
    public $voornaam;
    public $email;
    public $gebruikersnaam;
    public $wachtwoord;
    
    public function __construct($klantId, $naam, $voornaam, $email, $gebruikersnaam, $wachtwoord){
        $this->klantId = $klantId;
        $this->naam = $naam;
        $this->voornaam = $voornaam;
        $this->email = $email;
        $this->gebruikersnaam = $gebruikersnaam;
        $this->wachtwoord = $wachtwoord;
    }
}

