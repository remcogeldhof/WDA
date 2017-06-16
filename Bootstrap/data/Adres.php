<?php

class Adres {
    public $factuuradresId;
    public $straat;
    public $nummer;
    public $stad;
    public $land;
    public $soort;
    
    public function __construct($factuuradresId, $straat, $nummer, $stad, $land, $soort){
        $this->factuuradresId = $factuuradresId;
        $this->straat = $straat;
        $this->nummer = $nummer;
        $this->stad = $stad;
        $this->land = $land;
        $this->soort = $soort;

    }
}

?>